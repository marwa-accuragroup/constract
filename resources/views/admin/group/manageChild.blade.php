<ul class="menu-content">
    @foreach($childs as $child)

        <li class="nav-item start {{ Request::is($child->link.'*') ? 'active' : '' }}">

            <div style="float: left">
            <div class="d-inline-block custom-control custom-radio mr-1">
                <input type="radio" class="custom-control-input" name="menu_{{$child->parentId}}" id="menu_{{$child->parentId}}" value="1">
                <label class="custom-control-label" for="radio1">نعم  </label>
            </div>
            <div class="d-inline-block custom-control custom-radio mr-1">
                <input type="radio" class="custom-control-input" name="menu_{{$child->parentId}}" id="menu_{{$child->parentId}}" value="0">
                <label class="custom-control-label" for="radio2" checked="">لا  </label>
            </div>
            </div>



            <a href="#" class="nav-link ">
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