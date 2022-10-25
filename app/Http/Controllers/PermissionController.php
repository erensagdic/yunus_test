<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function save(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            if (!$request->permissionName){
                return response()->json(['message' => 'Please enter a valid permission name', 'error' => 1]);
            }

            Permission::create([
                'permission_name' => $request->permissionName
            ]);

            return response()->json(['message' => 'Permission created successfully.', 'error' => 0]);
        }catch (Exception $exception){
            return response()->json(['message' => $exception->getMessage(), 'error' => 1]);
        }
    }

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            if (!$request->permissionName && !$request->permissionId){
                return response()->json(['message' => 'Please enter a valid permission name and permission id', 'error' => 1]);
            }

            $permission = Permission::find($request->permissionId);
            $permission->permission_name = $request->permissionName;

            $permission->save();

            return response()->json(['message' => 'Permission updated successfully.', 'error' => 0]);
        }catch (Exception $exception){
            return response()->json(['message' => $exception->getMessage(), 'error' => 1]);
        }
    }
    public function delete(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            if (!$request->permissionId){
                return response()->json(['message' => 'Please enter a valid permission id', 'error' => 1]);
            }

            Permission::find($request->permissionId)->delete();

            return response()->json(['message' => 'Permission deleted successfully.', 'error' => 0]);
        }catch (Exception $exception){
            return response()->json(['message' => $exception->getMessage(), 'error' => 1]);
        }
    }
}
