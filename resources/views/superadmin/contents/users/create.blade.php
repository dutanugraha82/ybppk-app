@extends('superadmin.master')
@section('title')
create-users
@endsection
@section('pageTitle')
    Create Users
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('superadmin.pengguna.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Role</label>
      <select name="role" class="form-control" required>
        <option value="">choose role</option>
        <option value="opt_yayasan">opt yayasan</option>
        <option value="opt_rektorat">opt rektorat</option>
        <option value="bendahara">bendahara</option>
        <option value="top_mgmt_rektorat">top mgmt rektorat</option>
        <option value="top_mgmt_yayasan">top mgmt yayasan</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="password" required>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" onclick="visiblePassword()"> Show Password
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
@push('js')
    <script>
        function visiblePassword(params) {
            const password = document.getElementById("password")
            if (password.type === "password") {
                password.type = "text"
            } else {
                password.type = "password"
            }
        }
    </script>
@endpush