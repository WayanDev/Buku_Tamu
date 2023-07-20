<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Buku Tamu</div>
                    <a class="nav-link" href="{{route('tamu.index')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-solid fa-user-group"></i></div>
                        Daftar Tamu
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Login sebagai {{ Auth::user()->username }}</div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">