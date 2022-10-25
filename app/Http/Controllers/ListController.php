<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('list_all_data')->with(['permissions' => $permissions, 'roles' => $roles]);
    }

}
