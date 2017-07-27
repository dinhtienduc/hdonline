@extends('admin.master')  
@section('title','Add User')
@section('contents')
  <!-- Main content -->
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <!-- check error -->
        @include('admin.blocks.error')
        <h3 class="box-title">@yield('title')</h3>
      </div>
      <!-- form start -->
      <form role="form" action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input type="text" name="txtUserName" class="form-control" placeholder="Enter Username" value="{!! old('txtUserName')!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" name="txtEmail" class="form-control" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" name="txtPassword" class="form-control" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Re-Password</label>
            <input type="password" name="txtRePassword" class="form-control" placeholder="Enter RePassword">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">User Level </label>
            <label class="radio-inline">
              <input name="rdoLevel" type="radio" value="1" checked/>Admin
            </label>
            <label class="radio-inline">
              <input name="rdoLevel" type="radio" value="2" />Member
            </label>
          </div> 
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-primary">Reset</button>
        </div>
      </form>
    </div>
    <!-- /.box -->
  </div>
@endsection()