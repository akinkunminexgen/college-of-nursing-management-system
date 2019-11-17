<div id="sidebar">
    <ul>
        @php
            if (!isset($section)) $section = '';
            if (!isset($sub_section)) $sub_section = '';
        @endphp

        <li @if ($section == 'dashboard') class="active" @endif><a href="/admin">
            <i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>

        <!-- News section -->
        <li class="submenu @if ($section == 'news') active @endif @if (collect(['all', 'create'])->contains($sub_section)) open @endif">
            <a href="#"><i class="fa fa-bullhorn"></i> <span>News</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all') class="active" @endif><a href="{{route('news.index')}}">All Posts</a></li>
                <li @if ($sub_section == 'create') class="active" @endif><a href="{{route('news.create')}}">Create New Post</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="fa fa-book"></i> <span>Courses</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li><a href="{{route('courses.index')}}">All Courses</a></li>
                <li><a href="{{route('courses.create')}}">Add Course</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="fa fa-book"></i> <span>Departments</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li><a href="{{route('departments.index')}}">All Departments</a></li>
                <li><a href="{{route('departments.create')}}">Add Department</a></li>
            </ul>
        </li>

        <li @if ($section == 'students') class="active" @endif><a href="/admin/students">
            <i class="fa fa-group"></i> <span>Students</span></a>
        </li>

        <li @if ($section == 'admins') class="active" @endif><a href="/admin/admins">
            <i class="fa fa-group"></i> <span>Admins</span></a>
        </li>

        <li @if ($section == 'roles') class="active" @endif><a href="/admin/roles">
            <i class="fa fa-group"></i> <span>Roles</span></a>
        </li>

        <li @if ($section == 'settings') class="active" @endif><a href="/admin/settings">
            <i class="fa fa-cog"></i> <span>System Settings</span></a>
        </li>
    </ul>
</div>
