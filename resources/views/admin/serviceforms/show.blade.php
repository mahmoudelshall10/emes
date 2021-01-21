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
                           data-toggle="tooltip" title="{{trans('admin.serviceforms')}}">
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
                                {{trans('admin.ask_del')}} {{trans('admin.id')}} {{$serviceforms->id}} ؟

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

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/serviceforms')}}"
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
<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.id')}} :</b> {{$serviceforms->id}}
</div>
<div class="clearfix"></div>
<hr />

<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.user_id')}} :</b>
 {!! $serviceforms->user_id !!}
</div>

<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.page_url')}} :</b>
 {!! $serviceforms->page_url !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.project_location')}} :</b>
 {!! $serviceforms->project_location !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.user_id')}} :</b>
 {!! $serviceforms->user_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.project_location')}} :</b>
 {!! $serviceforms->project_location !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.business_requirements')}} :</b>
 {!! $serviceforms->business_requirements !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.other_country')}} :</b>
 {!! $serviceforms->other_country !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.additional_attachments')}} :</b>
 {!! $serviceforms->additional_attachments !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.linked_files')}} :</b>
 {!! $serviceforms->linked_files !!}
</div>

			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
@stop