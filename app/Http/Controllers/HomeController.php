<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function showBlogs(){
        $blogs = Blog::all();

        return view('blogs', compact('blogs'));
    }

    public function postBlog(Request $request){
        $author = Auth::user()->name;
        $description = $request->description;
        $image = $request->image;

    }

    public function recipes(){
        return view('recipes');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function adminDashboard(){
        return view('admin-dashboard');
    }
}
