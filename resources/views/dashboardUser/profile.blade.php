@extends('master.parentUser')

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
			<div class="col-6">
				<h1>Profile User</h1>
			</div>
			@if(session('sukses'))
				<div class="alert alert-success" role="alert">
				  {{session('sukses')}}
				</div>
			@endif
			<div class="col-12">
                

				<form action="/user/{{$user->id}}/update" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
				  <div class="form-group">	
					<!-- <a href="{{ URL::to('/') }}/images/{{$user->foto}}">aaa</a> -->
					<?php 
						if($user->foto!=""){
					?>
				    	<img src="{{ URL::to('/') }}/images/{{$user->foto}}"  class="img-thumbnail" alt="Foto" width="200">
				    <?php } else { ?>
				    	<img src="{{ URL::to('/') }}/images/default_foto.png"  class="img-thumbnail" alt="Foto" width="200">
				    <?php } ?>	
					<input type="hidden" name="hidden_image" value="{{$user->foto}}">
					<input type="file" name="foto">			  
				  </div>
				  <input type="hidden" value="{{$user->id_role}}" name="id_role">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Nama </label>
				    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Depan..." name="name" required="required" value="{{$user->name}}">
				    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				  </div>
				  
				  <div class="form-group">
				    <label for="exampleInputPassword1">Email </label>
				    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Nama Belakang..." name="email" required="required" value="{{$user->email}}">
				  </div>
				  <input type="hidden" value="{{$user->password}}" name="password"> 
				  <input type="hidden" value="{{$user->remember_token}}" name="rem_token"> 
				  <div class="form-group">
				    <label for="exampleInputPassword1">No Telpon </label>
				    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Masukkan No Telpon" name="no_telp" required="required" value="{{$user->no_telp}}">
				  </div>
                  <div class="form-group">
				    <label for="exampleInputPassword1">Tempat Lahir </label>
				    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan No Telpon" name="tempat_lahir" required="required" value="{{$user->tempat_lahir}}">
				  </div>
                  <div class="form-group">
				    <label for="exampleInputPassword1">Tanggal Lahir </label>
				    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Masukkan No Telpon" name="tanggal_lahir" required="required" value="{{$user->tanggal_lahir}}">
				  </div>
                  <div class="form-group">
				    <label for="exampleInputPassword1">Alamat </label>
				    <textarea name="alamat" class="form-control" id="" cols="30" rows="10">{{$user->alamat}}</textarea>
				  </div>
				  
                  <div class="form-group">
				    <label for="exampleInputPassword1">Bio </label>
				    <textarea name="bio" class="form-control" id="" cols="30" rows="10">{{$user->bio}}</textarea>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Jenis Kelamin</label>
				    <select class="custom-select" name="jenis_kelamin" required="required">
					  <option selected>Pilih Jenis Kelamin</option>
					  <option value="laki-laki" @if($user->jenis_kelamin == 'laki-laki') selected @endif>Laki-Laki</option>
					  <option value="perempuan" @if($user->jenis_kelamin == 'perempuan') selected @endif>Perempuan</option>
					</select>
				  </div>

			      <button type="submit" class="btn btn-warning">Update</button>
				</form>
			</div>
		</div>

@endsection