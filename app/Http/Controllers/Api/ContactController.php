<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//model
use App\Models\Contact;

use App\Http\Requests\Contact\StoreRequest as ContactStoreRequest;

class ContactController extends Controller
{
    public function store(ContactStoreRequest $request){
        $contact = Contact::create($request->validated());
        return response()->json([
            'success' => true,
            'message'=> 'Contatto salvato con successo'
        ]);
    }
}
