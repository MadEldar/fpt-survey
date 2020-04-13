<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    public function home()
    {
        return view('survey');
    }

    public function survey(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'telephone' => 'required',
            'feedback' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'type' => 'error',
                'message' => 'Please fill out all fields'
            ];
        } else {
            return User::create([
                'name' => $req->get('name'),
                'email' => $req->get('email'),
                'telephone' => $req->get('telephone'),
                'feedback' => $req->get('feedback'),
            ]);
        }
    }

    public function database() {
        return view('database');
    }
}
