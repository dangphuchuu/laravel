<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategories;
use App\Models\Products;
use App\Models\Categories;
class SubCategoriesController extends Controller
{
    public function list()
    {
        $subcategories = Subcategories::orderBy('id', 'DESC')->paginate(10);
        return view('admin.subcategories.list',['subcategories' => $subcategories]);
    }
    public function Active($id)
    {
        Subcategories::where('id',$id)->update(['active' => 1]);
        return redirect('admin/subcategories/list')->with('thongbao','Update thành công');
    }
    public function Block($id)
    {
        Subcategories::where('id',$id)->update(['active' => 0]);
        return redirect('admin/subcategories/list')->with('thongbao','Update thành công');
    }
    public function getEdit($id)
    {
        $subcategories = Subcategories::find($id);
        $categories = Categories::all();
        return view('admin.subcategories.edit',['subcategories' => $subcategories,'categories'=>$categories]);
    }
    public function getCreate()
    {
        $categories = Categories::all();
        return view ('admin.subcategories.create',['categories' => $categories]);
    }
    public function postCreate(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:subcategories'
        ],[
            'name.required'=>"Vui lòng nhập tên danh mục con",
            'name.unique' =>'Tên danh mục con này đã tồn tại'
        ]);
        $request['sort_name'] = changeTitle($request['name']);
        Subcategories::create($request->all());
        return redirect('admin/subcategories/list')->with('thongbao','Thêm thành công');
    }
    public function postEdit(Request $request,$id)
    {
        $subcategories = Subcategories::find($id);
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên danh mục'
        ]);
        $request['sort_name'] = changeTitle($request['name']);
        $subcategories->update($request->all());
        return redirect('admin/subcategories/list')->with('thongbao','Sửa thành công');
    }
    public function delete_subcategories($id)
    {
        $check = count(Products::where('sub_id', $id)->get());
        if ($check == 0) 
        {
            SubCategories::destroy($id);
            return response()->json(['success' => 'Delete Successfully']);
        } 
        else 
        {
            return response()->json(['error' => "Can't delete because SubCategory exist Product"]);
        }
    }
    public function deleteall_subcategories(Request $request)
    {
        $ids = $request->ids;
        $check = count(Products::where('sub_id', $ids)->get());
        if ($check != 0) 
        {
            return response()->json(['error' => "Can't delete because Category exist Product"]);
            
        } 
        else 
        {
            SubCategories::whereIn('id', explode(',', $ids))->delete();
            return response()->json(['success' => "Categories deleted successfully."]);
        }
    }
}
