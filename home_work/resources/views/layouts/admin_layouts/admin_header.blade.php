<!--Header-part-->
<div id="header">
    <h3 style="color: #6CD">Syllabus</h3>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class=""><a title="" href="{{url('/admin/dashboard')}}"><i class="icon icon-user"></i> <span class="text">
                    Welcome {{Auth::user()->name}}
                </span></a>
        </li>
        <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="fa fa-language" aria-hidden="true"></i> <span class="text">Language</span> <span class="label label-important">{{Session::get("language")}}</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a title="" href="{{url('/admin/language/en')}}">English</a></li>
                <li><a title="" href="{{url('/admin/language/vi')}}">Vietnamese</a></li>
            </ul>
        </li>
     

        <li class=""><a title="" href="{{url('/admin/settings')}}"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
        <li class=""><a title="" href="{{url('/logout')}}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>
</div>
<!--close-top-Header-menu-->