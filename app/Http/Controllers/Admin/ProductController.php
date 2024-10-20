<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
use App\Models\product;
use App\Models\category;
use App\Models\sub_category;
use App\Models\child_category;
use App\Models\brand;

class ProductController extends Controller
{
    public function index()
    {
        $brand = brand::latest()->get();
        $category = category::latest()->get();
        return view('admin.product.index', compact('brand','category'));
    }


    // insert product
    public function store(Request $request)
    {
        $request->validate([
            'p_title'=>'required',
            'p_cate'=>'required',
            'p_subcate'=>'required',
            'p_brand'=>'required',
            'p_units'=>'required',
            'p_size'=>'required',
            'p_color'=>'required',
            'p_qty'=>'required',
            'alert_qty'=>'required',
            'p_cost'=>'required',
            'price'=>'required',
            'discount_price'=>'required',
            'short_desc'=>'required',
            'description'=>'required',
            'thumbnail'=>'required|image',
            'p_image'=>'image',
        ],[
            'p_title.required'=>'Title field is required!',
            'p_cate.required'=>'Category field is required!',
            'p_subcate.required'=>'Sub category field is required!',
            'p_brand.required'=>'Brand field is required!',
            'p_units.required'=>'Units field is required!',
            'p_size.required'=>'Size field is required!',
            'p_color.required'=>'Color field is required!',
            'p_qty.required'=>'Quantity field is required!',
            'alert_qty.required'=>'Alert quantity field is required!',
            'p_cost.required'=>'Product cost field is required!',
            'price.required'=>'Price field is required!',
            'p_image.image'=>'The product image field is must be an images!',
        ]);

        $data = new product;
        $data->cat_id = $request->input('p_cate');
        $data->sub_cat_id = $request->input('p_subcate');
        $data->child_cat_id = $request->input('p_childcate');
        $data->brand_id = $request->input('p_brand');
        $data->p_title = $request->input('p_title');
        $data->p_slug = Str::slug($request->input('p_title'),'-');
        $data->p_code = rand(1000,100000);
        $data->p_meta_tags = $request->input('p_tag');
        $data->p_unit = $request->input('p_units');
        $data->p_size = $request->input('p_size');
        $data->p_color = $request->input('p_color');
        $data->p_qty = $request->input('p_qty');
        $data->p_alert_qty = $request->input('alert_qty');
        $data->p_cost = $request->input('p_cost');
        $data->p_price = $request->input('price');
        $data->p_discount_price = $request->input('discount_price');
        $data->p_meta_desc = $request->input('meta_desc');
        $data->p_short_desc = $request->input('short_desc');
        $data->p_desc = $request->input('description');
        $data->feature = $request->input('feature_p');
        $data->hot_deal = $request->input('hot_deal');
        $data->slide_product = $request->input('show_on_slider');
        $data->admin_id = '2';

        $folder ='product/'. Carbon::now()->year . '/' . Carbon::now()->month . '/' . Carbon::now()->day;
        if (!file_exists(base_path('storage/app/public/') . $folder)) {
            mkdir(base_path('storage/app/public/') . $folder, 755, true);
        }

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $name = Str::random(25).'.'.$thumbnail->extension();
            $image = Image::make($thumbnail)->resize(600,600);
            $image->save(base_path('storage/app/public/'.$folder.'/'.$name));
            $data->thumbnail = $folder.'/'.$name;
        }
        // Multiple images upload
        $a=array();
        if ($request->hasFile('p_img')) {
            $multiImage = $request->file('p_img');
            foreach ($multiImage as $singleimage) {

                $name = Str::random(25).'.'.$singleimage->extension();
                $image = Image::make($singleimage)->resize(600,600);
                $image->save(base_path('storage/app/public/'.$folder.'/'.$name));
                array_push($a,$folder.'/'.$name);
            }
            $data->p_image = implode(',',$a);
        }

