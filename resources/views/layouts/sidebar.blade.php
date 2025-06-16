<div id="layoutSidenav_nav" style="margin-top: 50px; height: calc(100vh - 50px);">
    <nav class="sb-sidenav accordion sb-sidenav-dark d-flex flex-column" id="sidenavAccordion" style="height: 100%;">
        <div class="sb-sidenav-menu flex-grow-1"
            style="overflow-y: auto; scrollbar-width: none; -ms-overflow-style: none;">
            <div class="nav">

                <!-- Dashboard -->
                <a class="nav-link mb-3 {{ request()->is('dashboard') ? 'active' : '' }}" href="">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    Dashboard
                </a>

                {{-- Jika admin --}}
                @if (Auth::user()->role == 'admin')
                    <a class="nav-link collapsed mb-2" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseSCM" aria-expanded="false" aria-controls="collapseSCM">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Kelola Data SCM
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseSCM" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested">
                            <a class="nav-link mb-2" href="#"><i class="fas fa-clipboard-list me-2"></i> Data
                                Perencanaan</a>
                            <a class="nav-link mb-2" href="#"><i class="fas fa-truck-loading me-2"></i> Data
                                Pengadaan</a>
                            <a class="nav-link mb-2" href="#"><i class="fas fa-industry me-2"></i> Data
                                Produksi</a>
                            <a class="nav-link mb-2" href="#"><i class="fas fa-shipping-fast me-2"></i> Data
                                Distribusi</a>
                            <a class="nav-link mb-2" href="#"><i class="fas fa-undo-alt me-2"></i> Data
                                Pengembalian</a>
                        </nav>
                    </div>

                    <a class="nav-link mb-3" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Kelola Data GSCOR
                    </a>
                    <a class="nav-link mb-3" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Kelola Data KPI
                    </a>
                    <a class="nav-link mb-3" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div> Kelola Perhitungan
                    </a>

                    {{-- Jika manager --}}
                @elseif(Auth::user()->role == 'manager')
                    <a class="nav-link collapsed mb-2" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseSCM" aria-expanded="false" aria-controls="collapseSCM">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data SCM
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseSCM" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested">
                            <a class="nav-link mb-2" href="#"><i class="fas fa-clipboard-list me-2"></i> Data
                                Perencanaan</a>
                            <a class="nav-link mb-2" href="#"><i class="fas fa-truck-loading me-2"></i> Data
                                Pengadaan</a>
                            <a class="nav-link mb-2" href="#"><i class="fas fa-industry me-2"></i> Data
                                Produksi</a>
                            <a class="nav-link mb-2" href="#"><i class="fas fa-shipping-fast me-2"></i> Data
                                Distribusi</a>
                            <a class="nav-link mb-2" href="#"><i class="fas fa-undo-alt me-2"></i> Data
                                Pengembalian</a>
                        </nav>
                    </div>

                    <a class="nav-link mb-3" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Data GSCOR
                    </a>
                    <a class="nav-link mb-3" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Data KPI
                    </a>
                    <a class="nav-link mb-3" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div> Laporan
                    </a>
                @endif

            </div>
        </div>


        <!-- Footer Sidebar -->
        <div class="sb-sidenav-footer mt-auto">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name ?? 'Guest' }}
        </div>
    </nav>
</div>
