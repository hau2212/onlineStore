@extends('layout.admin')
@section('title', 'taodoi title roi')
@section('content')
    <table class="table table-striped"> 
        @foreach ($viewData['user'] as $user)
            <tr><td>{{ $user }} </td></tr>
        @endforeach
    </table>

     <table class="table table-striped"> 
        
            <tr><td>{{ $viewData['product'] }} </td></tr>
        
    </table>
@endsection