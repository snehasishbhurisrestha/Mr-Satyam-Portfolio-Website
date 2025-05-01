<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\GraphicDesign;
use Illuminate\Http\Request;

class GraphicDesignController extends Controller
{
    public function index()
    {
        $GraphicDesigns = GraphicDesign::all();
        return view('admin.graphic_design.index',compact('GraphicDesigns'));
    }

    public function create()
    {
        $GraphicDesigns = GraphicDesign::where('graphic_designs_id',null)->get();
        return view('admin.graphic_design.create',compact('GraphicDesigns'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'graphic_designs_id' => 'nullable|exists:graphic_designs,id',
            'description' => 'nullable',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $graphic_design = new GraphicDesign();
        $graphic_design->name = $request->name;
        $graphic_design->slug = createSlug($request->name,GraphicDesign::class);
        $graphic_design->graphic_designs_id = $request->graphic_designs_id;
        $graphic_design->description = $request->description;
        $graphic_design->is_visible = $request->is_visible;

        if ($request->hasFile('file')) {
            $graphic_design->addMedia($request->file('file'))->toMediaCollection('graphic-design');
        }

        $res = $graphic_design->save();
        if($res){
            return redirect()->back()->with('success','Data Added Successfully');
        }else{
            return redirect()->back()->with('error','Data Not Added, try again!');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $item = GraphicDesign::findOrFail($id);
        $GraphicDesigns = GraphicDesign::where('graphic_designs_id', null)
                                ->where('id', '!=', $item->id ?? 0)
                                ->get();

        return view('admin.graphic_design.edit',compact('GraphicDesigns','item'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'graphic_designs_id' => 'nullable|exists:graphic_designs,id',
            'description' => 'nullable',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $graphic_design = GraphicDesign::findOrFail($id);
        if($graphic_design->name != $request->name){
            $graphic_design->name = $request->name;
            $graphic_design->slug = createSlug($request->name,GraphicDesign::class);
        }
        $graphic_design->graphic_designs_id = $request->graphic_designs_id;
        $graphic_design->description = $request->description;
        $graphic_design->is_visible = $request->is_visible;

        if ($request->hasFile('file')) {
            $graphic_design->clearMediaCollection('graphic-design');
            $graphic_design->addMedia($request->file('file'))->toMediaCollection('graphic-design');
        }

        $res = $graphic_design->update();
        if($res){
            return redirect()->back()->with('success','Data Updated Successfully');
        }else{
            return redirect()->back()->with('error','Data Not Updated, try again!');
        }
    }

    public function destroy(string $id)
    {
        $GraphicDesign = GraphicDesign::findOrFail($id);
        if($GraphicDesign){
            $res = $GraphicDesign->delete();
            if($res){
                return back()->with('success','Deleted Successfully');
            }else{
                return back()->with('error','Not Deleted');
            }
        }else{
            return back()->with('error','Not Found');
        }
    }
}
