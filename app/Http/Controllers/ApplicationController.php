<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    public function newApplication(): View
    {
        return view('application.new-application');
    }
}
