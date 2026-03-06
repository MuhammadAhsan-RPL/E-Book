<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use App\Models\Genres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    //
    public function index(){
        $books = Books::all();
        return view('books.index', compact('books'));
    }

    public function create(){
        $genres = Genres::all();
        $authors = Authors::all();
        return view('books.create', compact('genres', 'authors'));
    }

    public function store(Request $request){
        $books = $request->validate([
            "judul" =>"required|max:225",
            "sinopsis" => "required",
            "tahun_terbit" => "required",
            "image" => "required|image|mimes:jped,jpg,png|max:2048",
            "genre_id" => "required",
            "author_id" => "required",
        ]);

        $imagePath = $request->file('image')->store('Books', 'public');    
        
        if(!$books){
            return redirect()->route('book.create')->with('error', 'Failed to create book.');
        }
        Books::create([
            'judul' => $request->judul,
            "sinopsis" => $request->sinopsis,
            "tahun_terbit" => $request->tahun_terbit,
            "genre_id" => $request->genre_id,
            "author_id" => $request->author_id,
            "image" => $imagePath,
        ]);

        return redirect()->route('book.index')->with('success', 'Book created successfully!');
        }

        public function detail($id){
            $detail = Books::find($id);
            return view('books.detail', compact('detail'));
        }

        public function destroy($id){
            $delete = Books::find($id);
            if($delete->image && Storage::disk('public')->exists($delete->image)){
                Storage::disk('public')->delete($delete->image);
            }

            $delete->delete();

            return redirect()->route('book.index')->with('success', 'Book deleted successfully!');
        }

        public function edit($id){
            $book = Books::find($id);
            $genres = Genres::all();
            $authors = Authors::all();
            return view('books.edit', compact('book', 'genres', 'authors'));
        }

        public function update(Request $request, $id){
            $book = Books::find($id);
            $validatedData = $request->validate([
                'judul' => 'required',
                'sinopsis' => 'required',
                'tahun_terbit' => 'required',
                'genre_id' => 'required',
                'author_id' => 'required',
            ]);

            if($book->image && Storage::disk('public')->exists($book->image)){
                Storage::disk('public')->delete($book->image);
            }
            if($request->hasFile('image')){
                $imagePath = $request->file('image')->store('Books', 'public');
                $validatedData['image'] = $imagePath;
            }
            $book->update($validatedData);
            return redirect()->route('book.index')->with("success", "Book updated successfully!");
        }
}

