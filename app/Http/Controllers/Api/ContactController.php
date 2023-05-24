<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function listAllContacts(){
        return view('Contacts.index',[
            'contacts' => Contact::all()
        ]);
    }

    public function createViewContact(){
        return view('Contacts.create');
    }

    public function createContact(Request $request){
        $validator = Validator::make($request->all(), [
            'Name' => 'required|min:5',
            'Contact' => 'required|digits:9',
            'Email' => 'required|email|max:100|unique:contacts',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $contact = Contact::create([
            'Name' => $request->Name,
            'Contact' => $request->Contact,
            'Email' => $request->Email,
        ]);
        
        if(!$contact){
            return back()->with('error', 'Contact Creation Failed');
        }

        return back()->with('success', 'Contact Created Successfully');

    }

    public function findByIdContact($id){
        $contact = Contact::where('id', $id)->first();

        if(!$contact){
            return back()->with('error', 'Contact Not Found');
        }

        return view('Contacts.details', [
            'contact' => $contact
        ]);
    }

    public function editView($id){
        $contact = Contact::where('id', $id)->first();

        if(!$contact){
            return back()->with('error', 'Contact Not Found');
        }

        return view('Contacts.edit', [
            'contact' => $contact
        ]);
    }

    public function editContact(Request $request){
        $validator = Validator::make($request->all(), [
            'Name' => 'required|min:5',
            'Contact' => 'required|digits:9',
            'Email' => 'required|email|max:100|unique:contacts,Email,'.$request->id,
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $oldContact = Contact::where('id', $request->id)->first();

        if(!$oldContact){
            return back()->with('error', 'Contact Not Found');
        }

        $newContact = $oldContact->update([
            'Name' => $request->Name,
            'Contact' => $request->Contact,
            'Email' => $request->Email,
        ]);
        
        if(!$newContact){
            return back()->withErrors($newContact)->withInput();
        }

        return back()->with('success', 'Contact Updated Successfully');
    }
}

