<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand">
    <!--begin::Brand Link-->
    <a href="{{ url('/dashboard') }}" class="brand-link">
      <!--begin::Brand Image-->

      {{-- <img src="{{ $user->profile_image 
                                ? asset('storage/'.$user->profile_image) 
                                : asset('assets/admin/assets/img/default-user.png') }}"
        class="brand-image opacity-75 shadow" alt="User Image"> --}}
      <!--end::Brand Image-->
      <!--begin::Brand Text-->
      <span class="brand-text fw-light">{{ config('app.name') }}</span>
      <!--end::Brand Text-->
    </a>
    <!--end::Brand Link-->
  </div>

  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <!--begin::Sidebar Menu-->
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation"
        data-accordion="false" id="navigation">
        <li class="nav-item menu-open">
          <a href="{{ url('/dashboard') }}" class="nav-link active">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>
              Dashboard

            </p>
          </a>

        </li>



        <li class="nav-item">
          <a href="{{ route('admin.users.index') }}"
            class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="nav-icon bi bi-people"></i>
            <p>Users</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{ route('admin.roles.index') }}" class="nav-link">
            <i class="nav-icon bi bi-shield-lock"></i>
            <p>Roles</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-newspaper"></i>
            <p>News & Events</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-envelope"></i>
            <p>Contact Messages</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-file-earmark-text"></i>
            <p>Admission Applications</p>
          </a>
        </li>


      </ul>
      <!--end::Sidebar Menu-->
    </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>