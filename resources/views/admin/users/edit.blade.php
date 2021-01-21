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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('user/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.user')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.user')}}">
												<a data-toggle="modal" data-target="#myModal{{$users->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$users->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$users->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['user.destroy', $users->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('user')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.user')}}">
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
										
{!! Form::open(['url'=>aurl('/users/'.$users->id),'method'=>'put','id'=>'user','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', $users->name ,['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('first_name',trans('admin.first_name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('first_name', $users->first_name ,['class'=>'form-control','placeholder'=>trans('admin.first_name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('last_name',trans('admin.last_name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('last_name', $users->last_name ,['class'=>'form-control','placeholder'=>trans('admin.last_name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('email',trans('admin.email'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('email',$users->email,['class'=>'form-control','placeholder'=>trans('admin.email')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('password',trans('admin.password'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::password('password',$users->password,['class'=>'form-control','placeholder'=>trans('admin.password')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('password_confirmation',trans('admin.password_confirmation'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::password('password_confirmation',$users->password_confirmation,['class'=>'form-control','placeholder'=>trans('admin.password_confirmation')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('date_of_birth',trans('admin.date_of_birth'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('date_of_birth', $users->date_of_birth ,['class'=>'form-control date-picker','placeholder'=>trans('admin.date_of_birth'),'readonly'=>'readonly','data-date'=>date("Y-m-d"),'data-date-format'=>'yyyy-mm-dd']) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('company_name',trans('admin.company_name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('company_name', $users->company_name ,['class'=>'form-control','placeholder'=>trans('admin.company_name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('nationality',trans('admin.nationality'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('nationality', $users->nationality ,['class'=>'form-control','placeholder'=>trans('admin.nationality')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('country_of_residence',trans('admin.country_of_residence'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('country_of_residence', $users->country_of_residence ,['class'=>'form-control','placeholder'=>trans('admin.country_of_residence')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('mobile_number',trans('admin.mobile_number'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('mobile_number', $users->mobile_number ,['class'=>'form-control','placeholder'=>trans('admin.mobile_number')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('phone_number',trans('admin.phone_number'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('phone_number', $users->phone_number ,['class'=>'form-control','placeholder'=>trans('admin.phone_number')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('position',trans('admin.position'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('position', $users->position ,['class'=>'form-control','placeholder'=>trans('admin.position')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('account_status',trans('admin.account_status'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('account_status',['1'=>trans('admin.1'),'0'=>trans('admin.0'),], $users->account_status ,['class'=>'form-control','placeholder'=>trans('admin.account_status')]) !!}
    </div>
</div>
<br>

<div class="form-group">
    {!! Form::label('profile_image',trans('admin.profile_image'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('profile_image',['class'=>'form-control','placeholder'=>trans('admin.profile_image')]) !!}
        @if(!empty($users->profile_image))
        <img src="{{it()->url($users->profile_image)}}" style="width:150px;height:150px;" />
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
		
