@extends('adminlte.master')

@section('content')
<div class="ml-3" style="margin-left: 15px; margin-right: 15px">
  <center><h4 style="padding-top: 10px; padding-bottom: 10px">Daftar Komentar</h4></center>
  <button type="button" class="btn btn-info" style="margin-bottom: 15px"><a href="/pertanyaan" style="color: white">Kembali</a></button>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Isi Komentar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($komentartanya as $key => $komentartanya)
      <tr>
      	<td>{{$key+1}}</td>
      	<td>{{$komentartanya->isi}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <center><h4 style="padding-top: 7px; padding-bottom: 7px">Komentar Disini</h4></center>
  <form action="/komentarpertanyaan/{{$tanya[0]->id}}" method="POST" style="margin-left: 5px; margin-right: 5px">
    @csrf
    <div class="form-group">
      <label for="isi">Komentar Anda</label>
      <input type="text" class="form-control" name="isi" placeholder="Masukkan Komentar Anda" id="isi">
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
  </form>
  </div>
@endsection