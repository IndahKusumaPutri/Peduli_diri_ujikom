<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="/home">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @if (auth()->user()->role == "user")
      <li class="nav-item">
        <a class="nav-link" href="/perjalanan">
          <i class="bi bi-journal-text"></i>
          <span>Perjalanan</span>
        </a>
      </li>
      @endif
      @if (auth()->user()->role == "admin")
      <li class="nav-item">
        <a class="nav-link" href="/getDataUser">
          <i class="bi bi-person"></i>
          <span>Data user</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/perjalanan">
          <i class="bi bi-journal-text"></i>
          <span>Perjalanan</span>
        </a>
      </li>
      @endif
      <!-- End Blank Page Nav -->

    </ul>

  </aside>