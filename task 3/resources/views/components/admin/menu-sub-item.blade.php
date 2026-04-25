@props(['link', 'itemtName'])
<li class="menu-item">
    <a href="{{route($link)}}" class="menu-link">
        <div data-i18n="Without menu">{{$itemtName }}</div>
     </a>
</li>