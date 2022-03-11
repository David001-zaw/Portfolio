<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('dashboard.adminusers.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.adminusers.create');
    }

    public function store(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone
        ]);

        return back()->with('success', 'User Created Successfully');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $admin_user)
    {
        return view('dashboard.adminusers.edit', compact('admin_user'));
    }


    public function update(Request $request, User $admin_user)
    {
        $admin_user->update($request->only('name', 'email', 'password', 'phone'));

        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->password = bcrypt($request->password);
        $admin_user->phone = $request->phone;
        $admin_user->update();

        return back()->with('success', 'User Updated Successfully');
    }

    public function destroy(User $admin_user)
    {
        $admin_user->delete();

        return back()->with('success', 'User Deleted Successfully');
    }
}
