<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function create()
    {
       return view('admin.pages.insert-color');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'colorName' => 'required|min:2',
        ]);

        $item = new Color;

        $unique=Color::all();

        $Name=strtolower($request->colorName);
        foreach ($unique as $value){
            if ($value->colorName == ucfirst($Name)){
                session()->flash('warning', 'Color already exist..!!!');
                return back();
            }
        }

        $item->colorName = ucfirst($Name);
        $success=$item->save();
        if ($success){
            session()->flash('massage', 'Color Successfully Save....!');
        }

        return back();
    }

}
