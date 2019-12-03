@extends('master.parentUser')

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
				<!-- <th>User</th> -->
				<th width="10%">Type</th>
				<th width="20%">Judul</th>
				<th width="10%">Di Buat</th>
				<th width="10%">Di Update</th>
				<th width="15%">File</th>
				<th width="15%">Pengarang</th>
				<th>Action</th>
			</tr>
			@foreach($data as $row)
			<tr>
				<!-- <td>{{$row->name}}</td> -->
				<td>{{$row->name_cat}}</td>
				<td>{{$row->judul}}</td>
				<td>{{$row->created_at}}</td>
				<td>{{$row->updated_at}}</td>
				<td>{{$row->file}}</td>
				<td>{{$row->pengarang}}</td>
				<td>
					<div class="row">
						<div class="col-3">
							<a href="upload/{{$row->id}}/show" class="btn btn-primary btn-sm">Show</a>
						</div>
						<div class="col-3">
							<a href="upload/{{$row->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
						</div>
						<div class="col-3">
							<form action="/dashboardUser/{{auth()->user()->id}}/upload/{{$row->id}}/destroy" method="POST">
								@csrf
								<!-- @method('DELETE') -->
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
							</form>
						</div>
					</div>
				</td>
			</tr>
			@endforeach
			
		</table>
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