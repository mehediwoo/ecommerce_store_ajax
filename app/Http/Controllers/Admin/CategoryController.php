<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\sub_category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:categories,title,',
            'on_home'=>'required',
        ]);

        $data = new category;
        $data->title = $request->input('title');
        $data->slug = Str::slug($request->input('title'),'-');
        $data->on_home = $request->input('on_home');
        $result = $data->save();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    public function update(Request $request)
    {
        $id = $request->cat_id;
        $request->validate([
            'title'=>'required|unique:categories,title,'.$id,
        ]);


        $data = category::findOrFail($id);
        $data->title = $request->input('title');
        $data->slug = Str::slug($request->input('title'),'-');
        $data->on_home = $request->input('on_home');
        $result = $data->update();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    // delete
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = category::findOrFail($id);
        if ($data==true) {
            $sub_category = sub_category::where('cate_id',$id)->first();
            if ($sub_category == null) {
                $data->delete();
                return true;
            }else{
                return false;
            }

        }
    }

    // load category table
    public function getCategory()
    {
        $category = category::latest()->get();
        return view('admin.category.ajax.show', compact('category'));
    }

    // status enable & disable
    public function status(Request $request)
    {
        $id = $request->id;
        $data = category::findOrFail($id);
        if ($data->status=='enable') {
            $data->status='disable';
            $data->save();
            return true;
        }else{
            $data->status='enable';
            $data->save();
            return false;
        }
    }
}
