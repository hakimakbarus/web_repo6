@extends('master.parentAdmin')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<div class="row">

	<div class="col-1"></div>

	<div class="col-10">
		<br/>
		<h4>Edit Category Desc</h4>

		<div align="right">
			<a href="/dashboardAdmin/category" class="btn btn-default">Back</a>
		</div>

		<form method="POST" action="/dashboardAdmin/category/{{$data->id}}/update" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Nama</label>
				<div class="">
					<input type="text" name="name" value="{{$data->name_cat}}" class="form-control input-lg" />
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Deskripsi</label>
				<div class="">
					<textarea name="desc" class="form-control input-lg">{{$data->desc_cat}}</textarea>
					<!-- <input type="text" name="judul" class="form-control input-lg" /> -->
				</div>
			</div>
			<div class="form-group">
				<div class="">
					<input type="submit" name="submit" value="Submit" class="btn btn-primary col-md-6">
				</div>
			</div>
		</form>

	</div>
</div>

@endsection