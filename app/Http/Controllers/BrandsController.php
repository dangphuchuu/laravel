<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brands;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BrandsController extends Controller
{
    public function list()
    {
        $brands = Brands::orderBy('id', 'DESC')->paginate(10);
        return view('admin.brands.list', ['brands' => $brands]);
    }
    public function Active($id)
    {
        Brands::where('id', $id)->update(['active' => 1]);
        return redirect('admin/brands/list')->with('thongbao', 'Update thành công');
    }
    public function Block($id)
    {
        Brands::where('id', $id)->update(['active' => 0]);
        return redirect('admin/brands/list')->with('thongbao', 'Update thành công');
    }
    public function getEdit($id)
    {
        $brands = Brands::find($id);
        return view('admin.brands.edit', ['brands' => $brands]);
    }
    public function getCreate()
    {
        return view('admin.brands.create');
    }
    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands'
        ], [
            'name.required' => "Vui lòng nhập tên thương hiệu",
            'name.unique' => 'Tên thương hiệu này đã tồn tại'
        ]);
        if ($request->hasFile('Image')) {
            $file =  $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'jpeg' && $format != 'png') {
                return redirect('admin/brands/create')->with('thongbao', 'Không hỗ trợ ' . $format);
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4) . '-' . $name;
            while (file_exists("user_asset/images/brands" . $img)) {
                $img = Str::random(4) . '-' . $name;
            }
            $file->move('user_asset/images/brands', $img);
            $request['image'] = $img;
        }
        Brands::create($request->all());

        return redirect('admin/brands/list')->with('thongbao', 'Thêm thành công');
    }
    public function postEdit(Request $request, $id)
    {
        $brands = Brands::find($id);
        if ($request->hasFile('Image')) {
            $file =  $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'jpeg' && $format != 'png') {
                return redirect('admin/brands/create')->with('thongbao', 'Không hỗ trợ ' . $format);
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4) . '-' . $name;
            while (file_exists("user_asset/images/brands/" . $img)) {
                $img = Str::random(4) . '-' . $name;
            }
            $file->move('user_asset/images/brands/', $img);
            if ($brands->image != '') {
                unlink('user_asset/images/brands/' . $brands->image);
            }
            $request['image'] = $img;
        }
        $brands->update($request->all());
        return redirect('admin/brands/list')->with('thongbao', 'Sửa thành công');
    }
    public function delete_brands($id)
    {
        $check = count(Products::where('brands_id', $id)->get());
        if ($check == 0) {
            $image = Brands::find($id);
            if (File::exists('user_asset/images/brands/' . $image->image)) {
                File::delete('user_asset/images/brands/' . $image->image);
            }
            $image->delete();
            return response()->json(['success' => 'Delete Successfully']);
        } else {
            return response()->json(['error' => "Can't delete because Brand exist Product"]);
        }
    }
    public function deleteall_brands(Request $request)
    {
        $ids = $request->ids;
        $check = count(Products::where('brands_id', $ids)->get());
        $brands = Brands::all();
        if ($check == 0) 
        {
            foreach($brands as $img)
            {
                if(File::exists('user_asset/images/brands/'.$img->image))
                {
                    File::delete('user_asset/images/brands/'.$img->image);
                }
            }
            Brands::whereIn('id', explode(',', $ids))->delete();
            return response()->json(['success' => "Brands deleted successfully."]);
        } else {
            return response()->json(['error' => "Can't delete because Brand exist Product"]);
        }
    }
}
