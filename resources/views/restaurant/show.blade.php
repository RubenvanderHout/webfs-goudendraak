@extends('app')
@section('content')
<table class="w-full text-sm text-left rtl:text-right text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
        <tr>
            <th scope="col" class="px-6 py-3">Leeftijd</th>
            <th scope="col" class="px-6 py-3">Deluxe</th>
            <th scope="col" class="px-6 py-3"><a href="/customers/create"><button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 focus:outline-none" type="button">Add</button></a></th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr class="bg-white border-b hover:bg-gray-50">
            <td class="px-6 py-4">{{$customer->age}}</td>
            <td class="px-6 py-4 ">{{$customer->deluxe ? 'Yes' : 'No'}}</td>
            <td class="px-6 py-4">
                <form action="/customers/{{$customer->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="focus:outline-none text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" type="submit">Remove</button></a>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="flex justify-end mt-6">
    <a href="/receipt/{{$table->id}}">
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            Print bon
        </button>
    </a>
</div>
@endsection