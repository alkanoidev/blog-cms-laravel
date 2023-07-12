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

    public function show($slug)
    {
        $blogpost = BlogPost::where('slug', $slug)->firstOrFail();

        $parser = new LaravelEditorJs();
        $html = $parser->render($blogpost->body_json);

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
            'body_json' => "required",
            'body_html' => 'required'
        ], $messages = [
                'title.required' => 'Please specify the title by entering and heading block.',
                'content.required' => 'Please enter the blog post content.',
            ]);

        if ($validator->fails()) {
            return redirect('create-new-post')
                ->withErrors($validator)
                ->withInput();
        }

        $readTime = $this->estimateReadingTime($request->body_html);

        $blog->title = $request->title;
        $blog->slug = self::createSlug($request->title);
        $blog->body_json = $request->body_json;

        $parser = new LaravelEditorJs();
        $html = $parser->render($request->body_json);

        $blog->body_html = $html;
        $blog->reading_time = $readTime;
        $blog->user_id = Auth::id();

        $blog->save();

        return redirect()->route("dashboard");
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod("GET")) {
            return view("pages.edit-post");
        }
        if ($request->isMethod("POST")) {
            $post = BlogPost::find($id);
            $readTime = $this->estimateReadingTime($request->body_html);

            $post->title = $request->title;
            $post->slug = self::createSlug($request->title);
            $post->body_json = $request->body_json;

            $parser = new LaravelEditorJs();
            $html = $parser->render($request->body_json);

            $post->body_html = $html;
            $post->reading_time = $readTime;
            $post->user_id = Auth::id();

            $post->save();

            return redirect()->route("dashboard");
        }
    }

    /* 
     * wpm - words per minute
     */
    function estimateReadingTime(string $text, $wpm = 200)
    {
        $totalWords = str_word_count(strip_tags($text));
        $minutes = floor($totalWords / $wpm);

        return $minutes;
    }

    /*
     * Ecapes spaces from title to generate valid slug for the route 
     */
    function createSlug(string $text): string
    {
        $data_slug = trim($text, " ");
        $search = array('/', '\\', ':', ';', '!', '@', '#', '$', '%', '^', '*', '(', ')', '_', '+', '=', '|', '{', '}', '[', ']', '"', "'", '<', '>', ',', '?', '~', '`', '&', ' ', '.');
        $data_slug = str_replace($search, "", $data_slug);
        return $data_slug;
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
}