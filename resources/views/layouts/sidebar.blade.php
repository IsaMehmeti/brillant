<div class="be-left-sidebar">
  <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="/">Paneli Kryesor</a>
    <div class="left-sidebar-spacer">
      <div class="left-sidebar-scroll">
        <div class="left-sidebar-content">
          <ul class="sidebar-elements">
            <li class="divider">Kryesore</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="/"><i class="icon mdi mdi-home"></i><span>Paneli Kryesor</span></a></li>
            <li class="parent {{ Request::is('sales*') ? 'open' : '' }}">
                <a href="#"><i class="icon mdi mdi-money"></i><span>Shitjet</span></a>
              <ul class="sub-menu">
                 <li class="{{ Request::is('sales') ? 'active' : '' }}"><a href="{{route('sales.index')}}">Shitjet</a></li>
                <li class="{{ Request::is('sales/create') ? 'active' : '' }}"><a href="{{route('sales.create')}}" class="text-success">Shto</a></li>
              </ul>
            </li>
            <li class="parent {{ Request::is('materials/*') ? 'open' : '' }}">
                <a href="#"><i class="icon mdi mdi-collection-item"></i><span>Materiali</span></a>
              <ul class="sub-menu">
                 <li class="{{ Request::is('materials') ? 'active' : '' }}"><a href="{{route('materials.index')}}"><b>Te gjitha</b></a></li>
                  @foreach($categories as $category)
                     <li class="{{ Request::is("materials/category/$category->id") ? 'active' : '' }}"><a href="{{route('materials.showCategory', $category)}}"> {{$category->title}} ({{$category->materials()->count()}})</a></li>
                  @endforeach
                <li class="{{ Request::is('materials/create') ? 'active' : '' }}"><a href="{{route('materials.create')}}" class="text-success">Shto</a></li>
              </ul>
            </li>

{{--            <li class="parent {{ Request::is('shelves/*') ? 'open active' : '' }}">--}}
{{--              <a href="#"><i class="icon mdi mdi-book"></i><span>Raftat</span></a>--}}
{{--              <ul class="sub-menu">--}}
{{--                <li class="{{ Request::is('shelves') ? 'active' : '' }}"><a href="{{route('shelves.index')}}">Raftat</a></li>--}}
{{--                <li class="{{ Request::is('shelves/create') ? 'active' : '' }}"><a href="{{route('shelves.create')}}" class="text-success">Shto</a></li>--}}
{{--              </ul>--}}
{{--            </li>--}}

            <li class="divider">Tjera</li>
             <li class="parent {{ Request::is('material-categories/*') ? 'open' : '' }}">
                <a href="#"><i class="icon mdi mdi-collection-plus"></i><span>Kategorite</span></a>
              <ul class="sub-menu">
                 <li class="{{ Request::is('material-categories') ? 'active' : '' }}"><a href="{{route('material-categories.index')}}">Kategorite</a></li>
                <li class="{{ Request::is('material-categories/create') ? 'active' : '' }}"><a href="{{route('material-categories.create')}}" class="text-success">Shto</a></li>
              </ul>
            </li>
              <li class="parent {{ Request::is('firms/*') ? 'open' : '' }}">
                <a href="#"><i class="icon mdi mdi-account"></i><span>Firmat</span></a>
              <ul class="sub-menu">
                 <li class="{{ Request::is('firms') ? 'active' : '' }}"><a href="{{route('firms.index')}}">Firmat</a></li>
                <li class="{{ Request::is('firms/create') ? 'active' : '' }}"><a href="{{route('firms.create')}}" class="text-success">Shto</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
