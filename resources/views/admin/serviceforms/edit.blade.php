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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('serviceforms/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.serviceforms')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.serviceforms')}}">
												<a data-toggle="modal" data-target="#myModal{{$serviceforms->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$serviceforms->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$serviceforms->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['serviceforms.destroy', $serviceforms->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('serviceforms')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.serviceforms')}}">
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
										
{!! Form::open(['url'=>aurl('/serviceforms/'.$serviceforms->id),'method'=>'put','id'=>'serviceforms','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
	{!! Form::label('page_url',trans('admin.page_url'),['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-9">
	{!! Form::text('page_url', $serviceforms->page_url,['class'=>'form-control','placeholder'=>trans('admin.page_url')]) !!}
	</div>
</div>
<br>
<div class="form-group">
    {!! Form::label('user_id',trans('admin.user_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('user_id',App\User::pluck('name','id'), $serviceforms->user_id ,['class'=>'form-control','placeholder'=>trans('admin.user_id')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('project_location',trans('admin.project_location'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('project_location',App\Model\Country::pluck('name','id'), $serviceforms->project_location ,['class'=>'form-control','placeholder'=>trans('admin.project_location')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('business_requirements',trans('admin.business_requirements'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('business_requirements', $serviceforms->business_requirements ,['class'=>'form-control','placeholder'=>trans('admin.business_requirements')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('other_country',trans('admin.other_country'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('other_country', $serviceforms->other_country ,['class'=>'form-control','placeholder'=>trans('admin.other_country')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('additional_attachments',trans('admin.additional_attachments'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('additional_attachments',['class'=>'form-control','placeholder'=>trans('admin.additional_attachments')]) !!}
        @if(!empty($serviceforms->additional_attachments))
        <img src="{{it()->url($serviceforms->additional_attachments)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('linked_files',trans('admin.linked_files'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('linked_files', $serviceforms->linked_files ,['class'=>'form-control','placeholder'=>trans('admin.linked_files')]) !!}
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
		
