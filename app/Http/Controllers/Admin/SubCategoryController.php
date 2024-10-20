<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\category;
use App\Models\sub_category;
use App\Models\child_category;

class SubCategoryController extends Controller
{
    public function index()
    {
        $category = category::latest()->get();
        return view('admin.sub_category.index', compact('category'));
    }

    public function getSubCategory()
    {
        $sub_category = sub_category::latest()->get();
        return view('admin.sub_category.ajax.show', compact('sub_category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:sub_categories,title,e',
            'category'=>'required'
        ]);

        $data = new sub_category;
        $data->title = $request->input('title');
        $data->slug = Str::slug( $request->input('title'),'-');
        $data->cate_id = $request->input('category');
        $result = $data->save();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    public function update(Request $request)
    {
        $id = $request->input('subCategoryId');
        $request->validate([
            'title'=>'required|unique:sub_categories,title,'.$id,
            'parentCategory'=>'required'
        ],[
            'parentCategory.required'=>'Please select parent category'
        ]);

        $data = sub_category::findOrFail($id);
        $data->title = $request->input('title');
        $data->slug = Str::slug( $request->input('title'),'-');
        $data->cate_id = $request->input('parentCategory');
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
        $data = sub_category::findOrFail($id);
        if ($data) {
            $child_category = child_category::where('sub_cat_id',$id)->first();
            if ($child_category == null) {
                $data->delete();
                return true;
            }else{
                return false;
            }
        }
    }

    public function status(Request $request)
    {
        $id = $request->input('id');
        $data = sub_category::findOrFail($id);
        if ($data->status=='enable') {
            $data->status = 'disable';
            $data->update();
            return true;
        }else{
            $data->status = 'enable';
            $data->update();
            return false;
        }
    }
}
