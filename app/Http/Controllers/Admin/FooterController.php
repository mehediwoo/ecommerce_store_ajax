<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\footer;
use App\Models\social;
use App\Models\currency;

class FooterController extends Controller
{
    public function index()
    {
        $footer_data = footer::first();
        $social_data = social::first();
        //$banner_data = banner::first();
        $d_currency  = currency::latest()->get();
        return view('admin.setting.footer.index', compact('footer_data','social_data','d_currency',));
    }
    // Footer Update
    public function FooterUpdate(Request $request)
    {
        $request->validate([
            'logo'=>'required',
            'd_currency'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required',
        ]);

        $data = footer::first();
        $data->logo = $request->input('logo');
        $data->default_currency = $request->input('d_currency');
        $data->phone = $request->input('phone');
        $data->email = $request->input('email');
        $data->address = $request->input('address');
        $data->copyright = $request->input('copyright');
        $data->save();
    }
    // social medi update
    public function social(Request $request)
    {
        $data = social::first();
        $data->facebook  = $request->input('facebook');
        $data->twitter  = $request->input('twitter');
        $data->instagram  = $request->input('instagram');
        $data->tiktok  = $request->input('tiktok');
        $data->linkedin  = $request->input('linkedin');
        $data->youtube  = $request->input('youtube');
        $data->google  = $request->input('google');
        $data->save();
    }
    // Banner
    public function banner(Request $request)
    {
        $data = banner::first();
        $data->headline = $request->input('headline');

        $folder = 'banner';

        if (!file_exists(base_path('storage/app/public/').$folder)) {
            mkdir(base_path('storage/app/public/').$folder,755,true);
        }

        if ($request->hasFile('banner')) {
            if (file_exists(base_path('storage/app/public/'.$data->banner))) {
                unlink(base_path('storage/app/public/'.$data->banner));
            }
            $banner = $request->file('banner');
            $name = Str::random(10).'.'.$banner->extension();
            $image = Image::make($banner)->resize(1420,535);
            $image->save(base_path('storage/app/public/').$folder.'/'.$name);
            $data->banner= $folder.'/'.$name;
        }
        $data->save();
    }
}
