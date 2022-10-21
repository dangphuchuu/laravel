<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesController extends Controller
{
    public function list()
    {
        $roles=Role::all();
        return view('admin.roles.list',['roles' => $roles]);
    }
    public function getCreate()
    {
        $permission = Permission::all();
        return view('admin.roles.create',['permission'=>$permission]);
    }
    public function getEdit($id)
    {
        $roles= Role::find($id);
        return view('admin.roles.edit',['roles'=>$roles]);
    }
    // public function postCreate(Request $request)
    // {
    //     $request->validate([
    //         'name'=>'required|unique:roles'
    //     ],[
    //         'name.required'=>'Vui lòng nhập tên vai trò',
    //         'name.unique'=>'Tên vai trò này đã tồn tại'
    //     ]);
        
    //     Role::create($request->all());
    //     return redirect('admin/roles/list')->with('thongbao','Thêm thành công');
    // }
    // public function postEdit(Request $request,$id)
    // {
    //     $roles = Role::find($id);
    //     $request->validate([
    //         'name'=>'required|unique:roles'
    //     ],[
    //         'name.required'=>'Vui lòng nhập tên vai trò',
    //         'name.unique'=>'Tên vai trò này đã tồn tại'
    //     ]);
    //     $roles->update($request->all());
    //     return redirect('admin/roles/list')->with('thongbao','Update thành công');
    // }
    // public function Delete($id)
    // {
    //     Role::destroy($id);
    //     return redirect('admin/roles/list')->with('thongbao','Xóa thành công');
    // }

}
