@extends('master.parentAdmin')

@section('content')

<div class="row">

	<div class="col-1"></div>

	<div class="col-10">
		<br/>
		@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		@endif

		<table class="table table-bordered table-striped">
			<h4>Data Upload : </h4>
			<div class="" align="right">
				<a href="upload/create" class="btn btn-success btn-sm">Add</a>
			</div>
			<tr align="center">
				<th width="10%">User</th>
				<th width="8%">Type</th>
				<th width="20%">Judul</th>
				<th width="10%">Di Buat</th>
				<th width="10%">Di Update</th>
				<th width="12%">File</th>
				<th width="10%">Pengarang</th>
				<th>Action</th>
			</tr>
			@foreach($data as $row)
			<tr>
				<td>{{$row->name}} <br> [{{$row->name_role}}]</td>
				<td>{{$row->name_cat}}</td>
				<td>{{$row->judul}}</td>
				<td>{{$row->created_at}}</td>
				<td>{{$row->updated_at}}</td>
				<td>{{$row->file}}</td>
				<td>{{$row->pengarang}}</td>
				<td>
					<div class="row">
							<div class="col-1"></div>
							<a href="upload/{{$row->id}}/show" class="btn btn-primary btn-sm">Show</a>
							&nbsp;&nbsp;
							<a href="upload/{{$row->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
							&nbsp;&nbsp;
							<form action="/dashboardAdmin/{{auth()->user()->id}}/upload/{{$row->id}}/destroy" method="POST">
								@csrf
								<!-- @method('DELETE') -->
								<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus {{$row->judul}}')">Delete</button>
							</form>
					</div>
				</td>
			</tr>
			@endforeach
			
		</table>
		<br/>
	    <div class="col-md-12">
	      Halaman : {{ $data->currentPage() }} <br/>
	      <!-- Jumlah Data : {{ $data->total() }} <br/> -->
	      <!-- Data Per Halaman : {{ $data->perPage() }} <br/> -->
	      {{ $data->links() }}
	    </div>
	</div>

</div>
<!-- {!! $data->links() !!} -->

@endsection