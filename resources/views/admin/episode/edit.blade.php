@extends('admin.master')  
@section('title','Edit Episode')
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
      <form role="form" action="" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name Episode</label>
            <input type="text" name="txtEpisode" class="form-control" placeholder="Enter Text" value="{!! old('txtEpisode',isset($data) ? $data['name'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">URL</label>
            <input type="text" name="txtEpisodeUrl" class="form-control" placeholder="Enter Text" value="{!! old('txtEpisodeUrl',isset($data) ? $data['url'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Url Sub</label>
            <input type="text" name="txtEpisodeSub" class="form-control" placeholder="Enter Text" value="{!! old('txtEpisodeSub',isset($data) ? $data['sub_url'] : null)!!}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Url Lang</label>
            <input type="text" name="txtEpisodeLang" class="form-control" placeholder="Enter Number" value="{!! old('txtEpisodeLang',isset($data) ? $data['sub_lang'] : null)!!}">
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