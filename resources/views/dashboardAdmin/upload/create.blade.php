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
		<h4>Upload Baru</h4>

		<div align="right">
			<a href="/dashboardAdmin/upload" class="btn btn-info btn-sm">Back</a>
		</div>

		<form method="POST" action="/dashboardAdmin/upload/store" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<!-- <label class="col-md-4 text-left">Masukkan Id User</label> -->
				<div class="">
					<input type="hidden" name="id_user" value="{{auth()->user()->id}}" class="form-control input-lg" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Id Type</label>
				<div class="">
					<select name="id_cat" class="form-control">
						@foreach($data as $row)
							<option value="{{$row->id}}" class="form-control">{{$row->name_cat}}</option>
						@endforeach
					</select>
					<!-- <input type="text" name="id_tipe" class="form-control input-lg" /> -->
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Judul</label>
				<div class="">
					<input type="text" name="judul" class="form-control input-lg" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan File</label>
				<div class="">
					<input type="file" name="file" class="form-control input-lg" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Pengarang</label>
				<div class="">
					<input type="text" name="pengarang" class="form-control input-lg" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Institusi</label>
				<div class="">
					<input type="text" name="institusi" class="form-control input-lg" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Abstrak</label>
				<div class="">
					<textarea name="abstrak" class="form-control input-lg"></textarea>
					<!-- <input type="text" name="judul" class="form-control input-lg" /> -->
				</div>
			</div>

			<?php 
				$currently_selected = date('Y');
				$earliest_year = 1970;
				$latest_year = date('Y');
			?>

			<div class="form-group">
				<label class="col-md-4 text-left">Masukkan Tahun Keluaran</label>
				<div class="">
					<select name="tahun" class="form-control">
						<?php foreach( range( $latest_year ,$earliest_year) as $i) { ?>
							<option value="{{$i}}" <?php if($i === $currently_selected){ echo "selected='selected'";}?> class="form-control">{{$i}}</option>
						<?php } ?>
					</select>
					<!-- <input type="text" name="id_tipe" class="form-control input-lg" /> -->
				</div>
			</div>

			<div class="form-group">
				<div class="">
				<!-- <div class="col-md-8"> -->
					<input type="submit" name="submit" value="Submit" class="btn btn-primary col-md-6">
				</div>
			</div>
		</form>

	</div>

</div>

@endsection