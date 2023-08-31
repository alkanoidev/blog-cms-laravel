<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
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

        $author = User::find($blogpost->user_id);

        // $parser = new LaravelEditorJs();
        // $html = $parser->render($blogpost->body_json);

        return view("pages.post")->with([
            // "body" => $html,
            "post" => $blogpost,
            "author" => $author
        ]);
    }

    public function create()
    {
        return view("pages.create-new-post");
    }
    public function store(Request $request)
    {
        $post = new BlogPost;

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

        $post->title = $request->title;
        $post->slug = self::createSlug($request->title);
        $post->body_json = $request->body_json;
        $post->thumbnail_image = $request->thumbnail_image;

        $post->body_html = htmlspecialchars_decode($request->body_html);
        $post->reading_time = $readTime;
        $post->user_id = Auth::id();

        $post->save();

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
            $post->thumbnail_image = $request->thumbnail_image;

            $post->body_html = htmlspecialchars_decode($request->body_html);
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

        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalName();
            $filename = $file_extension;
            $request->file('image')->move(public_path('images'), $filename);
            $input['image'] = $filename;

            return response()->json([
                "success" => 1,
                "file" => ['url' => url("/images/$filename")]
            ]);
        }
    }

    public function destroy($postId)
    {
        BlogPost::destroy($postId);

        return redirect("/dashboard")->with(['posts' => BlogPost::all()]);
    }
}
