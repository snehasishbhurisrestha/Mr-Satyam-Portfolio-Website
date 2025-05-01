<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index',compact('projects'));
    }

    public function index_motion_graphic()
    {
        $projects = Project::where('project_type','motion_graphic')->get();
        return view('admin.project.index',compact('projects'));
    }
    
    public function index_cgi()
    {
        $projects = Project::where('project_type','cgi')->get();
        return view('admin.project.index',compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'video_link' => 'required',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $project = new Project();
        $project->name = $request->name;
        $project->video_link = $request->video_link;
        $project->is_visible = $request->is_visible;
        $res = $project->save();
        if($res){
            return redirect()->back()->with('success','Data Added Successfully');
        }else{
            return redirect()->back()->with('error','Data Not Added, try again!');
        }
    }

    public function show(Project $project)
    {
        //
    }

    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project.edit',compact('project'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'video_link' => 'required',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $project = Project::findOrFail($id);
        $project->name = $request->name;
        $project->video_link = $request->video_link;
        $project->is_visible = $request->is_visible;
        $res = $project->update();
        if($res){
            return redirect()->back()->with('success','Data Updated Successfully');
        }else{
            return redirect()->back()->with('error','Data Not Updated, try again!');
        }
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        if($project){
            $res = $project->delete();
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
