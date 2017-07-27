@if(count($errors) >0)
  <div class=" alert alert-danger" >
    <ul>
      @foreach($errors->all() as $error)
        <li style="list-style-type: none;text-align: left;color: red;text-align: center;">
        	{!! $error!!}
        </li>
      @endforeach
    </ul>
  </div>
@endif