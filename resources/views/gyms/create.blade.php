@extends('app')

@section('content')
	<div class="rightside bg-grey-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
	                @if ($errors->any())
                        <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
	                {!! Form::Open(['url' => 'gyms','id' => 'gymsform','files'=>'true']) !!}
                
                        <div class="panel no-border">
                        <div class="panel-title">
                        <div class="panel-head">@lang('gyms.add')</div>
                        </div>

                        

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                {!! Form::label('name',trans('gyms.name_en')) !!}
                                {!! Form::text('name_en',null,['class'=>'form-control', 'id' => 'name_en']) !!}       
                                    </div>                          
                                    </div>                          

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                {!! Form::label('name',trans('gyms.name_ar')) !!}
                                {!! Form::text('name_ar',null,['class'=>'form-control', 'id' => 'name_ar']) !!}       
                                    </div>                          
                                    </div>                             
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                {!! Form::label('status',trans('gyms.status')) !!}
                                <!--0 for inactive , 1 for active-->
                                {!! Form::select('status',array('enabled' => trans('gyms.enabled'), 'disabled' => trans('gyms.disabled')),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'status']) !!}     
                                    </div>  
                                    </div>
                               
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                {!! Form::label('phone',trans('gyms.phone')) !!}
                                {!! Form::text('phone',null,['class'=>'form-control', 'id' => 'phone']) !!}       
                                    </div>                          
                                    </div>                              
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2 pull-right">
                                <div class="form-group">
                                    {!! Form::submit('Create', ['class' => 'btn btn-primary pull-right']) !!}
                                </div>
                            </div>
                        </div>

                    {!! Form::Close() !!}
	            </div>
		    </div>
		</div>
	</div>
</div>

@stop