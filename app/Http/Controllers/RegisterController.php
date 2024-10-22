<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zahtevi;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

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
            'email' => 'required|email|max:255|unique:zahtevis',
            'password' => 'required|min:5|max:255',
            'terms' => 'required'
        ]);

        $response = Http::withoutVerifying()->get("https://source.boringavatars.com/beam/120?square=true");
        $avatar = $response->body();

        $user = Zahtevi::create([
            ...$attributes,
            "avatar" => $avatar,
        ]);

        return redirect("/register")->with(
            "success",
            "Zahtev za administratora je poslat! Sačekajte odobrenje."
        );
    }

    public function approve(Request $request)
    {
        $userZahtev = Zahtevi::find($request->id)->firstOrFail()->makeVisible(["password"]);

        User::create($userZahtev->toArray());

        $userZahtev->delete();

        return redirect()->back();
    }
}
