@extends('master.parentAdmin')

@section('content')

<div class="form-group">
    <label for="email">Masukkan Category:</label>
    <form action="/dashboardAdmin/browse/category/byCategory/" method="post" class="form-inline">
    	@csrf
	    <select name="id_cat" class="form-control mr-3">
			@foreach($data_cat as $row)
				<option value="{{$row->id}}" class="form-control">{{$row->name_cat}}</option>
			@endforeach
		</select>
		<input type="submit" name="submit" value="Browse" class="btn btn-success btn-sm col-md-1">
	</form>
</div>


@endsection