@extends('app')
@section('content')
<form method="POST" action="/dishes/{{$dish->id}}">
    @method('PATCH')
  @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
      <div class="sm:col-span-4">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Edit dish</h2>
      </div>
      <div class="sm:col-span-4">
          <label for="id" class="block text-sm font-medium leading-6 text-gray-900">Number</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <input type="text" name="id" id="id" value="{{$dish->id}}" autocomplete="id" placeholder="17b" class="block flex-1 border-0 bg-transparent p-2.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" >
            </div>
            @error('id')
            <p class="text-xs text-red-900 font-semibold mt-1">{{$message}}</p>
            @enderror
          </div>
        </div>
        <div class="sm:col-span-4">
          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <input type="text" name="name" id="name" value="{{$dish->name}}" autocomplete="name" placeholder="nasi" class="block flex-1 p-2.5 border-0 bg-transparent p-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" >
            </div>
            @error('name')
            <p class="text-xs text-red-900 font-semibold mt-1">{{$message}}</p>
            @enderror
          </div>
        </div>
        <div class="sm:col-span-full">
          <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
          <div class="mt-2">
            <textarea id="description" value="{{$dish->description}}"  name="description" rows="3" placeholder="4p" class="block p-2.5 w-full sm:max-w-md rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
          </div>
          @error('description')
            <p class="text-xs text-red-900 font-semibold mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="sm:col-span-4">
          <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
          <div class="mt-2">
              <input type="number" value="{{$dish->price}}"  class="border border-gray-300 text-sm rounded-lg sm:max-w-md focus:ring-blue-500 text-gray-900 shadow-sm focus:border-blue-500 block placeholder:text-gray-400 w-full p-2.5" step="0.01" min="1" name="price" id="price" placeholder="6,00" autocomplete="price">
          </div>
          @error('price')
            <p class="text-xs text-red-900 font-semibold mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="sm:col-span-4">
          <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
          <div class="mt-2">
            <select id="category" name="category" autocomplete="category" class="block w-full sm:max-w-md rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ssm:text-sm sm:leading-6">
            @foreach($categories as $categorie)
            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
              @endforeach
            </select>
          </div>
          @error('category')
            <p class="text-xs text-red-900 font-semibold mt-1">{{$message}}</p>
            @enderror
        </div>
      </div>
    </div>
    </div>
    <div class="mt-2 flex items-center justify-between gap-x-6">
        <div>
             <button type="submit" form="delete-form" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button> 
        </div>
        <div class="flex items-center gap-x-6">
            <a href="/dishes/{{$dish->id}}"><button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
        </div>
    </div>
</form>
<form id="delete-form" method="post"action="/dishes/{{$dish->id}}" class="hidden">
    @method('delete')
    @csrf
</form>
@endsection