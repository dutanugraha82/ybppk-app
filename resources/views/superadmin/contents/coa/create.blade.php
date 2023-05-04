@extends('superadmin.master')
@section('title')
    COA
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('superadmin.coa.store') }}" method="post">
            @csrf
                <div class="mb-3">
                    <label for="no_akun">No Akun</label>
                    <input type="text" class="form-control" name="no_akun" required placeholder="ex: 1.x.xx.xx">
                </div>
                <div class="mb-3">
                    <label for="no_akun">Nama Akun</label>
                    <input type="text" class="form-control" name="nama_akun" required placeholder="ex: Pendapatan xxxx">
                </div>
                <div class="mb-3">
                    <label for="no_akun">MA</label>
                    <div class="d-flex gap-3">
                        <select name="ma" id="ma" class="form-control" style="width:40rem">
                            <option value="" class="text-muted p-2">----- Pilih MA -----</option>
                            @foreach ($ma as $item)
                            <option value="{{ $item->id }}">{{ $item->ma }}</option>
                            @endforeach
                        </select>
                        <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#exampleModal">
                        Tambah MA
                    </button>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Submit Data</button>
        </form>
         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah MA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="/superadmin/ma" method="POST">
                    @csrf
                    <input type="text" name="ma" class="form-control" placeholder="ex: T1,T5, etc">
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
    $('#ma').select2();
    });
    </script>
@endpush