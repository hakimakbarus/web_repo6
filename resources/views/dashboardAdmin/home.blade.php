@extends('master.parentAdmin')

@section('content')


<!-- Main -->
<main role="main">

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Hello, world!</h1>
    <p>Six's repo merupakan sebuah website yang berisi arsip yang berupa kumpulan salinan digital dari materi materi belajar, yang tujuannya untuk mengumpulkan, menyebarluaskan, melestarikan materi materi tersebut.</p>
    <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
  </div>
</div>

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-12">
        <h3>Upload terbaru</h3>
        <br>
    </div>
    @foreach($data as $row)
    <div class="card border-light mb-3 mx-4" style="max-width: 18rem; width: 18rem;">
      <div class="card-header bg-transparent border-light">{{$row->name_cat}}</div>
      <div class="card-body">
        <h5 class="card-title">{{$row->judul}}</h5>
        <p class="card-text">{{$row->abstrak}}</p> <br/>
        <!-- <a href="{{ URL::to('/') }}/files/{{$row->file}}"  target="_blank">{{$row->file}}</a> -->
        <a href="/dashboardAdmin/home/{{$row->id}}/showUpload" class="btn btn-primary">Show</a>
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
    <br/>
    <div class="col-md-12">
      Halaman : {{ $data->currentPage() }} <br/>
      <!-- Jumlah Data : {{ $data->total() }} <br/> -->
      <!-- Data Per Halaman : {{ $data->perPage() }} <br/> -->
      {{ $data->links() }}
    </div>
  </div>

  <hr>

</div> <!-- /container -->

</main>
<!-- Main -->

<!-- Footer -->
    <!-- <footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer> -->
    <footer class="container">
      <p>&copy; Company 2019-2020</p>
    </footer>
<!-- Footer -->

@endsection