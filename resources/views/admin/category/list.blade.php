@extends('admin.master')  
@section('title','List Category')
@section('contents')    
<section class="content">
  <div class="row">    
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          @include('admin.blocks.message')
          <h3 class="box-title">@yield('title')</h3>
          <button type="submit" class="btn btn-default" style="float: right;">
            <a href="{!! route('admin.category.getAdd')!!}"> Add</a>
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Category Parent</th>
              <th>Name_SEO</th>
              <th>Name_English</th>
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
                  @if($item["parent_id"] == 0){!! $item["name"] !!}
                  @else()
                  <?php
                    $parent = DB::table('tb_category')->where('id',$item["parent_id"])->first();
                    echo $parent->name;
                  ?>
                  @endif
                </td>
                <td>
                  {!! $item["name_seo"]!!}
                </td>
                <td>
                  {!! $item["name_english"]!!}
                </td>
                <td class="center">
                  <i class="fa fa-trash-o fa-fw"></i><a href="{!!URL::route('admin.category.getEdit',$item['id'])!!}">edit</a>
                </td>
                <td class="center">
                  <i class="fa fa-pencil fa-fw"></i>
                  <a onclick="return enterDel('Are you sure')" href="{!!URL::route('admin.category.getDelete',$item['id'])!!}"> del</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category Parent</th>
                <th>Name_SEO</th>
                <th>Name_English</th>
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
