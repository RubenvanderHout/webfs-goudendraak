@extends('layout.app')
@section('content')
<div>
  <div class="px-4 sm:px-0 mt-10">
    <h3 class="text-base font-semibold leading-7 text-gray-900">{{$category->name}}</h3>
    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Category details</p>
  </div>
  <div class="mt-6 border-t border-gray-100">
    <dl class="divide-y divide-gray-100">
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Name</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$category->name}}</dd>
      </div>
    </dl>
  </div>
  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/categories"><button type="button" class="text-sm font-semibold leading-6 text-gray-900">Back</button></a>
    <a href="/categories/{{$category->id}}/edit"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit category</button></a>
</div>
@endsection