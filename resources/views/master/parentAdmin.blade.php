<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php 

// echo auth()->user()->id_role;

if(auth()->user()->id_role != 1){

	?>
	<div class="alert alert-danger">
		<ul>
			<li>Mohon maaf anda tidak diijinkan untuk masuk kehalaman ini</li>
	<?php
	if(auth()->user()->id_role === 2){
		// redirect('/dashboardUser/home');
		?>
			<li>Silahkan kembali ke halaman anda : <a href="/dashboardUser/home">klik disini</a></li>
		<?php
		header('location:127.0.0.1:8000/dashboardUser/home');
	}
	?>
		</ul>
	</div>
	<?php
}else{

?>

<body>

	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Six Repo's</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
	        <a class="nav-link" href="/dashboardAdmin/home">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/dashboardAdmin/upload">Upload </a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="/dashboardAdmin/category">Category </a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Browse
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="/dashboardAdmin/browse/year">By Years</a>
	          <a class="dropdown-item" href="/dashboardAdmin/browse/category">By Category</a>
	          <!-- <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a> -->
	        </div>
	      </li>
          
	      <li class="nav-item">
	        <!-- <a class="nav-link disabled" href="#">Disabled</a> -->
	      </li>
	    </ul>

        <ul class="navbar-nav">
          <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Welcome, {{auth()->user()->name}}
	        </a>
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="/dashboardAdmin/{{auth()->user()->id}}/profile">Profile</a>
	          <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#exampleModal">Logout</a>
	          <!-- <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a> -->
	        </div>
	      </li>
        </ul>
	  </div>
      
      
	</nav>
	<!-- navbar -->

	<div class="container-fluid">
		@yield('content')
	</div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Apakah anda ingin logout ?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	        <a class="btn btn-primary" href="/logout">Ya</a>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Modal -->


<?php } ?>

</body>

</html>