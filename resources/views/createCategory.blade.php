
@extends('base')

@section('content')
    <form action="{{route($category->exists? "category.edit": "category.store", $category)}}" method="POST" class="max-w-sm mx-auto border mt-16 sm:mt-32 rounded-lg">
        @csrf
        <h2 class="text-center p-2 w-full bg-indigo-600 font-bold text-white">
            @if($category->exists)
                {{ __('Category Editing') }}
            @else
                {{ __('New Category') }}
            @endif
        </h2>
        <div class="p-6">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name </label>
                <input type="text" value="{{old("name", $category->name)}}" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </form>
@endsection
