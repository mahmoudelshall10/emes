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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('countries/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.countries')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.countries')}}">
												<a data-toggle="modal" data-target="#myModal{{$countries->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$countries->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$countries->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['countries.destroy', $countries->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('countries')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.countries')}}">
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
										
{!! Form::open(['url'=>aurl('/countries/'.$countries->id),'method'=>'put','id'=>'countries','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('country_name',trans('admin.country_name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('country_name', $countries->country_name ,['class'=>'form-control','placeholder'=>trans('admin.country_name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('country_code',trans('admin.country_code'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('country_code', $countries->country_code ,['class'=>'form-control','placeholder'=>trans('admin.country_code')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('country_symbol',trans('admin.country_symbol'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('country_symbol', $countries->country_symbol ,['class'=>'form-control','placeholder'=>trans('admin.country_symbol')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('country_landmark_image',trans('admin.country_landmark_image'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('country_landmark_image',['class'=>'form-control','placeholder'=>trans('admin.country_landmark_image')]) !!}
        @if(!empty($countries->country_landmark_image))
        <img src="{{it()->url($countries->country_landmark_image)}}" style="width:150px;height:150px;" />
        @endif
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
		
