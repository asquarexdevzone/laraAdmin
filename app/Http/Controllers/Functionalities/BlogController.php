<?php

namespace App\Http\Controllers\functionalities;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    public function addBlogView()
    {
        $blogs = Blog::all();
        return view("admin.blog-master", compact("blogs"));
    }


    public function addBlog(Request $request)
    {

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

    public function deleteBlog($id){
        $delete_blog = DB::table('blogs')->where('id', $id)->delete();
        return redirect()->route('add.Blogview')->with('success', 'Blog deleted successfully.');
    }

}
