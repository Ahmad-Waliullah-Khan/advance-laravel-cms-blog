<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
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

            if(auth()->user()->user_role == 1  )  {

                $siteSettings = Site::first();
                if($siteSettings) {
                    return view('siteSettings.index')->with('siteSettings', $siteSettings);
                } else {

                     $siteSettings = New Site;
                     $siteSettings->name = "Oli's Laravel CMS Blog";
                     $siteSettings->save();
                     return view('siteSettings.index')->with('siteSettings', $siteSettings);

                }
                
            } 
            else {
                return redirect('/posts')->with('error', 'Unatuorised page. Only Admin and Authors can access the page.');
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
            'name' => 'required'
        ]);

        //Handle File Upload
        if($request->hasFile('site_logo')){
            //Get filename with the extension
            $filenameWithExt = $request->file('site_logo')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('site_logo')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('site_logo')->storeAs('public/cover_images',$fileNameToStore);
        }
        //Create Post
        $siteSetting = Site::find($id);;
        $siteSetting->name = $request->input('name');
        if($request->hasFile('site_logo'))
        {
            $siteSetting->logo = $fileNameToStore;
        }       
        
        $siteSetting->save();

       Session::put('site_title', $siteSetting->name);
       Session::put('site_logo', $siteSetting->logo);


        return redirect('/posts')->with('success', 'Site Settings Updated');
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
