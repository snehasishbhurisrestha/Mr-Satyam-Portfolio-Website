<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index',compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'nullable|max:255',
            'description' => 'nullable',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->address = $request->address;
        $testimonial->description = $request->description;
        $testimonial->rating = $request->rating ?? 0;

        if ($request->hasFile('file')) {
            $testimonial->addMedia($request->file('file'))->toMediaCollection('testimonial-image');
        }

        $testimonial->is_visible = $request->is_visible;
        $res = $testimonial->save();
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
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit',compact('testimonial'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'nullable|max:255',
            'description' => 'nullable',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $request->name;
        $testimonial->address = $request->address;
        $testimonial->description = $request->description;
        $testimonial->rating = $request->rating ?? 0;

        if ($request->hasFile('file')) {
            $testimonial->clearMediaCollection('testimonial-image');
            $testimonial->addMedia($request->file('file'))->toMediaCollection('testimonial-image');
        }

        $testimonial->is_visible = $request->is_visible;
        $res = $testimonial->update();
        if($res){
            return redirect()->back()->with('success','Data Update Successfully');
        }else{
            return redirect()->back()->with('error','Data Not Update, try again!');
        }
    }

    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if($testimonial){
            $res = $testimonial->delete();
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
