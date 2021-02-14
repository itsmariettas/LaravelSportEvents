@extends('layouts.app')

@section('content')
<header>
    <h2>{{$title}}</h2>
</header>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($organizers as $key => $value)
            @php $index = $key + 1; @endphp
            @php $organizer = $value; @endphp

            <tr>
                <th scope="row">{{$index}}</th>
                <td>{{$organizer->name}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection