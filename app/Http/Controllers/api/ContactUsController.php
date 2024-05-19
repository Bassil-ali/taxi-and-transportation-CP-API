<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use App\Http\Resources\ContactUsResource;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{


    public function __construct(Request $request){
        parent::__construct($request);
        // $this->authorizeResource(ContactUs::class,Str::snake("ContactUs"));
    }

    public function store(StoreContactUsRequest $request)
    {
        $contactUs = ContactUs::create($request->validated());
        return new ContactUsResource($contactUs);
    }

}
