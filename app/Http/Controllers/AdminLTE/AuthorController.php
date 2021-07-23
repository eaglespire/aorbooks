<?php

namespace App\Http\Controllers\AdminLTE;

use App\Custom\Sanitizer;
use App\Author;
use App\Book;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class AuthorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $authors = Author::paginate(20);
        return view('author.index',
            [
                'pageTitle'=>'Authors',
                'authors'=>$authors
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        /*$ju= 'Andy';
        dd($countries);*/
        $countries = config('countries.counties');
        return view('author.create',['pageTitle'=>'New Author', 'countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        /*
         * Instantiate sanitizer class to sanitize inputs
         */
        $sanitizer = new Sanitizer();
        //dd($request->all());
        $this->validate($request, [
            'firstName'=>'required|string',
            'lastName'=>'required|string',
            'gender'=>'required|string',
            'country'=>'required|string',
            'mail'=>'required|string',
            'description'=>'required|string',
            'image'=>'required|'
        ]);

            $author = new Author();
        /*
         * Handle image
         */
        if ($request->file('image')){
            /*$imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('author-images',$imageName,'public');*/
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();

            //file upload location
            $location = 'storage/authors';
            //upload file
            $file->move($location,$fileName);
            $author->image = $fileName;
            //dd($imageName);
        }

        $author->firstName = $sanitizer->sanitize_input($request->firstName);
        $author->lastName = $sanitizer->sanitize_input($request->lastName);
        $author->gender = $request->gender;
        $author->country = $request->country;
        $author->mail = $sanitizer->sanitize_input($request->mail);
        $author->description = $request->description;


       // $author->slug = $sanitizer->generate_slug($request->firstName,$request->lastName,$request->mail);
        $slug = strtolower($author->id.'-'.$request->firstName.'-'.$request->lastName);
        $author->slug = $slug;
        $author->save();
        return back()->with('success', 'added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return Factory|View
     */
    public function show(Author $author)
    {
        return view('author.show', ['author'=>$author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return Factory|View
     */
    public function edit(Author $author)
    {
        $countries = config('countries.counties');
        return view('author.edit',['author'=>$author,'countries'=>$countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Author $author
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Author $author)
    {
        /*
         * Instantiate sanitizer class to sanitize inputs
         */
        $sanitizer = new Sanitizer();

        $this->validate($request, [
            'firstName'=>'required|string|min:3|max:255',
            'lastName'=>'required|string|min:3|max:255',
            'gender'=>'required|string',
            'country'=>'required|string',
            'mail'=>'required|string|min:3|max:255',
            'description'=>'required|string|min:3',
            'image'=>'image|max:2048'
        ]);

        /*
         * Handle image
         */
        if ($request->file('image')){
            /*$imagePath = $request->file('image');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('author-images',$imageName,'public');*/
            $file = $request->file('image');
            $fileName = time().'_'.$file->getClientOriginalName();

            //file upload location
            $location = 'storage/authors';
            //upload file
            $file->move($location,$fileName);
            //dd($imageName);
            $author->image = $fileName;
        }

        $author->firstName = $sanitizer->sanitize_input($request->firstName);
        $author->lastName = $sanitizer->sanitize_input($request->lastName);
        $author->gender = $request->gender;
        $author->country = $request->country;
        $author->mail = $sanitizer->sanitize_input($request->mail);
        $author->description = $request->description;

        $author->save();
        return redirect()->route('authors.index')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Author $author)
    {
        //dd($author);
        //get all the books by this author and delete
      //  Book::where('author_id', $author->id)->delete();

        /*
         * Cycle through all the books by this author
         */
       // foreach ($author->books as $book){
            //delete all comments related to that book
         //   Comment::where('book_id', $book->id)->delete();
      //  }

       if ($author->delete()){
          return back()->with('success','deleted');
         }
        return back()->with('error','failed to delete resource');
    }
    //Takes in the item to trim and returns a sanitized item
}
