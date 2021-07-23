<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        //Get the search term
        $search = $request->input('search');
        //search in the title and author column
        $results = Book::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(10);

        // return the search view with the result
        return view('search.search-results', compact('results'));
    }
}
