@extends('superadmin.master')
@section('title')
Users
@endsection
@section('pageTitle')
Pengguna
@endsection
@section('content')
<div class="my-4">
    <a class="btn btn-primary" href="{{ route('superadmin.pengguna.create') }}">Buat Akun <sup>+</sup></a>
</div>
<table class="table table-hover table-bordered" id="table-pengguna">
    <thead>
       <tr>
            <th>No</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created</th>
            <th>Action</th>
      </tr>
    </thead>
  </table>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-pengguna').DataTable({
            serverside : true,
            responsive : true,
            searchable : true,
            ajax : {
                url : "{{ route('superadmin.pengguna.json') }}"
            },
            columns : [
                {data: 'DT_RowIndex'},
                {data: 'email', name: 'email'},
                {data: 'role', name: 'role'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action'}
            ],
            "columnDefs": [{
                "defaultContent": "-",
                "targets": "_all"
            }]
        })
    })

</script>
@endpush