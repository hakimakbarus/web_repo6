@extends('master.parent')

@section('content')

<div class="" align="right">
	<a href="/upload/create" class="btn btn-success btn-sm">Add</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-striped">
	<tr align="center">
		<th>User</th>
		<th>Type</th>
		<th>Judul</th>
		<th>Di Buat</th>
		<th>Di Update</th>
		<th>File</th>
		<th>Pengarang</th>
		<th>Action</th>
	</tr>
	@foreach($data as $row)
	<tr>
		<td>{{$row->id_user}}</td>
		<td>{{$row->id_tipe}}</td>
		<td>{{$row->judul}}</td>
		<td>{{$row->created_at}}</td>
		<td>{{$row->updated_at}}</td>
		<td>{{$row->file}}</td>
		<td>{{$row->pengarang}}</td>
		<td>
			<a href="/upload/{{$row->id}}/show" class="btn btn-primary">Show</a>
			<a href="/upload/{{$row->id}}/edit" class="btn btn-warning">Edit</a>
			<form action="/upload/{{$row->id}}/destroy" method="POST">
				@csrf
				<!-- @method('DELETE') -->
				<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		</td>
	</tr>
	@endforeach
	
</table>

{!! $data->links() !!}
@endsection