<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;


class UserRolesController extends Controller
{
    public function index()
    {
        $roles = auth()-user()->with('role_position');
    }
}
