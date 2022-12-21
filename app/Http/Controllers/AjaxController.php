<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategories;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\Discounts;
use App\Models\User;
use App\Models\Products;
use App\Models\Banners;
class AjaxController extends Controller
{
    public function getSub($cat_id)
    {
        $subcategories = Subcategories::where('cat_id', $cat_id)->get();
        foreach ($subcategories as $value) {
            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
        }
    }
    public function Categories(Request $request)
    {
        $categories = Categories::find($request->cate_id);
        $categories->active = $request->active;
        $categories->save();
    }
    public function Subcategories(Request $request)
    {
        $subcategories = Subcategories::find($request->sub_id);
        $subcategories->active = $request->active;
        $subcategories->save();
    }
    public function Brands(Request $request)
    {
        $Brands = Brands::find($request->brand_id);
        $Brands->active = $request->active;
        $Brands->save();
    }
    public function Staff(Request $request)
    {
        $Staff = User::find($request->staff_id);
        if($Staff->hasRole('admin'))
        {
            return response();
           
        }
        else
        {
            $Staff->active = $request->active;
            $Staff->save();
        }
        
    }
    public function Discounts(Request $request)
    {
        $Discounts = Discounts::find($request->dis_id);
        $Discounts->active = $request->active;
        $Discounts->save();
    }
    public function Products(Request $request)
    {
        $Products = Products::find($request->product_id);
        $Products->active = $request->active;
        $Products->save();
    }
    public function Featured_Products(Request $request)
    {
        $Products = Products::find($request->featured_id);
        $Products->featured_product = $request->featured_product;
        $Products->save();
    }
    public function Users(Request $request)
    {
        $User = User::find($request->user_id);
        $User->active = $request->active;
        $User->save();
    }
    public function Banners(Request $request)
    {
        $Banners = Banners::find($request->ban_id);
        $Banners->active = $request->active;
        $Banners->save();
    }
}
