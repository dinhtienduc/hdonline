@extends('admin.master')  
@section('title','Edit Category')
@section('contents')
  <!-- Main content -->
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <!-- check error -->
        @include('admin.blocks.message')
        <h3 class="box-title">Edit Category</h3>
      </div>
      <!-- form start -->
      <form role="form" action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="box-body">
          <div class="form-group">
            <label>Select Category</label>
            <select class="form-control" name="selectCate">
              <option value="0">---Root---</option>
              <?php cateParent($parent,0,$str="--|",$data["parent_id"]) ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Name Category</label>
            <input type="text" name="txtCateName" class="form-control" placeholder="Enter Text" value="{!! old('txtCateName',isset($data) ? $data['name'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Name SEO</label>
            <input type="text" name="txtNameSEO" class="form-control" placeholder="Enter Text" value="{!! old('txtNameSEO',isset($data) ? $data['name_seo'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Name English</label>
            <input type="text" name="txtNameEnglish" class="form-control" placeholder="Enter Text" value="{!! old('txtNameEnglish',isset($data) ? $data['name_english'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Category Order</label>
            <input type="text" name="txtCateOrder" class="form-control" placeholder="Enter Number" value="{!! old('txtCateOrder',isset($data) ? $data['order_by'] : null)!!}">
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