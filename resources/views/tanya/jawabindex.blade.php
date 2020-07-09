@extends('adminlte.master')

@section('content')
<div class="ml-3" style="margin-left: 15px; margin-right: 15px">
  <center><h4 style="padding-top: 10px; padding-bottom: 10px">Daftar Jawaban</h4></center>
  <button type="button" class="btn btn-info" style="margin-bottom: 15px"><a href="/pertanyaan" style="color: white">Kembali</a></button>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Isi</th>
        <th>Komentar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jawab as $key => $jawab)
      <tr>
      	<td>{{$key+1}}</td>
      	<td>{{$jawab->isi}}</td>
        <td><button type="button" class="btn btn-info"><a href="/komentarjawaban/{{$jawab->id}}" style="color: white">Komentar</a></button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <center><h4 style="padding-top: 7px; padding-bottom: 7px">Jawab Disini</h4></center>
  <form action="/jawaban/{{$tanya[0]->id}}" method="POST" style="margin-left: 5px; margin-right: 5px">
    @csrf
    <div class="form-group">
      <label for="isi">Jawaban Anda</label>
      <input type="text" class="form-control" name="isi" placeholder="Masukkan Jawaban Anda" id="isi">
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
  </form>
  </div>
@endsection