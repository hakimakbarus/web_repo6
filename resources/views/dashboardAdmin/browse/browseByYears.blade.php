@extends('master.parentAdmin')

@section('content')

<?php 
	$currently_selected = date('Y');
	$earliest_year = 1970;
	$latest_year = date('Y');
?>

<div class="form-group">
    <label for="email">Masukkan Tahun:</label>
    <form action="/dashboardAdmin/browse/year/byYear/" method="post" class="form-inline">
    	@csrf
	    <select name="year" class="form-control col-md-2 mr-4">
		<?php foreach( range( $latest_year ,$earliest_year) as $i) { ?>
			<option value="{{$i}}" <?php if($i === $currently_selected){ echo "selected='selected'";}?> class="form-control">{{$i}}</option>
		<?php } ?>
		</select>
		<input type="submit" name="submit" value="Browse" class="btn btn-success btn-sm col-md-1">
	</form>
</div>


@endsection