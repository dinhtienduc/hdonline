@extends('admin.master')  
@section('title','List News')
@section('contents')    
<section class="content">
  <div class="row">    
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          @include('admin.blocks.message')
          <h3 class="box-title">@yield('title')</h3>
          <button type="submit" class="btn btn-default" style="float: right;">
            <a href="{!! route('admin.news.getAdd')!!}"> Add</a>
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Image</th>
              <th>Information</th>
              <th>Writer</th>
              <th>Manager</th>
              <th>Manager</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            </thead>
            <tbody>
              <?php $stt = 0 ?>
              @foreach($data as $item)
              <?php $stt = $stt+1?>
              <tr>
                <td>{!!$stt!!}</td>
                <td>{!!$item["title"]!!}</td>
                <td>
                  <div class="attachment-block clearfix">
                    <img class="myimg2"  src="{!! isset($item["thumb"]) ? asset('upload/news/'.$item["thumb"]) : asset('duc_admin/dist/img/avatar5.png') !!}" alt="">
                  </div>
                </td>
                <td>{!!$item["information"]!!}</td>
                <td>{!!$item["writer"]!!}</td>
                <td>
                  <?php
                    $parent = DB::table('tb_users')->where('id',$item["user_id"])->first();
                    echo $parent->username;
                  ?>
                </td>
                <td>
                  @if($item["statut"] == 1)
                    Activated
                  @else
                    Not Activated
                  @endif
                </td>
                <td class="center">
                  <i class="fa fa-trash-o fa-fw"></i>
                  <a href="{!!URL::route('admin.news.getEdit',$item['id'])!!}">edit</a>
                </td>
                <td class="center">
                  <i class="fa fa-pencil fa-fw"></i>
                  <a onclick="return enterDel('Are you sure')" href="{!!URL::route('admin.news.getDelete',$item['id'])!!}"> del</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Information</th>
                <th>Writer</th>
                <th>Manager</th>
                <th>Manager</th>
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
