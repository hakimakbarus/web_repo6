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

<div align="right">
	<a href="/dashboardAdmin/category" class="btn btn-default">Back</a>
</div>

<form method="POST" action="/dashboardAdmin/category/store" enctype="multipart/form-data">
	@csrf
	
	<div class="form-group">
		<label class="col-md-4 text-right">Masukkan Nama</label>
		<div class="col-md-8">
			<input type="text" name="name" class="form-control input-lg" />
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-md-4 text-right">Masukkan Deskripsi</label>
		<div class="col-md-8">
			<textarea name="desc" class="form-control input-lg"></textarea>
			<!-- <input type="text" name="judul" class="form-control input-lg" /> -->
		</div>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" value="Submit" class="btn btn-warning">
	</div>
</form>

@endsection