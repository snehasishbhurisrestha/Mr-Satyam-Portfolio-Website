<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectCGIController extends Controller
{
    public function index()
    {
        $projects = Project::where('project_type','cgi')->get();
        $projects_parent = Project::where('project_type','cgi')->where('parent_id',null)->orderBy('order')->get();
        return view('admin.project_cgi.index',compact('projects','projects_parent'));
    }

    public function create()
    {
        $projectcgis = Project::where('parent_id',null)->where('project_type','cgi')->get();
        return view('admin.project_cgi.create',compact('projectcgis'));
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
        $project->slug = createSlug($request->name, Project::class);
        $project->parent_id = $request->parent_id;
        $project->video_link = $request->video_link;
        $project->is_visible = $request->is_visible;
        $project->project_type = 'cgi';
        if ($request->hasFile('file')) {
            $project->addMedia($request->file('file'))->toMediaCollection('project-cgi');
        }
        if ($request->hasFile('file2')) {
            $project->addMedia($request->file('file2'))->toMediaCollection('project-cgi-details');
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
        $projectcgis = Project::where('parent_id', null)
                                ->where('id', '!=', $project->id ?? 0)
                                ->where('project_type','cgi')
                                ->get();
        return view('admin.project_cgi.edit',compact('project','projectcgis'));
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
        // $project->name = $request->name;
        // $project->slug = createSlug($request->name, Project::class);
        if(($project->name != $request->name) || empty($project->slug) ){
            $project->name = $request->name;
            $project->slug = createSlug($request->name, Project::class);
        }
        $project->parent_id = $request->parent_id;
        $project->video_link = $request->video_link;
        $project->is_visible = $request->is_visible;
        if ($request->hasFile('file')) {
            $project->clearMediaCollection('project-cgi');
            $project->addMedia($request->file('file'))->toMediaCollection('project-cgi');
        }
        if ($request->hasFile('file2')) {
            $project->clearMediaCollection('project-cgi-details');
            $project->addMedia($request->file('file2'))->toMediaCollection('project-cgi-details');
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

    public function updateParentOrder(Request $request)
    {
        // return $request->order;
        foreach ($request->order as $item) {
            Project::where('id', $item['id'])
                ->whereNull('parent_id') // ensure only parent records are updated
                ->where('project_type','cgi')
                ->update(['order' => $item['position']]);
        }

        return response()->json(['status' => 'success']);
    }
}
