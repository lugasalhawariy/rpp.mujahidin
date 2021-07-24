<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class AssignRolePermission extends Controller
{
    public function editPermission($id)
    {
        $data = Role::findOrFail($id);
        // jika role yang dipilih adalah superadmin, maka tidak dapat di edit.
        if($data->name == 'superadmin'){
            // dan jika yang login bukan superadmin
            if(!auth()->user()->hasRole('superadmin')){
                abort(403);
            }
        }
        $permissions = Permission::latest()->get();
        return view('pages.role.edit-permission', compact('data', 'permissions'));
    }

    public function editRole($id)
    {
        $data = User::findOrFail($id);
        // jika id yang diambil ternyata ada role superadmin, maka tidak bisa diedit oleh siapapun!
        if($data->hasRole('superadmin')){
            abort(403);
        }
        $roles = Role::latest()->get();
        return view('pages.role.edit-role', compact('data', 'roles'));
    }

    public function assignPermission(Request $request, $id)
    {
        request()->validate([
            'permissions' => 'array'
        ]);

        $role = Role::findOrFail($id);
        $role->syncPermissions(request('permissions'));
        return redirect()->route('index.role');
    }

    public function assignRole(Request $request, $id)
    {
        request()->validate([
            'roles' => 'array'
        ]);

        $user = User::findOrFail($id);
        $user->syncRoles(request('roles'));
        return redirect()->route('index.role');
    }

    public function createPermission(Request $request)
    {
        Artisan::call("permission:create-permission $request->name");
        return redirect()->route('index.role');
    }
}
