
@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>User</h1>
@stop

@section('content')
   

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Privileges</label>
                    <input type="text" class="form-control-plaintext" value="<?=($user->type=='1') ?'Admin':'User' ?>" readonly="">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Email</label>
                    <input type="text" class="form-control-plaintext" value="{{$user->email}}" readonly="">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Name</label>
                    <input type="text" class="form-control-plaintext" value="{{$user->name}}" readonly="">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Account Status</label>
                    <input type="text" class="form-control-plaintext" value="<?=($user->active=='1') ?'Active':'Unconfirmed' ?>" readonly="">
                </div>
            </div>
 

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Country</label>
                    <input type="text" class="form-control-plaintext" value="" readonly="">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Last Active</label>
                    <input type="text" class="form-control-plaintext" value="2021-04-05 11:32:17" readonly="">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Last User Agent</label>
                    <input type="text" class="form-control-plaintext" value="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36" readonly="">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Current Plan</label>
                    <div>
                        <a href="http://product.test/admin/plan-update/free">Free</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Plan Expiration Date</label>
                    <input type="text" class="form-control-plaintext" value="2021-04-05 11:32:17" readonly="">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Plan Trial Done</label>
                    <input type="text" class="form-control-plaintext" value="No" readonly="">
                </div>
            </div>


            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Total Logins</label>
                    <input type="text" class="form-control-plaintext" value="1" readonly="">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label class="font-weight-bold">Language</label>
                    <input type="text" class="form-control-plaintext" value="{{$user->language}}" readonly="">
                </div>
            </div>

        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop