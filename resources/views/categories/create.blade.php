@extends('app')
@section('content')
<form method="post" action="/categories">
  @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
      <div class="sm:col-span-4">
        <h2 class="text-base font-semibold leading-7 text-gray-900">New category</h2>
      </div>
        <div class="sm:col-span-4">
          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              <input type="text" name="name" id="name" autocomplete="name" placeholder="Bamigerechten" class="block flex-1 p-2.5 border-0 bg-transparent p-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" >
            </div>
            @error('name')
            <p class="text-xs text-red-900 font-semibold mt-1">{{$message}}</p>
            @enderror
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-2 flex items-center justify-end gap-x-6">
    <a href="/categories"><button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
  </div>
</form>
@endsection