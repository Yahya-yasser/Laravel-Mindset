@props(['link', 'listName'])

<li class="menu-item active">
              <a href="{{route($link)}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">{{ $listName }}</div>
              </a>
            </li>