<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use DB;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
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

                $tags = Tag::where('user_id', auth()->user()->id)
                                           ->orderBy('created_at', 'desc')
                                           ->paginate(10);
                return view('tags.index')->with('tags', $tags);

            } 
            else {
                return redirect('/posts')->with('error', 'Unatuorised page. Only Admin and Authors can access the page.');
            }           

        } else {
            return redirect('/posts')->with('error', 'Unatuorised page!');
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
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
        $tag = New Tag;
        $tag->name = $request->input('name');
        $tag->user_id = auth()->user()->id;
        $tag->save();

        return redirect('/tag')->with('success', 'Tag Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $posts = Post::whereHas('tags', function($q) use($tagIds) {
        //     $q->whereIn('id', $tagIds);
        // })->get();

        // $posts = Post::with(['tags' => function($query) use ($listOfTags) {
        //     $query->whereIn('id', $listOfTags);
        // }])->get();

        // $posts = Post::whereHas('tags', function($q)
        // {
        //     $q->where('id', $id);
        // })->get();

        // $posts = Post::whereHas('tags', function($q) {
        //     $q->where('id', '=', $id);
        // })->orderBy('name', 'ASC')->get();

        $tag = Tag::with(['posts'])->find($id);
        $relations = $tag->getRelations();
        $posts = $relations['posts']; // Collection of Post models

        // $posts = Post::where('category_id', $id)
        //                ->orderBy('created_at', 'desc')
        //                ->paginate(10);

        return view('tags.show')->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag= Tag::find($id);

        //Check for correct user
        if(auth()->user()->id !== $tag->user_id)
        {
            return redirect('/tag')->with('error', 'Unatuorised page');
        }
        return view('tags.edit')->with('tag', $tag);
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
        $tag = Tag::find($id);;
        $tag->name = $request->input('name');
        $tag->user_id = auth()->user()->id;
        $tag->save();

        return redirect('/tag')->with('success', 'Tag Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

         //Check for correct user
         if(auth()->user()->id !== $tag->user_id)
         {
             return redirect('/posts')->with('error', 'Unatuorised page');
         }
         
        $tag->delete();
        return redirect('/tag')->with('success', 'Tag Removed!');
    }
}
