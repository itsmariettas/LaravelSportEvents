<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizerController extends Controller
{
    public function index()
    {
        $organizers = DB::select(DB::raw("SELECT name FROM organizers")); 

        return view('organizer.index', [
            'title' => 'Our Organizers',
            'organizers' => $organizers
        ]);
    }
}