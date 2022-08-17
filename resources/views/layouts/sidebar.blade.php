<div class="be-left-sidebar">
  <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="/">Paneli Kryesor</a>
    <div class="left-sidebar-spacer">
      <div class="left-sidebar-scroll">
        <div class="left-sidebar-content">
          <ul class="sidebar-elements">
            <li class="divider">Menu</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="/"><i class="icon mdi mdi-home"></i><span>Paneli Kryesor</span></a></li>
            <li class="parent {{ Request::is('sales*') ? 'open' : '' }}">
                <a href="#"><i class="icon mdi mdi-money"></i><span>Shitjet</span></a>
              <ul class="sub-menu">
                 <li class="{{ Request::is('sales') ? 'active' : '' }}"><a href="{{route('sales.index')}}">Shitjet</a></li>
                <li class="{{ Request::is('sales/create') ? 'active' : '' }}"><a href="{{route('sales.create')}}" class="text-success">Shto</a></li>
              </ul>
            </li>
            <li class="parent {{ Request::is('sales*') ? 'open' : '' }}">
                <a href="#"><i class="icon mdi mdi-collection-item"></i><span>Material</span></a>
              <ul class="sub-menu">
                 <li class="{{ Request::is('sales') ? 'active' : '' }}"><a href="{{route('sales.index')}}"><b>Te gjitha</b></a></li>
                  @foreach($categories as $category)
                     <li class="{{ Request::is('sales') ? 'active' : '' }}"><a href="{{route('sales.index')}}"> - {{$category->title}}</a></li>
                  @endforeach
                <li class="{{ Request::is('sales/create') ? 'active' : '' }}"><a href="{{route('sales.create')}}" class="text-success">Shto</a></li>
              </ul>
            </li>
              <li class="parent {{ Request::is('sales*') ? 'open' : '' }}">
                <a href="#"><i class="icon mdi mdi-collection-plus"></i><span>Llojet e materialit</span></a>
              <ul class="sub-menu">
                 <li class="{{ Request::is('sales') ? 'active' : '' }}"><a href="{{route('sales.index')}}">Llojet e materialit</a></li>
                <li class="{{ Request::is('sales/create') ? 'active' : '' }}"><a href="{{route('sales.create')}}" class="text-success">Shto</a></li>
              </ul>
            </li>
            <li class="parent {{ Request::is('shelves/*') ? 'open active' : '' }}">
              <a href="#"><i class="icon mdi mdi-book"></i><span>Raftat</span></a>
              <ul class="sub-menu">
                <li class="{{ Request::is('shelves') ? 'active' : '' }}"><a href="{{route('shelves.index')}}">Raftat</a></li>
                <li class="{{ Request::is('shelves/create') ? 'active' : '' }}"><a href="{{route('shelves.create')}}" class="text-success">Shto</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
