<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\page;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.page.index');
    }
    // Get page list
    public function getPage()
    {
        $page = page::latest()->get();
        return view('admin.page.ajax.show', compact('page'));
    }
    // Insert data
    public function store(Request $request)
    {
        $request->validate([
            'page_title'=> 'required|unique:pages,page_title',
            'page_content'=> 'required',
        ],[
            'page_title.required'=>'Page title is empty!',
            'page_content.required'=>'Page content is empty!',
        ]);
        $data = new page;
        $data->page_title = $request->input('page_title');
        $data->page_slug  = Str::slug($request->input('page_title'),'-');
        $data->page_content  = $request->input('page_content');
        $result = $data->save();
        if ($result) {
            return true;
        }else{
            return false;
        }
    }
    // update page
    public function update(Request $request)
    {
        $id = $request->edit_id;
        $request->validate([
            'page_title'=> 'required|unique:pages,page_title,'.$id,
            'page_content'=> 'required',
        ],[
            'page_title.required'=>'Page title is empty!',
            'page_content.required'=>'Page content is empty!',
        ]);


        $data = page::findOrFail($id);
        $data->page_title = $request->input('page_title');
        $data->page_slug  = Str::slug($request->input('page_title'),'-');
        $data->page_content  = $request->input('page_content');
        $result = $data->update();
        if ($result) {
            return true;
        }else{
            return false;
        }

    }
    // Delete Page
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = page::findOrFail($id);
        if ($data) {
            $data->delete();
            return true;
        }else{
            return false;
        }
    }
    // Page status changes
    public function status(Request $request)
    {
        $id = $request->id;
        $data = page::findOrFail($id);
        if ($data->status=='enable') {
            $data->status='disable';
            $data->update();
            return 0;
        }else{
            $data->status='enable';
            $data->update();
            return 1;
        }
    }
}
