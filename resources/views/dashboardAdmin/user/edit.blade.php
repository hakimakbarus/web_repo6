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
			<a href="/dashboardAdmin/user" class="btn btn-default">Back</a>
		</div>

		<form method="POST" action="/dashboardAdmin/user/{{$data->id}}/update" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label class="col-md-4 text-left">ID User</label>
				<div class="">
					<input type="text" name="id" value="{{$data->id}}" class="form-control input-lg" />
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Role</label>
				<div class="">
					<select name="id_role" class="form-control">
						@foreach($data_role as $row)
							<option value="{{$row->id}}" class="form-control" 
								<?php if($row->id == $data->id_role){ echo "selected='selected'"; }?>
							>{{$row->name_role}}</option>
						@endforeach
					</select>
					<!-- <input type="text" name="id_tipe" class="form-control input-lg" /> -->
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