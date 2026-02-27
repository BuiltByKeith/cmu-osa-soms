<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function adminDashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function adminUserManagement()
    {
        return view('admin.admin_users_management');
    }

    public function fetchUsers(Request $request)
    {
        $users = User::all();
        $userArray = [];

        foreach ($users as $user) {
            $userArray[] = [
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->roles->first(),
            ];
        }
        return response()->json($userArray);
    }
}
