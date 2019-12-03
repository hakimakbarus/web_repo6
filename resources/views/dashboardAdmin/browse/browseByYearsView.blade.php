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

@foreach($data as $row)
    <div class="card border-light mb-3 mx-4" style="max-width: 18rem; width: 18rem;">
      <div class="card-header bg-transparent border-light">{{$row->name_cat}}</div>
      <div class="card-body">
        <h5 class="card-title">{{$row->judul}}</h5>
        <p class="card-text">{{$row->abstrak}}</p> <br/>
        <!-- <a href="{{ URL::to('/') }}/files/{{$row->file}}"  target="_blank">{{$row->file}}</a> -->
        <a href="/home/{{$row->id}}/showUpload" class="btn btn-primary">Show</a>
      </div>
      <?php 
        $created_at_ = $row->created_at;
        $now = date('Y-m-j H:i:s');
        

        $time_differences = strtotime($now) - strtotime($created_at_);
        if($time_differences <= 3600){
          $time_differences /= 60;
          $time_differences_exp = explode('.', $time_differences);
          $cetak = $time_differences_exp[0] . " minutes ago";
        }else if($time_differences > 3600 && $time_differences < 86400){
          $time_differences /= 3600;
          $time_differences_exp = explode('.', $time_differences);
          $cetak = $time_differences_exp[0] . " hours ago";
        }else{
          $time_differences /= 86400;
          $time_differences_exp = explode('.', $time_differences);
          $cetak = $time_differences_exp[0] . " days ago";
        }
      ?>
      <!-- <div class="card-footer bg-transparent border-light">3 Days Ago</div> -->
      <div class="card-footer bg-transparent border-light">
        <p>About {{$cetak}}</p>
        <small><span class="fa fa-eye"></span> {{$row->view_count}} views &nbsp;&nbsp; <span class="fa fa-cloud-download"></span> {{$row->download_count}} downloads</small>
      </div>
    </div>
    
    <!-- <div class="col-md-4">
      <h2>{{$row->judul}}</h2>
      <p>{{$row->abstrak}}</p>
      <a href="{{ URL::to('/') }}/files/{{$row->file}}"  target="_blank">{{$row->file}}</a>
      <p><a class="btn btn-secondary" href="/home/{{$row->id}}/show" role="button">View details &raquo;</a></p>
    </div> -->
    @endforeach

    @if($data->total() == 0)
    	<p class="text-danger">Data tidak ditemukan</p>
    @endif
    <br/>
    <div class="col-md-12">
      Halaman : {{ $data->currentPage() }} <br/>
      <!-- Jumlah Data : {{ $data->total() }} <br/> -->
      <!-- Data Per Halaman : {{ $data->perPage() }} <br/> -->
      {{ $data->links() }}
    </div>


@endsection