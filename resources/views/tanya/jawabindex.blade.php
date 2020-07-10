@extends('adminlte.master')

@section('title')
Jawaban
@endsection

@section('content')
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
    <div class="jawaban mt-2">
    <form action="/jawaban/{{$tanya->id}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="isi">Jawaban Anda</label>
        <input type="text" class="form-control" name="isi" placeholder="Masukkan Jawaban Anda" id="isi">
      </div>
      <input type="number" class="form-control" name="pengguna_id" id="pengguna_id" value="{{ Auth::user()->id }}" readonly hidden>
      <button type="submit" class="btn btn-info">Submit</button>
    </form>
    <center><h4 style="padding-top: 10px; padding-bottom: 10px">Daftar Jawaban</h4></center>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Isi</th>
          <th>Tanggal Dibuat</th>
          <th>Komentar</th>
        </tr>
      </thead>
      <tbody>
        @foreach($jawab as $key => $jawab)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$jawab->isi}}</td>
          <td>{{$jawab->created_at}}</td>
          <td><button type="button" class="btn btn-info"><a href="/komentarjawaban/{{$jawab->id}}" style="color: white">Komentar</a></button></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
</div>
@endsection