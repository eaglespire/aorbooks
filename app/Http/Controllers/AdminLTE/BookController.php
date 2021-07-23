<?php

namespace App\Http\Controllers\AdminLTE;

use App\Author;
use App\Book;
use App\Category;
use App\Custom\Sanitizer;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('books.index',[
            'pageTitle'=>'Books',
            'books'=>Book::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $authors = Author::get();
        $categories = Category::get();
        return view('books.create', [
            'authors'=>$authors,
            'pageTitle'=>'Books',
            'categories'=>$categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $sanitizer = new Sanitizer();
        $this->validate($request, [
            'title'=>'string|required|min:8|max:255',
            'intro'=>'string|required|min:8',
            'description'=>'string|required|min:8',
            'pub_date'=>'string|required|min:8|max:255',
            'ISBN'=>'string|required|min:8|max:255',
            'ISBN13'=>'string|required|min:8|max:255',
            'image'=>'required|image|mimes:jpg,jpeg,JPG,png,svg|max:1024',
            'file_path'=>'required|mimes:pdf,doc,xlx,csv,JPG,jpg,jpeg,png',
        ]);
        /*
         * Create slug
         */
            //find the correct category by its slug
            $category_id= $request->category_id;
            $category = Category::findOrFail($category_id);
            //dd($category);
            //find the author by its slug
            $author_id = $request->author_id;
            $author = Author::findOrFail($author_id);

            //$title = $sanitizer->replace_with_hyphen($request->title);
             $title = $request->title;
             $replace = str_replace(' ', '-', $title);
            //$slug = $sanitizer->generate_slug($category->slug,'/',null, $title);
             //$slug = $category->slug . '/' . $replace;
            $slug = $sanitizer->book_slug($category->slug,$request->title);
            //dd($slug);
            $book = new Book;
        /*
     * Handle image
     */
            if ($request->file('image')){

            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();

            //file upload location
            $location = 'storage/books/images';
            //upload file
            $file->move($location,$fileName);
            $book->image = $fileName;
            //dd($imageName);
        }
            /*
            *   Handle file
            */
        if ($request->file('file_path')){

            $file = $request->file('file_path');
            $fileName = time().'_'.$file->getClientOriginalName();

            //file upload location
            $location = 'storage/books';
            //$location = 'books';
            //upload file
            $file->move($location,$fileName);
            $book->file_path = $fileName;

        }

            $book->title = $request->title;
            $book->intro = $request->intro;
            $book->description = $request->description;
            $book->pub_date = $request->pub_date;
            $book->ISBN = $request->ISBN;
            $book->ISBN13 = $request->ISBN13;
            $book->author_id = $request->author_id;
            $book->other_authors = $request->other_authors;
            $book->slug = $slug;
            $book->num_of_pages = $request->num_of_pages;
            $book->category_id = $request->category_id;
            $book->save();
            return back()->with('success','new book added');
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return Factory|View
     */
    public function show(Book $book)
    {
        return view('books.show',[
            'pageTitle'=>'books',
            'book'=>$book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return Factory|View
     */
    public function edit(Book $book)
    {
        return view('books.edit', [
            'pageTitle'=>'books',
            'book'=>$book,
            'authors'=>Author::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Book $book
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title'=>'string|required',
            'intro'=>'string|required',
            'description'=>'string|required',
            'pub_date'=>'string|required',
            'ISBN'=>'string|required',
            'ISBN13'=>'string|required',
            'image'=>'image|mimes:jpg,jpeg,JPG,png,svg|max:1024',
            'file_path'=>'mimes:pdf,doc,xlx,csv',
        ]);
        /*
    * Handle image
    */
        if ($request->file('image')){

            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();

            //file upload location
            $location = 'storage/books/images';
            //upload file
            $file->move($location,$fileName);
            $book->image = $fileName;
            //dd($imageName);
        }

            /*
            *   Handle file
            */
        if ($request->file('file_path')){

            $file = $request->file('file_path');
            $fileName = time().'_'.$file->getClientOriginalName();

            //file upload location
            $location = 'storage/books';
            //upload file
            $file->move($location,$fileName);
            $book->file_path = $fileName;

        }
        $book->title = $request->title;
        $book->intro = $request->intro;
        $book->description = $request->description;
        $book->pub_date = $request->pub_date;
        $book->ISBN = $request->ISBN;
        $book->ISBN13 = $request->ISBN13;
        $book->author_id = $request->author_id;
        $book->other_authors = $request->other_authors;
        $book->num_of_pages = $request->num_of_pages;
        $book->save();
        return redirect()->route('books.show', $book->slug)->with('success','updated successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Book $book)
    {
        if ($book->delete()){
            return back()->with('success','deleted...');
        }
    }
}
