@extends('layout.app')
@section('content')
<table class="w-full text-sm text-left rtl:text-right text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
        <tr>
            <th scope="col" class="px-6 py-3">Id</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3"><a href="/categories/create"><button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 focus:outline-none" type="button">Create</button></a></th></tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
    <tr class="bg-white border-b  hover:bg-gray-50">
        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$category->id}}</td>
        <td class="px-6 py-4">{{$category->name}}</td>
        <td class="px-6 py-4"><a  href="/categories/{{$category->id}}"><button class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" type="button">View</button></a></td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
