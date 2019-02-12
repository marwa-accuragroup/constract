<ul class="menu-content">
    @foreach($childs as $child)

        <li class="nav-item start {{ Request::is($child->link.'*') ? 'active' : '' }}">

            <a href="{{ url('/'.$child->link)  }}" class="nav-link ">
                <i class="{{ $child->icon }}"></i>
                <span class="title">  {{ $child['name_'.App::getLocale()] }} </span>
                <span class="selected"></span>
            </a>

            @if(count($child->childs))
                @include('admin.sidebar.manageChild',['childs' => $child->childs])
            @endif


        </li>
    @endforeach
</ul>