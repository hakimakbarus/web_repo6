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
			<h4>Data Category : </h4>
			<div class="" align="right">
				<a href="category/create" class="btn btn-success btn-sm">Add</a>
			</div>
			<tr align="center">
				<th width="25%">Name</th>
				<th width="55%">Description</th>
				<th>Action</th>
			</tr>
			@foreach($data as $row)
			<tr>
				<td>{{$row->name_cat}}</td>
				<td>{{$row->desc_cat}}</td>
				<td>
					<div class="row">
						<div class="col-1"></div>
						<a href="category/{{$row->id}}/show" class="btn btn-primary btn-sm">Show</a>
						&nbsp;&nbsp;
						<a href="category/{{$row->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
						&nbsp;&nbsp;
						<form action="/dashboardAdmin/category/{{$row->id}}/destroy" method="POST">
							@csrf
							<!-- @method('DELETE') -->
							<button type="submit" class="btn btn-danger btn-sm">Delete</button>
						</form>
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