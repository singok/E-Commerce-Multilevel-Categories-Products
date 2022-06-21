<li class="nav-item menu-open">
    <a href="{{ route($routeName) }}" class="nav-link {{ Request::routeIs($routeName) ? 'active' : '' }}">
        <i class="fa-brands fa-{{ $iconName }} fa-lg"></i>
        <p>
            {{ $body }}
        </p>
    </a>
</li>