@php
  $currentRoute = Route::current()->uri;
@endphp
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link @if ($currentRoute != 'admin/dashboard') collapsed @endif" href="dashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link @if ($currentRoute != 'admin/student') collapsed @endif" href="student">
        <i class="bi bi-user"></i>
        <span>Student</span>
      </a>
    </li>
  </ul>

</aside><!-- End Sidebar-->