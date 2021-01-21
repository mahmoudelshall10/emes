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
                           data-toggle="tooltip" title="{{trans('admin.teams')}}">
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
                                {{trans('admin.ask_del')}} {{trans('admin.id')}} {{$teams->id}} ؟

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

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/teams')}}"
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
<div class="col-md-12 col-lg-12 col-xs-12">
<b>{{trans('admin.id')}} :</b> {{$teams->id}}
</div>
<div class="clearfix"></div>
<hr />

<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.career_id')}} :</b>
 {!! $teams->career_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.user_id')}} :</b>
 {!! $teams->user_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.career_id')}} :</b>
 {!! $teams->career_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.user_id')}} :</b>
 {!! $teams->user_id !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.career_type')}} :</b>
 {!! $teams->career_type !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.rate_range_monthly_from')}} :</b>
 {!! $teams->rate_range_monthly_from !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.rate_range_monthly_to')}} :</b>
 {!! $teams->rate_range_monthly_to !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.rate_range_hourly_from')}} :</b>
 {!! $teams->rate_range_hourly_from !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.rate_range_hourly_to')}} :</b>
 {!! $teams->rate_range_hourly_to !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.cv_file')}} :</b>
 {!! $teams->cv_file !!}
</div>

			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
@stop