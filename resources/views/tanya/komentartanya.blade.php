@extends('adminlte.master')

@section('title')
Komentar
@endsection

@section('content')
<div class="ml-3" style="margin-left: 15px; margin-right: 15px">
  <!-- <button type="button" class="btn btn-info" style="margin-bottom: 15px"><a href="/pertanyaan" style="color: white">Kembali</a></button> -->
  <div class="ml-3 mr-3">
  <h2>{{ $tanya->judul }}</h2>
    <div class="card mt-1">
      <div class="card-body">
        <h4 class="card-title"></h4>
        <p class="card-text mt-2">{!! $tanya->isi !!}</p>
      </div>
    </div>
    <div class="tag mb-2"> Tags:
      @foreach($tanya->tags as $tag)
        <a href="#" class="btn btn-success">{{ $tag->tag_name }}</a>
      @endforeach
    </div>
    <a class="text-decoration-none mt-2 mb-2" href="/pertanyaan">Kembali ke Daftar Pertanyaan</a>

    <center><h4 style="padding-top: 10px; padding-bottom: 10px">Daftar Komentar</h4></center>
    @empty($komentartanya)
          <div class="card bg-white card-primary card-outline m-3">
              <div class="card-body">
                  <p class="card-text">Belum ada Komentar</p>
              </div>
          </div>
      @endempty
    
    <div class="komentar mt-2">
      @foreach($komentartanya as $komentar)
      <div class="card bg-white card-primary card-outline m-3">
        <div class="card-body container-fluid">
          <p class="card-text">{{ $komentar->isi }}</p>
        </div>
      </div>
    </div>
      @endforeach
      <center><h4 style="padding-top: 7px; padding-bottom: 7px">Komentar Disini</h4></center>
      <form action="/komentarpertanyaan/{{$tanya->id}}" method="POST" style="margin-left: 5px; margin-right: 5px">
        @csrf
        <div class="form-group">
          <label for="isi">Komentar Anda</label>
          <input type="text" class="form-control" name="isi" placeholder="Masukkan Komentar Anda" id="isi">
        </div>
        <button type="submit" class="btn btn-info">Submit</button>
      </form>
  </div>

  <!-- <table class="table table-striped">
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
  </table> -->
  
@endsection