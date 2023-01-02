      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Movie Database</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">MvDb</a>
          </div>
          <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>
            <li class="{{Request::is('Admin/AdminDashboard') ? 'active' : ''}}"><a class="nav-link" href="/Admin/AdminDashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="{{Request::is('Admin/Movie') ? 'active' : ''}}"><a class="nav-link" href="/Admin/Movie"><i class="far fa-user"></i> <span>Movie</span></a></li>
            <li class="{{Request::is('Admin/TVshow') ? 'active' : ''}}"><a class="nav-link" href="/Admin/TVshow"><i class="far fa-user"></i> <span>TV-Show</span></a></li>

          <li class="menu-header">Data</li>
            <li class="{{Request::is('Admin/Celebs') ? 'active' : ''}}"><a class="nav-link" href="/Admin/Celebs"><i class="fas fa-list"></i> <span>Celebs</span></a></li>
            <li class="{{Request::is('Admin/Genre') ? 'active' : ''}}"><a class="nav-link" href="/Admin/Genre"><i class="fas fa-list"></i> <span>Genre</span></a></li>          
            <li class="{{Request::is('Admin/Service') ? 'active' : ''}}"><a class="nav-link" href="/Admin/Service"><i class="fas fa-list"></i> <span>Service</span></a></li>
            <li class="{{Request::is('Admin/Tag') ? 'active' : ''}}"><a class="nav-link" href="/Admin/Tag"><i class="fas fa-list"></i> <span>Tag</span></a></li>
        </aside>
      </div>
