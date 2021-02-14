<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Organizer;
use App\Models\Sport;

class SportEventController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $sport_events = DB::table('sport_events')->paginate(5);

        if ($request[('search_by')] == 'start_date') {
            $sport_events = DB::table('sport_events')
                ->where('start_date', 'like', '%' . $search . '%')
                ->paginate(5);
        } else if ($request[('search_by')] == 'sport_type') {
            $sport_events = DB::table('sport_events')
                ->join('sports', 'sports.id', '=', 'sport_events.sport_id')
                ->where('sports.type', 'like', '%' . $search . '%')
                ->paginate(5);
        } else if ($request[('search_by')] == 'organizer_name') {
            $sport_events = DB::table('sport_events')
                ->join('organizers', 'organizers.id', '=', 'sport_events.organizer_id')
                ->where('organizers.name', 'like', '%' . $search . '%')
                ->paginate(5);
        }

        $organizers = Organizer::all();
        $sports = Sport::all();

        return view('sport_event.index', [
            'title' => 'Our Sport Events',
            'sport_events' => $sport_events,
            'organizers' => $organizers,
            'sports' => $sports,
        ]);
    }
}