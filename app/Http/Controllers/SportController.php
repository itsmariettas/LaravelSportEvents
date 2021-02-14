<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SportController extends Controller
{
    public function index()
    {
        $sports = DB::select(DB::raw("SELECT type FROM sports"));        

        return view('sport.index', [
            'title' => 'Our Sports',
            'sports' => $sports
        ]);
    }
}