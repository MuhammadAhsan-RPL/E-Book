<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $no = 1;
        $authors = Authors::all();
        return view('authors.index', compact('authors','no')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            "name_author"=>"required|max:225",
            "age"=>"required",
            "alamat"=>"required|max:225",
        ]);
        if(!$validasi){
            return redirect()->route('penulis.index')->with('error', 'Data tidak valid');
        }
        Authors::create($validasi);
        return redirect()->route('penulis.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penulis = Authors::find($id);
        return view('authors.show', compact('penulis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $edit = Authors::find($id);
        return view('authors.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $update = Authors::find($id);

        if(!$update){
            return redirect()->route('penulis.index')->with('error', 'Data tidak ditemukan');
        }

        $update->update([
            "name_author" => $request->name_author,
            "age" => $request->age,
            "alamat"=>$request->alamat,
        ]);
        return redirect()->route('penulis.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = Authors::find($id);

        if(!$delete){
            return redirect()->route('penulis.index')->with('error', 'Data tidak ditemukan');
        }
        $delete->delete();
        return redirect()->route('penulis.index')->with('success', 'Data berhasil dihapus');
    }
}