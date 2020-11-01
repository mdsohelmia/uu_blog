<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function showDashboard()
    {

        $total_users = 100545;
        $total_post = 4340;
        return view('admin.dashboard', compact('total_post', 'total_users'));
    }
}
