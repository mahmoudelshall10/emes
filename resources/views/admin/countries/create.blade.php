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
								<a  href="{{aurl('countries')}}"
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
								
{!! Form::open(['url'=>aurl('/countries'),'id'=>'countries','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('country_name',trans('admin.country_name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('country_name',old('country_name'),['class'=>'form-control','placeholder'=>trans('admin.country_name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('country_code',trans('admin.country_code'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('country_code',old('country_code'),['class'=>'form-control','placeholder'=>trans('admin.country_code')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('country_symbol',trans('admin.country_symbol'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('country_symbol',old('country_symbol'),['class'=>'form-control','placeholder'=>trans('admin.country_symbol')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('country_landmark_image',trans('admin.country_landmark_image'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('country_landmark_image',['class'=>'form-control','placeholder'=>trans('admin.country_landmark_image')]) !!}
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
	
