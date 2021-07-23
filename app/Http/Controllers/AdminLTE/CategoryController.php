<?php

namespace App\Http\Controllers\AdminLTE;

use App\Book;
use App\Category;
use App\Comment;
use App\Custom\Sanitizer;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.index',
            [
                'pageTitle'=>'categories',
                'categories'=>$categories
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('category.create',['pageTitle'=>'new category',]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|unique:categories',
            'description'=>'string',
        ]);

        /*
         * Create slug here
         * using the sanitize_input method
         */
        $sanitizer = new Sanitizer();
        $slug= $sanitizer->replace_with_hyphen($request->name);

        Category::create([
            'name'=>$sanitizer->catenate_strings($request->input('name')), //sanitize name input
            'description'=>$request->input('description'),
            'slug'=>$slug
            ]);
        return back()->with('success', 'created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Factory|View
     */
    public function edit(Category $category)
    {
        return view('category.edit',['pageTitle'=>'edit category','category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Category $category)
    {
        /*
         * Instantiate sanitizer class to sanitize inputs
         */
        $sanitizer = new Sanitizer();

        $this->validate($request, [
            'name'=>'required|string|min:8|max:255',
            'description'=>'string',
        ]);

        $category->name = $sanitizer->catenate_strings($request->input('name')); //sanitize name input
        $category->description = $request->description;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        /*
         * Delete the category
         */
        if ($category->delete()){
            return back()->with('success','deleted');
        }
        return back()->with('error','failed to delete resource');
    }
}
