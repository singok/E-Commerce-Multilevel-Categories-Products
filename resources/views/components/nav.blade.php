<li class="nav-item menu-open">
    <a href="{{ route($routeName) }}" onMouseOver="this.style.color='#0362fc'" onMouseOut="this.style.color='white'" class="nav-link {{ Request::routeIs($routeName) ? 'active' : '' }}">
        <i class="fa-solid fa-{{ $iconName }} fa-lg"></i>
        <p>
            {{ $body }}
        </p>
    </a>
</li>   