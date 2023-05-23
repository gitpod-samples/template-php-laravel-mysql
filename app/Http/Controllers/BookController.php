<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
	public function index(Request $request)
	{
		return inertia('Books/Index');
	}

	public function show(Book $book)
	{
		return view('pages.books.show', compact('book'));
	}

	public function myBooks(Request $request)
	{
		$books = Auth::user()->books()->paginate(10);

		return view('pages.books.user-books', compact('books'));
	}
}
