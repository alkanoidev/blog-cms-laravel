<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withoutVerifying()->get("https://source.boringavatars.com/beam/120?square=true");
        $avatar = $response->body();

        DB::table('users')->insert([
            'username' => 'user',
            'firstname' => 'User',
            'lastname' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('useruser'),
            'avatar' => $avatar
        ]);
        DB::table('users')->insert([
            'username' => 'admin',
            'role' => 1,
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminadmin'),
            'avatar' => $avatar
        ]);
        DB::table('category')->insert([
            'title' => 'Android',
            'description' => 'Android is a mobile operating system based on a modified version of the Linux kernel and other open-source software, designed primarily for touchscreen mobile devices such as smartphones and tablets.',
            'slug' => 'android',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m354-247 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143ZM233-80l65-281L80-550l288-25 112-265 112 265 288 25-218 189 65 281-247-149L233-80Zm247-350Z"/></svg>'
        ]);
        \App\Models\Post::factory(10)->create();
    }
}
