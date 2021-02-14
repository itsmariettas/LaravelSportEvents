@extends('layouts.app')

@section('content')
<header>
    <h2>{{$title}}</h2>
</header>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Type</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sports as $key => $value)
            @php $index = $key + 1; @endphp
            @php $sport = $value; @endphp

            <tr>
                <th scope="row">{{$index}}</th>
                <td>{{$sport->type}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection