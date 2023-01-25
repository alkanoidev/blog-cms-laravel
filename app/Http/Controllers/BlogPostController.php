<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogPostController extends Controller
{
    public function index($id)
    {
        $post = BlogPost::find($id);
        return $post;
    }
    public function show()
    {
        return view("pages.create-new-post");
    }
    public function store(Request $request)
    {
        $blog = new BlogPost;

        $validator = Validator::make($request->all(), $rules = [
            'title' => "required|max:255",
            'content' => "required",
        ], $messages = [
            'title.required' => 'Please specify the title by entering and heading block.',
            'content.required' => 'Please enter the blog post content.',
        ]);

        if ($validator->fails()) {
            return redirect('create-new-post')
                ->withErrors($validator)
                ->withInput();
        }

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = Auth::id();

        $blog->save();

        return redirect('/dashboard');
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        // $imageName = time().'.'.$request->image->extension();
        $imageName = $request->fileName;
        // Public Folder
        // $request->image->move(public_path('images'), $imageName);

        $input = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_extension = $file->getClientOriginalName();
                $filename = $file_extension;
                $request->file('image')->move(public_path('images'), $filename);
                $input['image'] = $filename;
            }

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store Image in DB 


        // return back()->with('message', 'Image uploaded Successfully!')
        //     ->with('image', $imageName);
        return response()->json([
            "success" => 1,
            "file" => "http://locahost:8000/images/".$imageName,
        ]);
    }

    public function destroy($postId)
    {
        BlogPost::destroy($postId);

        return redirect("/dashboard")->with(['posts' => BlogPost::all()]);
    }

    public function update(Request $request, $id)
    {
        $post = BlogPost::find($id);
        if ($request->isMethod("GET")) {
            return view("pages.edit-post");
        }
        if ($request->isMethod("POST")) {
            $post->title = $request->title;
            $post->content = $request->content;
            $post->user_id = Auth::id();
            $post->save();

            return redirect("dashboard");
        }
    }
}
