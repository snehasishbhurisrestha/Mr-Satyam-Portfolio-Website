<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\GraphicDesign;

class ProjectSiteController extends Controller
{
    // public function index(){
    //     $projects = Project::where('is_visible',1)->get();
    //     return view('site.projects',compact('projects'));
    // }

    public function project_cgi(){
        $projects = Project::where('is_visible',1)
                            ->where('project_type','cgi')
                            ->where('parent_id',NULL)
                            ->orderBy('order')->get();
        return view('site.projects',compact('projects'));
    }
    public function project_cgi_details(string $slug){
        $parent_project = Project::where('slug',$slug)->first();
        if($parent_project){
            $projects = Project::where('is_visible',1)
                                ->where('project_type','cgi')
                                ->where('parent_id',$parent_project->id)
                                ->orderBy('id','desc')->get();
            return view('site.project_details',compact('projects'));
        }else{
            return redirect()->back()->with('error','No Data avaliable');
        }
    }

    public function project_motion_graphic()
    {
        $projects = Project::where('is_visible',1)
                            ->where('project_type','motion_graphic')
                            ->where('parent_id',NULL)
                            ->orderBy('order')->get();
        return view('site.projects',compact('projects'));
    }
    public function project_motion_graphic_details(string $slug)
    {
        $parent_project = Project::where('slug',$slug)->first();
        if($parent_project){
            $projects = Project::where('is_visible',1)
                                ->where('project_type','motion_graphic')
                                ->where('parent_id',$parent_project->id)
                                ->orderBy('id','desc')->get();
            return view('site.project_details',compact('projects'));
        }else{
            return redirect()->back()->with('error','No Data avaliable');
        }
    }

    public function grapic_design(){
        $designs = GraphicDesign::where('graphic_designs_id',null)->where('is_visible',1)->orderBy('id','desc')->get();
        return view('site.graphic_design',compact('designs'));
    }

    public function grapic_design_details(string $slug){
        $design = GraphicDesign::where('slug',$slug)->first();
        if($design){
            $designs = GraphicDesign::where('graphic_designs_id',$design->id)->where('is_visible',1)->first();
            if($designs){
                return view('site.graphic_design_details',compact('designs','design'));
            }else{
                return redirect()->back()->with('error','No Data avaliable');
            }
        }else{
            return redirect()->back()->with('error','404 | Not Found');
        }
    }

    public function project_video_production()
    {
        $projects = Project::where('is_visible',1)
                            ->where('project_type','video_production')
                            ->where('parent_id',NULL)
                            ->orderBy('order')->get();
        return view('site.projects',compact('projects'));
    }
    
    public function project_video_production_details(string $slug)
    {
        $parent_project = Project::where('slug',$slug)->first();
        if($parent_project){
            $projects = Project::where('is_visible',1)
                                ->where('project_type','video_production')
                                ->where('parent_id',$parent_project->id)
                                ->orderBy('id','desc')->get();
            return view('site.project_details',compact('projects'));
        }else{
            return redirect()->back()->with('error','No Data avaliable');
        }
    }
}