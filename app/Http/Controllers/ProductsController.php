<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Subcategories;
use App\Models\User;
use App\Models\Brands;
use App\Models\Imagelibrary;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    public function list()
    {
        $brands = Brands::all();
        $users = User::all();
        $categories = Categories::all();
        $products = Products::orderBy('id','DESC')->Paginate(5);
        return view('admin.products.list',['products' => $products,'categories' => $categories,'users' => $users,'brands' => $brands]);
    }
    public function getCreate()
    {
        $brands = Brands::all();
        $products = Products::all();
        $categories = Categories::all();
        $subcategories = Subcategories::all();
        $imagelibrary = Imagelibrary::all();
        return view('admin.products.create',['categories' => $categories,'products'=>$products,'brands'=>$brands,'imagelibrary'=>$imagelibrary,'subcategories'=>$subcategories]);
    }
    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1',
            // 'price'=> 'required|min:1',
            // 'content'=> 'required|min:1'
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.min' => 'Tên sản phẩm ít nhất 1 ký tự',
            // 'price.required'=>'Vui lòng nhập giá',
            // 'price.min'=>'Giá ít nhất 1 số',
            // 'content.required'=>'Vui lòng nhập nội dung',
            // 'content.min'=>'Nội dung ít nhất 1 ký tự'
        ]);
        $request['users_id'] = Auth::user()['id'];
        if($request->hasFile('Image'))
        {
             $file =  $request->file('Image');
             $format = $file->getClientOriginalExtension();
             if($format !='jpg' && $format !='jpeg' && $format !='png')
             {
                 return redirect('admin/products/create')->with('thongbao','Không hỗ trợ '.$format);
             }
             $name = $file->getClientOriginalName();
             $img = Str::random(4).'-'.$name;
             while(file_exists("user_asset/images/products/".$img))
             {
              $img = Str::random(4).'-'.$name;
             }
             $file->move('user_asset/images/products',$img);
           
             $products = new Products([
                'name' => $request->name,
                'categories_id' => $request->categories_id,
                'users_id' => $request->users_id,
                'brands_id' => $request->brands_id,
                'sub_id'=> $request->sub_id,
                'size' => $request->size,
                'price' => $request->price,
                'price_new'=> $request->price_new,
                'quantity'=> $request->quantity,
                'image' => $img,
                'link' => $request->link,
                'content' => $request->content,
                'featured_product' => $request->featured_product,
                'active' =>$request->active
             ]);
             
             $products->save();
             
      
        if($request->hasFile('Imagelibrary'))
        {
         foreach( $request->file('Imagelibrary') as $file)
         {
             $format = $file->getClientOriginalExtension();
             if($format !='jpg' && $format !='jpeg' && $format !='png')
             {
                 return redirect('admin/products/add')->with('thongbao','Không hỗ trợ '.$format);
             }
             $name = $file->getClientOriginalName();
             $img = Str::random(4).'-'.$name;
             while(file_exists("user_asset/images/products/".$img))
             {
              $img = Str::random(4).'-'.$name;
             }
             $request['products_id'] = $products->id;
             $request['image_library'] = $img;
             $file->move('user_asset/images/products',$img);
             Imagelibrary::create($request->all());
         }
        }
    }

        return redirect('admin/products/list')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id)
    {
        $subcategories= Subcategories::all();
        $imagelibrary = Imagelibrary::all();
        $products = Products::find($id);
        $categories = Categories::all();
        $brands = Brands::all();
        return view('admin.products.edit',['categories' => $categories,'products'=> $products,'brands'=>$brands,'imagelibrary'=>$imagelibrary,'subcategories'=>$subcategories]);
    }
    public function postEdit(Request $request,$id)
    {
        $products = Products::find($id);
        $request->validate([
            'name'=> 'required|min:1',
            // 'price'=> 'required|min:1',
            // 'content'=> 'required|min:1'
        ],[
            'name.required'=>'Vui lòng nhập tên sản phẩm',
            'name.min'=>'Tên sản phẩm ít nhất 1 ký tự',
            // 'price.required'=>'Vui lòng nhập giá',
            // 'price.min'=>'Giá ít nhất 1 số',
            // 'content.required'=>'Vui lòng nhập nội dung',
            // 'content.min'=>'Nội dung ít nhất 1 ký tự'
        ]);
        $request['users_id'] = Auth::user()['id'];
        if ($request->hasFile('Image'))
        {
            $file = $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if($format !='jpg' && $format !='png' &&$format !='jpeg')
            {
                return redirect('admin/products/list')->with('thongbao','Không hỗ trợ '.$format);
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4).'-'.$name;
            while(file_exists('user_asset/images/products/'.$img))
            {
                $img = Str::random(4).'-'.$name;
            }
            $file->move('user_asset/images/products',$img);
            if($products['image'] !='')
            {
                File::delete('user_asset/images/products/'.$products['image']);
            }
            $request['image'] = $img;
        }
        if($request->hasFile('imagelibrary'))
        {
         foreach( $request->file('imagelibrary') as $file)
         {
             $format = $file->getClientOriginalExtension();
             if($format !='jpg' && $format !='jpeg' && $format !='png')
             {
                 return redirect('admin/products/add')->with('thongbao','Không hỗ trợ '.$format);
             }
             $name = $file->getClientOriginalName();
             $img = Str::random(4).'-'.$name;
             while(file_exists("user_asset/images/products/".$img))
             {
              $img = Str::random(4).'-'.$name;
             }
             $file->move('user_asset/images/products',$img);
             $request['products_id'] =  $id;
             $request['image_library'] = $img;    
             Imagelibrary::create($request->all()); 
         }
        }
        Products::find($id)->update($request->all());
        return redirect('admin/products/list')->with('thongbao','Update thành công');
    }
    // public function Delete($id)
    // {
    //     $image = Products::find($id);
    //     $imagelibrary= Imagelibrary::where('products_id',$image->id)->get();
    //     if(File::exists('user_asset/images/products/'.$image->image))
    //     {
    //         File::delete('user_asset/images/products/'.$image->image);
    //     }
    //     foreach($imagelibrary as $img)
    //     {
    //         if(File::exists('user_asset/images/products/'.$img->image_library))
    //         {
    //             File::delete('user_asset/images/products/'.$img->image_library);
    //         }
    //     }
    //     $image->delete();
    //     return redirect('admin/products/list')->with('thongbao','Xóa Thành Công');
    // }
    // public function Deleteimages($id)
    // {
    //     $imagelibrary = Imagelibrary::find($id);
    //     if(File::exists('user_asset/images/products/'.$imagelibrary->image_library))
    //     {
    //         File::delete('user_asset/images/products/'.$imagelibrary->image_library);
    //     }
    //     Imagelibrary::find($id)->delete();
    //     return back();
    // }
    public function Deleteimages($id)
    {
        $imagelibrary = Imagelibrary::find($id);
        if(File::exists('user_asset/images/products/'.$imagelibrary->image_library))
        {
            File::delete('user_asset/images/products/'.$imagelibrary->image_library);
        }
        $imagelibrary->delete();
        return response()->json(['success' => 'Delete Successfully']);
        // return redirect()->back();
    }
    public function delete_products($id)
    {
        $image = Products::find($id);
        $imagelibrary= Imagelibrary::where('products_id',$image->id)->get();
        if(File::exists('user_asset/images/products/'.$image->image))
        {
            File::delete('user_asset/images/products/'.$image->image);
        }
        foreach($imagelibrary as $img)
        {
            if(File::exists('user_asset/images/products/'.$img->image_library))
            {
                File::delete('user_asset/images/products/'.$img->image_library);
            }
        }
        $image->delete();
        return response()->json(['success' => 'Delete Successfully']);
       
    }
}
