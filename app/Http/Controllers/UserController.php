<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function destroy($id)
    {
        User::destroy($id);

        return back();
    }
    public function promote_to_admin($id)
    {
        $user = User::find($id);
        
        if ($user->role == 1) {
            return redirect()->back();
        }

        $user->role = 1;
        $user->save();

        return redirect(route("user-management"))->with(
            "success",
            "The user was successfully promoted to administrator."
        );
    }
}
