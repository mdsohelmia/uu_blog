@extends('admin.Layouts.app')

@section('main')

    <form action="{{route('user.update',$user->id)}}"
          class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
          method="post" enctype="multipart/form-data">
        @csrf
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">First Name</span>
            <input
                name="first_name" value="{{$user->first_name}}"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Jane Doe">
        </label>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Last Name</span>
            <input
                name="last_name"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Jane Doe" value="{{$user->last_name}}">
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Email</span>
            <input
                type="email"
                name="email"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Jane Doe">
        </label>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Avatar</span>
            <img class="object-cover h-12 w-12 rounded-full"
                 src="{{asset('uploads/'.$user->photo)}}"
                 alt="" loading="lazy">
            <input
                name="image"
                type="file"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Jane Doe">
        </label>

        <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                 Role
                </span>
            <div class="mt-2">
                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input type="radio"

                           class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                           name="role" value="Admin">
                    <span class="ml-2">Admin</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input type="radio"
                           class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                           name="role" value="Writer">
                    <span class="ml-2">Writer</span>
                </label>
            </div>
        </div>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">About</span>
            <textarea
                name="about"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3" placeholder="Enter some long form content."></textarea>
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
