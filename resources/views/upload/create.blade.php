@extends('master.parent')

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
	<a href="/upload" class="btn btn-default">Back</a>
</div>

<form method="POST" action="/upload/store" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label class="col-md-4 text-right">Masukkan Id User</label>
		<div class="col-md-8">
			<input type="text" name="id_user" class="form-control input-lg" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 text-right">Masukkan Id Type</label>
		<div class="col-md-8">
			<input type="text" name="id_tipe" class="form-control input-lg" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 text-right">Masukkan Judul</label>
		<div class="col-md-8">
			<input type="text" name="judul" class="form-control input-lg" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 text-right">Masukkan File</label>
		<div class="col-md-8">
			<input type="file" name="file" class="form-control input-lg" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 text-right">Masukkan Pengarang</label>
		<div class="col-md-8">
			<input type="text" name="pengarang" class="form-control input-lg" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 text-right">Masukkan Institusi</label>
		<div class="col-md-8">
			<input type="text" name="institusi" class="form-control input-lg" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 text-right">Masukkan Abstrak</label>
		<div class="col-md-8">
			<textarea name="abstrak" class="form-control input-lg"></textarea>
			<!-- <input type="text" name="judul" class="form-control input-lg" /> -->
		</div>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" value="Submit" class="btn btn-warning">
	</div>
</form>

@endsection