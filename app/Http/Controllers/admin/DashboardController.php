<?php

namespace App\Http\Controllers\admin;


use App\User;
use App\videos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|editor');
    }
    public function index()
    {
        $users = User::all()->count();
        $videos = videos::all()->count();
        return view('admin.dashboard',compact(['users','videos']));
    }
}
