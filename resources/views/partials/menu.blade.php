<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.employee.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/employee") || request()->is("admin/employee/*") ? "c-active" : "" }}">
                <i class="fa-fw fas fa-user-cog c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.employee.title') }}
            </a>
        </li> 

        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/clients*") ? "c-show" : "" }} {{ request()->is("admin/comments*") ? "c-show" : "" }} {{ request()->is("admin/appointments*") ? "c-show" : "" }}">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                </i>
                {{ trans('global.main_menus.client_managment') }}
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.clients.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "c-active" : "" }}">
                        <i class="fa-fw far fa-user c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.clients.title') }}
                    </a>
                </li>


                <li class="c-sidebar-nav-item">
                    <a href="{{url('admin/appointments')}}" class="c-sidebar-nav-link {{ request()->is("admin/appointments") || request()->is("admin/appointments/*") ? "c-active" : "" }}">
                        <i class="fa-fw far fa-calendar-check c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.appointment.title') }}
                    </a>
                </li>

                <li class="c-sidebar-nav-item">
                    <a href="{{url('admin/comments')}}" class="c-sidebar-nav-link {{ request()->is("admin/comments") || request()->is("admin/comments/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-comment-dots c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.comments.title') }}
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/service*") ? "c-show" : "" }} {{ request()->is("admin/package*") ? "c-show" : "" }} {{ request()->is("admin/addon*") ? "c-show" : "" }}">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-receipt c-sidebar-nav-icon">

                </i>
                {{ trans('global.main_menus.package_managment') }}
            </a>
            <ul class="c-sidebar-nav-dropdown-items"> 

                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.package.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/package") || request()->is("admin/package/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-cubes c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.package.title') }}
                    </a>
                </li>

                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.service.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/service") || request()->is("admin/service/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.service.title') }}
                    </a>
                </li>

                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.addon.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/addon") || request()->is("admin/addon/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-plus-circle c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.addon.title') }}
                    </a>
                </li> 
            </ul>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{url('admin/contacts')}}" class="c-sidebar-nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "c-active" : "" }}">
                <i class="fa-fw fas fa-toolbox c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.contact.title') }}
            </a>
        </li>



        

        

        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/sliders*") ? "c-show" : "" }} {{ request()->is("admin/category*") ? "c-show" : "" }} {{ request()->is("admin/aboutus/1") ? "c-show" : "" }}">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                </i>
                {{ trans('global.main_menus.general_settings') }}
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.sliders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-image c-sidebar-nav-icon">
        
                        </i>
                        {{ trans('cruds.slider.title') }}
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.aboutus.edit",'1') }}" class="c-sidebar-nav-link {{ request()->is("admin/aboutus/1") || request()->is("admin/aboutus/1*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">
        
                        </i>
                        {{ trans('cruds.aboutus.title') }}
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.category.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/category") || request()->is("admin/category/*") ? "c-active" : "" }}">
                        <i class="fa-fw fas fa-align-left c-sidebar-nav-icon">
        
                        </i>
                        {{ trans('cruds.category.title') }}
                    </a>
                </li>  
        
            </ul>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                </i>
                {{ trans('global.change_password') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="#"  class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">
                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>