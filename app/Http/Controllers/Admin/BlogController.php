<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index',compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'publish_date' => 'required|date',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = createSlug($request->title,Blog::class);
        $blog->description = $request->description;
        $blog->publish_date = $request->publish_date;

        if ($request->hasFile('file')) {
            $blog->addMedia($request->file('file'))->toMediaCollection('blog-image');
        }

        $blog->is_visible = $request->is_visible;
        $res = $blog->save();
        if($res){
            return redirect()->back()->with('success','Data Added Successfully');
        }else{
            return redirect()->back()->with('error','Data Not Added, try again!');
        }
    }

    public function show(Blog $blog)
    {
        //
    }

    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit',compact('blog'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'publish_date' => 'required|date',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $blog = Blog::findOrFail($id);
        if($request->title != $blog->title){
            $blog->slug = createSlug($request->title,Blog::class);
        }
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->publish_date = $request->publish_date;

        if ($request->hasFile('file')) {
            $blog->clearMediaCollection('blog-image');
            $blog->addMedia($request->file('file'))->toMediaCollection('blog-image');
        }

        $blog->is_visible = $request->is_visible;
        $res = $blog->update();
        if($res){
            return redirect()->back()->with('success','Data Updated Successfully');
        }else{
            return redirect()->back()->with('error','Data Not Updated, try again!');
        }
    }

    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        if($blog){
            $res = $blog->delete();
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
