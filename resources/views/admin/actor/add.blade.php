@extends('admin.master')  
@section('title','Add Actor')
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
      <form role="form" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="txtName" class="form-control" placeholder="Enter Name Actor" value="{!! old('txtName')!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Information</label>
              <textarea id="editor1" name="txtInfo" rows="10" cols="80">{!! old('txtInfo')!!}</textarea>
              <script type="text/javascript">  
                 CKEDITOR.replace( 'editor1' );  
              </script>  
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Url</label>
            <input type="text" name="txtUrl" class="form-control" placeholder="Enter Links Actor" value="{!! old('txtUrl')!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Images input</label>
            <input type="file" id="exampleInputFile" name="fimages">
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