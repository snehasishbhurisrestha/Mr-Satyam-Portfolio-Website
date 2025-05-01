<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Product;
use App\Models\GraphicDesign;
use App\Models\OurClient;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index(){
        $testimonials = Testimonial::where('is_visible',1)->get();
        $blogs = Blog::where('is_visible',1)->orderBy('id','desc')->get();
        $products = Product::where('is_visible',1)->get();
        $client = OurClient::latest()->first();
        $banner = Banner::latest()->first();
        return view('site.index',compact('testimonials','blogs','products','client','banner'));
    }

    public function blog_details(string $slug){
        $blog = Blog::where('slug',$slug)->first();
        if($blog){
            return view('site.blog_details',compact('blog'));
        }else{
            return redirect()->back()->with('error','404 | Not Found');
        }
    }
}
