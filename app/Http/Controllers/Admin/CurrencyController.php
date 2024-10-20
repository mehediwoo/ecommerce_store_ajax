<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\currency;

class CurrencyController extends Controller
{
    public function index()
    {
        return view('admin.setting.currency.index');
    }
    // Show currency data
    public function getCurrency()
    {
        $currency = currency::latest()->get();
        return view('admin.setting.currency.ajax.show', compact('currency'));
    }
    // insert currency data
    public function store(Request $request)
    {
        $request->validate([
            'c_name'=>'required|unique:currencies,c_name',
            'c_code'=>'required|unique:currencies,c_code',
            'c_symble'=>'required|unique:currencies,c_symbol',
        ],[
            'c_name.required'=>'Currency name must be filledout!',
            'c_name.unique'=>'Currency name allready been taken!',
            'c_code.required'=>'Currency code must be filledout',
            'c_code.unique'=>'Currency code allready been taken',
            'c_symble.required'=>'Currency Symble must be filledout',
            'c_symble.unique'=>'Currency Symble allready been taken',
        ]);

        $data = new currency;
        $data->c_name= $request->input('c_name');
        $data->c_code= $request->input('c_code');
        $data->c_symbol= $request->input('c_symble');
        $data->save();
    }
    // update currency
    public function update(Request $request)
    {
        $id = $request->c_id;
        $request->validate([
            'c_name'=>'required|unique:currencies,c_name,'.$id,
            'c_code'=>'required|unique:currencies,c_code,'.$id,
            'c_symble'=>'required|unique:currencies,c_symbol,'.$id,
        ],[
            'c_name.required'=>'Currency name must be filledout!',
            'c_name.unique'=>'Currency name allready been taken!',
            'c_code.required'=>'Currency code must be filledout',
            'c_code.unique'=>'Currency code allready been taken',
            'c_symble.required'=>'Currency Symble must be filledout',
            'c_symble.unique'=>'Currency Symble allready been taken',
        ]);

        $data =  currency::findOrFail($id);
        $data->c_name= $request->input('c_name');
        $data->c_code= $request->input('c_code');
        $data->c_symbol= $request->input('c_symble');
        $data->update();
    }
    // Delete currency
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = currency::findOrFail($id);
        $data->delete();
    }
}
