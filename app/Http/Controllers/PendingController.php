<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pending;
use DB;
use Illuminate\Support\Facades\Storage;

class PendingController extends Controller
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

            if(auth()->user()->user_role == 1)  {

                $pendingUsers = Pending::whereIn('user_role', [102, 103])
                                           ->orderBy('created_at', 'desc')
                                           ->paginate(10);
                return view('pendingUsers.index')->with('pendingUsers', $pendingUsers);

            } 
            else {
                return redirect('/posts')->with('error', 'Unatuorised page. Only Admin can access this page.');
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
        $posts = Post::where('category_id', $id)
                       ->orderBy('created_at', 'desc')
                       ->paginate(10);
        return view('categories.show')->with('posts', $posts);
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
         //Approve user
        $user = Pending::find($id);

        if($user->user_role == 102) {
            $user->user_role = 2;
        } 
         if($user->user_role == 103) {
            $user->user_role = 3;
        } 
       
        $user->save();

        return redirect('/pending')->with('success', 'User Approved');
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

    public function approve(Request $request, $id)
    {

       
    }
}
