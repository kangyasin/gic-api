<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Contact\NewContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\Client\Shift\Shift;
use App\Models\Contacts;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $contacts = Contacts::all();
        return ResponseHelper::json($contacts, 200, 'Contacts Retrieve');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(NewContactRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return ResponseHelper::json('',406,trans('response-message.failed.create', ['object' => 'Contact']), $request->validator->errors(), false);
        }
        $contacts = Contacts::create($request->validated());
        return ResponseHelper::json($contacts, 200, trans('response-message.success.create',['object'=>'Contact']));
    }

    /**
     * Display the specified resource.
     *
     * @param Contacts $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contacts $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacts $contacts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Contacts $contacts
     * @return JsonResponse
     */
    public function update(UpdateContactRequest $request, $contact)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return ResponseHelper::json(false,406, trans('response-message.failed.update', ['object' => 'Contact']), $request->validator->errors(), false);
        }
        $contacts = Contacts::where('id', $contact)->first();
        if (empty($contacts))
        {
            return ResponseHelper::json(false, 404, trans('response-message.notfound.db', ['object'=>'Contact id '. $contact]), false);
        }
        $contacts->update($request->validated());
        return ResponseHelper::json($contacts, 200, trans('response-message.success.update', ['object' => 'Contact']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contacts $contacts
     * @return JsonResponse
     */
    public function destroy($contact)
    {
        $contacts = Contacts::where('id', $contact);
        if($contacts->count() < 1)
        {
            return ResponseHelper::json([], 404, trans('response-message.notfound.db', ['object'=>'Contact id '. $contact]), false);
        }

        $contacts->delete();
        return ResponseHelper::json([], 200,trans('response-message.success.delete.basic',['object'=>'Contact']));
    }
}
