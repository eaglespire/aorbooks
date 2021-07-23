<?php

namespace App\Http\Controllers;

use App\Notifications\NewsLetter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NewsLetterController extends Controller
{
    public function send(Request $request)
    {
        //data to send
        $firstName = 'John Klauss';
        $users = User::get();

        foreach ($users as $user){
            Notification::route('mail', $user->email)
                ->notify(new NewsLetter($firstName));
        }
        return redirect('/');
        //NewsLetter::dispatch();
    }
    public function index()
    {

    }
}
