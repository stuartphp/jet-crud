<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function users()
    {
        return view('user-manager.users');
    }

    public function roles()
    {
        return view('user-manager.roles');
    }

    public function permissions()
    {
        return view('user-manager.permissions');
    }
}
