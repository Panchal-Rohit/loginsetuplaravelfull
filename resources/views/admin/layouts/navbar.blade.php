<nav class="app-header navbar navbar-expand bg-body">

  <div class="container-fluid">

    <!-- Start Navbar Left -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list"></i>
        </a>
      </li>
    </ul>
    <!-- End Left -->

    <!-- Start Navbar Right -->
    <ul class="navbar-nav ms-auto">

      <!-- 🔥 Messages Dropdown (Updated) -->
      <li class="nav-item dropdown m">
        <a class="nav-link" data-bs-toggle="dropdown" href="#">
          <i class="bi bi-chat-text"></i>
          <span class="navbar-badge badge text-bg-danger"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-lg start-30 translate-middle-x">



          <a href="#" class="dropdown-item">

            <div class="d-flex flex-column">
              <strong>ghghghg</strong>

              <span class="text-muted">
                my name
              </span>

              <small class="text-secondary">
                <i class="bi bi-clock me-1"></i>
                02:23
              </small>
            </div>

          </a>

          <div class="dropdown-divider"></div>



          <a href="#" class="dropdown-item dropdown-footer">
            View All Messages
          </a>
        </div>
      </li>
      <!-- End Messages -->

      <!-- Fullscreen Toggle -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
          <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
          <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
        </a>
      </li>

      <!-- 🔥 User Menu -->
      <li class="nav-item dropdown user-menu">

        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">

          <!-- Profile Image -->


          <span class="d-none d-md-inline">Rohit</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

          <!-- User Header -->
          <li class="user-header text-center" style="background:#d9f0d9">

            {{-- PROFILE IMAGE --}}
            <img src="{{ auth()->user()->profile_image
                    ? asset('storage/'.auth()->user()->profile_image)
                    : asset('assets/admin/assets/img/default-user.png') }}" class="rounded-circle mb-2" width="90"
              height="90" style="object-fit:cover;" alt="User Image">

            <p class="mb-0">
              {{ auth()->user()->name }}
              <small class="d-block">
                {{ auth()->user()->role->name ?? 'User' }}
              </small>
              <small>
                {{ auth()->user()->email }}
              </small>
            </p>
          </li>

          <!-- Footer -->
          <li class="user-footer d-flex justify-content-between px-2">
            <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat">
              Profile
            </a>

            <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
              Sign out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>

        </ul>


      </li>
      <!-- End User Menu -->

    </ul>
    <!-- End Navbar Right -->

  </div>

</nav>