<?php

namespace App\Http\Controllers\Individual;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndividualController extends Controller
{
    public function index()
    {
        return view('individual.index');
    }
}
