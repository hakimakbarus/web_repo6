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
		<h4>Edit File Upload</h4>

		<div align="right">
			<a href="/dashboardAdmin/upload" class="btn btn-default">Back</a>
		</div>

		<form method="POST" action="/dashboardAdmin/upload/{{$data->id}}/update" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<!-- <label class="col-md-4 text-left">Masukkan Id User</label> -->
				<div class="">
					<input type="hidden" name="id_user" value="{{$data->id_user}}" class="form-control input-lg" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Id Type</label>
				<div class="">
					<select name="id_cat" class="form-control">
						@foreach($data_cat as $row)
							<option value="{{$row->id}}" class="form-control" 
								<?php if($row->id == $data->id_cat){ echo "selected='selected'"; }?>
							>{{$row->name_cat}}</option>
						@endforeach
					</select>
					<!-- <input type="text" name="id_tipe" class="form-control input-lg" /> -->
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Judul</label>
				<div class="">
					<input type="text" name="judul" value="{{$data->judul}}" class="form-control input-lg" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan File</label>
				<div class="">
					@if ($data->file != '')
					<a href="{{ URL::to('/') }}/files/{{$data->file}}">{{ $data->file}}</a>
					@endif
					<input type="file" name="file" class="form-control input-lg" />
					<input type="hidden" name="hidden_file" value="{{$data->file}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Pengarang</label>
				<div class="">
					<input type="text" name="pengarang" value="{{$data->pengarang}}" class="form-control input-lg" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Institusi</label>
				<div class="">
					<input type="text" name="institusi" value="{{$data->institusi}}" class="form-control input-lg" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Abstrak</label>
				<div class="">
					<textarea name="abstrak" class="form-control input-lg">{{$data->abstrak}}</textarea>
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