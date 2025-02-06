<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use Illuminate\Http\Request;
use Exception;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    
    public function about(){
        return view('about');
    }

    public function showBlogs(){
        $blogs = Blog::all();
        return view('blogs', compact('blogs'));
    }

    public function postBlog(Request $request){

        $blog = new Blog();

        $blog->author = Auth::user()->name;
        $blog->author_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category = $request->category;

        $file = $request->file('image');
        $folder_to_save = public_path('img');
        // dd($request->file('image'));
        $file_name = time() . "_" . $file->getClientOriginalName();
        $file->move($folder_to_save, $file_name);
        
        $blog->image = $file_name;

        try{
            $blog->save();
            return redirect()->back()->with('success', 'Succesfully Uploaded!');
        } catch(Exception $e){
            return redirect()->back()->withErrors(['message' => 'Invalid Credentials']);
        }
        
    }

    public function recipes(){
        return view('recipes');
    }

    public function singleRecipe($id){
        $blogs = Blog::find($id);
        //dd($blogs);
        if($blogs){
            // dd($blogs->title);
             return view('single_recipe', compact('blogs'));
        }
        // return view('single_recipe', compact('blogs'));
        return redirect()->back()->withErrors(['message' => 'Item No Longer Exists']);
    }

    public function dashboard(){
        $blogs = Blog::all();
        return view('dashboard', compact('blogs'));
    }

    public function adminDashboard(){
        $blogs = Blog::orderby('updated_at', 'desc')->get();
        return view('admin-dashboard', compact('blogs'));
    }
}
