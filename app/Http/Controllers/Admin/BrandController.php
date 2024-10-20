<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Models\brand;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }

    public function getBrand()
    {
        $brand = brand::latest()->get();
        return view('admin.brand.ajax.show')->with('brand',$brand);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:20|unique:brands,title,',
            'logo' =>'required|image',
        ]);

        $data = new brand;
        $data->title = $request->input('title');
        $data->slug = strtolower(Str::slug($request->input('title'),'-'));

        // Brand image logo
        $folder = 'brand_logo';

        if(!file_exists(base_path('storage/app/public/'). $folder)){
            mkdir(base_path('storage/app/public/') . $folder,755,true);
        }

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $name  = Str::random(25).".".$logo->extension();
            $image = Image::make($logo)->resize(80,40);
            $image->save(base_path('storage/app/public/').$folder."/".$name);
            $data->logo = $folder."/".$name;
        }

        $result = $data->save();
        if ($data==true) {
            return true;
        }else{
            return false;
        }
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $request->validate([
            'title'=>'required|max:20|unique:brands,title,'.$id,
            'logo' =>'image',
        ]);


        $data = brand::findOrFail($id);
        $data->title = $request->input('title');
        $data->slug =Str::slug($request->input('title'));

        $folder = 'brand_logo';

        if($request->hasFile('logo')){
            if (file_exists(base_path('storage/app/public/'.$data->logo))) {
                unlink(
                    base_path('storage/app/public/'.$data->logo)
                );
            }
            $logo = $request->file('logo');
            $name  = Str::random(25).".".$logo->extension();
            $image = Image::make($logo)->resize(80,40);
            $image->save(base_path('storage/app/public/').$folder."/".$name);
            $data->logo = $folder."/".$name;
        }
        $result = $data->update();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $data = brand::findOrFail($id);
        if ($data==true) {
            if (file_exists(base_path('storage/app/public/'.$data->logo))) {
                unlink(base_path('storage/app/public/'.$data->logo));
            }
            $delete = $data->delete();
            return true;
        }
    }

    public function status(Request $request)
    {
        $id = $request->id;
        $data = brand::findOrFail($id);
        if ($data->status=='enable') {
            $data->status='disable';
            $data->update();
            return true;
        }else{
            $data->status='enable';
            $data->update();
            return false;
        }
    }
}
