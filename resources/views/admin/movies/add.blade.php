@extends('admin.master')  
@section('title','Add Movies')
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
      <form role="form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body"> 
          <div class="form-group">
            <label>Select Category</label>
            <select class="form-control" name="selectCate">
              <option value="">Please Choose Category</option>
              <?php cateParent($cate,0,$str="--",old('selectCate'));?>
            </select>
          </div>
          <div class="form-group">
            <label>Select Actor</label>
            <select class="form-control" name="selectActor">
              <option value="">Please Choose Actor</option>
              <?php cateParent($actor,0,$str="--",old('selectActor'));?>
            </select>
          </div>
          <div class="form-group">
            <label>Select Country</label>
            <select class="form-control" name="selectCountry">
              <option value="">Please Choose Country</option>
              <?php cateParent($country,0,$str="--",old('selectCountry'));?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Upgrade Movies </label></br>
            <label class="radio-inline">
              <input name="rdoUpgrade" type="radio" value="1" />Normal
            </label>
            <label class="radio-inline">
              <input name="rdoUpgrade" type="radio" value="2" checked/>New
            </label>
            <label class="radio-inline">
              <input name="rdoUpgrade" type="radio" value="3" />Comming
            </label>
          </div>
          <hr align="center" />
          <!-- if enter imdb -->
          <label for="exampleInputEmail1">Url IMDB ( Please Enter ID_IMDB ex: tt2568862 )</label>
          <div class="input-group input-group-sm" >
            <input type="text" id="txtIMDB" name="txtIMDB" class="form-control" value="{!! old('txtIMDB')!!}" placeholder="Enter ID IMDB" >
                <span class="input-group-btn">
                  <input type="button" id="getIMDB" class="btn btn-info btn-flat" value="Enter">
                </span>
                <div id="getMessage"></div>
          </div></br>
          <!-- data ajax -->
          <div class="form-group">
            <label for="exampleInputEmail1">Name Movies</label>
            <input type="text" name="txtTitle" class="form-control" placeholder="Enter Name Movies" value="{!! old('txtTitle')!!}"  >
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Name SEO</label>
            <input type="text" name="txtTitleSEO" class="form-control" placeholder="Enter Name SEO" value="{!! old('txtTitleSEO')!!}"  >
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Director</label>
            <input type="text" name="txtDirec" class="form-control" placeholder="Enter Director" value="{!! old('txtDirec')!!}"  >
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Genre</label>
            <input type="text" name="txtGenre" class="form-control" placeholder="Enter Name Movies" value="{!! old('txtGenre')!!}"  >
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Year</label>
            <input type="text" name="txtYear" class="form-control" placeholder="Enter Year" value="{!! old('txtYear')!!}"  >
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">RunTime</label>
            <input type="text" name="txtTime" class="form-control" placeholder="Enter Time" value="{!! old('txtTime')!!}"  >
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Language</label>
            <input type="text" name="txtLang" class="form-control" placeholder="Enter Language" value="{!! old('txtLang')!!}"  >
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Ratting</label>
            <input type="text" name="txtRat" class="form-control" placeholder="Enter Ratting" value="{!! old('txtRat')!!}"  >
          </div>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" name="txtDescrip" class="form-control" placeholder="Enter Description" value="{!! old('txtDescrip')!!}" >
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Images</label>
            <input type="text" name="fimages" class="form-control" placeholder="Enter Images" value="{!! old('fimages')!!}" >
          </div>
          <!-- <div class="form-group" id="Des">
            <label for="exampleInputFile">Description</label>
              <textarea id="editor1" name="txtDescrip" rows="10" cols="80" disabled></textarea>
              <script type="text/javascript">  
                 CKEDITOR.replace('editor1');  
              </script>  
          </div> -->

          <!-- <div class="form-group">
            <label for="exampleInputFile">Images input</label>
            <input type="file" id="exampleInputFile" name="fimages">
          </div> -->
          
          <!-- end imdb -->
          <hr align="center" />
          <div class="form-group">
            <label for="exampleInputEmail1">Total Episode</label>
            <input type="text" name="txtTotal" class="form-control" placeholder="Enter Text" value="{!! old('txtTotal')!!}">
          </div>
          <!-- end data ajax -->
          <div class="form-group">
            <label for="exampleInputEmail1">Status Movies (long episode or short episode) </label></br>
            <label class="radio-inline">
              <input name="rdoLevel" type="radio" value="1" checked/>Long
            </label>
            <label class="radio-inline">
              <input name="rdoLevel" type="radio" value="2" />Short
            </label>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Quality Movies </label></br>
            <label class="radio-inline">
              <input name="rdoQuality" type="radio" value="1" />HD1080
            </label>
            <label class="radio-inline">
              <input name="rdoQuality" type="radio" value="2" checked/>HD720
            </label>
            <label class="radio-inline">
              <input name="rdoQuality" type="radio" value="3" />HDRIP
            </label>
            <label class="radio-inline">
              <input name="rdoQuality" type="radio" value="4" />SD
            </label>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Name Episode</label>
            <input type="text" name="txtEpisode" class="form-control" placeholder="Enter Text" value="{!! old('txtEpisode')!!}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Url Episode</label>
            <input type="text" name="txtEpisodeUrl" class="form-control" placeholder="Enter Text" value="{!! old('txtEpisodeUrl')!!}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Trailer URL</label>
            <input type="text" name="txtSubUrl" class="form-control" placeholder="Enter Text" value="{!! old('txtSubUrl')!!}">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Sub Lang</label>
            <input type="text" name="txtSubLUrl" class="form-control" placeholder="Enter Text" value="{!! old('txtSubLUrl')!!}">
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
