<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @foreach($menus as $menu)
        @if($menu->children->count() > 0)
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#menu-{{ $menu->id }}" data-bs-toggle="collapse" href="#">
                <i class="{{ $menu->ikon ?? 'bi bi-circle' }}"></i><span>{{ $menu->nama }}</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="menu-{{ $menu->id }}" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @foreach($menu->children as $child)
                <li>
                    <a href="{{ $child->url ? (Str::contains($child->url, '.') ? route($child->url) : url($child->url)) : '#' }}">
                        <i class="{{ $child->ikon ?? 'bi bi-circle' }}"></i>
                        <span>{{ $child->nama }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ $menu->url ? (Str::contains($menu->url, '.') ? route($menu->url) : url($menu->url)) : '#' }}">
                <i class="{{ $menu->ikon ?? 'bi bi-circle' }}"></i>
                <span>{{ $menu->nama }}</span>
            </a>
        </li>
        @endif
        @endforeach
    </ul>
</aside>