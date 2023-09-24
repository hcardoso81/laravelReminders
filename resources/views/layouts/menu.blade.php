<li class="nav-item">
    <a href="{{ route('reminders.index') }}" class="nav-link {{ Request::is('reminders*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Recordatios</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Users</p>
    </a>
</li>
