@extends('master.parentUser')

@section('content')

<!-- <div class="row">

<div class="col-8">
 -->
	<div class="jumbotron text-center">
		<div align="right">
			<a href="/dashboardUser/home" class="btn btn-default">Back</a>
		</div>
		<br/>
		<!-- <img src=""> -->
		<!-- <h3><a href="{{ URL::to('/') }}/files/{{$data->file}}" target="_blank">{{$data->file}}</a></h3> -->
		<h3>{{$data->file}} <br/><a href="/dashboardUser/home/{{$data->id}}/downloadUpload" target="_blank" class="btn btn-primary btn-sm">Download</a></h3>

<!-- 		<h4 align="left">User - {{$data->id_user}}</h4>
		<h4 align="left">Type - {{$data->id_cat}}</h4> -->
		<h4 align="left">{{$data->judul}}</h4>
		<h5 align="left">Dibuat - {{$data->created_at}}</h5>
		<h5 align="left">Diubah - {{$data->updated_at}}</h5>
		
		<h5 align="left">Pengarang - {{$data->pengarang}}</h5>

		<h5 align="left">Total View : {{$data->view_count}}</h5>
		<h5 align="left">Total Downloads : {{$data->download_count}}</h5>
	</div>

<!-- </div>

</div> -->
@endsection