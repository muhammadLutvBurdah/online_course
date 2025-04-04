<nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="/dashboard" class="b-brand text-primary">
          <img src="/assets/images/logo-dark.svg" class="img-fluid logo-lg" alt="logo">
        </a>
      </div>
      <div class="navbar-content">
        <ul class="pc-navbar">
          <li class="pc-item">
            <a href="/dashboard" class="pc-link">
              <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
              <span class="pc-mtext">Dashboard</span>
            </a>
          </li>

          @php
          $user = auth()->user();
          @endphp

      @if($user && $user->role == 'admin')
          <li class="pc-item pc-caption">
              <label>Admin</label>
              <i class="ti ti-dashboard"></i>
          </li>

          <li class="pc-item">
              <a href="{{ route('kursus.index') }}" class="pc-link">
                  <span class="pc-micon"><i class="ti ti-typography"></i></span>
                  <span class="pc-mtext">Kursus</span>
              </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('materi.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-typography"></i></span>
                <span class="pc-mtext">Materi</span>
            </a>
        </li>
        <li class="pc-item">
            <a href="{{ route('pembayaran.index') }}" class="pc-link">
                <span class="pc-micon"><i class="ti ti-typography"></i></span>
                <span class="pc-mtext">Pembayaran</span>
            </a>
        </li>

      @else
          <li class="pc-item pc-caption">
              <label>Pengguna</label>
              <i class="ti ti-user"></i>
          </li>

          <li class="pc-item">
              <a href="{{ route('kursusPengguna.index') }}" class="pc-link">
                  <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
                  <span class="pc-mtext">Kursus Pengguna</span>
              </a>
          </li>
      @endif

        </ul>
      </div>
    </div>
  </nav>
