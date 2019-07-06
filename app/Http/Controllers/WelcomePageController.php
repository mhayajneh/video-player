<?php

namespace App\Http\Controllers;

use App\videos;
use Illuminate\Http\Request;

class WelcomePageController extends Controller
{
    public function index()
    {
       $videos =  videos::orderBy('created_at', 'desc')->paginate(25);
       return view('welcome',compact(['videos']));
    }
}
