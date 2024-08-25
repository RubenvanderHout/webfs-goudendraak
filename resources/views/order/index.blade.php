@extends('app')
@section('content')

<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="default-sidebar" class="absolute top-100 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         @foreach($categories as $category)
         <li>
            <button data-drawer-toggle="category-{{ $category->id }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               {{$category->name}}
            </button>
         </li>
         @endforeach
      </ul>
   </div>
</aside>

<div class="p-4 sm:ml-64">
   <div class="flex-1 p-6">
      @if (session('success'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50">
         <div class="font-medium">{{ session('success') }}</div>
      </div>
      @endif
      @foreach($categories as $category)
      <div id="category-{{ $category->id }}" class="hidden">
         <h2 class="text-2xl font-semibold mb-4">{{ $category->name }}</h2>
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($category->dishes as $dish)
            <div class="bg-white shadow-md rounded-lg p-4">
               <h3 class="text-xl font-semibold">{{ $dish->name }}</h3>
               <p class="text-gray-500">€ {{ number_format($dish->price, 2) }}</p>
               <p class="mt-2 text-gray-600">{{ $dish->description }}</p>
               <form action="{{route('order.add')}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{$dish->id}}">
                  <input type="hidden" name="name" value="{{ $dish->name }}">
                  <input type="hidden" name="price" value="{{ $dish->price }}">
                  <label for="quantity">Quantity</label>
                  <input type="number" name="quantity" value="1" min="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                  <label for="remark" >Remark</label>
                  <input type="text" name="remark" placeholder="Add a remark (optional)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Add to Order</button>
               </form>
            </div>
            @endforeach
         </div>
      </div>
      @endforeach
   </div>
</div>

@endsection