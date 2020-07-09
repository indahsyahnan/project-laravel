@extends('adminlte.master')

@section('content')
  <div class="card card-primary card-outline" style="margin-top: 20px; margin-left: 15px; margin-right: 15px">
    <button type="button" class="btn btn-primary" style="margin-bottom: 15px"><a href="/pertanyaan" style="color: white">Lihat Pertanyaan</a></button>
    <div class="card-header">
      <h5 class="card-title m-0">Apakah Anda Memiliki Pertanyaan ?</h5>
    </div>
    <div class="card-body">
      <h6 class="card-title">Silahkan Klik Tombol Dibawah Ini !!</h6>
      <p class="card-text"></p>
      <a href="/pertanyaan/create" class="btn btn-primary">Pertanyaan</a>
    </div>
  </div>
@endsection