@extends('adminlte.master')

@section('content')
<div class="ml-3" style="margin-left: 15px; margin-right: 15px">
  <center><h3 style="padding-top: 10px; padding-bottom: 10px">Daftar Pertanyaan</h3></center>
    <button type="button" class="btn btn-info" style="margin-bottom: 15px"><a href="/pertanyaan/create" style="color: white">Tambah Pertanyaan</a></button>
    <br>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Tag</th>
            <center><th>Actions</th></center>
            <th>Komentar</th>
            <th>Jawaban</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tanya as $key => $tanya)
          <tr>
          	<td>{{$key+1}}</td>
          	<td>{{$tanya->judul}}</a></td>
          	<td>{{$tanya->isi}}</td>
            <td>{{$tanya->tag}}</td>
            <td width="170px"><button type="button" class="btn btn-info"><a href="/pertanyaan/{{$tanya->id}}" style="color: white"><i class="far fa-list-alt"></i></a></button>
                <button type="button" class="btn btn-warning"><a href="/pertanyaan/{{$tanya->id}}/edit" style="color: white"><i class="fas fa-pencil-alt"></i></a></button>
                <form action="/pertanyaan/{{$tanya->id}}" method="post" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
            <td><button type="button" class="btn btn-info"><a href="/komentarpertanyaan/{{$tanya->id}}" style="color: white">Komentar</a></button></td>
            <td><button type="button" class="btn btn-info"><a href="/jawaban/{{$tanya->id}}" style="color: white">Jawaban</a></button></td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection