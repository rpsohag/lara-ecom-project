<ul class="nav nav-tabs mb-4 col-lg-3 col-md-4" role="tablist">
    <li class="nav-item">
        <a class="" href="{{ route('user_profile') }}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('read_order') }}">Orders</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#account">Account details</a>
    </li>
    <li class="nav-item">
        <a class="" href="{{ route('change_password') }}">Change Password</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     @csrf
</form>    
    </li>
</ul>