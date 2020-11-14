<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate();


        return view('admin.post.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required|min:2'
        ], [
            'text.required' => 'valo kore data',
            'text.min' => 'apni 2 char'
        ]);

        $data = [
            'user_id' => 3,
            'title' => $request->title,
            'text' => $request->text
        ];
        Post::create($data);
        return redirect()->route('admin.post');

    }
}

