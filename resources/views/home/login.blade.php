@extends('layout.app')
@section('content')
    @foreach ($viewData['user'] as $user )
        <p> {{$user}} </p>
    
    @endforeach
@endsection()