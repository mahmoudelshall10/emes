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
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('pages/create')}}"
												data-toggle="tooltip" title="{{trans('admin.add')}}  {{trans('admin.pages')}}">
												<i class="fa fa-plus"></i>
										</a>
										<span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.pages')}}">
												<a data-toggle="modal" data-target="#myModal{{$pages->id}}" class="btn btn-circle btn-icon-only btn-default" href="">
														<i class="fa fa-trash"></i>
												</a>
										</span>
										<div class="modal fade" id="myModal{{$pages->id}}">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<button class="close" data-dismiss="modal">x</button>
																		<h4 class="modal-title">{{trans('admin.delete')}}؟</h4>
																</div>
																<div class="modal-body">
																		<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$pages->id}}) ؟
																</div>
																<div class="modal-footer">
																		{!! Form::open([
																		'method' => 'DELETE',
																		'route' => ['pages.destroy', $pages->id]
																		]) !!}
																		{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
																		<a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
																		{!! Form::close() !!}
																</div>
														</div>
												</div>
										</div>
										<a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('pages')}}"
												data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.pages')}}">
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
										
{!! Form::open(['url'=>aurl('/pages/'.$pages->id),'method'=>'put','id'=>'pages','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="form-group">
    {!! Form::label('page_id',trans('admin.page_id'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
{!! Form::select('page_id',App\Model\Page::pluck('name','id'), $pages->page_id ,['class'=>'form-control','placeholder'=>trans('admin.pagedepartment_id')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('name',trans('admin.name'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', $pages->name ,['class'=>'form-control','placeholder'=>trans('admin.name')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('desc',trans('admin.desc'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('desc', $pages->desc ,['class'=>'form-control','placeholder'=>trans('admin.desc')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('page_url',trans('admin.page_url'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('page_url', $pages->page_url ,['class'=>'form-control','placeholder'=>trans('admin.page_url')]) !!}
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('image',trans('admin.image'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::file('image',['class'=>'form-control','placeholder'=>trans('admin.image')]) !!}
        @if(!empty($pages->image))
        <img src="{{it()->url($pages->image)}}" style="width:150px;height:150px;" />
        @endif
    </div>
</div>
<br>
<div class="form-group">
    {!! Form::label('content',trans('admin.content'),['class'=>'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::textarea('content', $pages->content ,['class'=>'form-control','placeholder'=>trans('admin.content')]) !!}
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
		
