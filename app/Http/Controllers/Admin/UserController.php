<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'about' => $request->input('about'),
        ];

        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $file_name = uniqid('photo__', true) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('/') . 'uploads/', $file_name);
            $data['photo'] = $file_name;
        }
        User::create($data);

        return redirect()->route('user.list');

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'about' => $request->input('about'),
        ];

        if ($request->hasFile('image')) {
            @unlink(public_path('uploads/') . $user->photo);
            $photo = $request->file('image');
            $file_name = uniqid('photo__', true) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('/') . 'uploads/', $file_name);
            $data['photo'] = $file_name;
        }

        try {

            $user->update($data);
            return redirect()->route('user.list');
        } catch (\Throwable $exception) {
            return redirect()->back();
        }

    }


    public function delete($id)
    {
        $user = User::find($id);

        try {

            $user->delete();
            @unlink(public_path('uploads/') . $user->photo);
            return redirect()->back();
        } catch (\Throwable $exception) {
            return redirect()->back();
        }


    }

}
