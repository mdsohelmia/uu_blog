@extends('admin.Layouts.app')


@section('main')
    <form action="{{route('categories.store')}}" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
          method="post" enctype="multipart/form-data">
        @csrf
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Title</span>
            <input name="title" type="text" class="form-input w-full" value="{{old('title')}}">

            @error('title') <span class="text-red-700">{{$message}}</span> @enderror
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Post</span>
            <textarea
                name="text"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3" placeholder="Enter some long form content.">{{old('text')}}</textarea>
            @error('text') <span class="text-red-700">{{$message}}</span> @enderror
        </label>

        <div class="flex justify-between items-center mt-6">
            <label class="block text-sm mt-6">
                <span class="text-gray-700 dark:text-gray-400 mt-6">Status</span>
                <input name="status" value="1" type="checkbox" class="form-checkbox w-5 h-5">
            </label>
            <button class="bg-purple-600 py-2 px-10 rounded text-sm text-white">Save</button>
        </div>

    </form>
@endsection
