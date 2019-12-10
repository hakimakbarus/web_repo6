@extends('master.parentAdmin')

@section('content')


<div class="row">

   	<div class="col-md-8 col-md-offset-1">
       	<div class="panel panel-default">
           <div class="panel-heading"><b>Top Users Downloaded File </b></div>
           <div class="panel-body">
               <canvas id="canvas_top_downloads" height="280" width="600"></canvas>
           </div>
       	</div>
   	</div>
   	
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js" charset="utf-8"></script>

<script> 
var url = "{{url('dashboardAdmin/report/topDownloads/getTopTopDownloads')}}";
var USER = new Array();
var JUMLAH = new Array();
var NAMA_FILE = new Array();
$(document).ready(function(){
  $.get(url, function(response){
    response.forEach(function(data){
        USER.push(data.name);
        JUMLAH.push(data.download_count);
        NAMA_FILE.push(data.judul);
    });
    var ctx = document.getElementById("canvas_top_downloads");
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels:NAMA_FILE,
              datasets: [{
                  label: USER,
                  data: JUMLAH,
                  borderWidth: 1,
                  backgroundColor: ["#a3c7c9","#889d9e","#647678","#a1887f","#ffab91","#ffb74d","#ffd54f"],
     	 		        hoverBackgroundColor: ["#96b7b9","#718283","#5c6b6d","#8d6e63","#ff8a65","#ffa726","#ffca28"]
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
          }
      });
  });
});
</script>


@endsection