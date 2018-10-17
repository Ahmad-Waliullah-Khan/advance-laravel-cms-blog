<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
        //$posts = Post::all();
        //return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title', 'desc')->take(1)->get();
        //$posts = Post::orderBy('title', 'desc')->get();

        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(auth()->user()) {

            if(auth()->user()->user_role == 2 || auth()->user()->user_role == 1  )  {

                $categories = Category::all()->where('user_id', auth()->user()->id);
                $tags = Tag::all()->where('user_id', auth()->user()->id);
                return view('posts.create')->with('categories', $categories)->with('tags', $tags);
            } else {
                return redirect('/posts')->with('error', 'Unatuorised page.');
            }
        } else {
             return redirect('/posts')->with('error', 'Unatuorised page.');
        }
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
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|integer',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }
        //Create Post
        $post = New Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->input('category_id');
        $post->cover_image = $fileNameToStore;
        $post->save();

        $post->tags()->sync($request->tags, false);

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()) {

            if(auth()->user()->user_role == 2 || auth()->user()->user_role == 1  )  {

                $post= Post::find($id);
                $otherCategories = Category::all()->where('user_id', auth()->user()->id);

                $tags2 = Tag::all()->where('user_id', auth()->user()->id);

                $tags = array();

                foreach($tags2 as $tag) {

                    $tags[$tag->id] = $tag->name;
                }

                //Check for correct user
                if(auth()->user()->id !== $post->user_id)
                {
                    return redirect('/posts')->with('error', 'Unatuorised page');
                }
                return view('posts.edit')->with('post', $post)->with('otherCategories', $otherCategories)->with('tags', $tags);

            } else {
                return redirect('/posts')->with('error', 'Unatuorised page.');
            }
        } else {
             return redirect('/posts')->with('error', 'Unatuorised page.');
        }
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
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|integer'
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        //Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category_id');
        if($request->hasFile('cover_image'))
        {
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        if($request->tags) {
             $post->tags()->sync($request->tags);
         } else {
            $post->tags()->sync(array());
         }
       

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

         //Check for correct user
         if(auth()->user()->id !== $post->user_id)
         {
             return redirect('/posts')->with('error', 'Unatuorised page');
         }
         
         if($post->cover_image != 'noimage.jpg') {
             //Delete the image
             Storage::delete('public/cover_images/'.$post->cover_image);

         }

        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed!');
    }
}
