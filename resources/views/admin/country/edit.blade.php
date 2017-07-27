@extends('admin.master')  
@section('title','Edit Country')
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
            <label>Select Category</label>
            <select class="form-control" name="selectCountry">
              <option value="0">---Root---</option>
              <?php cateParent($parent,0,$str="--|",$data["parent_id"]) ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="txtName" class="form-control" placeholder="Enter Name Country" value="{!! old('txtName',isset($data) ? $data['name'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Name SEO</label>
            <input type="text" name="txtNameSEO" class="form-control" placeholder="Enter Name Country" value="{!! old('txtNameSEO',isset($data) ? $data['name_seo'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Information</label>
              <textarea id="editor1" name="txtInfo" rows="10" cols="80">{!! old('txtInfo',isset($data) ? $data['information'] : null)!!}</textarea>
              <script type="text/javascript">  
                 CKEDITOR.replace( 'editor1' );  
              </script>  
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Url</label>
            <input type="text" name="txtUrl" class="form-control" placeholder="Enter Name Country" value="{!! old('txtUrl',isset($data) ? $data['url_more'] : null)!!}">
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