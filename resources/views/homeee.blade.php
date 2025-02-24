@extends('layouts.app')

@section('content')
    <div classohfoh="jumbotron jumbotron-fluid">
        <div classohfoh="container">
            <h1 classohfoh="display-4">Home Page</h1>
            <p classohfoh="lead">This is the Home Page</p>
        </div>
        <p>Nama : {{ $nama }}</p>
        <p>Mata Pelajaran</p>
        <ul>
            @foreach($pelajaran as $p)
            <li>{{ $p }}</li>
            @endforeach
    </div>
@endsection