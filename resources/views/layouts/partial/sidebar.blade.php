<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
                <span class="menu-title">Dashboard</span>
        <li class="nav-item">
            <a class="nav-link" href="/pertanyaan">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Forum</span>
            </a>
        </li>
        @guest
        <br><br>
        <li class="nav-item">
            <span class="menu-title">Guest</span>
        <li class="nav-item">
        <li class="nav-item">
            <a class="nav-link" href="/login">
                <i class="bi bi-person menu-icon"></i>
                <span class="menu-title">Login</span>
            </a>
        </li>
        @endguest
        {{-- <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="ti-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li> --}}
        @auth
            <li class="nav-item">
                <a class="nav-link" href="/kategori">
                    <i class="ti-menu-alt menu-icon"></i>
                    <span class="menu-title">Kategori</span>
                </a>
            </li><br><br>
            <li class="nav-item">
                <span class="menu-title">Pengaturan</span>
            <li class="nav-item">
            <li class="nav-item">
                <a class="nav-link" href="/profile">
                    <i class="bi bi-person menu-icon"></i>
                    <span class="menu-title">Profile</span>
                </a>
            </li>
        @endauth
    </ul>
</nav>