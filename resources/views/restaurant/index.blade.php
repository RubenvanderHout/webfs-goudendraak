@extends('layout.app')
@section('content')

<div class="grid grid-cols-4 gap-4 p-4">
    @foreach($tables as $table)
    <a href="/table/{{$table->id}}" class="">
    <div class="p-4 bg-green-500 text-white rounded-lg text-center ">
        <p>Table {{$table->id}}</p>
        <p>Seats: 8</p>
        <p>Status: Free</p>
</div>
</a>
    @endforeach
</div>
@endsection