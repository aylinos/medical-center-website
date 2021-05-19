<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class SpecialistsController extends Controller
{
    public function index()
    {

    }

    public function orthodontists()
    {
        $orthodontists = User::where([['role_id', 2], ['specialty', "orthodontist"]])->get(); //fix this later with getting only orthodontists

        return view('specialists/orthodontists', compact('orthodontists'));
    }
}
