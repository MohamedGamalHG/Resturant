<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\TitleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Traits\SaveImageTrait;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use SaveImageTrait;
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TitleRequest $request)
    {

        $imagename =  isset($request->photo)  ? $this->SaveImage($request->photo,'backend/Images') :'default.png';

        $save = Slider::create([
            'title'         => $request->title,
            'sub_title'     => $request->sub_title,
            'image'         => $imagename
        ]);

        if($save)
            return redirect()->route('slider.index');
        else
            return  redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editslider = Slider::find($id);
        return view('admin.slider.edit',compact('editslider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TitleRequest $request, $id)
    {

        $imagename =  isset($request->photo)  ? $this->SaveImage($request->photo,'backend/Images') :'default.png';

        $slider = Slider::where('id',$id)->update([
            'title'         => $request->title,
            'sub_title'     => $request->sub_title,
            'image'         => $imagename
        ]);

        return redirect()->route('slider.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        /*
         * unlink('backend/Images/'.$slider->image);
         *
         * the code is delete the image but we need image don't deltete it so for that reason we will
         * make comment to this code
        */
        $slider->delete();
        return redirect()->back();
    }
}
