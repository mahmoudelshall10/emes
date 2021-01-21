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
								<a  href="{{aurl('teams')}}"
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
								
{!! Form::open(['url'=>aurl('/teams'),'id'=>'teams','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
		{!! Form::label('career_id',trans('admin.career_id'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('career_id',App\Model\Career::pluck('career_name",'id'),old('career_id'),['class'=>'form-control','placeholder'=>trans('admin.career_id')]) !!}
		</div>
</div>
<br>
<div class="form-group">
		{!! Form::label('user_id',trans('admin.user_id'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('user_id',App\User::pluck("name","id"),old('user_id'),['class'=>'form-control','placeholder'=>trans('admin.user_id')]) !!}
		</div>
</div>
<br>
<div class="form-group">
		{!! Form::label('career_type',trans('admin.career_type'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('career_type',['freelance'=>trans('admin.freelance'),'full-time'=>trans('admin.full-time'),'part-time'=>trans('admin.part-time'),],old('career_type'),['class'=>'form-control','placeholder'=>trans('admin.career_type')]) !!}
		</div>
</div>
<br>
<div class="form-group">
    {!! Form::label('rate_range_monthly_from',trans('admin.rate_range_monthly_from'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('rate_range_monthly_from',old('rate_range_monthly_from'),['class'=>'form-control','placeholder'=>trans('admin.rate_range_monthly_from')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('rate_range_monthly_to',trans('admin.rate_range_monthly_to'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('rate_range_monthly_to',old('rate_range_monthly_to'),['class'=>'form-control','placeholder'=>trans('admin.rate_range_monthly_to')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('rate_range_hourly_from',trans('admin.rate_range_hourly_from'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('rate_range_hourly_from',old('rate_range_hourly_from'),['class'=>'form-control','placeholder'=>trans('admin.rate_range_hourly_from')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('rate_range_hourly_to',trans('admin.rate_range_hourly_to'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('rate_range_hourly_to',old('rate_range_hourly_to'),['class'=>'form-control','placeholder'=>trans('admin.rate_range_hourly_to')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('cv_file',trans('admin.cv_file'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('cv_file',['class'=>'form-control','placeholder'=>trans('admin.cv_file')]) !!}
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
	
