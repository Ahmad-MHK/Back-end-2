<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ourteam;
use App\Models\ImagesShow;

class OurteamController extends Controller
{
    public function app()
    {
        $ourteam = Ourteam::all();
        $ImagesShow = ImagesShow::all();
        return view('App', ["ourteam" => $ourteam,
        "ImagesShow" => $ImagesShow
        ]);

    }

}
