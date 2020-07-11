@extends('adminlte.master')

@section('title')
Welcome To Stack UnderFlow
@endsection

@section('content')
  <!-- <div class="card card-primary card-outline" style="margin-top: 20px; margin-left: 15px; margin-right: 15px">
    <div class="card-header text-center">
      <h5 class="card-title m-0">Apakah Anda Memiliki Pertanyaan?</h5>
    </div>
    <div class="card-body">
      <h6 class="card-title">Silahkan Klik Tombol Dibawah Ini !!</h6>
      <p class="card-text"></p>
      <a href="/pertanyaan/create" class="btn btn-primary">Buat Pertanyaan</a>
      <h5 class="card-title">Atau</h5>
      <button type="button" class="btn btn-primary" style="margin-bottom: 15px"><a href="/pertanyaan" style="color: white">Lihat Pertanyaan</a></button>
    </div>
  </div> -->
  <div class="jumbotron">
  <h1 class="display-4">Selamat Datang di Website Stack UnderFlow</h1>
  <p class="lead">Tempatnya para programmer berdiskusi dan menyelesaikan masalah</p>
  <hr class="my-4">
  <div class="text-center">
  <p>Punya Pertanyaan?</p>
  <a class="btn btn-primary btn-lg mb-2" href="/pertanyaan/create" role="button">Buat Pertanyaan</a>
  <p>Atau</p>
  <a class="btn btn-primary btn-lg" href="/pertanyaan" role="button">Lihat Pertanyaan</a>
</div>
</div>
@endsection