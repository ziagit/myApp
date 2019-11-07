<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Slider;
use App\Service;
use App\Feedback;
use App\Client;
use App\Work;
use App\Team;
use App\Blog;
use App\Other;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(){
         return view('home');
     }

    public function getAboutPage()
    {
        $teams = Team::all();
        return view('about-us',compact('teams'));
    }

    public function getContactPage()
    {
        return view('contact-us');
    }


    public function getUserProfile(){
        return view('admin.user-profile');
    }

 

   
}
