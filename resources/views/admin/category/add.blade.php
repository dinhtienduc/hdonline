@extends('admin.master')  
@section('title','Add Category')
@section('contents')
<section class="content">
  <div class="row">
  <!-- Main content -->
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <!-- check error -->
        @include('admin.blocks.error')
        <h3 class="box-title">@yield('title')</h3>
      </div>
      <!-- form start -->
      <form role="form" action="{!!route('admin.category.getAdd')!!}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="box-body">
          <div class="form-group">
            <label>Select Category</label>
            <select class="form-control" name="selectCate">
              <option value="0">---Root---</option>
              <?php cateParent($parent,0,$str="--|",old('selectCate'));?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Name Category</label>
            <input type="text" name="txtCateName" class="form-control" placeholder="Enter Text" value="{!! old('txtCateName')!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Name SEO</label>
            <input type="text" name="txtNameSEO" class="form-control" placeholder="Enter Text" value="{!! old('txtNameSEO')!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Name English</label>
            <input type="text" name="txtNameEnglish" class="form-control" placeholder="Enter Text" value="{!! old('txtNameEnglish')!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Category Order</label>
            <input type="text" name="txtCateOrder" class="form-control" placeholder="Enter Number" value="{!! old('txtCateOrder')!!}">
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
</div>
</section>
@endsection()