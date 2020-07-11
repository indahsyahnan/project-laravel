@extends('adminlte.master')

@section('title')
Home
@endsection

@section('content')
<div class="ml-3" style="margin-left: 15px; margin-right: 15px">
  <center><h3 style="padding-top: 10px; padding-bottom: 10px">Daftar Pertanyaan</h3></center>
    <button type="button" class="btn btn-info" style="margin-bottom: 15px"><a href="/pertanyaan/create" style="color: white">Tambah Pertanyaan</a></button>
    <br>
    {{-- <table class="table table-striped">
        <thead>
          <tr>
            <th>Vote</th>
            <th>No</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Dibuat</th>
            <th>Diperbaharui</th>
            <center><th>Actions</th></center>
            <th>Komentar</th>
            <!--<th>Jawaban</th>-->
          </tr>
        </thead>
        <tbody>
          @foreach($tanya as $key => $tanya)
          <tr>
          	<td>
              @if($vote->contains('jawaban_id', $tanya->id) || Auth::user()->id == $tanya->pengguna_id)
                <label> {{$tanya->vote}} </label>
              @else
                <a class="btn" href="/pertanyaan/{{$tanya->id}}/downvote"> <i class="nav-icon fas fa-angle-down"></i></a>
                <label style="display: inline;"> {{$tanya->vote}} </label>
                <a class="btn" href="/pertanyaan/{{$tanya->id}}/upvote"> <i class="nav-icon fas fa-angle-up"></i></a>
              @endif
            </td>
          	<td>{{$key+1}}</td>
          	<td>{{$tanya->judul}}</td>
          	<td>{!! $tanya->isi !!}</td>
            <td>{{$tanya->created_at}}</td>
            <td>{{$tanya->updated_at}}</td>
            <td width="170px"><button type="button" class="btn btn-info"><a href="/pertanyaan/{{$tanya->id}}" style="color: white"><i class="far fa-list-alt"></i></a></button>
                @if ($tanya->pengguna_id == Auth::user()->id)
                  <button type="button" class="btn btn-warning"><a href="/pertanyaan/{{$tanya->id}}/edit" style="color: white"><i class="fas fa-pencil-alt"></i></a></button>
                  
                  <form action="/pertanyaan/{{$tanya->id}}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </form>
                @endif
            </td>
            <td><button type="button" class="btn btn-info"><a href="/komentarpertanyaan/{{$tanya->id}}" style="color: white">Komentar</a></button></td>
            <!--<td><button type="button" class="btn btn-info"><a href="/jawaban/{{$tanya->id}}" style="color: white">Jawaban</a></button></td>-->
          </tr>
          @endforeach
        </tbody>
    </table> --}}
    @foreach($tanya as $key => $pertanyaan)

      <div class="card mb-3">
        <div class="card-body">
          
          <div class="float-right"> 
            @if ($pertanyaan->pengguna_id == Auth::user()->id)
            <form action="/pertanyaan/{{$pertanyaan->id}}" method="post" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
            
            <button type="button" class="btn btn-warning"><a href="/pertanyaan/{{$pertanyaan->id}}/edit" style="color: white"><i class="fas fa-pencil-alt"></i></a></button>
            @endif
            <button type="button" class="btn btn-info"><a href="/pertanyaan/{{$pertanyaan->id}}" style="color: white"><i class="far fa-list-alt"></i></a></button>
            <button type="button" class="btn btn-info"><a href="/komentarpertanyaan/{{$pertanyaan->id}}" style="color: white">Komentar</a></button>
            @if($vote->contains('pertanyaan_id', $pertanyaan->id) || Auth::user()->id == $pertanyaan->pengguna_id)
              <a class="btn" href="#"> <i class="nav-icon fas fa-angle-down"></i></a>
              <label style="display: inline;"> {{$pertanyaan->vote}} </label>
              <a class="btn" href="#"> <i class="nav-icon fas fa-angle-up"></i></a>
            @else
              <a class="btn" href="/pertanyaan/{{$pertanyaan->id}}/downvote"> <i class="nav-icon fas fa-angle-down"></i></a>
              <label style="display: inline;"> {{$pertanyaan->vote}} </label>
              <a class="btn" href="/pertanyaan/{{$pertanyaan->id}}/upvote"> <i class="nav-icon fas fa-angle-up"></i></a>
            @endif
          </div>
          
          <h1 class="card-title font-weight-bold">{{ $pertanyaan -> judul }}</h1>
          <p class="card-text" style="white-space: pre-wrap">{!! $pertanyaan -> isi !!}</p>

          {{-- @foreach($pertanyaan->tags as $tag)
            <a href="#" class="btn btn-sm btn-outline-secondary"> {{ $tag->tag_name }} </a>
          @endforeach --}}
        </div>
      </div>

      @endforeach
</div>
@endsection