        $result = $data->save();
        if ($result) {
            return response()->json($result);
        }else{
            return response()->json($result);
        }
    }
    // Show product
    public function show()
    {
        $product = product::latest()->get();
        return view('admin.product.ajax.show', compact('product'));
    }
    // Delete product
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = product::findOrFail($id);
        if ($data) {
            if(file_exists(base_path('storage/app/public/'.$data->thumbnail)) && $data->thumbnail != null){
                unlink(base_path('storage/app/public/'.$data->thumbnail));
            }
            if ($data->p_image!='') {
                foreach(explode(",",$data->p_image) as $image){
                    if(file_exists(base_path('storage/app/public/'.$image))){
                        unlink(base_path('storage/app/public/'.$image));
                    }
                }
            }

            $data->delete();
            return true;
        }else{
            return false;
        }
    }
    // update product
    public function update(Request $request)
    {
        $id = $request->product_id;
        $request->validate([
            'title'=>'required',
            'p_cate'=>'required',
            'p_subcate'=>'required',
            'p_brand'=>'required',
            'p_units'=>'required',
            'p_size'=>'required',
            'p_color'=>'required',
            'p_qty'=>'required',
            'alert_qty'=>'required',
            'p_cost'=>'required',
            'price'=>'required',
            'discount_price'=>'required',
            'short_desc'=>'required',
            'description'=>'required',
            'thumbnail'=>'image',
            'p_image'=>'image',
        ],[
            'title.required'=>'Title field is required!',
            'p_cate.required'=>'Category field is required!',
            'p_subcate.required'=>'Sub category field is required!',
            'p_brand.required'=>'Brand field is required!',
            'p_units.required'=>'Units field is required!',
            'p_size.required'=>'Size field is required!',
            'p_color.required'=>'Color field is required!',
            'p_qty.required'=>'Quantity field is required!',
            'alert_qty.required'=>'Alert quantity field is required!',
            'p_cost.required'=>'Product cost field is required!',
            'price.required'=>'Price field is required!',
            'p_image.image'=>'The product image field is must be an images!',
        ]);

        $data = product::findOrFail($id);
        $data->cat_id = $request->input('p_cate');
        $data->sub_cat_id = $request->input('p_subcate');
        $data->child_cat_id = $request->input('p_childcate');
        $data->brand_id = $request->input('p_brand');
        $data->p_title = $request->input('title');
        $data->p_slug = Str::slug($request->input('title'),'-');
        $data->p_code = rand(1000,100000);
        $data->p_meta_tags = $request->input('p_tag');
        $data->p_unit = $request->input('p_units');
        $data->p_size = $request->input('p_size');
        $data->p_color = $request->input('p_color');
        $data->p_qty = $request->input('p_qty');
        $data->p_alert_qty = $request->input('alert_qty');
        $data->p_cost = $request->input('p_cost');
        $data->p_price = $request->input('price');
        $data->p_discount_price = $request->input('discount_price');
        $data->p_meta_desc = $request->input('meta_desc');
        $data->p_short_desc = $request->input('short_desc');
        $data->p_desc = $request->input('description');
        $data->feature = $request->input('feature_p');
        $data->hot_deal = $request->input('hot_deal');
        $data->slide_product = $request->input('show_on_slider');
        $data->admin_id = '2';

        $folder ='product/'.Carbon::now()->year . '/' . Carbon::now()->month . '/' . Carbon::now()->day;
        if (!file_exists(base_path('storage/app/public/') . $folder)) {
            mkdir(base_path('storage/app/public/') . $folder, 755, true);
        }

        if ($request->hasFile('thumbnail')) {
            if (file_exists(base_path('storage/app/public/'.$data->thumbnail))) {
                unlink(base_path('storage/app/public/'.$data->thumbnail));
            }
            $thumbnail = $request->file('thumbnail');
            $name = Str::random(25).'.'.$thumbnail->extension();
            $image = Image::make($thumbnail)->resize(600,600);
            $image->save(base_path('storage/app/public/'.$folder.'/'.$name));
            $data->thumbnail = $folder.'/'.$name;
        }
        // Multiple images upload
        $a=array();
        if ($request->hasFile('p_img')) {
            foreach (explode(',',$data->p_image) as $value) {
                if (file_exists(base_path('storage/app/public/'.$value)) && $data->p_image !='') {
                    unlink(base_path('storage/app/public/'.$value));
                }
            }
            $multiImage = $request->file('p_img');
            foreach ($multiImage as $singleimage) {

                $name = Str::random(25).'.'.$singleimage->extension();
                $image = Image::make($singleimage)->resize(600,600);
                $image->save(base_path('storage/app/public/'.$folder.'/'.$name));
                array_push($a,$folder.'/'.$name);
            }
            $data->p_image = implode(',',$a);
        }

        $result = $data->update();
        if ($result) {
            return response()->json($result);
        }else{
            return response()->json($result);
        }
    }
    // product status change
    public function status(Request $request)
    {
        $id = $request->id;
        $data = product::findOrFail($id);
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

    // Get Sub Category for insert product
    public function getSubCategory(Request $request)
    {
        $id = $request->id;
        $subCat = sub_category::where('cate_id',$id)->get();
        return response()->json($subCat);
    }
    // Get Child Category for insert product
    public function getChildCategory(Request $request)
    {
        $id = $request->id;
        $childCat = child_category::where('sub_cat_id',$id)->get();
        return response()->json($childCat);
    }


}
