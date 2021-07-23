<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Rules\ChangePassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PageController extends Controller
{
    public function customLogin()
    {
        return view('pages.custom-login');
    }
    public function books(Request $request)
    {
        //Get the remote user's ip address
        $user_ip = $request->ip();
        //dd($user_ip);
        //dd(session('accessible'));
        return view('pages.my-books', [
            'books'=>Book::get()
        ]);
    }
    public function changePassword()
    {
        return view('pages.change-password');
    }
    public function storeNewPassword(Request $request)
    {
        /*
         * Validate request
         */
        $this->validate($request, [
            'current_password'=>['required', new ChangePassword],
            'new_password'=>'required|min:8',
            'confirm_password'=>'required|same:new_password'
        ]);
       //dd($request->all());
        User::find(auth()->user()->id)->update(['password'=>Hash::make($request->new_password)]);
        return redirect()->route('profile.edit', auth()->user()->slug)->with('success','Password changed successfully');
    }
    /*public function thank()
    {
        return view('pages.thanks');
    }*/
    public function thanks(Request $request)
    {
        $session = $request->session();
        if ($session->has('first_time')){
            if (auth()->user()->is_admin == 1){
                return redirect()->route('admin');
            }else{
                return redirect()->route('home');
            }
        }
        else{
            $session->put('first_time',true);
            return view('pages.thanks');
        }
        /*
         * IF THIS IS THE FIRST TIME VISITING THIS PAGE,
         * SET A SESSION VARIABLE AND UPDATE ITS VALUE TO
         * FALSE AFTER VISITING
         */
    }
    public function author(Author $author)
    {
        //dd($author);
        return view('pages.author',compact('author'));
    }
    public function terms()
    {
        return view('pages.terms');
    }
    public function privacy()
    {
        return view('pages.privacy-policy');
    }
}
