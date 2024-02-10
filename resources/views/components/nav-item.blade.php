<li class="nav-item dropdown {{ Request::is(substr($route, 6)) ? 'active' : '' }}">
    <a href="{{ route($route) }}" class="nav-link">
        <i class="{{ $icon }}"></i> <span>{{ $label }}</span>
    </a>
</li>
