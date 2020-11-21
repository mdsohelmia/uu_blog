<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('title'),
            'description' => $request->input('text')
        ];
        Category::create($data);

        return redirect()->back();
    }

}
