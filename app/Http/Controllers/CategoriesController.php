<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Subcategories;
class CategoriesController extends Controller
{
    public function list()
    {
        $categories = Categories::orderBy('id','DESC')->paginate(10);
        return view('admin.categories.list',['categories' => $categories]);
    }
    public function getEdit($id)
    {
        $categories = Categories::find($id);
        return view('admin.categories.edit',['categories' => $categories]);
    }
    public function getCreate()
    {
        return view ('admin.categories.create');
    }
    public function postCreate(Request $request)
    {
            $request->validate([
                'name' =>'required|unique:categories'
            ],[
                'name.required'=>"Vui lòng nhập tên danh mục",
                'name.unique' =>'Tên danh mục này đã tồn tại'
            ]);
            Categories::create($request->all());
           
            return redirect('admin/categories/list')->with('thongbao','Thêm thành công');
       
    }
    public function postEdit(Request $request,$id)
    {
        $categories = Categories::find($id);
        $request->validate([
            'name' => 'required|unique:categories'
        ],[
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.unique' => 'Tên danh mục này đã tồn tại'
        ]);
        $categories->update($request->all());
        return redirect('admin/categories/list')->with('thongbao','Sửa thành công');
    }
    public function delete_categories($id)
    {
        $check = count(Subcategories::where('cat_id', $id)->get());
        if ($check == 0) 
        {
            Categories::destroy($id);
            return response()->json(['success' => 'Delete Successfully']);
        } 
        else 
        {
            return response()->json(['error' => "Can't delete because Category exist Subcategory"]);
        }
    }
    public function deleteall_categories(Request $request)
    {
        $ids = $request->ids;
        $check = count(Subcategories::where('cat_id', $ids)->get());
        if ($check == 0) 
        {
            Categories::whereIn('id', explode(',', $ids))->delete();
            return response()->json(['success' => "Categories deleted successfully."]);
        } 
        else 
        {
            return response()->json(['error' => "Can't delete because Category exist Subcategory"]);
        }
    }
}
