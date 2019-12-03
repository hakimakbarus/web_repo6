@extends('master.parent')

@section('content')

<div class="jumbotron text-center">
	<div align="right">
		<a href="/home" class="btn btn-default">Back</a>
	</div>
	<br/>
	<!-- <img src=""> -->
	<!-- <h3><a href="{{ URL::to('/') }}/files/{{$data->file}}" target="_blank">{{$data->file}}</a></h3> -->
	<h3>{{$data->file}} <br/><a href="/home/{{$data->id}}/downloadUpload" target="_blank" class="btn btn-primary btn-sm">Download</a></h3>
	<h3 align="left">User - {{$data->id_user}}</h3>
	<h3 align="left">Type - {{$data->id_cat}}</h3>
	<h3 align="left">Judul - {{$data->judul}}</h3>
	<h3 align="left">Dibuat - {{$data->created_at}}</h3>
	<h3 align="left">Diubah - {{$data->updated_at}}</h3>
	
	<h3 align="left">Pengarang - {{$data->pengarang}}</h3>
</div>

@endsection