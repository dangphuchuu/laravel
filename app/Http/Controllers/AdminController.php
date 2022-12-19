<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\About;
use App\Models\Rating;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    function __construct()
    {
        $user = User::all();
        view()->share('user',$user);
    }
    public function home()
    {
        return view('admin.home.list');
    }
    public function profile()
    {
        if(Auth::check())
        {
            $user = Auth()->user();
        }
        else
        {
            return redirect('admin/login');
        }
        return view ('admin.profile',[
        'user' => $user])->with('roles','permissions');
    }
    public function edit_profile(Request $request)
    {
       $user = User::find(Auth::user()->id);
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required'
        ],[
            'firstname.required'=>'Vui lòng nhập tên',
            'lastname.required'=>'Vui lòng nhập họ'
        ]);
        if($request['changepasswordprofile'] =='on')
        {
        $request->validate([
            'password'=>'required',
            'passwordagain'=>'required|same:password'
        ],[
            'password.required'=>'Vui lòng nhập mật khẩu mới',
            'passwordagain.required'=>'Vui lòng nhập lại mật khẩu mới',
            'passwordagain.same'=>'Mật khẩu nhập lại không đúng'
        ]);
        $request['password'] = bcrypt($request['password']);
        }
        $user->update($request->all());
        // User::where('id',Auth::user()->id)->update($request->all());
        return redirect('admin/profile')->with('thongbao','Cập nhật thành công');
        // dd($user);
    }
    public function edit_img(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('Image')) {
            $file =  $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'jpeg' && $format != 'png') {
                return redirect('admin/profile')->with('thongbao', 'Không hỗ trợ ' . $format);
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4) . '-' . $name;
            while (file_exists("upload/avatar" . $img)) {
                $img = Str::random(4) . '-' . $name;
            }
            $file->move('upload/avatar/', $img);
            if ($user['image'] != '') {
                if ($user['image'] != 'avatar.jpg') {
                    unlink('upload/avatar/' . $user->image);
                }
            }
            User::where('id',Auth::user()->id)->update(['image'=>$img]);
            // $request['image'] = $img;
        }
        return redirect('admin/profile')->with('thongbao','Update successfully!');
    }
    public function edit_facebook(Request $request) 
    {
        $user = User::find(Auth::user()->id);
        $user->update($request->all());
        return redirect('admin/profile')->with('thongbao','Update successfully!');
    }
    public function getLogin()
    {
        // $role = Role::create(['name' => 'staff']);
        // Permission::create(['name' => 'delete category']);
        // Permission::create(['name' => 'delete user']);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        //  $user = User::find(1);
        //  $user->assignRole('admin');
        // $per = Permission::all();
        // $user->givePermissionTo($per);
        
        return view('admin.login');
        
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'username' =>'required',
            'password' =>'required'
        ],[
            'username.required'=>"Vui lòng nhập username",
            'password.required' =>"Vui lòng nhập mật khẩu"
        ]);
        if(Auth::attempt(['username'=>$request['username'],'password'=>$request['password']]))
        {
            return redirect('admin');
        }
        else
        {
            return redirect('admin/login')->with('canhbao','Đăng nhập không thành công');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
    public function list()
    {
       
        // $users = User::orderBy('id','DESC')->Paginate(1);
        $users = User::with('roles','permissions')->orderBy('id','DESC')->get();
        return view('admin.staff.list',[
            'users' => $users,
        ]);
    }
    public function getcreate()
    {
        $role = Role::orderBy('id','ASC')->get();
        return view('admin/staff/create',['role'=>$role]);
    }
    public function postcreate(Request $request)
    {
        $request->validate([
        'firstname'=>'required|min:1',
        'lastname'=>'required|min:1',
        'username'=>'required|unique:users',
        'email'=>'required|unique:users',
        'password'=>'required',
        'passwordagain'=>'required|same:password'
    ],[
        'firstname.required'=> 'Vui lòng nhập tên',
        'firstname.min'=>'Tên ít nhất 1 kí tự',
        'lastname.required'=>'Vui lòng nhập họ',
        'lastname.min'=>'Họ ít nhất 1 kí tự',
        'username.required'=>'Vui lòng nhập username',
        'username.unique'=>'username đã tồn tại',
        'email.required'=>'Vui lòng nhập email',
        'email.unique'=>'Email đã tồn tại',
        'password.required'=>'Vui lòng nhập mật khẩu', 
        'passwordagain.required'=>'Vui lòng nhập lại mật khẩu',
        'passwordagain.same'=>'Mật khẩu nhập lại không trùng'      
    ]);
    $request['password'] = bcrypt($request['password']);
    $request['image'] = 'avatar.jpg';
    $user=User::create($request->all());
    $user->syncRoles('staff');
    return redirect('admin/staff/list')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id)
    {
        $role = Role::all();
        $user = User::find($id);
        // $name_role = $user->roles->first()->name;
        $all_role = $user->roles->first();
        return view('admin.staff.edit',['user' => $user,'role'=>$role,'all_role'=>$all_role]);
    }
    public function postEdit(Request $request,$id)
    {
        $request->validate([
        'firstname'=>'required|min:1',
        'lastname'=>'required|min:1',
        'username'=>'required',
        'email'=>'required'
        
    ],[
        'firstname.required'=> 'Vui lòng nhập tên',
        'firstname.min'=>'Tên ít nhất 1 kí tự',
        'lastname.required'=>'Vui lòng nhập họ',
        'lastname.min'=>'Họ ít nhất 1 kí tự',
        'username.required'=>'Vui lòng nhập username',
        'username.unique'=>'username đã tồn tại',
        'email.required'=>'Vui lòng nhập email',
    ]);
    if($request['changepassword'] =='on')
    {
        $request->validate([
            'password'=>'required',
            'passwordagain'=>'required|same:password'
        ],[
            'password.unique'=>'Mật khẩu mới trùng với mật khẩu cũ',
            'password.required'=>'Vui lòng nhập mật khẩu mới',
            'passwordagain.required'=>'Vui lòng nhập lại mật khẩu mới',
            'passwordagain.same'=>'Mật khẩu nhập lại không đúng'
        ]);
        $request['password'] = bcrypt($request['password']);
    }
    $user = User::find($id);
    $user->update($request->all());
    return redirect('admin/staff/list')->with('thongbao','Thành công');
    }  
    public function getrole($id)
    {
        $user = User::find($id);
        $role = Role::all();
        $all_role = $user->roles->first();
        $permission = Permission::all();
        return view('admin.staff.role',['role'=>$role,'user'=>$user,'all_role'=>$all_role,'permission'=>$permission]);
    }
    public function postrole(Request $request,$id)
    {
        $data = $request->all();
        $user = User::find($id);
        $user->syncRoles($data['role']);
        return redirect('admin/staff/list')->with('thongbao','Update vai trò thành công');
    }
    public function getpermission($id)
    {
        $user = User::find($id);
        // $roles = $user->roles->first()->name;
        $permission = Permission::orderBy('id', 'asc')->get();
        $user_per=$user->getDirectPermissions();// table:model_has_permission (hoặc có thể dùng $user->permissions)
        // $role_per=$user->getPermissionsViaRoles();// table:role_has_permissions
        // dd($user_per);
        return view('admin.staff.permission',['user'=>$user,'permission'=>$permission,'user_per'=>$user_per]);
        
    }
    public function postpermission(Request $request,$id)
    {
        $data = $request->all();
        $user = User::find($id);
        // $role_id = $user->roles->first()->id;

        // $role = Role::find($role_id);
        $user->syncPermissions($data['permission']);

        return redirect('admin/staff/list')->with('thongbao','Thêm quyền thành công');
    }
    public function getRating()
    {
        $rating = Rating::all();
        return view ('admin.rating.list',['rating' => $rating]);
    }
}
