<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\Category; 
use App\Models\Slider; 
use Carbon\Carbon; 
use Illuminate\Http\Request; 

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }


    public function create()
    {  
        return view('admin.sliders.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->photo) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('photo')->hashName());
            $request->file('photo')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['photo'] = $date . '.' . $ext[1];
        }

        $slider = Slider::create($data);
        return redirect()->route('admin.sliders.index');
    }


    public function edit($id)
    {
        $slider = Slider::find($id); 

        return view('admin.sliders.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $slider=Slider::find($id);
        $data = $request->all();

        if ($request->photo) {
            $date = Carbon::now()->micro;
            $ext = explode('.', $request->file('photo')->hashName());
            $request->file('photo')->storeAs(
                'public/attachment', $date . '.' . $ext[1]
            );
            $data['photo'] = $date . '.' . $ext[1];
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index');
    }


    public function destroy($id)
    {
        $slider=Slider::find($id);
        $slider->delete();
        return back();
    }
}
