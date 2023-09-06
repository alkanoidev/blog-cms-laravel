<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'firstname' => 'required|max:255|min:2',
            'lastname' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'terms' => 'required'
        ]);
        Log::error($attributes);
        $response = Http::get("https://source.boringavatars.com/beam/120?square=true");
        $avatar = $response->body();

        $user = User::create([
            ...$attributes,
            "avatar" => $avatar,

        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }
}
