<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Banner::latest()->first();
        return view('admin.banner.index',compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file1' => 'nullable|mimes:jpg,jpeg,png|max:2048', // 2MB limit
            'file2' => 'nullable|mimes:jpg,jpeg,png|max:2048', // 2MB limit
        ], [
            'file1.max' => 'The laptop image must not exceed 2MB.',
            'file2.max' => 'The mobile image must not exceed 2MB.',
        ]);
        
    
        // Find or create a single row (Ensures only one client entry exists)
        $client = Banner::firstOrCreate([]);
    
        // Handle file uploads
        if ($request->hasFile('file1')) {
            $client->clearMediaCollection('banner-laptop'); // Remove old file
            $client->addMedia($request->file('file1'))->toMediaCollection('banner-laptop');
        }
    
        if ($request->hasFile('file2')) {
            $client->clearMediaCollection('banner-mobile'); // Remove old file
            $client->addMedia($request->file('file2'))->toMediaCollection('banner-mobile');
        }

        return back()->with('success','Saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurClient $ourClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurClient $ourClient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurClient $ourClient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurClient $ourClient)
    {
        //
    }
}
