@extends('adminlte.master')

@section('content')
<div class="ml-3" style="margin-left: 15px; margin-right: 15px">
  <center><h3 style="padding-top: 10px; padding-bottom: 10px">Daftar Pengguna</h3></center>
    <br>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Photo</th>
            <th>Email</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          @foreach($profile as $key => $profile)
          <tr>
          	<td>{{$key+1}}</td>
          	<td>{{$profile->full_name}}</a></td>
          	<td>{{$profile->address}}</td>
            <td>{{$profile->photo}}</td>
            <td>{{$profile->pengguna->email}}</td>
            <td>{{$profile->pengguna->usercol}}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection