<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Site;
use DB;

class PagesController extends Controller
{
    public function index() {

        $siteSettings = Site::first();
        if($siteSettings) {
            return view('pages.index')->with('siteSettings', $siteSettings);
        } else {

             $siteSettings = New Site;
             $siteSettings->name = "Oli's Laravel CMS Blog";
             $siteSettings->save();
             return view('pages.index')->with('siteSettings', $siteSettings);

        }
    }

    public function about() {
        $title = 'About The App';
        return view('pages.about')->with('title', $title);
    }

    public function services() {
        $data = array (
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
