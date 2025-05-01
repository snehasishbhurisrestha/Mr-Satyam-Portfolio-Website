<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\OurClient;
use Illuminate\Http\Request;

class OurClientController extends Controller
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
        $client = OurClient::latest()->first();
        return view('admin.our_client.index',compact('client'));
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
        $client = OurClient::firstOrCreate([]);
    
        // Handle file uploads
        if ($request->hasFile('file1')) {
            $client->clearMediaCollection('our-client-laptop'); // Remove old file
            $client->addMedia($request->file('file1'))->toMediaCollection('our-client-laptop');
        }
    
        if ($request->hasFile('file2')) {
            $client->clearMediaCollection('our-client-mobile'); // Remove old file
            $client->addMedia($request->file('file2'))->toMediaCollection('our-client-mobile');
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
