@extends('app')
@section('content')

<div id="app">
    <search-component></search-component>
</div>

{{-- <table class="w-full text-sm text-left rtl:text-right text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
        <tr>
            <th scope="col" class="px-6 py-3">Nummer</th>
            <th scope="col" class="px-6 py-3">Naam</th>
            <th scope="col" class="px-6 py-3">Prijs</th>
            <th scope="col" class="px-6 py-3"><a href="/dishes/create"><button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 focus:outline-none" type="button">Create</button></a></th></tr>
    </thead>
    <tbody>
    @foreach($dishes as $dish)
    <tr class="bg-white border-b hover:bg-gray-50">
        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$dish->id}}</td>
        <td class="px-6 py-4">{{$dish->name}}</td>
        <td class="px-6 py-4 ">€{{$dish->price}}</td>
        <td class="px-6 py-4"><a  href="/dishes/{{$dish->id}}"><button class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" type="button">View</button></a></td>
    </tr>
    @endforeach
    </tbody>
</table> --}}
@endsection
