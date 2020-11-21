<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->query('search');
        $posts = Post::with(['user', 'category'])->orderBy('id', 'desc')->paginate();
        if ($searchTerm) {
            $posts = Post::with(['user', 'category'])
                ->where('title', 'like', "%{$searchTerm}%")
                ->orWhere('text', 'like', "%{$searchTerm}%")
                ->paginate();
        }

        return view('admin.post.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.post.create', [
            'categories' => Category::select('id', 'name')->get()
        ]);
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
            'user_id' => auth()->user()->id,
            'category_id' => $request->input('category_id'),
            'title' => $request->title,
            'text' => $request->text
        ];
        Post::create($data);
        return redirect()->route('admin.post');

    }
}

