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

    public function editBlog($id)
    {
        $blog = Blog::find($id);
        return response()->json($blog); // Return blog data as JSON
    }

    public function updateBlog(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'blogName' => 'required',
            'update_blog_description' => 'required',
            'new_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Optional, if the user uploads a new image
        ]);

        // Find the blog by ID
        $blog = Blog::findOrFail($id);

        // Update blog title and description
        $blog->title = $request->input('blogName');
        $blog->description = $request->input('update_blog_description');

        // Handle image upload if a new image is provided
        if ($request->hasFile('new_image')) {
            // Delete old image if exists
            if ($blog->image && file_exists(public_path('images/blog-images' . $blog->image))) {
                unlink(public_path('images/blog-images' . $blog->image));
            }

            // Store the new image
            $image = $request->file('new_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blog-images'), $imageName);

            // Update image name in the database
            $blog->image = $imageName;
        }

        // Save the updated blog data
        $blog->save();

        // Redirect or return response
        return redirect()->route('add.Blogview')->with('success', 'Blog Updated successfully.');
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id); // Use Eloquent instead of raw query

        if (!$blog) {
            return redirect()->route('add.Blogview')->with('error', 'Blog not found.');
        }

        // Delete the image file if it exists
        if ($blog->image && file_exists(public_path('images/blog-images/' . $blog->image))) {
            unlink(public_path('images/blog-images/' . $blog->image));
        }

        // Delete the blog record
        $blog->delete();

        return redirect()->route('add.Blogview')->with('success', 'Blog deleted successfully.');
    }


}