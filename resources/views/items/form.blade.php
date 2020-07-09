@extends('adminlte.master')

@section('content')
<div class="ml-3">
  <form action="/pertanyaan" method="POST" style="margin-left: 15px; margin-right: 15px">
    @csrf
    <div class="form-group" style="padding-top : 20px">
      <center><h4>Tulis Pertanyaan Anda Disini</h4></center>
      <button type="button" class="btn btn-info" style="margin-bottom: 15px"><a href="/pertanyaan" style="color: white">Kembali</a></button>
      <br>
      <label for="judul">Judul</label>
      <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul" id="judul">
    </div>
    <div class="form-group">
      <label for="isi">Isi</label>
      <input type="text" class="form-control" name="isi" placeholder="Masukkan Isi" id="isi">
    </div>
    <div class="form-group">
      <label for="tag">Tag</label>
      <input type="text" class="form-control" name="tag" placeholder="Masukkan Tag" id="tag">
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
  </form>
</div>
@endsection