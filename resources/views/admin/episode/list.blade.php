@extends('admin.master')  
@section('title','List Episode')
@section('contents')
<section class="content">
  <div class="row">    
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          @include('admin.blocks.message')
          <h3 class="box-title">@yield('title')</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Name Movies</th>
              <th>Url</th>
              <th>Url_Sub</th>
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
                <td>{!!$item["name"]!!}</td>
                <td>
                  <?php
                    $parent = DB::table('tb_movies')->where('id',$item["movies_id"])->first();
                    echo $parent->title;
                  ?>
                </td>
                <td>
                  {!! $item["url"]!!}
                </td>
                <td>
                  {!! $item["sub_url"]!!}
                </td>
                <td class="center">
                  <i class="fa fa-trash-o fa-fw"></i><a href="{!!URL::route('admin.movies.getEpisodeEdit',$item['id'])!!}">edit</a>
                </td>
                <td class="center">
                  <i class="fa fa-pencil fa-fw"></i>
                  <a onclick="return enterDel('Are you sure')" href="{!!URL::route('admin.movies.getEpisodeDelete',$item['id'])!!}"> del</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Name Movies</th>
                <th>Url</th>
                <th>Url_Sub</th>
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
