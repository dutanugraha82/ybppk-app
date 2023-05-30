@extends('superadmin.master')
@section('title')
    create-sub
@endsection
@section('pageTitle')
    Create Sub
@endsection
@section('content')
    <div class="container">
        <form class="col-8" action="/superadmin/coa/sub" method="post">
            @csrf
                <div class="mb-3">
                    <label for="no_akun">No Akun</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                          <span class="input-group-text" id="basic-addon2">{{ $data->no_akun }}.</span>
                        </div>
                        <input type="text" class="form-control" placeholder=".xxx.xxx" name="no_akun" required>
                        <input type="hidden" name="no_akun_master" value="{{ $data->no_akun }}">
                      </div>
                </div>
                <div class="mb-3">
                    <label for="no_akun">Nama Akun</label>
                    <input type="text" class="form-control" name="nama_akun" required placeholder="Nama Akun">
                </div>
                <div class="mb-3">
                    <label for="no_akun">MA</label>
                    <div class="d-flex gap-3">
                        <input type="text" class="form-control" value="{{ $data->ma->ma }}" required readonly>
                        <input type="hidden" name="ma_id" value="{{ $data->ma_id }}">
                    </div>
                </div>
                <div class="d-flex mt-5">
                    <a href="/superadmin/coa" style="width: 150px;" class="btn btn-warning mr-5">Kembali</a>
                    <button type="submit" style="width: 150px" class="btn btn-primary">Submit Data</button>
                </div>
        </form>
    </div>
@endsection