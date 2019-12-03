@extends('master.parent')
 
@section('content')

<div class="row">

<div class="col-3"></div>

<div class="col-6">
    <h2>Register</h2>
    <form method="POST" action="/register" class="form">
        {{ csrf_field() }}
        <input type="hidden" value="2" name="id_role">
        <input type="hidden" value="<?php //echo str_random(60); ?>" name="rem_token">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama...">   
        </div>
 
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email... example@mail.com">
        </div>
 
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
        </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
 
</div>

<div class="col-3"></div>


</div>
@endsection