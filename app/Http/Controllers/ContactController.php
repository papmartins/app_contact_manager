<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('list',['contacts' => $contacts, 'title' => 'Contacts List']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edit',['contact' => null,'title' => 'New Contact']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateContact($request);
        $created = Contact::create($request->all());

        if( $created){
            $msg = "Contact created with success!";
    }
    else{
            $msg = "Erro on create!";
    }
    return redirect()->route('site.edit',['id' => $created->id, 'msg' => $msg]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('show',['contact' => $contact, 'title' => 'View Contact']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$msg = '')
    {
        $contact = Contact::find($id);
        return view('edit',['contact' => $contact, 'title' => 'Edit Contact', 'msg' => $msg]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $msg = "";
        $this->validateContact($request,$id);
        
        $contact = Contact::find($id);
        $update = $contact->update($request->all());
        if( $update){
                $msg = "Contact updated with success!";
        }
        else{
                $msg = "Erro on update!";
        }
        return redirect()->route('site.edit',['id' => $id, 'msg' => $msg]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        // como o modelo implementa o softdelete os registos não serão eliminados, apenas preenchida o campo deleted_at
        // para eliminar permanentemente
        // Contact::find($id)->forceDelete();
        return redirect()->route('site.index');
    }

    
    private function validateContact(Request $request, $id = '')
    {
        if(strlen($id)> 0)
            $id = ",".$id;
        $rules = [
            'name' => 'required|min:5|max:50',
            'email' => 'required|email:filter|unique:contacts,email'.$id,
            'contact' => 'required|integer:filter|digits:9|unique:contacts,contact'.$id
        ];
        
        return $request->validate($rules);

    }


}
