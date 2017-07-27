@extends('admin.master')  
@section('title','List Film')
@section('contents')    
<section class="content">
  <div class="row">    
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          @include('admin.blocks.message')
          <h3 class="box-title">@yield('title')</h3>
          <button type="submit" class="btn btn-default" style="float: right;">
            <a href="{!! route('admin.movies.getAdd')!!}"> Add</a>
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Information</th>
              <th>User Post</th>
              <th>URL IMDB</th>
              <th>Episode</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
              <?php $stt = 0 ?>
              @foreach($data as $item)
              <?php $stt = $stt+1?>
              <tr>
                <td class="myform">{!!$stt!!}</td>
                <td>
                  <div class="attachment-block clearfix">
                    <img class="myimg"  src="{!! isset($item["thumb"]) ? asset('upload/movies/'.$item["thumb"]) : asset('duc_admin/dist/img/avatar5.png') !!}" alt="">
                  </div>
                </td>
                <td>
                  <!-- name movie -->
                  <label>Name :</label>
                  <span>{!!$item["title"]!!}</span></br>
                  <!-- director movies -->
                  <label>Director :</label>
                  <span>{!!$item["director"]!!}</span></br>
                  <!-- category movies -->
                  <label>Category :</label>
                  <span>
                    <?php $cate = DB::table('tb_category')->where('id',$item["category_id"])->first();?>
                    @if(!empty($cate->name))
                      {!! $cate->name!!}
                    @endif
                  </span></br>
                  <!-- episode movies -->
                  <label>Episode :</label>
                  <span>{!!$item["total"]!!}</span></br>
                  <!-- country movies -->
                  <label>Country :</label>
                  <span>
                    <?php $country = DB::table('tb_country')->where('id',$item["country_id"])->first();?>
                    @if(!empty($country->name))
                      {!! $country->name!!}
                    @endif
                  </span></br>
                  <!-- quality -->
                  <label>Quality :</label>
                  <span>
                    @if($item["quality"] == 1)
                      1080 HD
                    @elseif($item["quality"] == 2)
                      720 HD
                    @elseif($item["quality"] == 3)
                      HD RIP
                    @else
                      SD
                    @endif
                  </span>
                </td>
                <td class="myform">
                  <?php
                    $parent = DB::table('tb_users')->where('id',$item["user_id"])->first();
                    echo $parent->username;
                  ?>
                </td>
                <td class="myform">{!!$item["url_imdb"]!!}</td>
                <td class="myform">
                  <i class="fa fa-rocket fa-fw"></i>
                  <a href="{!!URL::route('admin.movies.getEpisodeList',$item['id'])!!}">List Ep</a></br></br>
                  <i class="fa fa-plus fa-fw"></i>
                  <a href="{!!URL::route('admin.movies.getEpisodeAdd',$item['id'])!!}">Add Ep</a>
                </td>
                <td class="myform">
                  <i class="fa fa-trash-o fa-fw"></i>
                  <a href="{!!URL::route('admin.movies.getEdit',$item['id'])!!}">edit</a>
                </td>
                <td class="myform">
                  <i class="fa fa-pencil fa-fw"></i>
                  <a onclick="return enterDel('Are you sure')" href="{!!URL::route('admin.movies.getDelete',$item['id'])!!}"> del</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Information</th>
                <th>User Post</th>
                <th>URL IMDB</th>
                <th>Episode</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
@endsection()
