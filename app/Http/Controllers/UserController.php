<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\About;
use App\Models\Brands;
use App\Models\Rating;
use App\Models\Banners;
use App\Models\Products;
use App\Models\Wishlist;
use App\Models\Discounts;
use App\Models\Orders;
use App\Models\Orders_Detail;
use App\Models\Categories;
use Illuminate\Support\Str;
use App\Models\Imagelibrary;
use Illuminate\Http\Request;
use App\Models\SubCategories;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{
    function __construct()
    {
        $user = User::all();
        $subcategories = SubCategories::where('active', 1)->orderBy('id', 'ASC')->get();
        $categories = Categories::where('active', 1)->orderBy('id', 'ASC')->get();
        $discounts = Discounts::all();
        $products = Products::where('active', 1)->orderBy('id', 'ASC')->get();
        $banners = Banners::where('active', 1)->orderBy('id', 'ASC')->get();
        $about = About::find(1);
        $brands = Brands::where('active', 1)->orderBy('id', 'ASC')->get();
        $image = Imagelibrary::all();
        $new_products = Products::get()->where('active', 1)->sortByDesc('created_at')->take(10);
        $wishlist = new Wishlist;
        view()->share('about', $about);
        view()->share('banners', $banners);
        view()->share('brands', $brands);
        view()->share('products', $products);
        view()->share('discounts', $discounts);
        view()->share('categories', $categories);
        view()->share('subcategories', $subcategories);
        view()->share('user', $user);
        view()->share('image', $image);
        view()->share('new_products', $new_products);
        view()->share('wishlist', $wishlist);
    }
    public function home()
    {

        return view('user.pages.home');
    }
    public function list()
    {
        $users = User::with('roles', 'permissions')->get();
        return view('admin.user.list', [
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
        if ($user['active'] == 0) {
            if ($user->hasRole('admin')) {
                return response()->json(['error' => "Can't delete admin account"]);
            } else {
                $user->delete($id);
                if ($user['image'] != 'avatar.jpg') {
                    File::delete('upload/avatar/'.$user['image']);
                }
                return response()->json(['success' => 'Delete Successfully']);
            }
        } else {
            return response()->json(['error' => "Can't delete because Status being activated "]);
        }
    }
    public function delete_rating($id) 
    {
        $rating = Rating::find($id);
        $rating->delete($id);
        return response()->json(['success' => 'Delete Successfully']);
    }
    public function get_register()
    {
        return view('user.register');
    }
    public function post_register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|min:1',
            'lastname' => 'required|min:1',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'passwordagain' => 'required|same:password',
        ], [
            'firstname.required' => 'Firstname is required',
            'lastname.required' => 'Lastname is required',
            'username.required' => 'Username is required',
            'username.unique' => 'Username already exists',
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'passwordagain.required' => 'Password is required',
            'passwordagain.same' => "Password doesn't match",
        ]);
        $request['password'] = bcrypt($request['password']);
        $request['image'] = 'avatar.jpg';
        $user = User::create($request->all());
        $user->syncRoles('user');
        return redirect('login')->with('thongbao', 'Sign up successfully');
    }
    public function get_login()
    {
        return view('user.login');
    }
    public function post_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Please enter username',
            'password.required' => 'Please enter password'
        ]);

        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            return redirect('/');
        } else {
            return redirect('/login')->with('canhbao', 'Sign in unsuccessfully');
        }
    }
    public function logout()
    {
        Auth::logout();
        Cart::destroy();
        return redirect('/');
    }
    public function profile()
    {
        if(Auth::check())
        {
            $user = Auth()->user();
        }
        else
        {
            return redirect('/login');
        }
        return view ('user.profile',['user' => $user]);
    }
    public function product_deltails($id)
    {
        $pro = Products::all();
        $products = Products::find($id);
        $related_products = Products::where('sub_id', $products['sub_id'])->take(4)->get();
        $wishlist = new Wishlist;
        $countWishlist = $wishlist->countWishlist($products['id']);
        $ratings = Rating::where('products_id',$id)->orderBy('id', 'DESC')->get();
        // dd($ratings);
        // die;
        return view('user.pages.product_details', ['products' => $products, 
        'related_products' => $related_products, 'countWishlist' => $countWishlist,
        'pro'=>$pro,'ratings'=>$ratings]);
    }
    public function product_grid($id)
    {
        $danhmuc = Categories::find($id);
        $categories = Categories::all();
        $products = Products::find($id)->where('active', 1)->where('categories_id', $id)->orderBy('id', 'ASC')->Paginate(3);
        $count = count($products);
        $wishlist = new Wishlist;
        return view('user.pages.product_grid', ['categories' => $categories, 'danhmuc' => $danhmuc, 'products' => $products, 'count' => $count, 'wishlist' => $wishlist]);
    }
    public function wishlist(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $wishlist = new Wishlist;
            $countWishlist = $wishlist->countWishlist($data['products_id']);
            if ($countWishlist == 0) {
                $wishlist->products_id = $data['products_id'];
                $wishlist->users_id = $data['users_id'];
                $wishlist->save();
                return response()->json(['action' => 'add', 'message' => 'Product Added Successfully to Wishlist']);
            } else {
                Wishlist::where(['users_id' => Auth::user()->id, 'products_id' => $data['products_id']])->delete();
                return response()->json(['action' => 'remove', 'message' => 'Product Remove Successfully to Wishlist']);
            }
        }
    }
    public function total_wishlist()
    {
        $total_wishlist = Wishlist::where(['users_id' => Auth::user()->id])->count();
        echo json_encode($total_wishlist);
    }
    public function product_featured_all()
    {
        $categories = Categories::all();
        $products = Products::where('active', 1)->where('featured_product', 1)->orderBy('id', 'ASC')->Paginate(12);
        $count = count($products);
        return view('user.pages.product_featured_all', ['products' => $products, 'categories' => $categories, 'count' => $count]);
    }
    public function product_latest_all()
    {
        $categories = Categories::all();
        $products = Products::get()->where('active', 1)->sortByDesc('created_at')->take(21);
        $count = count($products);
        return view('user.pages.product_latest_all', ['products' => $products, 'categories' => $categories, 'count' => $count]);
    }
    public function product_sale_all()
    {
        $categories = Categories::all();
        $products = Products::where('active', 1)->orderBy('id', 'ASC')->Paginate(12);
        return view('user.pages.product_sale_all', ['products' => $products, 'categories' => $categories]);
    }
    public function product_all()
    {
        $categories = Categories::all();
        $search = Products::where('active', 1)->orderBy('id', 'ASC')->Paginate(15);
        $count = count($search);
        $wishlist = new Wishlist;
        return view('user.pages.product_all', ['categories' => $categories, 'search' => $search, 'count' => $count, 'wishlist' => $wishlist]);
    }
    public function search_user(Request $request)
    {
        if ($request['search']) {
            $categories = Categories::all();
            $search = Products::where('active', 1)->where('name', 'LIKE', '%' . $request['search'] . '%')->latest()->Paginate(15);
            $count = count($search);
            return view('user.pages.product_all', ['categories' => $categories, 'search' => $search, 'count' => $count]);
        } else {
            return redirect()->back()->with('canhbao', 'Empty Search');
        }
    }
    public function product_brand($id)
    {
        $danhmuc = Brands::find($id);
        $categories = Categories::all();
        $products = Products::find($id)->where('active', 1)->where('brands_id', $id)->orderBy('id', 'ASC')->Paginate(15);
        $count = count($products);
        $wishlist = new Wishlist;
        return view('user.pages.product_brand', ['categories' => $categories, 'danhmuc' => $danhmuc, 'products' => $products, 'count' => $count, 'wishlist' => $wishlist]);
    }
    public function wishlist_pages()
    {
        $pro_wish = Wishlist::all();
        $user = User::find(Auth::user()->id);
        $categories = Categories::all();
        $products = Products::where('users_id', $user)->orderBy('id', 'ASC')->Paginate(15);
        $count = count($products);
        $wishlist = new Wishlist;
        return view('user.pages.wishlist', ['categories' => $categories, 'products' => $products, 'count' => $count, 'wishlist' => $wishlist, 'pro_wish' => $pro_wish]);
    }
    public function addRating(Request $request)
    {
        
        $data = $request->all();
        if(!isset($data['ratings']))
        {
            return redirect()->back()->with('canhbao', 'Add at least one star rating for this Product');
        }
        $ratingCount = Rating::where(['users_id'=>Auth::user()->id,'products_id'=>$data['products_id']])->count();
        if($ratingCount > 0)
        {
            return redirect()->back()->with('canhbao', 'Your Rating is already exists for this Product');
        }
        else
        {
            $rating = new Rating;
            $rating->users_id = Auth::user()->id;
            $rating->products_id = $data['products_id'];
            $rating->ratings = $data['ratings'];
            $rating->content = $data['content'];
            $rating->save();
            return redirect()->back()->with('thongbao', 'Successfully');
        }
    }
    public function Getcart()
    {
        return view('user.pages.product_cart');
    }
    public function Postcart(Request $request)
    {
        $products_id = $request->productid_hidden;
        $quantity = $request->qty;

        $products = Products::where('id',$products_id)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
      
        $data['id'] = $products_id;
        $data['qty'] = $quantity;
        $data['name'] = $products['name'];
        $data['price'] = $products['price']; 
        $data['weight'] = 550; 
        $data['options']['image'] = $products['image'];
        $data['options']['price_new'] = $products['price_new'];
        $data['options']['size'] = $products['size'];
        Cart::add($data);
        //   Cart::destroy();
        Cart::setGlobalTax(0);
        return redirect('/cart')->with('thongbao','Sucessfully');
       
    }
    public function index() {
        return Cart::content();
    }
    public function checkout()
    {
        $user = Auth::user();
        return view('user.pages.product_checkout',['user' => $user]);
    }
    public function delete_cart($rowId) 
    {
        Cart::update($rowId,0);
        return redirect('/cart')->with('thongbao','Sucessfully');
    }
    public function update_cart(Request $request)
    {
        $rowId = $request->rowId_cart;
        $quantity = $request->cart_quantity;
        Cart::update($rowId,$quantity);
        return redirect('/cart')->with('thongbao','Sucessfully');
    }
    public function edit_img(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('Image')) {
            $file =  $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'jpeg' && $format != 'png') {
                return redirect('/profile')->with('thongbao', 'Không hỗ trợ ' . $format);
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
        return redirect('profile')->with('thongbao','Update successfully!');
    }
    public function edit_profile(Request $request) {
        $user = User::find(Auth::user()->id);
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
        return redirect('/profile')->with('thongbao','Cập nhật thành công');
        // dd($user);
    }
    public function order_place(Request $request)
    {
        $content = Cart::content();
    //    echo $content;
        //insert orders
        $orders = array();
        $orders['users_id'] = Auth::user()->id;
        $orders['lastname'] = $request->lastname;
        $orders['firstname'] = $request->firstname;
        $orders['address'] = $request->address;
        $orders['district'] = $request->district;
        $orders['city'] = $request->city;
        $orders['phone'] = $request->phone;
        $orders['email'] = $request->email;
        $orders['content'] = $request->content;
        $orders['total'] =  Cart::total(0,',','.');
        $orders_id = Orders::insertGetId($orders);       
        //insert order_details
        foreach($content as $value)
        {
            $orders_detail['orders_id'] = $orders_id;
            $orders_detail['product_id'] = $value->id;
            $orders_detail['name'] = $value->name;
            $orders_detail['image'] = $value->options->image;
            $orders_detail['quantity'] = $value->qty;
            $orders_detail['price'] = $value->price;       
            Orders_Detail::create($orders_detail);
        }
       return redirect('/checkout')->with('thongbao','Successfully');
    }
    public function orders_list() 
    {
        $orders = Orders::all();
        return view ('admin/orders/list',['orders'=>$orders]);
    }
    public function orders_details($orders_id)
    {
        $orders_detail = Orders_Detail::where('orders_id',$orders_id)->get();
        return view('admin.orders.details',['orders_detail'=>$orders_detail]);
    }
    public function update(Request $request,$id)
    {
        Orders::find($id)->update($request->all());
        return redirect()->back()->with('thongbao',"Successfully");
    }
}
