@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>User</h1>
@stop

@section('content')
   
   <div>
   <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Status</th>
      <th scope="col">Plan</th>
      <th scope="col">Detail</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class='table-bordered'>
  	<?php $a=1;?>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$a++}}</th>
      <td>{{$user->name}}</td>
      <td><?=($user->active=='1') ?'Active':'Unconfirmed' ?></td>
      <td>{{$user->plan_id}}</td>
      <td><a href='{{url("admin/users",$user->id)}}'>show</a>-
        <form action='{{ url("admin/users",$user->id)}}' method="POST">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button style="border: none;background: none;cursor: alias;" onclick="return confirm('Are you sure?')">Delete </button>
</form>


        -<a href='{{url("admin/users/$user->id/edit")}}'>update</a></td>
      <td>:</td>
    </tr>
 @endforeach
    
  </tbody>
</table>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop