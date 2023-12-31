<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav"> 

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('employee/todayappointment') || request()->is('employee/todayappointment/*') ? 'c-active' : '' }}" href="{{ url('employee/todayappointment') }}">
                <i class="fa-fw far fa-calendar-check c-sidebar-nav-icon">
                </i>
                {{ trans('cruds.appointment.fields.todayappointments') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("employee.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("employee/system-calendar") || request()->is("employee/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('employee/appointment') || request()->is('employee/appointment/*') ? 'c-active' : '' }}" href="{{ route('employee.appointment.index') }}">
                <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">
                </i>
                {{ trans('cruds.appointment.title_singular') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link {{ request()->is('employee/password') || request()->is('employee/password/*') ? 'c-active' : '' }}" href="{{ route('employee.password.edit') }}">
                <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                </i>
                {{ trans('global.change_password') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a href="{{url('employee/signout')}}" class="c-sidebar-nav-link" >
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">
                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>