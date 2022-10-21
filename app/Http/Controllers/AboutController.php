<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Str;
class AboutController extends Controller
{
    public function getEdit() {
        $about = About::find(1);
        return view('admin.about.details',[
            'about' => $about
        ]);
    }
    public function postEdit(Request $request) {
        $about = About::find(1);
        if ($request->hasFile('Image'))
        {
            $file = $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if($format !='jpg' && $format !='png' &&$format !='jpeg')
            {
                return redirect('admin/about')->with('thongbao','Không hỗ trợ '.$format);
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4).'-'.$name;
            while(file_exists('upload/logos/'.$img))
            {
                $img = Str::random(4).'-'.$name;
            }
            $file->move('upload/logos',$img);
            if($about->logo!='')
            {
                unlink('upload/logos/'.$about->logo);
            }
            $request['logo'] = $img;
        }

        $about->update($request->all());

        return redirect('admin/about')->with('thongbao','Thành công');
    }
}
