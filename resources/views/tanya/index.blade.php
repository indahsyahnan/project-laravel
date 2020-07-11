@extends('adminlte.master')

@section('title')
Dashboard
@endsection

@section('content')
<div class="ml-3" style="margin-left: 15px; margin-right: 15px">
  <center><h3 style="padding-top: 10px; padding-bottom: 10px">Daftar Pertanyaan</h3></center>
    <button type="button" class="btn btn-info" style="margin-bottom: 15px">
    <a href="/pertanyaan/create" style="color: white">Buat Pertanyaan Baru</a></button>
    <br>
  
    @foreach($tanya as $key => $pertanyaan)

      <div class="card mb-3">
        <div class="card-body">
          <div class="row">
          <div class="col-1">
            @if($vote->contains('pertanyaan_id', $pertanyaan->id) || Auth::user()->id == $pertanyaan->pengguna_id)
            <table>
              <tr>
                <td>
                  <a class="btn" href="#" style="font-size: 30px;"> <i class="nav-icon fas fa-angle-up"></i></a>
                </td>
              </tr>
              <tr>
                <td>
                  <center><label class="mt-n2" style="display: block; font-size: 30px;"> {{$pertanyaan->vote}} </label></center>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="btn mt-n2" href="#" style="font-size: 30px;"> <i class="nav-icon fas fa-angle-down"></i></a>
                </td>
              </tr>
            </table>
            @else
            <table>
              <tr>
                <td>
                  <a class="btn" href="/pertanyaan/{{$pertanyaan->id}}/upvote" style="font-size: 30px;"> <i class="nav-icon fas fa-angle-up"></i></a>
                </td>
              </tr>
              <tr>
                <td>
                  <center><label class="mt-n2" style="display: block; font-size: 30px;"> {{$pertanyaan->vote}} </label></center>
                </td>
              </tr>
              <tr>
                <td>
                  <a class="btn mt-n2" href="/pertanyaan/{{$pertanyaan->id}}/downvote" style="font-size: 30px;"> <i class="nav-icon fas fa-angle-down"></i></a>
                </td>
              </tr>
            </table>
            @endif
          </div>
          <div class="col-11">
            <div class="card-header">
              <h1 class="card-title font-weight-bold"><a class="text-decoration-none text-body" href="/pertanyaan/{{$pertanyaan->id}}">{{ $pertanyaan -> judul }}</a></h1>
            </div>
            <p class="card-text" style="white-space: pre-wrap">{!! Str::limit($pertanyaan->isi, 150, '...') !!}</p>
              <span class="text-muted mr-2">Dibuat {{ $pertanyaan->created_at }}</span>
              <span class="text-muted mr-2">Diubah {{ $pertanyaan->updated_at }}</span>
            <div class="float-right">
              <button type="button" class="btn btn-info"><a href="/pertanyaan/{{$pertanyaan->id}}" style="color: white"><i class="fa fa-eye"></i></a></button>
              @if ($pertanyaan->pengguna_id == Auth::user()->id)
              <button type="button" class="btn btn-warning"><a href="/pertanyaan/{{$pertanyaan->id}}/edit" style="color: white"><i class="fas fa-pencil-alt"></i></a></button>
              <form action="/pertanyaan/{{$pertanyaan->id}}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Anda yakin ingin menghapus pertanyaan ini?');" class="btn btn-danger"><i class="fa fa-trash"></i></button>
              </form>
              @endif
              <!-- <button type="button" class="btn btn-info"><a href="/komentarpertanyaan/{{$pertanyaan->id}}" style="color: white">Komentar</a></button> -->
            </div>
          </div>
          </div>

          {{-- @foreach($pertanyaan->tags as $tag)
            <a href="#" class="btn btn-sm btn-outline-secondary"> {{ $tag->tag_name }} </a>
          @endforeach --}}
        </div>
      </div>

      @endforeach
</div>
@endsection