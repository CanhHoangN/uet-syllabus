<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Labels</span> <span class="label label-important">3</span></a>
            <ul>
                <li><a title="" href="{{url('/admin/descLevels')}}"><i class="fas fa-cloud-upload-alt"></i> <span class="text">Levels</span></a></li>
                <li><a title="" href="{{url('/admin/methods')}}"><i class="fas fa-cloud-upload-alt"></i> <span class="text">Methods</span></a></li>
                <li><a title="" href="{{url('/admin/suggest/1')}}"><i class="fas fa-cloud-upload-alt"></i> <span class="text">Suggests</span></a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Customers</span></a>
            <ul>
                <li><a title="" href="{{url('/admin/customers')}}"><i class="fas fa-cloud-upload-alt"></i> <span class="text">List Customers</span></a></li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->