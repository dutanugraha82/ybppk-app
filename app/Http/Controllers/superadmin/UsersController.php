<?php

namespace App\Http\Controllers\superadmin;
use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('superadmin.contents.users.index');
    }

    public function json(){
        $users = User::where('role','!=','superadmin')->get();

        return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($users){
                    return '<form action="/superadmin/pengguna/'.$users->id.'" method="POST">
                                '.csrf_field().'
                                '.method_field("DELETE").'
                                <button type="submit" class="btn btn-danger btn-sm d-block mx-auto" onclick="javascript: return confirm(\'Apakah anda ingin menghapus unit: '.$users->email.'?\')">
                                    Hapus
                                </button>
                            </form>';
                })
                ->addColumn('created_at', function($users){
                    return $users['created_at'];
                })
                ->rawColumns(['created_at','action'])
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.contents.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|email',
            'role' => 'required',
            'password' => 'required'
        ],
        [
            'email' => "your email is exist!",
            'role' => 'role must be filled!',
            'password' => 'password must be filled!'
        ]);

        User::create([
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => $validated['password']
        ]);

        return redirect(route('superadmin.pengguna.index'));
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
       User::where('id','=',$id)->delete();
       return redirect(route('superadmin.pengguna.index'));
    }
}
