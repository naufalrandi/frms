<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="">Mafarmasi</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">{{ strtoupper(substr(env('APP_NAME'), 0, 2)) }}</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ request()->is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}"><i class="fa fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
      <li class="menu-header">Akademik</li>
      <li class="{{ request()->is('/semester') ? 'active' : '' }}"><a class="nav-link" href="{{ route('semester.index') }}"><i class="fa fa-calendar-check"></i> <span>Semester</span></a></li>
      <li class="{{ request()->is('/matakuliah') ? 'active' : '' }}"><a class="nav-link" href="{{ route('matakuliah.index') }}"><i class="fa fa-book-reader"></i> <span>Mata Kuliah</span></a></li>
      <li class="{{ request()->is('/filemateri') ? 'active' : '' }}"><a class="nav-link" href="{{ route('filemateri.index') }}"><i class="fa fa-book"></i> <span>File Materi</span></a></li>
      <li class="{{ request()->is('/event') ? 'active' : '' }}"><a class="nav-link" href="{{ route('event.index') }}"><i class="fa fa-book"></i> <span>Event</span></a></li>
      <li class="menu-header">Data</li>
      <li class="{{ request()->is('/alumni') ? 'active' : '' }}"><a class="nav-link" href="{{ route('alumni.index') }}"><i class="fa fa-graduation-cap"></i> <span>Alumni</span></a></li>
      <li class="{{ request()->is('/dosen') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dosens.index') }}"><i class="fa fa-address-card"></i> <span>Dosen</span></a></li>
      <li class="{{ request()->is('/mahasiswa') ? 'active' : '' }}"><a class="nav-link" href="{{ route('mahasiswa.index') }}"><i class="fa fa-address-card"></i> <span>Mahasiswa</span></a></li>
      <li class="menu-header">Aspirasi</li>
      <li class="{{ request()->is('/aspirasi') ? 'active' : '' }}"><a class="nav-link" href="{{ route('aspirasi.index') }}"><i class="fa fa-comments"></i> <span>Aspirasi</span></a></li>
      <li class="menu-header">Users</li>
      <li class="{{ request()->is('/users') ? 'active' : '' }}"><a class="nav-link" href="{{ route('users.index') }}"><i class="fa fa-id-badge"></i> <span>Users</span></a></li>
    </ul>
  </aside>
