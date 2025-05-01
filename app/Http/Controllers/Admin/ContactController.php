<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits:10',
            'message' => 'nullable'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $res = $contact->save();
        if($res){
            $contactData = $request->only(['name', 'email', 'phone', 'message']);

            Mail::to('satyam@mrsatyam.com')->send(new ContactFormMail($contactData));
            // return redirect()->back()->with('success','Messege Saved Successfully Successfully, We will answer you as soon as possible');
            return response()->json(['status'=>1,'massage'=>'saved'], 200);
        }else{
            // return redirect()->back()->with('error','Message Not Saved, try again!');
            return response()->json(['status'=>0,'massage'=>'not saved'], 422);
        }
    }

    public function show(Contact $contact)
    {
        //
    }

    public function edit(Contact $contact)
    {
        //
    }

    public function update(Request $request, Contact $contact)
    {
        //
    }

    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        if($contact){
            $res = $contact->delete();
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
