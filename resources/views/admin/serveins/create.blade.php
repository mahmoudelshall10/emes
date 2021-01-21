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
								<a  href="{{aurl('serveins')}}"
										class="btn btn-circle btn-icon-only btn-default"
										tooltip="{{trans('admin.show_all')}}"
										title="{{trans('admin.show_all')}}">
										<i class="fa fa-list"></i>
								</a>
								<a class="btn btn-circle btn-icon-only btn-default fullscreen"
										href="#"
										data-original-title="{{trans('admin.fullscreen')}}"
										title="{{trans('admin.fullscreen')}}">
								</a>
						</div>
				</div>
				<div class="portlet-body form">
								<div class="col-md-12">
								
{!! Form::open(['url'=>aurl('/serveins'),'id'=>'serveins','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
		{!! Form::label('country_id',trans('admin.country_id'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('country_id',App\Model\Country::pluck('country_name','id'),old('country_id'),['class'=>'form-control','placeholder'=>trans('admin.country_id')]) !!}
		</div>
</div>
<br>
<div class="form-group">
    {!! Form::label('company_address',trans('admin.company_address'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('company_address',old('company_address'),['class'=>'form-control','placeholder'=>trans('admin.company_address')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('longitude',trans('admin.longitude'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('longitude',old('longitude'),['class'=>'form-control','placeholder'=>trans('admin.longitude')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('latitude',trans('admin.latitude'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('latitude',old('latitude'),['class'=>'form-control','placeholder'=>trans('admin.latitude')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('company_phone',trans('admin.company_phone'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('company_phone',old('company_phone'),['class'=>'form-control','placeholder'=>trans('admin.company_phone')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('company_email',trans('admin.company_email'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::email('company_email',old('company_email'),['class'=>'form-control','placeholder'=>trans('admin.company_email')]) !!}
    </div>
</div>
<br>

<div class="form-actions">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
{!! Form::submit(trans('admin.add'),['class'=>'btn btn-success']) !!}
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
	
