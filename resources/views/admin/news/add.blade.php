@extends('admin.master')  
@section('title','Add News')
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
            <input type="text" name="txtName" class="form-control" placeholder="Enter Name News" value="{!! old('txtName')!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Writer</label>
            <input type="text" name="txtWriter" class="form-control" placeholder="Enter Name Writer" value="{!! old('txtWriter')!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Shortly</label>
            <input type="text" name="txtShort" class="form-control" placeholder="Enter Name Writer" value="{!! old('txtShort')!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Images input</label>
            <input type="file" id="exampleInputFile" name="fimages">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Information</label>
              <textarea id="editor1" name="txtInfo" rows="10" cols="80">{!! old('txtInfo')!!}</textarea>
              <script type="text/javascript">  
                 CKEDITOR.replace( 'editor1' );  
              </script>  
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Status</label></br>
            <label class="radio-inline">
              <input name="rdoLevel" type="radio" value="1" checked/>Activated
            </label>
            <label class="radio-inline">
              <input name="rdoLevel" type="radio" value="2" />Not Activated
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