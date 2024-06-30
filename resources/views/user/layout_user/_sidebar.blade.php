  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link @if (Request::segment(2) == 'dashboard') @else collapsed @endif" href="{{ url('user/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>



      <li class="nav-item">
        <a class="nav-link @if (Request::segment(2) == 'service_history' || Request::segment(2) == 'book_service') @else collapsed @endif" href="{{ url('user/book_service/add') }}">
          <i class="bi bi-person"></i>
          <span>Book a Serice</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-question-circle"></i>
          <span>Maintenance Agreement</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="">
            <i class="bi bi-box-arrow-in-right"></i>
          <span>Edit Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('logout') }}">
          <i class="bi bi-box-arrow-right"></i>
          <span>Login</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->
