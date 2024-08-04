<x-layout>
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Nummer</th>
            <th scope="col" class="px-6 py-3">Naam</th>
            <th scope="col" class="px-6 py-3">Prijs</th>
            <th scope="col" class="px-6 py-3"><a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="/dishes/create">Create</a></th></tr>
    </thead>
    <tbody>
    @foreach($dishes as $dish)
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$dish->id}}</td>
        <td class="px-6 py-4 dark:text-white">{{$dish->name}}</td>
        <td class="px-6 py-4 dark:text-white">€{{$dish->price}}</td>
        <td class="px-6 py-4"><a class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900"" href="/dishes/{{$dish->id}}">Edit </a></td>
    </tr>
    @endforeach
    </tbody>
</table>
</x-layout>
