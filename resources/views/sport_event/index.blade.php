@extends('layouts.app')

@section('content')
<header>
    <h2>{{$title}}</h2>
</header>
<div class="input-group-append row mr-4 pt-4 w-100">
    <form class="w-100" action="/" method="GET" style="margin-left: 10px">
        <div class="input-group">
            <input type="search" name="search" placeholder="Search for..." class="form-control">
            <select class="custom-select" name="search_by" id="searchBy">
                <option value="start_date" selected>Search By Start Date</option>
                <option value="sport_type">Search By Sport Type</option>
                <option value="organizer_name">Search By Organizer Name</option>
            </select>
            <button type="submit" class="btn btn-primary ml-2">Search</button>
        </div>
    </form>
</div>

@if (count($sport_events) === 0)
<p class="display-4 text-center">Sorry, no results were found...</p>
@else
<div class="row">
    @foreach ($sport_events as $sport_event)
    <div class="col-4">
        <div class="card bg-dark text-white my-mask" style="min-height: 200px;">
            <img src="{{$sport_event->image}}" class="card-img" alt="{{$sport_event->image}}">
            <div class="card-img-overlay" style="z-index: 5;">
                <h3 class="card-title" style="color: white;">Name: {{$sport_event->name}}</h3>
                <p class="card-text m-0">Start Date: {{$sport_event->start_date}}</p>
                <p class="card-text m-0">Duration Days: {{$sport_event->duration_in_days}}</p>
                <p class="card-text m-0">Organizer Name: {{$organizers->where('id', $sport_event->organizer_id)->first()->name}}</p>
                <p class="card-text m-0">Sport Type: {{$sports->where('id', $sport_event->sport_id)->first()->type}}</p>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endif

@endsection