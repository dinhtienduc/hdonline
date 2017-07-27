@extends('admin.master')  
@section('title','Edit Movies')
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
      <form role="form" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
          <div class="form-group">
            <label>Select Category</label>
            <select class="form-control" name="selectCate">
              <option value="">Please Choose Category</option>
              <?php cateParent($cate,0,$str="--",$data["category_id"]);?> 
            </select>
          </div>
          <div class="form-group">
            <label>Select Actor</label>
            <select class="form-control" name="selectActor">
              <option value=""> </option>
              <?php cateParent($actor,0,$str="--",$data["actor_id"]);?> 
            </select>
          </div>
          <div class="form-group">
            <label>Select Country</label>
            <select class="form-control" name="selectCountry">
              <option value=""> </option>
              <?php cateParent($country,0,$str="--",$data["country_id"]);?> 
            </select>
          </div>
          <!-- imdb -->
          <div class="form-group">
            <label for="exampleInputEmail1">Upgrade Movies </label></br>
            <label class="radio-inline">
              <input name="rdoUpgrade" type="radio" value="1"@if($data["type_movies"] == 1) checked ="checked" @endif />Normal
            </label>
            <label class="radio-inline">
              <input name="rdoUpgrade" type="radio" value="2"@if($data["type_movies"] == 2) checked ="checked" @endif/>New
            </label>
            <label class="radio-inline">
              <input name="rdoUpgrade" type="radio" value="3"@if($data["type_movies"] == 3) checked ="checked" @endif />Comming
            </label>
          </div>
          <hr align="center" />
          <!-- if enter imdb -->
          <label for="exampleInputEmail1">Url IMDB ( Please Enter ID_IMDB ex: tt2568862 )</label>
          <div class="input-group input-group-sm" >
            <input type="text" id="txtIMDB" name="txtIMDB" class="form-control" value="{!! old('txtIMDB',isset($data) ? $data['url_imdb'] : txtIMDB)!!}" placeholder="Enter ID IMDB" >
                <span class="input-group-btn">
                  <input type="button" id="getIMDB" class="btn btn-info btn-flat" value="Enter">
                </span>
                <div id="getMessage"></div>
          </div></br>
          <!-- data ajax -->
          <div class="form-group">
            <label for="exampleInputEmail1">Name Movies</label>
            <input type="text" name="txtTitle" class="form-control" placeholder="Enter Name Movies" value="{!! old('txtTitle',isset($data) ? $data['title'] : null)!!}"  >
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Name SEO</label>
            <input type="text" name="txtTitleSEO" class="form-control" placeholder="Enter Name SEO" value="{!! old('txtTitleSEO',isset($data) ? $data['title_seo'] : null)!!}"  >
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Director</label>
            <input type="text" name="txtDirec" class="form-control" placeholder="Enter Director" value="{!! old('txtDirec',isset($data) ? $data['director'] : null)!!}"  >
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Genre</label>
            <input type="text" name="txtGenre" class="form-control" placeholder="Enter Name Movies" value="{!! old('txtGenre',isset($data) ? $data['imdb_genre'] : null)!!}"  >
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Year</label>
            <input type="text" name="txtYear" class="form-control" placeholder="Enter Year" value="{!! old('txtYear',isset($data) ? $data['imdb_year'] : null)!!}"  >
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">RunTime</label>
            <input type="text" name="txtTime" class="form-control" placeholder="Enter Time" value="{!! old('txtTime',isset($data) ? $data['imdb_runtime'] : null)!!}"  >
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Language</label>
            <input type="text" name="txtLang" class="form-control" placeholder="Enter Language" value="{!! old('txtLang',isset($data) ? $data['imdb_lang'] : null)!!}"  >
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Ratting</label>
            <input type="text" name="txtRat" class="form-control" placeholder="Enter Ratting" value="{!! old('txtRat',isset($data) ? $data['imdb_ratting'] : null)!!}"  >
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" name="txtDescrip" class="form-control" placeholder="Enter Description" value="{!! old('txtDescrip',isset($data) ? $data['description'] : null)!!}" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Total Episode</label>
            <input type="text" name="txtTotal" class="form-control" placeholder="Enter Text" value="{!! old('txtTotal',isset($data) ? $data['total'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Current Images</label>
            <img class="myimg1" src="{!! isset($data["thumb"]) ? asset('upload/movies/'.$data["thumb"]) : asset('duc_admin/dist/img/avatar5.png') !!}" alt="">
            <input type="hidden" id="exampleInputFile" name="fimagesCurrent" value="{!! $data["thumb"]!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Images input</label>
            <input type="text" name="fimages" class="form-control" placeholder="Enter Images">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Quality Movies </label></br>
            <label class="radio-inline">
              <input name="rdoQuality" type="radio" value="1" @if($data["quality"] == 1) checked ="checked" @endif />HD1080
            </label>
            <label class="radio-inline">
              <input name="rdoQuality" type="radio" value="2" @if($data["quality"] == 2) checked ="checked" @endif />HD720
            </label>
            <label class="radio-inline">
              <input name="rdoQuality" type="radio" value="3" @if($data["quality"] == 3) checked ="checked" @endif />HDRIP
            </label>
            <label class="radio-inline">
              <input name="rdoQuality" type="radio" value="4" @if($data["quality"] == 4) checked ="checked" @endif />SD
            </label>
          </div>
          <!-- end imdb -->
          <div class="form-group">
            <label for="exampleInputEmail1">Status Movies (long episode or short episode) </label></br>
            <label class="radio-inline">
              <input name="rdoLevel" type="radio" value="1" @if($data["type"] == 1) checked ="checked" @endif/>Long
            </label>
            <label class="radio-inline">
              <input name="rdoLevel" type="radio" value="2" @if($data["type"] == 2) checked ="checked" @endif/>Short
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
</div>
</section>
@endsection()