<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discounts;
class DiscountsController extends Controller
{
    public function list()
    {
        $discounts = Discounts::orderBy('id','DESC')->Paginate(10);
        return view('admin.discounts.list',['discounts' => $discounts]);
    }
    public function Active($id)
    {
        Discounts::where('id',$id)->update(['active' => 1]);
        return redirect('admin/discounts/list')->with('thongbao','Update thành công');
    }
    public function Block($id)
    {
        Discounts::where('id',$id)->update(['active' => 0]);
        return redirect('admin/discounts/list')->with('thongbao','Update thành công');
    }
    public function getEdit($id)
    {
        $discounts = Discounts::find($id);
        return view('admin.discounts.edit',['discounts' => $discounts]);
    }
    public function getCreate()
    {
        return view ('admin.discounts.create');
    }
    public function postCreate(Request $request)
    {
        $request->validate([
            'code' =>'required|unique:discounts',
            'discounts' =>'numeric|min:0|max:100'
        ],[
            'code.required'=>"Vui lòng nhập code",
            'code.unique' =>'Code này đã tồn tại',
            'discounts.max'=>"Mã giảm tối đa là 100",
            'discounts.min'=>"Mã giảm tối thiểu là 0"
        ]);
        Discounts::create($request->all());

        return redirect('admin/discounts/list')->with('thongbao','Thêm thành công');
    }
    public function postEdit(Request $request,$id)
    {
        $discounts = Discounts::find($id);
        $request->validate([
            'code' => 'required',
            'discounts' =>'numeric|min:0|max:100'
        ],[
            'code.required' => 'Vui lòng nhập code',
            'discounts.max'=>"Mã giảm tối đa là 100",
            'discounts.min'=>"Mã giảm tối thiểu là 0"
        ]);
        $discounts->update($request->all());
        return redirect('admin/discounts/list')->with('thongbao','Sửa thành công');
    }
    public function delete_discounts($id)
    {
            Discounts::destroy($id);
            return response()->json(['success' => 'Delete Successfully']);
    }
    public function deleteall_discounts(Request $request)
    {
            $ids = $request->ids;
            Discounts::whereIn('id', explode(',', $ids))->delete();
            return response()->json(['success' => "Discounts deleted successfully."]);

    }
}
