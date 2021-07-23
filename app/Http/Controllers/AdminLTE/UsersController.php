<?php

namespace App\Http\Controllers\AdminLTE;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::where('id', '!=',auth()->id())->paginate();
        return view('users.index', [
            'users'=>$users,
            'pageTitle'=>'Users'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('users.create', ['pageTitle'=>'Add new user']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users|max:255',
            'password'=>'required|string|min:8|confirmed'
        ]);

        /*
         * Create slug
         */
        $f_name = $request->input('first_name');
        $l_name = $request->input('last_name');
        $replace = $f_name.$l_name;

        $rep = strtolower(str_replace(' ', '-', $replace));
        $slug = time().$rep;

        $user = User::create([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'slug'=>$slug,
            'is_admin'=>$request->input('is_admin')
        ]);

        if ($user){
            return redirect()->route('users.index')->with('success','new user added');
        }
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
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', ['pageTitle'=>'edit user', 'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
//            'password'=>'required|string|min:8|confirmed'
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
//        $user->password = Hash::make($request->input('first_name'));

        if ($user->save()){
            return redirect()->route('users.index')->with('success','updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        //dd($id);
       // $user = User::find($id);
       // dd($user);
        //get all the comments by this user and delete
       // Comment::where('user_id',auth()->id())->delete();
        //delete the profile of this user
       // Profile::where('user_id', auth()->id())->delete();

        //get the user to delete
        if ($user->delete()){
            return back()->with('success','deleted n');
        }
        return back()->with('error','failed to delete resource');
    }

}
