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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('teams/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.teams')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.teams')}}">
												<a data-toggle="modal" data-target="#myModal{{$teams->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$teams->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$teams->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['teams.destroy', $teams->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('teams')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.teams')}}">
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
										
{!! Form::open(['url'=>aurl('/teams/'.$teams->id),'method'=>'put','id'=>'teams','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('career_id',trans('admin.career_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('career_id',App\Model\Career::pluck('career_name",'id'), $teams->career_id ,['class'=>'form-control','placeholder'=>trans('admin.career_id')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('user_id',trans('admin.user_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('user_id',App\User::pluck("name","id"), $teams->user_id ,['class'=>'form-control','placeholder'=>trans('admin.user_id')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('career_type',trans('admin.career_type'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('career_type',['freelance'=>trans('admin.freelance'),'full-time'=>trans('admin.full-time'),'part-time'=>trans('admin.part-time'),], $teams->career_type ,['class'=>'form-control','placeholder'=>trans('admin.career_type')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('rate_range_monthly_from',trans('admin.rate_range_monthly_from'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('rate_range_monthly_from', $teams->rate_range_monthly_from ,['class'=>'form-control','placeholder'=>trans('admin.rate_range_monthly_from')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('rate_range_monthly_to',trans('admin.rate_range_monthly_to'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('rate_range_monthly_to', $teams->rate_range_monthly_to ,['class'=>'form-control','placeholder'=>trans('admin.rate_range_monthly_to')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('rate_range_hourly_from',trans('admin.rate_range_hourly_from'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('rate_range_hourly_from', $teams->rate_range_hourly_from ,['class'=>'form-control','placeholder'=>trans('admin.rate_range_hourly_from')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('rate_range_hourly_to',trans('admin.rate_range_hourly_to'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('rate_range_hourly_to', $teams->rate_range_hourly_to ,['class'=>'form-control','placeholder'=>trans('admin.rate_range_hourly_to')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('cv_file',trans('admin.cv_file'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('cv_file',['class'=>'form-control','placeholder'=>trans('admin.cv_file')]) !!}
        @if(!empty($teams->cv_file))
        <img src="{{it()->url($teams->cv_file)}}" style="width:150px;height:150px;" />
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
		
