<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){

        
    }
    
    public function index(){

        return view('backend.dashboard.index');
    }

}
