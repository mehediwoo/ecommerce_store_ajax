<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\sub_category;
use App\Models\child_category;

class ChildCategoryController extends Controller
{
    public function index()
    {
        $sub_category = sub_category::latest()->get();
        return view('admin.child_category.index', compact('sub_category'));
    }

    public function getChildCategory()
    {
        $child_category = child_category::latest()->get();
        return view('admin.child_category.ajax.show',compact('child_category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:3|unique:child_categories,title',
            'sub_cat_id'=>'required',
        ],[
            'sub_cat_id.required'=>'Please select sub category'
        ]);

        $data = new child_category;
        $data->sub_cat_id = $request->input('sub_cat_id');
        $data->title = $request->input('title');
        $data->slug = Str::slug($request->input('title'),'-');
        $result = $data->save();
        return true;
    }

    public function update(Request $request)
    {
        $id = $request->input('childCateId');
        $request->validate([
            'title'=>'required|min:3|unique:child_categories,title,'.$id,
            'parentSubCategory'=>'required',
        ],[
            'parentSubCategory.required'=>'Please select sub category'
        ]);

        $data = child_category::findOrFail($id);
        $data->sub_cat_id = $request->input('parentSubCategory');
        $data->title = $request->input('title');
        $data->slug = Str::slug($request->input('title'),'-');
        $result = $data->update();
        return true;
    }

    public function destroy(Request $request)
    {
       $id =  $request->input('id');
       $data = child_category::findOrFail($id);
       if ($data) {
            $data->delete();
            return true;
       }else{
            return false;
       }
    }

    // status enable & disable
    public function status(Request $request)
    {
        $id = $request->id;
        $data = child_category::findOrFail($id);
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
