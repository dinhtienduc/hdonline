@extends('admin.master')  
@section('title','Edit News')
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
            <input type="text" name="txtName" class="form-control" placeholder="Enter Name News" value="{!! old('txtName',isset($data) ? $data['title'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Writer</label>
            <input type="text" name="txtWriter" class="form-control" placeholder="Enter Name Writer" value="{!! old('txtWriter',isset($data) ? $data['writer'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Shortly</label>
            <input type="text" name="txtShort" class="form-control" placeholder="Enter Name Writer" value="{!! old('txtShort',isset($data) ? $data['shortly'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Current Images</label>
            <img class="myimg4" src="{!! isset($data["thumb"]) ? asset('upload/news/'.$data["thumb"]) : asset('duc_admin/dist/img/avatar5.png') !!}" alt="">
            <input type="hidden" id="exampleInputFile" name="fimagesCurrent" value="{!! $data["thumb"]!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Images input</label>
            <input type="file" id="exampleInputFile" name="fimages">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Information</label>
              <textarea id="editor1" name="txtInfo" rows="10" cols="80">{!! old('txtInfo',isset($data) ? $data['information'] : null)!!}</textarea>
              <script type="text/javascript">  
                 CKEDITOR.replace( 'editor1' );  
              </script>  
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Status</label></br>
            <label class="radio-inline">
              <input name="rdoLevel" type="radio" value="1" @if($data["statut"] == 1) checked ="checked" @endif/>Activated
            </label>
            <label class="radio-inline">
              <input name="rdoLevel" type="radio" value="2" @if($data["statut"] == 2) checked ="checked" @endif/>Not Activated
            </label>
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