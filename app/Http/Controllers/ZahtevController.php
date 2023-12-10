<?php

namespace App\Http\Controllers;

use App\Models\Zahtevi;
use Illuminate\Http\Request;

class ZahtevController extends Controller
{
    public function destroy(Request $request)
    {
        $zahtev = Zahtevi::find($request->id);
        $zahtev->delete();

        return back();
    }
}
