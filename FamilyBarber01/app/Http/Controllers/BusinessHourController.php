<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\BusinessHour;

class BusinessHourController extends Controller
{
    //
    public function index()
    {
        $BusinessHour = BusinessHour::all();
        return view('inplannen' , compact('BusinessHour'));
    }

    public function update(Request $request)
    {
        $data = $request->all('data');
    }

}
