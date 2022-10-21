<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banners;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class BannersController extends Controller
{
    public function list()
    {
        $banners = Banners::all();
        return view('admin.banners.list',['banners' => $banners]);
    }
    public function getCreate()
    {
        return view('admin.banners.create');
    }
    public function getEdit($id)
    {
        $banners = Banners::find($id);
        return view('admin.banners.edit',['banners' => $banners]);
    }
    public function postCreate(Request $request)
    {
        if($request->hasFile('Image'))
        {
         foreach( $request->file('Image') as $file)
         {
 
             $format = $file->getClientOriginalExtension();
             if($format !='jpg' && $format !='jpeg' && $format !='png')
             {
                 return redirect('admin/banners/add')->with('thongbao','Không hỗ trợ '.$format);
             }
             $name = $file->getClientOriginalName();
             $img = Str::random(4).'-'.$name;
             while(file_exists("user_asset/images/banners/".$img))
             {
              $img = Str::random(4).'-'.$name;
             }
             $file->move('user_asset/images/banners/',$img);
             $request['image'] = $img;
             Banners::create($request->all());
         }
        }
        return redirect('admin/banners/list')->with('thongbao','Thêm thành công');
    }
    public function postEdit(Request $request,$id)
    {
        $banners = Banners::find($id);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if( $format != 'jpg' && $format != 'png' && $format != 'jpeg' )
            {
                return redirect('admin/banners/create')->with('thongbao','Không hỗ trợ'.$format);
            }
            $name = $file->getClientOriginalName();
            $img =Str::random(4).'-'.$name;
            while ( file_exists('user_asset/images/banners/'.$img) ) {
                $img =Str::random(4).'-'.$name;
            }
            $file->move('user_asset/images/banners/',$img );
            if ( $banners->image != '' ) {
                unlink('user_asset/images/banners/'.$banners->image);
            }
            $request['image'] = $img;
        }
        $banners->update($request->all());

        return redirect('admin/banners/list')->with('thongbao','Sửa thành công');
    }
    public function postActive($id) {
        Banners::find($id)->update(['active' => 1]);

        return redirect('admin/banners/list')->with('thongbao','Update thành công');
    }

    //* tắt active
    public function postNoActive($id) {
        Banners::find($id)->update(['active' => 0]);
        return redirect('admin/banners/list')->with('thongbao','Update thành công');
    }

    //* xử lý xóa banners
    public function getDelete($id) 
    {
        $image = Banners::find($id);
        if(File::exists('user_asset/images/banners/'.$image->image))
        {
            File::delete('user_asset/images/banners/'.$image->image);
        }
        $image->delete();
        return redirect('admin/banners/list')->with('thongbao','Xóa Thành Công');
    }
    public function delete_banners($id)
    {
        $image = Banners::find($id);
        if(File::exists('user_asset/images/banners/'.$image->image))
        {
            File::delete('user_asset/images/banners/'.$image->image);
        }
        $image->delete();
        return response()->json(['success' => 'Delete Successfully']);
    }
    public function deleteall_banners(Request $request)
    {
        $ids = $request->ids;
        $banners = Banners::all();
        foreach( $banners as $img)
        {
            if(File::exists('user_asset/images/banners/'.$img->image))
            {
                File::delete('user_asset/images/banners/'.$img->image);
            }
        }
        Banners::whereIn('id', explode(',', $ids))->delete();
        return response()->json(['success' => "Discounts deleted successfully."]);

    }
}
