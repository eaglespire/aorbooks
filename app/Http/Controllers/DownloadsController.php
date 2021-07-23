<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadsController extends Controller
{
    public function download($file_name)
    {
        //dd($file_name);
        //$file_name = '1626487411_b1.pdf';
        $file_path = public_path('storage/books/'. $file_name);
        //$file_path = public_path('books/1626487411_b1.pdf');
        //$file_path = public_path().'/storage/books/'.$file_name;
        //return response()->download($file_path,'file.pdf');
        return response()->download($file_path);
    }
}
