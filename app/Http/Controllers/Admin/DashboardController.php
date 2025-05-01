<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\Project;
use App\Models\GraphicDesign;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index(){
        $testimonial = Testimonial::all()->count();
        $contact = Contact::all()->count();
        $blog = Blog::all()->count();
        $graphic_design = GraphicDesign::all()->count();
        $project_cgi = Project::where('project_type','cgi')->count();
        $motion_graphic = Project::where('project_type','motion_graphic')->count();
        return view('dashboard',compact('testimonial','blog','graphic_design','contact','project_cgi','motion_graphic'));
    }
}
