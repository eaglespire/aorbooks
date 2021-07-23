<?php

namespace App\Http\Controllers;

use App\Book;
use App\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function admin()
    {
        return view('admin.admin');
    }
    public function singleBookAccess(Book $book)
    {
        $matchThese = ['category_id'=>$book->category_id];
        $similarBooks = Book::where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->get();
        return view('pages.single-book', [
            'book'=>$book,
            'similarBooks'=>$similarBooks
        ]);
    }

}
