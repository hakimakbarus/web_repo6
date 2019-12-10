@extends('master.parentAdmin')

@section('content')

<div class="jumbotron text-center">
	<div align="right">
		<a href="/dashboardAdmin/category" class="btn btn-default">Back</a>
	</div>
	<br/>
	<!-- <img src=""> -->
	<!-- <h3><a href="">{{$data->file}}</a></h3> -->
	<h4 align="left">{{$data->name_cat}}</h4>
	<h5 align="left">Desc - {{$data->desc_cat}}</h5>
	
	<!-- <h3 align="left">Pengarang - {{$data->pengarang}}</h3> -->
</div>

@endsection