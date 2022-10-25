<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('role');
    }

    public function save(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            if (!$request->roleName){
                return response()->json(['message' => 'Please enter a valid role name', 'error' => 1]);
            }

            Role::create([
                'role_name' => $request->roleName
            ]);

            return response()->json(['message' => 'Role created successfully.', 'error' => 0]);
        }catch (Exception $exception){
            return response()->json(['message' => $exception->getMessage(), 'error' => 1]);
        }
    }

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            if (!$request->roleName && !$request->roleId){
                return response()->json(['message' => 'Please enter a valid role name and role id', 'error' => 1]);
            }

            $role = Role::find($request->roleId);
            $role->role_name = $request->roleName;

            $role->save();
            return response()->json(['message' => 'Role updated successfully.', 'error' => 0]);
        }catch (Exception $exception){
            return response()->json(['message' => $exception->getMessage(), 'error' => 1]);
        }
    }

    public function delete(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            if (!$request->roleId){
                return response()->json(['message' => 'Please enter a valid role id', 'error' => 1]);
            }

            Role::find($request->roleId)->delete();

            return response()->json(['message' => 'Role deleted successfully.', 'error' => 0]);
        }catch (Exception $exception){
            return response()->json(['message' => $exception->getMessage(), 'error' => 1]);
        }
    }
}
