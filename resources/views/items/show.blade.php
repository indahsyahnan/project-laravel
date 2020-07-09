@extends('adminlte.master')

@section('content')
	<div class="ml-3 mt-3">
		<h3>Detail Pertanyaan</h3>
		<button type="button" class="btn btn-info" style="margin-bottom: 15px"><a href="/pertanyaan" style="color: white">Kembali</a></button>
		<p>Judul Pertanyaan : {{$tanya->judul}} </p>
		<p>Isi Pertanyaan : {{$tanya->isi}} </p>
		<p>Tag : {{$tanya->tag}} </p>
		<h3>Daftar Jawaban</h3>
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
      	</table>
	</div>
@endsection