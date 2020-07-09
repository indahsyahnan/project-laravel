@extends('adminlte.master')

@section('content')
<div class="ml-3" style="margin-left: 15px; margin-right: 15px">
  <center><h3 style="padding-top: 10px; padding-bottom: 10px">Daftar Like Pertanyaan</h3></center>
    <br>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Pertanyaan</th>
            <th>Jumlah Like</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pengguna as $key)
          <tr>
          	<td>{{$key->id}}</td>
          	<td>{{$key->name}}</a></td>
          	<td>
                 @foreach($tanya as $h)
                  {{ $h->judul }} 
                 @endforeach  
            </td>
            <td>{{ $key->tanya->count() }}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection