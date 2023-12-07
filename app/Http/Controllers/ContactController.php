<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }
    public function showMessages()
    {
        $contacts = ContactModel::latest();
        return $contacts;
    }
    public function store(Request $req)
    {
        $validate = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);
        $contact = new ContactModel;
        $contact->name = $req->name;
        $contact->description = $req->description;
        $contact->phone = $req->phone;
        $contact->address = $req->address;
        $contact->email = $req->email;
        $contact->save();
        return redirect()->back()->with('success', 'Your Message was Delivered successfully!');
    }
}
