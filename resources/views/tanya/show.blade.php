@extends('adminlte.master')

@section('title')
Detail Pertanyaan
@endsection

@section('content')
	<div class="ml-3 mr-3">
		<!-- <h3>Detail Pertanyaan</h3>
		<button type="button" class="btn btn-info" style="margin-bottom: 15px"><a href="/pertanyaan" style="color: white">Kembali</a></button>
		<p>Judul Pertanyaan : {{$tanya->judul}} </p>
		<p>Isi Pertanyaan : {!! $tanya->isi !!} </p>
		@foreach($tanya->tags as $tag)
            <a href="#" class="btn btn-success">{{ $tag->tag_name }}</a>
        @endforeach -->
		<h2>{{ $tanya->judul }}</h2>
		<div class="card mt-1">
            <div class="card-body">
                <p class="card-text mt-2">{!! $tanya->isi !!}</p>
            </div>
        </div>
        <div class="tag mb-4"> Tags:
            @foreach($tanya->tags as $tag)
            <a href="#" class="btn btn-success">{{ $tag->tag_name }}</a>
            @endforeach
    	</div>
		<a class="text-decoration-none ml-2 mt-2 mb-2" href="/pertanyaan">Kembali ke Daftar Pertanyaan</a>
		<div class="float-right mt-n4">
		<button type="button" class="btn btn-primary"><a href="/jawaban/{{ $tanya->id }}" style="color: white">Berikan Jawaban</a></button>
		</div>

		<h4 class="text-right">Daftar Komentar</h4>
			@empty($komentartanya)
				<div class="card bg-white card-success card-outline">
					<div class="card-body">
						<p class="card-text">Belum ada Komentar</p>
					</div>
				</div>
			@endempty
			
			@foreach($komentartanya as $komentar)
			<div class="komentar mt-2" style="margin-left: 30%;">
			<div class="card bg-white card-success card-outline">
				<div class="card-body container-fluid">
				<p class="card-text">{{ $komentar->isi }}</p>
				</div>
			</div>
			</div>
			@endforeach
			<form action="/komentarpertanyaan/{{$tanya->id}}" method="POST" style="margin-left: 5px; margin-right: 5px">
				@csrf
				<div class="form-group">
				<label for="isi">Komentar Anda</label>
				<input type="text" class="form-control" name="isi" placeholder="Masukkan Komentar Anda" id="isi">
				</div>
				<button type="submit" class="btn btn-info mb-2">Submit</button>
			</form>
		<!-- <center><h4 style="padding-top: 7px; padding-bottom: 7px">Jawab Disini</h4></center>
		<form action="/jawaban/{{$tanya->id}}" method="POST" style="margin-left: 5px; margin-right: 5px">
			@csrf
			<div class="form-group">
			<label for="isi">Jawaban Anda</label>
			<input type="text" class="form-control" name="isi" placeholder="Masukkan Jawaban Anda" id="isi">
			</div>
			<button  tton type="submit" class="btn btn-info">Submit</button>
		</form> -->
		<!-- <h3>Daftar Jawaban</h3>
		<table class="table table-striped">
			<thead>
      			<tr>
			        <th>No</th>
			        <th>Isi</th>
			    </tr>
    		</thead>
			<tbody>
      		@foreach($jawab as $key => $jawab)
      		<tr>
      			<td>{{$key+1}}</td>
      			<td>{{$jawab->isi}}</td>
      		</tr>
      		@endforeach
    		</tbody>
      	</table> -->
	</div>
@endsection