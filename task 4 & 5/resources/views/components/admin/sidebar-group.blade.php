@props(['title', 'icon' => 'bx bx-folder', 'items' => []])

@php
    $isOpen = false;
    foreach ($items as $it) {
        $pattern = $it['active'] ?? ($it['route'] ?? null);
        if ($pattern && request()->routeIs($pattern)) {
            $isOpen = true;
            break;
        }
    }
@endphp

<li class="menu-item {{ $isOpen ? 'open' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle {{ $isOpen ? 'active' : '' }}">
        <i class="menu-icon tf-icons {{ $icon }}"></i>
        <div data-i18n="{{ $title }}">{{ $title }}</div>
    </a>

    <ul class="menu-sub">
        @foreach ($items as $it)
            @php
                $isActive = false;
                $pattern = $it['active'] ?? ($it['route'] ?? null);
                if ($pattern) {
                    $isActive = request()->routeIs($pattern);
                }

                $href = '#';
                if (!empty($it['href'])) {
                    $href = $it['href'];
                } elseif (!empty($it['route'])) {
                    $href = route($it['route'], $it['params'] ?? []);
                }
            @endphp

            <li class="menu-item {{ $isActive ? 'active' : '' }}">
                <a href="{{ $href }}" class="menu-link">
                    <div data-i18n="{{ $it['label'] }}">{{ $it['label'] }}</div>
                </a>
            </li>
        @endforeach
    </ul>
</li>
