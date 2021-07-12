<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class UserManagerController extends Controller
{
    public function users()
    {
        abort_if(Gate::denies('users_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('user-manager.users');
    }

    public function permissions()
    {
        abort_if(Gate::denies('permissions_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('user-manager.permissions');
    }
}
