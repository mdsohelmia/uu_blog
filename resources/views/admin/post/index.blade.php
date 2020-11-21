@extends('admin.Layouts.app')

@section('main')
    <div>
        <a href="{{route('post.create')}}">New Post</a>
        <form action="{{route('admin.post')}}">
            <input class="form-input" type="search" placeholder="search" name="search"
                   value="{{request()->query('search')}}">
            <button type="submit">search</button>
        </form>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">SN</th>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Category Name</th>
                    <th class="px-4 py-3">User</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                @foreach($posts as $key=>$post)

                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            {{$key + 1}}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">{{$post->title}}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{optional($post->category)->name}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$post->user->first_name}}
                        </td>
                        <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                          Approved
                        </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$post->created_at->diffForHumans()}}
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
        <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            {{$posts->links()}}
        </div>
    </div>
@endsection
