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
								<a  href="{{aurl('pages')}}"
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
								
{!! Form::open(['url'=>aurl('/pages'),'id'=>'pages','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
		{!! Form::label('page_id',trans('admin.page_id'),['class'=>'col-md-3 control-label']) !!}
		<div class="col-md-9">
{!! Form::select('page_id',App\Model\Page::pluck('name','id'),old('page_id'),['class'=>'form-control','placeholder'=>trans('admin.pagedepartment_id')]) !!}
		</div>
</div>
<br>
<div class="form-group">
    {!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('desc',trans('admin.desc'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('desc',old('desc'),['class'=>'form-control','placeholder'=>trans('admin.desc')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('page_url',trans('admin.page_url'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('page_url',old('page_url'),['class'=>'form-control','placeholder'=>trans('admin.page_url')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('image',trans('admin.image'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('image',['class'=>'form-control','placeholder'=>trans('admin.image')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('content',trans('admin.content'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('content',old('content'),['class'=>'form-control','placeholder'=>trans('admin.content')]) !!}
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
	
