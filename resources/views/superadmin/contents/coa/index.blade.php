@extends('superadmin.master')
@section('title')
    coa
@endsection
@section('content')
<div class="my-4">
    <a class="btn btn-primary" href="{{ route('superadmin.coa.create') }}">Create Master<sup>+</sup></a>
</div>
<table class="table table-hover table-bordered" id="table-coa">
    <thead>
       <tr>
            <th>No</th>
            <th>No Akun</th>
            <th>Nama Akun</th>
            <th>MA</th>
            <th>Created</th>
            <th>Action</th>
      </tr>
    </thead>
  </table>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-coa').DataTable({
            serverside : true,
            responsive : true,
            searchable : true,
            ajax : {
                url : "{{ route('superadmin.coa.json') }}"
            },
            columns : [
                {data: 'DT_RowIndex'},
                {data: 'no_akun', name: 'no_akun'},
                {data: 'nama_akun', name: 'nama_akun'},
                {data: 'ma', name: 'ma'},
                {data: 'updated_at', name: 'updated_at'},
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