<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactRequest;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;

class ContactController extends SiteController
{
    public function __construct()
    {
        parent::__construct();
        $this->sideBar = 'left';
    }

    public function index()
    {
        return $this->renderOutput();
    }

    public function send(ContactRequest $request)
    {
        abort_if(!$request->ajax(), 404);
        $data = $request->validated();
        Mail::send(new ContactUs($data));
        return response()->json(['success'=>'Успешно отпарвлено']);
    }
}
