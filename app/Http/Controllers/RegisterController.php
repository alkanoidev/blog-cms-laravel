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
        $response = Http::get("https://source.boringavatars.com/beam/120?square=true");
        $avatar = $response->body();
        Log::error("HERE \n\n" . $avatar);
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'terms' => 'required'
        ]);

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
