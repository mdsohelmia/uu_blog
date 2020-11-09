@extends('admin.Layouts.app')

@section('main')

    <div class="my-6 flex justify-end">
        <a href="{{route('user.create')}}" class="bg-purple-600 py-2 px-5 mr-2 rounded text-white text-sm">Add New
            User</a>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">SN</th>
                    <th class="px-4 py-3">Fist Name</th>
                    <th class="px-4 py-3">Last Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                @foreach($users as $key=>$user)

                    <tr class="text-gray-700 dark:text-gray-400">

                        <td>{{$key + 1}}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                         src="{{asset('uploads/'.$user->photo)}}"
                                         alt="" loading="lazy">
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">{{$user->first_name}}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$user->last_name}}
                        </td>
                        <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                        {{$user->email}}
                        </span>
                        </td>
                        <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            {{$user->role}}
                        </span>
                        </td>
                        <td class="px-4 py-3 text-xs">

                            @if($user->status == 1)
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Active
                        </span>
                            @else
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            Inactive
                        </span>
                            @endif

                        </td>
                        <td class="px-4 py-3 text-sm">
                            6/10/2020
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{route('user.edit',$user->id)}}"
                               class="bg-blue-500 text-white py-2 px-10 rounded shadow">Edit</a>
                            <a href="{{route('user.delete',$user->id)}}"
                               class="bg-red-600 text-white py-2 px-10 rounded shadow">delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            {{$users->links()}}
        </div>
    </div>
@endsection
