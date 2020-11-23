<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('frontend.home', [
            'categories' => Category::select(['name', 'id'])
                ->where('status', '=', 1)
                ->orderBy('id', 'desc')->limit(4)->get()
        ]);
    }

}
