@extends('master.parent')

@section('content')

<div class="row">

  <div class="col-3"></div>

  <div class="col-6 my-auto">
    <form action="/postlogin" method="POST">
        {{csrf_field()}}
      <div class="form-group">
        <h3>Login</h3>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">
            <small class="form-text text-muted"> Check me out </small> 
        </label>
      </div>
      <button type="submit" class="btn btn-primary" style="width : 50%; margin-right:5%;">Submit</button>
      <button type="reset" class="btn btn-warning" style="width : 44%;">Reset</button>
      <small class="form-text text-muted">Belum punya akun ? <a href="/registrasi">Daftar</a></small>
    </form>
    <?php 
    $test = str_random(60);
    // echo $test;
     ?>
   </div>

  <div class="col-3"></div>

</div>
@endsection