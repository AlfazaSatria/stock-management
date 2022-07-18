<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      
    </ul>
   
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <img alt="image"
        src="{{ auth()->user()->photo_url ?? asset('dist/assets/img/avatar/avatar-1.png') }}"
        class="rounded-circle mr-1"
        style="height: 30px; object-fit: cover; object-position: center">
      <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name ?? 'Guest'}}</div></a>
      <div class="dropdown-menu dropdown-menu-right mt-2">
        
        <a href="{{ route('password.change.view') }}" class="dropdown-item has-icon">
          <i class="fas fa-key"></i> Change Password
        </a>

        <div class="dropdown-divider"></div>
        <form id="logout" method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="javascript:{}"
            class="dropdown-item has-icon text-danger"
            onclick="swal({
              title: 'Logout',
              text: 'Are you sure you want to Logout?',
              icon: 'warning',
              buttons: true,
            })
            .then((willProccess) => {
              if(willProccess) $('#logout').submit();
            });">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </form>
      </div>
    </li>
  </ul>
</nav>