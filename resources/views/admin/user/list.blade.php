@extends('admin.master')  
@section('title','List User')
@section('contents')        
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        @include('admin.blocks.message')
        <h3 class="box-title">@yield('title')</h3>
        <button type="submit" class="btn btn-default" style="float: right;">
            <a href="{!! route('admin.user.getAdd')!!}"> Add</a>
          </button>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>Level</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          </thead>
          <tbody>
            <?php $stt = 0 ?>
            @foreach($user as $item)
            <?php $stt = $stt+1?>
            <tr>
              <td>{!!$stt!!}</td>
              <td>{!!$item["username"]!!}</td>
              <td>
                @if($item["id"] == 1 && $item["level"] == 1)
                  SuperAdmin
                @elseif( $item["level"] == 1)
                  Admin
                @else
                  Member
                @endif
              </td>
              <td>{!!$item["email"]!!}</td>
              <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{!! URL::route ('admin.user.getEdit',$item['id'])!!}">Edit</a></td>
              <td class="center"><i class="fa fa-pencil fa-fw"></i><a onclick="return enterDel('Are you sure')" href="{!! URL::route ('admin.user.getDelete',$item['id'])!!}"> Del</a></td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>UserName</th>
              <th>Level</th>
              <th>Email</th>
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
@endsection()