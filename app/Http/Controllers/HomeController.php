<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use App\Models\Blog;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Contracts\Session\Session;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    
    public function about(){
        return view('about');
    }

    public function showBlogs(){
        $blogs = Blog::orderby('updated_at', 'desc')->get();
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
        $query = 'pasta'; // Default recipe query
        $response = Http::withHeaders([
            'X-Api-Key' => env('API_NINJA_KEY'),
        ])->get(env('API_NINJA_URL'), [
            'query' => $query,
        ]);

        $recipes = $response->json();
     //   }
        return view('recipes',compact('recipes'));
    }

    public function singleRecipe($id){
        $blogs = Blog::find($id);
        //dd($blogs);
        if($blogs){
             return view('single_recipe', compact('blogs'));
        }
        return redirect()->back()->withErrors(['message' => 'Item No Longer Exists']);
    }

    public function dashboard(){
        $blogs = Blog::orderby('updated_at', 'desc')->get();
        return view('dashboard', compact('blogs'));
    }

    public function adminDashboard(){
        $blogs = Blog::orderby('updated_at', 'desc')->get();
        return view('admin-dashboard', compact('blogs'));
    }

    public function edit(Request $request, $id){
        $blogs = Blog::find($id);
        return view('edit', compact('blogs'));
    }

    public function editAdmin(Request $request, $id){
        $blogs = Blog::find($id);
        return view('edit-admin', compact('blogs'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $blog = Blog::find($id);

        $blog->author = Auth::user()->name;
        $blog->author_id = Auth::user()->id;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->category = $request->category;

        $file = $request->file('image');
        $folder_to_save = public_path('img');
        // dd($request->file('image'));
        $file_name = time() . "_" . $file->getClientOriginalName();
        $file->move($folder_to_save, $file_name);
        
        $blog->image = $file_name;

        try{
            $blog->update();
            $blogs = Blog::orderby('updated_at', 'desc')->get();
            if(Auth::user()->role === 'user'){
                session()->flash('success', 'Successfully Updated');
                return redirect()->route('dashboard', compact('blogs'));
            }else{
                session()->flash('success', 'Successfully Updated');
                return redirect()->route('admin-dashboard', compact('blogs'));
            }
        } catch(Exception $e){
            $blogs = Blog::orderby('updated_at', 'desc')->get();
            if(Auth::user()->role === 'user'){
                return redirect()->route('dashboard', compact('blogs'))->withErrors(['errors', 'Could Not Update']);
            }else{
                return redirect()->route('admin-dashboard', compact('blogs'))->withErrors(['errors', 'Could Not Update']);
            }
        }
    }

    public function updateAdmin(Request $request, $id){

        $request->validate([
            'author' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $blog = Blog::find($id);

        $blog->author = $request->input('author');
        $blog->author_id = $request->input('author_id');
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->category = $request->category;

        $file = $request->file('image');
        $folder_to_save = public_path('img');
        // dd($request->file('image'));
        $file_name = time() . "_" . $file->getClientOriginalName();
        $file->move($folder_to_save, $file_name);
        
        $blog->image = $file_name;

        try{
            $blog->update();
            $blogs = Blog::orderby('updated_at', 'desc')->get();
            if(Auth::user()->role === 'user'){
                session()->flash('success', 'Successfully Updated');
                return redirect()->route('dashboard', compact('blogs'));
            }else{
                session()->flash('success', 'Successfully Updated');
                return redirect()->route('admin-dashboard', compact('blogs'));
            }
        } catch(Exception $e){
            $blogs = Blog::orderby('updated_at', 'desc')->get();
            if(Auth::user()->role === 'user'){
                return redirect()->route('dashboard', compact('blogs'))->withErrors(['errors', 'Could Not Update']);
            }else{
                return redirect()->route('admin-dashboard', compact('blogs'))->withErrors(['errors', 'Could Not Update']);
            }
        }
    }

    public function delete($id){
        $contacts_tbls = Blog::find($id);
        $contacts_tbls->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }
}
