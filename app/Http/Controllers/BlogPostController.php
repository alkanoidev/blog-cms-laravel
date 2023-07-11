<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use AlAminFirdows\LaravelEditorJs\LaravelEditorJs;

class BlogPostController extends Controller
{
    public function index($id)
    {
        $post = BlogPost::find($id);
        return $post;
    }

    public function show($post)
    {
        $blogpost = BlogPost::where('title', $post)->firstOrFail();

        $parser = new LaravelEditorJs();
        $html = $parser->render($blogpost->content);

        return view("pages.post")->with(["body" => $html, "post" => $blogpost]);
    }

    public function create()
    {
        return view("pages.create-new-post");
    }
    public function store(Request $request)
    {
        $blog = new BlogPost;

        $validator = Validator::make($request->all(), $rules = [
            'title' => "required|max:255",
            'content' => "required",
            'content_html' => 'required'
        ], $messages = [
                'title.required' => 'Please specify the title by entering and heading block.',
                'content.required' => 'Please enter the blog post content.',
            ]);

        if ($validator->fails()) {
            return redirect('create-new-post')
                ->withErrors($validator)
                ->withInput();
        }

        $readTime = $this->estimateReadingTime($request->content_html);

        $blog->title = $request->title;
        $blog->content = $request->content;

        $parser = new LaravelEditorJs();
        $html = $parser->render($request->content);

        $blog->content_html = $html;
        $blog->reading_time = $readTime;
        $blog->user_id = Auth::id();

        $blog->save();

        return redirect('/dashboard');
    }

    /* 
     * wpm - words per minute
     */
    function estimateReadingTime($text, $wpm = 200)
    {
        $totalWords = str_word_count(strip_tags($text));
        $minutes = floor($totalWords / $wpm);

        return $minutes;
    }

    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        // $imageName = time().'.'.$request->image->extension();
        // $imageName = $request->fileName;
        // Public Folder
        // $request->image->move(public_path('images'), $imageName);

        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalName();
            $filename = $file_extension;
            $request->file('image')->move(public_path('images'), $filename);
            $input['image'] = $filename;

            // return response()->json([
            //     "success" => 1,
            //     "file" => ['url' => "http://locahost:8000/images/".$filename ]
            // ]);
            return response()->json([
                "success" => 1,
                "file" => ['url' => url("/images/$filename")]
            ]);
        }

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store Image in DB 


        // return back()->with('message', 'Image uploaded Successfully!')
        //     ->with('image', $imageName);
        // {
        //     "success" : 1,
        //     "file": {
        //         "url" : "https://www.tesla.com/tesla_theme/assets/img/_vehicle_redesign/roadster_and_semi/roadster/hero.jpg",
        //         // ... and any additional fields you want to store, such as width, height, color, extension, etc
        //     }
        // }
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
            $readTime = $this->estimateReadingTime($request->content_html);

            $post->title = $request->title;
            $post->content = $request->content;

            $parser = new LaravelEditorJs();
            $html = $parser->render($request->content);

            $post->content_html = $html;
            $post->reading_time = $readTime;
            $post->user_id = Auth::id();

            $post->save();

            return redirect("dashboard");
        }
    }
}