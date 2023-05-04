<?php

namespace App\Http\Controllers\SuperAdmin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\SuperAdmin\MA;
use App\Models\SuperAdmin\COA;
use App\Http\Controllers\Controller;

class COAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('superadmin.contents.coa.index');
    }

    public function json(){
        $coa = COA::all();

        return datatables()->of($coa)
                ->addIndexColumn()
                ->addColumn('action', function ($coa){
                    return '
                    <div class="d-flex">    
                            <a href="#" class="btn btn-warning" style="width:80px;">Edit</a>
                                <form action="/superadmin/pengguna/'.$coa->id.'" method="POST">
                                '.csrf_field().'
                                '.method_field("DELETE").'
                                <button style="width:80px;" type="submit" class="btn btn-danger d-block ml-3" onclick="javascript: return confirm(\'Apakah anda ingin menghapus unit: '.$coa->nama_akun.'?\')">
                                    Hapus
                                </button>
                            </form>
                    </div>';
                })
                ->addColumn('updated_at', function($coa){
                    return Carbon::parse($coa->updated_at)->isoFormat('D MMMM Y');;
                })
                ->addColumn('ma', function ($coa){
                    return $coa->ma->ma;
                })
                ->rawColumns(['updated_at','action','ma'])
                ->make(true);
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ma = MA::all();
        return view('superadmin.contents.coa.create', compact('ma'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_akun' => 'required',
            'nama_akun' => 'required',
            'ma' => 'required',
        ]);

        COA::create([
            'no_akun' => $request->no_akun,
            'nama_akun' => $request->nama_akun,
            'ma_id' => $request->ma,
        ]);

        return redirect(route('superadmin.coa.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
