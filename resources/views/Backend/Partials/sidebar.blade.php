<style>
    .user-panel img {
        height: 2.1rem;
        width: 2.1rem;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('Backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(auth()->user()->image)
          <img src="{{ asset(auth()->user()->image) }}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{ asset('Backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          @endif

        </div>
        <div class="info">
          <a href="{{ route('admin.profile.index') }}" class="d-block">{{ auth()->user()->name ?? 'Default Name' }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview {{ Route::is('admin.profile.index') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') || Route::is('admin.profile.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.profile.index') }}" class="nav-link {{ Route::is('admin.profile.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ Route::is('admin.about-us.index') || Route::is('admin.about-us.edit') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('admin.about-us.index') || Route::is('admin.about-us.eidt') ? 'active' : '' }}">
                <i class="fa fa-codiepie nav-icon" aria-hidden="true"> </i>
              <p>
                About Us
                <i class="right fas fa-angle-left nav-icon"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.about-us.index') }}" class="nav-link {{ Route::is('admin.about-us.index') ? 'active' : '' }}">
                    <i class="fa fa-list nav-icon" aria-hidden="true"> </i>
                  <p>About</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.about-us.edit', 1) }}" class="nav-link {{ Route::is('admin.about-us.edit') ? 'active' : '' }}">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Update Aboute</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ Route::is('admin.tag.index') || Route::is('admin.tag.create') || Route::is('admin.tag.edit') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('admin.tag.index') || Route::is('admin.tag.create') || Route::is('admin.tag.eidt') ? 'active' : '' }}">
                <i class="fa fa-codiepie nav-icon" aria-hidden="true"> </i>
              <p>
                Tags
                <i class="right fas fa-angle-left nav-icon"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.tag.index') }}" class="nav-link {{ Route::is('admin.tag.index') ? 'active' : '' }}">
                    <i class="fa fa-list nav-icon" aria-hidden="true"> </i>
                  <p>Tags List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.tag.create') }}" class="nav-link {{ Route::is('admin.tag.create') ? 'active' : '' }}">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Tag Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ Route::is('admin.category.index') || Route::is('admin.category.create') || Route::is('admin.category.edit') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('admin.category.index') || Route::is('admin.category.create') || Route::is('admin.category.eidt') ? 'active' : '' }}">
                <i class="fa fa-codiepie nav-icon" aria-hidden="true"> </i>
              <p>
                Category
                <i class="right fas fa-angle-left nav-icon"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link {{ Route::is('admin.category.index') ? 'active' : '' }}">
                    <i class="fa fa-list nav-icon" aria-hidden="true"> </i>
                  <p>Category List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.create') }}" class="nav-link {{ Route::is('admin.category.create') ? 'active' : '' }}">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Category Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ Route::is('admin.post.index') || Route::is('admin.post.create') || Route::is('admin.post.show') || Route::is('admin.post.edit') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('admin.post.index') || Route::is('admin.post.create') || Route::is('admin.post.edit') ? 'active' : '' }}">
                <i class="fa fa-codiepie nav-icon" aria-hidden="true"> </i>
              <p>
                Posts
                <i class="right fas fa-angle-left nav-icon"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.post.index') }}" class="nav-link {{ Route::is('admin.post.index') ? 'active' : '' }}">
                    <i class="fa fa-list nav-icon" aria-hidden="true"> </i>
                  <p>Posts List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.post.create') }}" class="nav-link {{ Route::is('admin.post.create') ? 'active' : '' }}">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Post Create</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ Route::is('admin.website.index') || Route::is('admin.website.edit') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('admin.website.index') || Route::is('admin.website.edit') ? 'active' : '' }}">
                <i class="fa fa fa-globe fa-lg nav-icon" aria-hidden="true"> </i>
              <p>
                Website
                <i class="right fas fa-angle-left nav-icon"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.website.index') }}" class="nav-link {{ Route::is('admin.website.index') ? 'active' : '' }}">
                    <i class="fa fa-list nav-icon" aria-hidden="true"> </i>
                  <p>Website Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.website.edit', 1) }}" class="nav-link {{ Route::is('admin.website.edit') ? 'active' : '' }}">
                  <i class="fa fa-plus-square nav-icon"></i>
                  <p>Website Details Update</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a target="_blank" href="{{ route('frontend.home-page') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                View Webiste
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
