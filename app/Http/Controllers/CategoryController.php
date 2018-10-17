<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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

            if(auth()->user()->user_role == 2 || auth()->user()->user_role == 1  )  {

                $categories = Category::where('user_id', auth()->user()->id)
                                           ->orderBy('created_at', 'desc')
                                           ->paginate(10);
                return view('categories.index')->with('categories', $categories);

            } 
            else {
                return redirect('/posts')->with('error', 'Unatuorised page. Only Admin and Authors can access the page.');
            }           

        } else {
            return redirect('/posts')->with('error', 'Unatuorised page. Only Admin and Authors can access the page.');
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        //Register Category
        $category = New Category;
        $category->name = $request->input('name');
        $category->user_id = auth()->user()->id;
        $category->save();

        return redirect('/category')->with('success', 'Category Registered');
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
        $category= Category::find($id);

        //Check for correct user
        if(auth()->user()->id !== $category->user_id)
        {
            return redirect('/categories')->with('error', 'Unatuorised page');
        }
        return view('categories.edit')->with('category', $category);
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
            'name' => 'required'
        ]);

        //Register Category
        $category = Category::find($id);;
        $category->name = $request->input('name');
        $category->user_id = auth()->user()->id;
        $category->save();

        return redirect('/category')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

         //Check for correct user
         if(auth()->user()->id !== $category->user_id)
         {
             return redirect('/posts')->with('error', 'Unatuorised page');
         }
         
        $category->delete();
        return redirect('/category')->with('success', 'Category Removed!');
    }
}
