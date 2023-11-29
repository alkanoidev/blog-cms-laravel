<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index($id)
    {
        $post = Post::find($id);
        return $post;
    }

    public function show($slug)
    {
        $blogpost = Post::where('slug', $slug)->firstOrFail();

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
        $post = new Post;

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
        $post->description = $request->description;
        $post->slug = Str::slug($request->title);
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
            $post = Post::find($id);
            $readTime = $this->estimateReadingTime($request->body_html);

            $post->title = $request->title;
            $post->description = $request->description;
            $post->slug = Str::slug($request->title);
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
        Post::destroy($postId);

        return redirect("/dashboard")->with(['posts' => Post::all()]);
    }
}
