<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactInformationsRequest;
use App\Models\ContactInformationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactInformationController extends Controller
{
    public function store(ContactInformationsRequest $request) {
        ContactInformationModel::create($request->all());
        return response()->json(['message' => 'Message created successfully']);
    }
}
