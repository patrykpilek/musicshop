<ul class="nav nav-sidebar">
    <li class="{{ (Request::is('admin/dashboard') ? 'active' : '') }}"><a href="{{ url('/admin/dashboard') }}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
    <li class="{{ (Request::is('admin/users') ? 'active' : '') }}"><a href="{{ url('/admin/users') }}"><span class="glyphicon glyphicon-user"></span> Users</a></li>
    <li class="{{ (Request::is('admin/albums') ? 'active' : '') }}"><a href="{{ url('/admin/albums') }}"><span class="glyphicon glyphicon-music"></span> Albums</a></li>
</ul>
<ul class="nav nav-sidebar">
    <li><a href="">Nav item</a></li>
    <li><a href="">Nav item again</a></li>
    <li><a href="">One more nav</a></li>
    <li><a href="">Another nav item</a></li>
    <li><a href="">More navigation</a></li>
</ul>
<ul class="nav nav-sidebar">
    <li><a href="">Nav item again</a></li>
    <li><a href="">One more nav</a></li>
    <li><a href="">Another nav item</a></li>
</ul>