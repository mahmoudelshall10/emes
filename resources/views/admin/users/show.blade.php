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
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('users/create')}}"
                           data-toggle="tooltip" title="{{trans('admin.users')}}">
                            <i class="fa fa-plus"></i>
                        </a>


                        <span data-toggle="tooltip" title="{{trans('admin.delete')}}  {{trans('admin.users')}}">

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
                                {{trans('admin.ask_del')}} {{trans('admin.id')}} {{$users->id}} ؟

            </div>
            <div class="modal-footer">
                {!! Form::open([
               'method' => 'DELETE',
               'route' => ['users.destroy', $users->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger']) !!}
                <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

                        <a class="btn btn-circle btn-icon-only btn-default" href="{{aurl('/users')}}"
                           data-toggle="tooltip" title="{{trans('admin.show_all')}}   {{trans('admin.users')}}">
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
<b>{{trans('admin.id')}} :</b> {{$users->id}}
</div>
<div class="clearfix"></div>
<hr />

<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.name')}} :</b>
 {!! $users->name !!}
</div>

<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.first_name')}} :</b>
 {!! $users->first_name !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.last_name')}} :</b>
 {!! $users->last_name !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.date_of_birth')}} :</b>
 {!! $users->date_of_birth !!}
</div>

<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.profile_image')}} :</b>
<img src="{{it()->url($users->profile_image)}}" alt='{{$users->name}}'style="width:150px;height:150px;" />
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.company_name')}} :</b>
 {!! $users->company_name !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.nationality')}} :</b>
 {!! $users->nationality !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.country_of_residence')}} :</b>
 {!! $users->country_of_residence !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.mobile_number')}} :</b>
 {!! $users->mobile_number !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.phone_number')}} :</b>
 {!! $users->phone_number !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.position')}} :</b>
 {!! $users->position !!}
</div>


<div class="col-md-4 col-lg-4 col-xs-4">
<b>{{trans('admin.account_status')}} :</b>
 {!! $users->account_status !!}
</div>

			</div>
			<div class="clearfix"></div>
           </div>
         </div>
       </div>
   </div>
@stop