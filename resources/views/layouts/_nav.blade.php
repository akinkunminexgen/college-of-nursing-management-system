<div data-toggle="affix" >
    <div class="container nav-menu2">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar2 navbar-toggleable-md navbar-light bg-faded">
                    <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                        <span class="icon-menu"></span>
                    </button>
                    <a href="{{asset('/')}}" class="navbar-brand nav-brand2"><img class="d-block" src="images/oysconmelogo2.png" alt="School logo"></a>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('welcome')}}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">
                                    About<span class="glyphicon glyphicon-chevron-down pull-right"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('about')}}">About Us</a></li>
                                    <li><a class="dropdown-item" href="{{url('/our-team')}}">College Officers</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('')}}">Admission</a>
                            </li>
                            <li class="js-navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown mega-dropdown">
                                        <a href="academics.html" class="dropdown-toggle nav-link" data-toggle="dropdown">Academics <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                                        <ul class="dropdown-menu mega-dropdown-menu row">
                                            <li class="col">
                                                <img src="images/departments.jpg" class="img-fluid dropdown-header" alt="#">
                                            </li>
                                            <li class="col">
                                                <ul>
                                                    <li class="dropdown-header">Departments</li>
                                                    @foreach ($department as $dept)
                                                        <li class="text-white"><a href="#">{{$dept->name}}</a></li>
                                                    @endforeach
                                                    <li class="divider"></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">
                                    Pages<span class="glyphicon glyphicon-chevron-down pull-right"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('events')}}">Events</a></li>
                                    <li><a class="dropdown-item" href="course-detail.html">Course Details</a></li>
                                    <li><a class="dropdown-item" href="campus-life.html">Campus Life</a></li>
                                    <li><a class="dropdown-item" href="teachers-single.html">Our teachers</a></li>
                                    <li><a class="dropdown-item" href="gallery.html">Gallery</a></li>
                                    <li><a class="dropdown-item" href="chairman-speech.html">Provost's Speech</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('portal.dashboard')}}">Portal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
                            </li>
                            @if(Auth::check())
                                @if(Auth::user()->hasRole(['admin']))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('dashboard.home') }}">Dashboard</a>
                                    </li>
                                @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('site.logout') }}">Logout</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
