<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectMotionGraphicController extends Controller
{
    public function index()
    {
        $projects = Project::where('project_type','motion_graphic')->get();
        return view('admin.project_motion_graphics.index',compact('projects'));
    }

    public function create()
    {
        $project_motion_graphics = Project::where('parent_id',null)->where('project_type','motion_graphic')->get();
        return view('admin.project_motion_graphics.create',compact('project_motion_graphics'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'video_link' => 'nullable',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $project = new Project();
        $project->name = $request->name;
        $project->parent_id = $request->parent_id;
        $project->video_link = $request->video_link;
        $project->is_visible = $request->is_visible;
        $project->project_type = 'motion_graphic';
        if ($request->hasFile('file')) {
            $project->addMedia($request->file('file'))->toMediaCollection('project-motion-graphics');
        }
        $res = $project->save();
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
        $project = Project::findOrFail($id);
        $project_motion_graphics = Project::where('parent_id', null)
                                ->where('id', '!=', $project->id ?? 0)
                                ->where('project_type','motion_graphic')
                                ->get();
        return view('admin.project_motion_graphics.edit',compact('project','project_motion_graphics'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'video_link' => 'nullable',
            'is_visible' => 'required|in:0,1'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $project = Project::findOrFail($id);
        $project->name = $request->name;
        $project->parent_id = $request->parent_id;
        $project->video_link = $request->video_link;
        $project->is_visible = $request->is_visible;
        if ($request->hasFile('file')) {
            $project->clearMediaCollection('project-motion-graphics');
            $project->addMedia($request->file('file'))->toMediaCollection('project-motion-graphics');
        }
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
