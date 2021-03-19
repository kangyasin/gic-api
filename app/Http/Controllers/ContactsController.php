<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Contact\NewContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $contacts = Contacts::all();
        return view('contacts.list', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('contacts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewContactRequest $request)
    {

        if (isset($request->validator) && $request->validator->fails()) {
            return Redirect::back()->withErrors($request->validator->errors());
        }

        Contacts::create($request->validated());
        return redirect()->back()->with('success', trans('response-message.success.create', ['object'=>'Contact']));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $contact = Contacts::where('id', $id);
        if($contact->count() < 1)
        {
            return Redirect::back()->withErrors(['message' => trans('response-message.notfound.db', ['object'=>'Contact id '. $contact])]);
        }

        return view('contacts.form', ['contact' => $contact->first()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateContactRequest $request
     * @param $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateContactRequest $request, $contact)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return Redirect::back()->withErrors($request->validator->errors());
        }
        $contacts = Contacts::where('id', $contact)->first();
        if (empty($contacts))
        {
            return Redirect::back()->withErrors(['message' => trans('response-message.notfound.db', ['object'=>'Contact id '. $contact])]);

        }
        $contacts->update($request->validated());
        return redirect()->back()->with('success', trans('response-message.success.update', ['object'=>'Contact']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($contact)
    {
        $contacts = Contacts::where('id', $contact);
        if($contacts->count() < 1)
        {
            return Redirect::back()->withErrors(['message' => trans('response-message.notfound.db', ['object' => 'Contact id '. $contact])]);
        }

        $contacts->delete();
        return redirect()->back()->with('success', trans('response-message.success.delete.basic', ['object'=>'Contact']));
    }
}
