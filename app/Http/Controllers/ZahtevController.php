<?php

namespace App\Http\Controllers;

use App\Models\Zahtevi;
use Illuminate\Http\Request;

class ZahtevController extends Controller
{
    public function destroy(Zahtevi $zahtev)
    {
        $zahtev->delete();
    }
}
