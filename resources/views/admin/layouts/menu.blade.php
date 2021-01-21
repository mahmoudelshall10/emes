<li class="nav-item start {{ active_link(null,'active open') }} ">
    <a href="{{aurl('')}}" class="nav-link nav-toggle">
        <i class="fa fa-home"></i>
        <span class="title">{{trans('admin.dashboard')}}</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start {{active_link('settings','active open')}}  ">
    <a href="{{aurl('settings')}}" class="nav-link nav-toggle">
        <i class="fa fa-cog"></i>
        <span class="title">{{trans('admin.settings')}}</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start {{active_link('contacts','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-phone"></i>
        <span class="title">{{trans('admin.contacts')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('contacts','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('contacts','active open')}}  "> 
            <a href="{{aurl('contacts')}}" class="nav-link "> 
                <i class="fa fa-phone"></i>
                <span class="title">{{trans('admin.contacts')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('contacts/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('sliders','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-sliders"></i>
        <span class="title">{{trans('admin.sliders')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('sliders','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('sliders','active open')}}  "> 
            <a href="{{aurl('sliders')}}" class="nav-link "> 
                <i class="fa fa-sliders"></i>
                <span class="title">{{trans('admin.sliders')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('sliders/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('cards','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-clone"></i>
        <span class="title">{{trans('admin.cards')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('cards','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('cards','active open')}}  "> 
            <a href="{{aurl('cards')}}" class="nav-link "> 
                <i class="fa fa-clone"></i>
                <span class="title">{{trans('admin.cards')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('cards/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('pages','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-paste"></i>
        <span class="title">{{trans('admin.pages')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('pages','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('pages','active open')}}  "> 
            <a href="{{aurl('pages')}}" class="nav-link "> 
                <i class="fa fa-paste"></i>
                <span class="title">{{trans('admin.pages')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('pages/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>

<li class="nav-item start {{active_link('countries','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-contao"></i>
        <span class="title">{{trans('admin.countries')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('countries','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('countries','active open')}}  "> 
            <a href="{{aurl('countries')}}" class="nav-link "> 
                <i class="fa fa-contao"></i>
                <span class="title">{{trans('admin.countries')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('countries/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('serveins','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-check"></i>
        <span class="title">{{trans('admin.serveins')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('serveins','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('serveins','active open')}}  "> 
            <a href="{{aurl('serveins')}}" class="nav-link "> 
                <i class="fa fa-check"></i>
                <span class="title">{{trans('admin.serveins')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('serveins/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('users','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-users"></i>
        <span class="title">{{trans('admin.users')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('users','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('users','active open')}}  "> 
            <a href="{{aurl('users')}}" class="nav-link "> 
                <i class="fa fa-users"></i>
                <span class="title">{{trans('admin.users')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('users/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('downloadfiles','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-arrow-down"></i>
        <span class="title">{{trans('admin.downloadfiles')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('downloadfiles','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('downloadfiles','active open')}}  "> 
            <a href="{{aurl('downloadfiles')}}" class="nav-link "> 
                <i class="fa fa-arrow-down"></i>
                <span class="title">{{trans('admin.downloadfiles')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('downloadfiles/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('socials','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-instagram"></i>
        <span class="title">{{trans('admin.socials')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('socials','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('socials','active open')}}  "> 
            <a href="{{aurl('socials')}}" class="nav-link "> 
                <i class="fa fa-instagram"></i>
                <span class="title">{{trans('admin.socials')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('socials/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('serviceforms','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-folder"></i>
        <span class="title">{{trans('admin.serviceforms')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('serviceforms','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('serviceforms','active open')}}  "> 
            <a href="{{aurl('serviceforms')}}" class="nav-link "> 
                <i class="fa fa-folder"></i>
                <span class="title">{{trans('admin.serviceforms')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('serviceforms/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('careers','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-briefcase"></i>
        <span class="title">{{trans('admin.careers')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('careers','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('careers','active open')}}  "> 
            <a href="{{aurl('careers')}}" class="nav-link "> 
                <i class="fa fa-briefcase"></i>
                <span class="title">{{trans('admin.careers')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('careers/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>
<li class="nav-item start {{active_link('teams','active open')}} ">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-steam"></i>
        <span class="title">{{trans('admin.teams')}} </span>
        <span class="selected"></span>
        <span class="arrow {{active_link('teams','open')}}"></span>
    </a>
    <ul class="sub-menu" style="{{active_link('','block')}}"> 
        <li class="nav-item start {{active_link('teams','active open')}}  "> 
            <a href="{{aurl('teams')}}" class="nav-link "> 
                <i class="fa fa-steam"></i>
                <span class="title">{{trans('admin.teams')}}  </span>
                <span class="selected"></span>
            </a>
        </li> 
        <li class="nav-item start"> 
            <a href="{{ aurl('teams/create') }}" class="nav-link "> 
                <i class="fa fa-plus"></i> 
                <span class="title"> {{trans('admin.create')}}  </span> 
                <span class="selected"></span> 
            </a> 
        </li> 
    </ul> 
</li>