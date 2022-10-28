<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\About;
use App\Models\Banners;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Discounts;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\Imagelibrary;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    function __construct()
    {
        $user = User::all();
        $subcategories = SubCategories::where('active',1)->orderBy('id','ASC')->get();
        $categories = Categories::where('active',1)->orderBy('id','ASC')->get();
        $discounts = Discounts::all();
        $products = Products::where('active',1)->orderBy('id','ASC')->get();
        $banners = Banners::where('active',1)->orderBy('id','ASC')->get();
        $about = About::find(1);
        $brands = Brands::where('active',1)->orderBy('id','ASC')->get();
        $image = Imagelibrary::all();
        $new_products = Products::get()->where('active',1)->sortByDesc('created_at')->take(10);
        view()->share('about',$about);
        view()->share('banners',$banners);
        view()->share('brands',$brands);
        view()->share('products',$products);
        view()->share('discounts',$discounts);
        view()->share('categories',$categories);
        view()->share('subcategories',$subcategories);
        view()->share('user',$user);
        view()->share('image',$image);
        view()->share('new_products',$new_products);
    }
    public function home()
    {
        
        return view('user.pages.home');
    }
    public function list()
    {
        $users = User::with('roles','permissions')->get();
        return view('admin.user.list',[
            'users' => $users
        ]);
    }
//     public function index()
//     {
//         $user_id = Auth::user()->id;
//         $data = Auth::user()->roles;
//         dd($data);
//         // $arrPermission = [];
//         // foreach($data as $value) $arrPermission[] = $value->name;
//         // $collection = new Collection($arrPermission);
//         // dd($collection->contains("all_product"));
//  }
public function delete_staff($id)
{
    $user = User::find($id);
    if ($user['active'] == 0) 
    {
        if($user->hasRole('admin'))
        {
            return response()->json(['error' => "Can't delete admin account"]);
        }
        else
        {
            $user->delete($id);
            return response()->json(['success' => 'Delete Successfully']);
        }
    } 
    else 
    {
        return response()->json(['error' => "Can't delete because Status being activated "]);
    }

}
public function register_login()
{
    return view('user.pages.register-login');
}
public function register(Request $request)
{
    $request->validate([
        'firstname' =>'required|min:1',
        'lastname' =>'required|min:1',
        'username' =>'required|unique:users',
        'email' =>'required|unique:users',
        'password'=>'required',
        'passwordagain' =>'required|same:password',
    ],[
        'firstname.required' => 'Firstname is required',
        'lastname.required' => 'Lastname is required',
        'username.required' => 'Username is required',
        'username.unique' => 'Username already exists',
        'email.required' => 'Email is required',
        'email.unique' => 'Email already exists',
        'password.required' => 'Password is required',
        'passwordagain.required' => 'Password is required',
        'passwordagain.same' => 'Passwords do not match',
    ]);
    $request['password'] = bcrypt($request['password']);
    $request['image'] = 'avatar.jpg';
    $user=User::create($request->all());
    $user->syncRoles('user');
    return redirect()->back()->with('thongbao','Create successfully');
}
public function login(Request $request)
{
    $request->validate([
        'username'=>'required',
        'password'=>'required'
    ],[
        'username.required'=>'Please enter username',
        'password.required'=>'Please enter password'
    ]);

    if(Auth::attempt(['username'=>$request['username'],'password'=>$request['password']]))
    {
            return redirect('/');
    }
    else
    {
        return redirect('register_login')->with('canhbao','Đăng nhập không thành công');
    }
}
public function logout()
{
    Auth::logout();
    return redirect('/');
}
public function product_deltails($id)
{
    $products = Products::find($id);
    $related_products = Products::where('sub_id',$products['sub_id'])->take(4)->get();
    return view('user.pages.product_details',['products' => $products,'related_products'=>$related_products]);
}
public function product_grid($id)
{
    $danhmuc = Categories::find($id);
    $categories = Categories::all();
    $products = Products::where('active',1)->where('categories_id',$id)->orderBy('id','ASC')->Paginate(3);
    $count = count($products);
    return view('user.pages.product_grid',['categories' => $categories,'danhmuc' => $danhmuc,'products'=>$products,'count'=>$count]);
}
}
