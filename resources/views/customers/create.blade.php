@extends('app')
@section('content')
<form method="post" action="/customers">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            
            @if($errors->any())
            {!! implode('', $errors->all('<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
  <span class="font-medium"></span> :message
</div>')) !!}
            @endif
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">New customer</h2>
                </div>

                <div class="sm:col-span-4">
                    <label for="customerage" class="block text-sm font-medium leading-6 text-gray-900">Age</label>
                    <div class="mt-2">
                        <input type="number" class="border border-gray-300 text-sm rounded-lg sm:max-w-md focus:ring-blue-500 text-gray-900 shadow-sm focus:border-blue-500 block placeholder:text-gray-400 w-full p-2.5" min="1" name="customerage" id="customerage">
                    </div>
                    @error('customerage')
                    <p class="text-xs text-red-900 font-semibold mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="sm:col-span-4">
                    <label for="deluxe" class="block text-sm font-medium leading-6 text-gray-900">Deluxe</label>
                    <div class="mt-2">
                        <input type="checkbox" value="1" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" min="1" name="deluxe" id="deluxe">
                    </div>
                    @error('deluxe')
                    <p class="text-xs text-red-900 font-semibold mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="sm:col-span-4">
                    <label for="table" class="block text-sm font-medium leading-6 text-gray-900">Table</label>
                    <div class="mt-2">
                        <select id="table" name="table" autocomplete="table" class="block w-full sm:max-w-md rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ssm:text-sm sm:leading-6">
                            @foreach($tables as $table)
                            <option value="{{$table->id}}">{{$table->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('table')
                    <p class="text-xs text-red-900 font-semibold mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 flex items-center justify-end gap-x-6">
        <a href="/restaurant"><button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button></a>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
    </div>
</form>
@endsection