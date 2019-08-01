<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Labels</span> <span class="label label-important">3</span></a>
            <ul>
                <li><a title="" href="{{url('/admin/descLevels')}}"><i class="fas fa-level-up-alt"></i> <span class="text">Levels</span></a></li>
                <li><a title="" href="{{url('/admin/methods')}}"><i class="fas fa-angle-double-right"></i> <span class="text">Methods</span></a></li>
                <li><a title="" href="{{url('/admin/suggest/1')}}"><i class="fas fa-align-left"></i> <span class="text">Suggests</span></a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="fas fa-users"></i> <span>Users</span></a>
            <ul>
                <li><a title="" href="{{url('/admin/customers')}}"><i class="fas fa-user"></i> <span class="text">List Users</span></a></li>
            </ul>
        </li>
        <li> <a href="{{url('/admin/editConstraintLB')}}"><i class="fad fa-tags"></i><span>Constraint Label</span></a>
    </ul>
</div>
<!--sidebar-menu-->