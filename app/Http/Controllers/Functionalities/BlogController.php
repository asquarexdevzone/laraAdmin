<?php

namespace App\Http\Controllers\functionalities;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addBlogView(){
        return view("admin.blog-master");
    }

    public function addBlog(Request $request){
        // Debugging: log the request input
        \Log::info('Request input:', $request->all());
    
        $blog = new Blog;
        $blog->title = $request->BlogTitle;
        $blog->slug = Str::slug($request->BlogTitle);
        
        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $filename = time() . '-' . Str::slug($request->BlogTitle) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/blog-images'), $filename);
            $blog->image = $filename;
        }
    
        $blog->description = $request->input('blog_description');
    
        $blog->save();
    
        return redirect()->route('add.Blogview')->with('success', 'Blog added successfully.');
    }
    
}
