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
    
    @empty($jawab)
        <div class="card bg-white card-primary card-outline m-3">
            <div class="card-body">
                <p class="card-text">Belum ada jawaban</p>
            </div>
        </div>
    @endempty

    @foreach ($jawab as $key => $jawaban)
        <div class="card bg-white card-primary card-outline m-3">
            <div class="card-body container-fluid">
              <div class="row">
                <div class="col-1">
                  @if ($jawaban->pertanyaan_id == $tanya->id && $tanya->pengguna_id == Auth::user()->id && $jawaban->pengguna_id != $tanya->pengguna_id && $jawaban->status == 0)
                    <button type="button" class="btn btn-info"><a href="/jawaban/{{$jawaban->id}}/vote" style="color: white">Vote</a></button>
                  @elseif ($jawaban->status == 1)
                    <button type="button" class="btn btn-info"><i class="fa fa-check"></i></button>
                  @elseif ($jawaban->status ==2)
                    
                  @endif
                </div>

                <div class="col">
                  <p class="card-text">{!!$jawaban->isi!!}</p>
                </div>

                <div class="col-sm-2" style="text-align: center">
                    @if($vote->contains('jawaban_id', $jawaban->id) || Auth::user()->id == $jawaban->pengguna_id)
                    <a class="btn" href="#"> <i class="nav-icon fas fa-angle-down"></i></a>
                    <label> {{$jawaban->vote}} </label>
                    <a class="btn" href="#"> <i class="nav-icon fas fa-angle-up"></i></a>  
                  @else
                    <a class="btn" href="/jawaban/{{$jawaban->id}}/downvote"> <i class="nav-icon fas fa-angle-down"></i></a>
                    <label style="display: inline;"> {{$jawaban->vote}} </label>
                    <a class="btn" href="/jawaban/{{$jawaban->id}}/upvote"> <i class="nav-icon fas fa-angle-up"></i></a>
                  @endif
                </div>
              </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection