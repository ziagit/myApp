<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Client;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Client::get()->last();
        return view('home', compact('posts'));
    }
    public function show($id){
        $post = Post::get()->where('id',$id);
        return view('post', compact('post'));
    }

    public function getAboutPage()
    {
        return view('about-us');
    }

    public function getContactPage()
    {
        return view('contact-us');
    }

}
