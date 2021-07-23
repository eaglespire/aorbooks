<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        /*
         * Check to see if the currently authenticated user
         * has completed profile setup
         */
        $profile = Profile::where('user_id', auth()->user()->id)->first();
        if (!$profile){
            if (auth()->user()->is_admin == 1){
                return view('profile.create',[
                    'pageTitle'=>'Set up your profile',
                ]);
            }else{
                return view('pages.profile.create',[
                    'pageTitle'=>'Set up your profile',
                ]);
            }

        }
        return back()->with('info','You have already set up your profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'street'=>'required|string',
            'city'=>'required|string',
            'state'=>'required|string',
            'country'=>'required|string',
            'zip'=>'required|string',
            'mobile_no'=>'required|string',
        ]);

        $profile = new Profile;
        /*
         * Create slug
         */
        $user_id = auth()->user()->id;
        $slug = time().$user_id;

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
            $location = 'storage/users';
            //upload file
            $file->move($location,$fileName);
            $profile->image = $fileName;
            //auth()->user()->profile->image = $fileName;
            //dd($imageName);
        }

        $profile->slug = $slug;
        $profile->mobile_no = $request->mobile_no;
        $profile->zip = $request->zip;
        $profile->street = $request->street;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->country = $request->country;
        $profile->user_id = auth()->user()->id;

        if ($profile->save()){
            return redirect()->route('profile.show', auth()->user()->slug)->with('success','success');
        }
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Factory|View
     */
    public function show(User $user)
    {
        if (auth()->user()->is_admin == 1){
            return view('profile.show', [
                'user'=>$user->first(),
                'pageTitle'=>'Profile'
            ]);
        }
        return view('welcome'); //change this later
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Factory|View
     */
    public function edit(User $user)
    {
        if (auth()->user()->is_admin == 1){
            return view('profile.edit', [
                'user'=>$user->first(),
                'pageTitle'=>'Edit Profile'
            ]);
        }
        return view('pages.profile.edit', [
            'pageTitle'=>'Edit Profile'
        ]); //change this later
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Profile $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $profile = Profile::where('user_id', auth()->user()->id)->first();
        //dd($profile->city);
        //dd($request->all());
        $request->validate([
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'street'=>'required|string',
            'city'=>'required|string',
            'state'=>'required|string',
            'country'=>'required|string',
            'zip'=>'required|string',
            'mobile_no'=>'required|string',
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
            $location = 'storage/users';
            //upload file
            $file->move($location,$fileName);
            $profile->image = $fileName;
            //auth()->user()->profile->image = $fileName;
            //dd($imageName);
        }

        $profile->mobile_no = $request->mobile_no;
        $profile->zip = $request->zip;
        $profile->street = $request->street;
        $profile->city = $request->city;
        $profile->state = $request->state;
        $profile->country = $request->country;

        if ($profile->save()){
            if ($profile->user->is_admin == 1){
                return redirect()->route('profile.show', auth()->user()->slug)->with('success','update success');
            }
            return redirect()->route('home')->with('success','update success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
