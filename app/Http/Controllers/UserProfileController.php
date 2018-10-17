<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth', ['except' => ['index', 'show']]);
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()) {

            if(auth()->user()->user_role == 2 || auth()->user()->user_role == 1 || auth()->user()->user_role == 3  )  {

                $user = User::find(auth()->user()->id);
                return view('profile.index')->with('user', $user);

            } 
            else {
                return redirect('/posts')->with('error', 'Unatuorised page.');
            }           

        } else {
            return redirect('/posts')->with('error', 'Unatuorised page.');
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'unique:users,email,'.auth()->user()->id,
            'password' => 'required|string|min:6|confirmed',
            'date_of_birth' => 'required',
            'phone' => 'required|numeric|regex:/[0-9]{10}/',
        ]);

        $user = User::find(auth()->user()->id);
            
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->phone = $request->input('phone');

        if ( ! $request->input('password') == '')
        {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect('/posts')->with('success', 'Your account has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
