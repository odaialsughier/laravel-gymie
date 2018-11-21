@extends('app')

@section('content')

<div class="rightside bg-grey-100">
  <!-- BEGIN PAGE HEADING -->
    <div class="page-head bg-grey-100 padding-top-15 no-padding-bottom">
        
        <h1 class="page-title no-line-height">@lang('gyms.title')</h1>

		<a href="{{ action('GymsController@create') }}" class="btn btn-primary active pull-right" role="button"> @lang('gyms.add')</a></h1> 
		</div>



  	<div class="container-fluid">
<!-- Main row -->
<div class="row">
<div class="col-lg-12">
                            <div class="panel no-border ">
                                <div class="panel-title bg-white no-border">
                                </div>
                                <div class="panel-body no-padding-top bg-white">
                               <table id="staffs" class="table table-bordered table-striped">
<thead>
                <tr>
                <th class="text-center">@lang('gyms.name_en')</th>
                <th class="text-center">@lang('gyms.name_ar')</th>
                <th class="text-center">@lang('gyms.phone')</th>
                <th class="text-center">@lang('gyms.status')</th>
                <th class="text-center">@lang('gyms.action')</th>
                </tr>
                </thead>
                <tbody>
                	@foreach ($gyms as $gym)
                
                <tr>
                <td class="text-center">{{ $gym->name_en}}</td>
                <td class="text-center">{{ $gym->name_ar}}</td>
                <td class="text-center">{{ $gym->phone}}</td>
                <td class="text-center">{{ $gym->status}}</td>

                <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-info">@lang('gyms.action')</button>
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                      <li>
                      <a href="{{ action('GymsController@edit',['id' => $gym->id]) }}">
                           @lang('gyms.edit_details')                                        
                      </a>
                      </li>
                      <li>
                      <a href="#" class="delete-record" data-delete-url="{{ action('GymsController@delete',['id' => $gym->id]) }}" data-record-id="{{ $gym->id }}">@lang('gyms.delete_gym')</a>
                      </li>
                      </ul>
                    </div>                    
                </td>
                </tr>

                @endforeach


</tbody>
</table>

</div>
</div>
</div>
</div>
</div>

@stop

@section('footer_script_init')
    <script type="text/javascript">
        $(document).ready(function(){
            gymie.deleterecord();                       
     });
    </script>
@stop