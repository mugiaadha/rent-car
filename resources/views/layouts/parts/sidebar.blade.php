<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="/">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <li class="nav-heading">Pages</li>

  @if (in_array(session('user_data')->ud_level, ['admin']))
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('user-management') }}">
        <i class="bi bi-person"></i>
        <span>User Management</span>
      </a>
    </li>
  @endif

  @if (in_array(session('user_data')->ud_level, ['admin']))
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('vehicle-management') }}">
        <i class="ri-car-line"></i>
        <span>Vehicle Management</span>
      </a>
    </li>
  @endif

  @if (in_array(session('user_data')->ud_level, ['admin', 'user']))
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('rent-car-transaction') }}">
        <i class="bi bi-layer-forward"></i>
        <span>Rent Car Transaction</span>
      </a>
    </li>
  @endif

  @if (in_array(session('user_data')->ud_level, ['admin']))
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('return-car-transaction') }}">
        <i class="bi bi-layer-backward"></i>
        <span>Return Car Transaction</span>
      </a>
    </li>
  @endif
</ul>
</aside>