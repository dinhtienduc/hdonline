@extends('admin.master')  
@section('title','Edit User')
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
            <input type="text" name="txtUserName" class="form-control" placeholder="Enter Username" disabled value="{!! old('txtUserName',isset($data) ? $data['username'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" name="txtEmail" class="form-control" placeholder="Enter RePassword" value="{!! old('txtEmail',isset($data) ? $data['email'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" name="txtPassword" class="form-control" placeholder="Enter Password" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Re-Password</label>
            <input type="password" name="txtRePassword" class="form-control" placeholder="Enter RePassword">
          </div>
          @if(Auth::user()->id != $id)
          <div class="form-group">
            <label for="exampleInputEmail1">User Level </label>
            <label class="radio-inline">
              <input name="rdoLevel" type="radio" value="1" @if($data["level"] == 1) checked  @endif/>Admin
            </label>
            <label class="radio-inline">
              <input name="rdoLevel" type="radio" value="2" @if($data["level"] == 2) checked  @endif/>Member
            </label>
          </div>
          @else
            <div class="form-group">
            <label for="exampleInputEmail1">Level</label></br>
              @if($data["level"]==1)
                <input name="rdoLevel" type="radio" value="1" checked/>Admin
              @else
                <input name="rdoLevel" type="radio" value="2" checked/>Member
              @endif
            </label>
          </div>
          @endif
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