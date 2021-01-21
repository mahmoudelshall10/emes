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
								<a  href="{{aurl('serviceforms')}}"
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
								
{!! Form::open(['url'=>aurl('/serviceforms'),'id'=>'serviceforms','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
	{!! Form::label('page_url',trans('admin.page_url'),['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-9">
	{!! Form::text('page_url',old('page_url'),['class'=>'form-control','placeholder'=>trans('admin.page_url')]) !!}
	</div>
</div>
<br>
<div class="form-group">
		{!! Form::label('user_id',trans('admin.user_id'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('user_id',App\User::pluck('name','id'),old('user_id'),['class'=>'form-control','placeholder'=>trans('admin.user_id')]) !!}
		</div>
</div>
<br>
<div class="form-group">
		{!! Form::label('project_location',trans('admin.project_location'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('project_location',App\Model\Country::pluck('name','id'),old('project_location'),['class'=>'form-control','placeholder'=>trans('admin.project_location')]) !!}
		</div>
</div>
<br>
<div class="form-group">
    {!! Form::label('business_requirements',trans('admin.business_requirements'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('business_requirements',old('business_requirements'),['class'=>'form-control','placeholder'=>trans('admin.business_requirements')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('other_country',trans('admin.other_country'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('other_country',old('other_country'),['class'=>'form-control','placeholder'=>trans('admin.other_country')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('additional_attachments',trans('admin.additional_attachments'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('additional_attachments',['class'=>'form-control','placeholder'=>trans('admin.additional_attachments')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('linked_files',trans('admin.linked_files'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('linked_files',old('linked_files'),['class'=>'form-control','placeholder'=>trans('admin.linked_files')]) !!}
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
	
