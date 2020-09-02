<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Traits\SaveImageTrait;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    use SaveImageTrait;
    public function index()
    {
        $item = Item::all();
        $it = Item::with(['categories'=>function($q){
            $q->select('name','id');
        }])->get();
        //$name_item_cat = $it->categories;
        //return $name_item_cat;
        $i = 0;$array = [];
        foreach ($it as $its)
        {
            $array[$i] = $its->categories->name;
            $i++;
        }

        return view('admin.item.index',compact('item','array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = Category::select('id','name')->get();
       return view('admin.item.create',compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        if(isset($request))
        {
            $cat_name = $request->cat_id;
            $get_cat_id = Category::select('id')->where('name',$cat_name)->get();
            foreach($get_cat_id as $cat) $cat_id =  $cat->id;

            $image = isset($request->image) ? $this->SaveImage($request->image,'backend/Images/Item') : 'default.jpg';
            $item = Item::create([
                'name'               => $request->name,
                'description'        => $request->description,
                'price'              => $request->price,
                'image'              => $image,
                'category_id'        => $cat_id
            ]);

            return redirect()->route('item.index');
        }
        else
            return redirect()->back();


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
        $it = Category::select('name')->get();
        $item = Item::select('id','name','description','price')->find($id);
        return view('admin.item.edit',compact('item','it'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if(isset($request))
        {
            $item = Item::find($id);
            $cat_name = $request->cat_id;
            $get_cat_id = Category::select('id')->where('name',$cat_name)->get();
            foreach($get_cat_id as $cat) $cat_id =  $cat->id;

            $image = isset($request->image) ? $this->SaveImage($request->image,'backend/Images/Item') : 'default.jpg';

            $item->update([
                'name'               => $request->name,
                'description'        => $request->description,
                'price'              => $request->price,
                'image'              => $image,
                'category_id'        => $cat_id
            ]);

            return redirect()->route('item.index');
        }
        else
            return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id)->delete();
        return redirect()->route('item.index');
    }
}
