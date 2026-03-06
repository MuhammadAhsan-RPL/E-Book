<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\GenresController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

//public acsess
Route::get('/', [AuthController::class, 'index'])->name('home');
Route::get('/author/show/{id}', [AuthorsController::class, 'show'])->name('penulis.show');
Route::get('/books', [BooksController::class, 'index'])->name('book.index');
Route::get('/books/detail/{id}', [BooksController::class, 'detail'])->name('book.detail');


Route::middleware('guest')->group(function(){
//Route Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'actionLogin'])->name('action.login');
Route::post('/register', [AuthController::class, 'actionRegister'])->name('action.register');
//END ROUTE AUTH
});

Route::middleware('auth')->group(function(){
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
 // Route Genre
 Route::get('/genre',[GenresController::class, 'index'])->name('genre.index');
 Route::get('/genre/create',[GenresController::class, 'create'])->name('genre.create');
 Route::post('/genre/create',[GenresController::class, 'store'])->name('genre.store');
 Route::get('/genre/edit/{id}',[GenresController::class, 'edit'])->name('genre.edit');
 Route::put('/genre/update/{id}',[GenresController::class, 'update'])->name('genre.update');
 Route::delete('/genre/delete/{id}',[GenresController::class, 'destroy'])->name('genre.destroy');

 // END ROUTE GENRE

 // Route Author
Route::get('/author',[AuthorsController::class, 'index'])->name('penulis.index');
Route::get('/author/create', [AuthorsController::class, 'create'])->name('penulis.create');
Route::post('/author/create', [AuthorsController::class, 'store'])->name('penulis.store');
Route::get('/author/show/{id}', [AuthorsController::class, 'show'])->name('penulis.show');
Route::delete('/author/delete/{id}', [AuthorsController::class, 'destroy'])->name('penulis.destroy');
route::get('/author/edit/{id}', [AuthorsController::class, 'edit'])->name('penulis.edit');
route::put('/author/update/{id}', [AuthorsController::class, 'update'])->name('penulis.update');
 //END ROUTE AUTHOR 

 //Books
Route::get('/books', [BooksController::class, 'index'])->name('book.index');
Route::get('/books/create', [BooksController::class, 'create'])->name('book.create');
Route::get('/author/show/{id}', [AuthorsController::class, 'show'])->name('penulis.show');
Route::post('/books/create', [BooksController::class, 'store'])->name('book.store');
Route::delete('/books/delete/{id}', [BooksController::class, 'destroy'])->name('book.delete');
Route::get('/book/edit/{id}', [BooksController::class, 'edit'])->name('book.edit');
Route::put('/book/update/{id}', [BooksController::class, 'update'])->name('book.update');
//END BOOKS
});
