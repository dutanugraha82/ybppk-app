<?php

namespace App\Http\Controllers\superadmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MAController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'ma' => 'required',
        ]);

        DB::table('ma')->insert([
            'ma' => $request->ma,
        ]);

        return redirect('/superadmin/coa/create');
    }
}
