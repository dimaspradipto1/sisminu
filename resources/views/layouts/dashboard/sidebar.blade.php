<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">


    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="fas fa-envelope"></i><span class="text-capitalize mx-2">surat masuk</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('surat-masuk.create')}}">
            <i class="bi bi-circle"></i><span class="text-capitalize">buat surat</span>
          </a>
        </li>
        <li>
          <a href="{{route('surat-masuk.index')}}">
            <i class="bi bi-circle"></i><span class="text-capitalize">kotak masuk</span>
          </a>
        </li>
        <li>
          <a href="components-badges.html">
            <i class="bi bi-circle"></i><span class="text-capitalize">arsip</span>
          </a>
        </li>
        
      </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="fas fa-paper-plane"></i><span class="mx-2">surak keluar</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="forms-elements.html">
            <i class="bi bi-circle"></i><span class="text-capitalize">buat surat</span>
          </a>
        </li>
        <li>
          <a href="forms-layouts.html">
            <i class="bi bi-circle"></i><span class="text-capitalize">surat terkirim</span>
          </a>
        </li>
        <li>
          <a href="forms-editors.html">
            <i class="bi bi-circle"></i><span class="text-capitalize">arsip</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->


    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="fas fa-history"></i>
        <span class="text-capitalize mx-2">riwayat surat</span>
      </a>
    </li>

    {{--  <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('anggota.index')}}">
        <i class="fas fa-user"></i>
        <span class="text-capitalize mx-2">Anggota</span>
      </a>
    </li>  --}}

    @if(auth()->user()->role == 'admin')
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('users.index')}}">
        <i class="fas fa-user"></i>
        <span class="text-capitalize mx-2">pengguna</span>
      </a>
    </li>
    @endif

  
  </ul>

</aside><!-- End Sidebar-->