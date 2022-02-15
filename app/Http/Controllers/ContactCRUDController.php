<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactCRUDController extends Controller
{
  public function index()
  {
    $data['contacts'] = Contact::orderBy('id')->paginate(5);
    return view('contacts.index', $data);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('contacts.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $request->validate([
    'name' => 'required',
    'email' => 'required',
    'phone' => 'required',
    'message' => 'required'
    ]);
    $contact = new Contact;
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->message = $request->message;
    $contact->save();
    return redirect()->route('contacts.index')
    ->with('success','Contact has been created successfully.');
  }



  /**
  * Display the specified resource.
  *

  * @return \Illuminate\Http\Response
  */
  public function show(Contacts $contact)
  {
    return view('contacts.show',compact('contact'));
  }


  /**
  * Show the form for editing the specified resource.
  *

  * @return \Illuminate\Http\Response
  */
  public function edit(Contact $contact)
  {
  return view('contacts.edit',compact('contact'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $request->validate([
    'name' => 'required',
    'email' => 'required',
    'phone' => 'required',
    'message' => 'required'
    
    ]);
    $contact = Contact::find($id);
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->message = $request->message;
    $contact->save();
    return redirect()->route('contacts.index')
    ->with('success','Contact Has Been updated successfully');
  }

  /**
  * Remove the specified resource from storage.

  * @return \Illuminate\Http\Response
  */
  public function destroy(Contact $contact)
  {
  $contact->delete();
  return redirect()->route('contacts.index')
  ->with('success','Contact has been deleted successfully');
  }
}
