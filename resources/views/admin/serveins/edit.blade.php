@extends('admin.index')
	@section('content')
	<div class="row">
		<div class="col-md-12">
				<div class="widget-extra body-req portlet light bordered">
						<div class="portlet-title">
								<div class="caption">
										<span class="caption-subject bold uppercase font-dark">{{$title}}</span>
								</div>
								<div class="actions">
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('serveins/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.serveins')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.serveins')}}">
												<a data-toggle="modal" data-target="#myModal{{$serveins->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$serveins->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$serveins->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['serveins.destroy', $serveins->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('serveins')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.serveins')}}">
												<i class="fa fa-list"></i>
										</a>
										<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"
												data-original-title="{{trans('admin.fullscreen')}}"
												title="{{trans('admin.fullscreen')}}">
										</a>
								</div>
						</div>
						<div class="portlet-body form">
								<div class="col-md-12">
										
{!! Form::open(['url'=>aurl('/serveins/'.$serveins->id),'method'=>'put','id'=>'serveins','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('country_id',trans('admin.country_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('country_id',App\Model\Country::pluck('country_name','id'), $serveins->country_id ,['class'=>'form-control','placeholder'=>trans('admin.country_id')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('company_address',trans('admin.company_address'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('company_address', $serveins->company_address ,['class'=>'form-control','placeholder'=>trans('admin.company_address')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('longitude',trans('admin.longitude'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('longitude', $serveins->longitude ,['class'=>'form-control','placeholder'=>trans('admin.longitude')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('latitude',trans('admin.latitude'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('latitude', $serveins->latitude ,['class'=>'form-control','placeholder'=>trans('admin.latitude')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('company_phone',trans('admin.company_phone'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('company_phone', $serveins->company_phone ,['class'=>'form-control','placeholder'=>trans('admin.company_phone')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('company_email',trans('admin.company_email'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::email('company_email', $serveins->company_email ,['class'=>'form-control','placeholder'=>trans('admin.company_email')]) !!}
    </div>
</div>
<br>

<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
{!! Form::submit(trans('admin.save'),['class'=>'btn btn-success']) !!}
         </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

												</div>
												<div class="clearfix"></div>
								</div>
						</div>
				</div>
		</div>
		@stop
		
