<?php

namespace App\Http\Controllers\optYayasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OptYayasanController extends Controller
{
    public function index(){
        return view('opt-yayasan.dashboard');
    }
}
