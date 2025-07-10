<div id="layoutSidenav_nav" style="margin-top: 50px; height: calc(100vh - 50px);">
    <nav class="sb-sidenav accordion sb-sidenav-dark d-flex flex-column" id="sidenavAccordion" style="height: 100%;">
        <div class="sb-sidenav-menu flex-grow-1"
            style="overflow-y: auto; scrollbar-width: none; -ms-overflow-style: none;">
            <div class="nav">

                {{-- Jika admin --}}
                @if (Auth::user()->role == 'admin')
                    <!-- Dashboard -->
                    <a class="nav-link mb-3 {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}"
                        href="{{ route('dashboard.admin') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        Dashboard
                    </a>

                    <!-- Kelola Data SCM -->
                    <a class="nav-link collapsed mb-3 {{ request()->is('perencanaan*') || request()->is('pengadaan*') || request()->is('produksi*') || request()->is('distribusi*') || request()->is('pengembalian*') ? '' : '' }}"
                        href="#" data-bs-toggle="collapse" data-bs-target="#collapseSCM"
                        aria-expanded="{{ request()->is('perencanaan*') || request()->is('pengadaan*') || request()->is('produksi*') || request()->is('distribusi*') || request()->is('pengembalian*') ? 'true' : 'false' }}"
                        aria-controls="collapseSCM">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Kelola Data SCM
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ request()->is('perencanaan*') || request()->is('pengadaan*') || request()->is('produksi*') || request()->is('distribusi*') || request()->is('pengembalian*') ? 'show' : '' }}"
                        id="collapseSCM" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested">
                            <a class="nav-link mb-2 {{ request()->routeIs('perencanaan') ? 'active' : '' }}"
                                href="{{ route('perencanaan') }}">
                                <i class="fas fa-clipboard-list me-2"></i> Data Perencanaan
                            </a>
                            <a class="nav-link mb-2 {{ request()->routeIs('pengadaan') ? 'active' : '' }}"
                                href="{{ route('pengadaan') }}">
                                <i class="fas fa-truck-loading me-2"></i> Data Pengadaan
                            </a>
                            <a class="nav-link mb-2 {{ request()->routeIs('produksi') ? 'active' : '' }}"
                                href="{{ route('produksi') }}">
                                <i class="fas fa-industry me-2"></i> Data Produksi
                            </a>
                            <a class="nav-link mb-2 {{ request()->routeIs('distribusi') ? 'active' : '' }}"
                                href="{{ route('distribusi') }}">
                                <i class="fas fa-shipping-fast me-2"></i> Data Distribusi
                            </a>
                            {{-- <a class="nav-link mb-2 {{ request()->routeIs('pengembalian') ? 'active' : '' }}"
                                href="{{ route('pengembalian') }}">
                                <i class="fas fa-undo-alt me-2"></i> Data Pengembalian
                            </a> --}}
                        </nav>
                    </div>
                    <a class="nav-link mb-3 {{ request()->routeIs('scor') ? 'active' : '' }}"
                        href="{{ route('scor') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Kelola Data SCOR
                    </a>
                    <a class="nav-link mb-3 {{ request()->routeIs('gscor') ? 'active' : '' }}"
                        href="{{ route('gscor') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Kelola Data GSCOR
                    </a>
                    <a class="nav-link mb-3 {{ request()->routeIs('kpi') ? 'active' : '' }}"
                        href="{{ route('kpi') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Kelola Data KPI
                    </a>

                    {{-- Dropdown Menu Kelola Perhitungan --}}
                    <a class="nav-link collapsed mb-3 {{ request()->is('perhitungan*') ? 'active' : '' }}"
                        href="#" data-bs-toggle="collapse" data-bs-target="#collapsePerhitungan"
                        aria-expanded="{{ request()->is('perhitungan*') ? 'true' : 'false' }}"
                        aria-controls="collapsePerhitungan">
                        <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div>
                        Kelola Perhitungan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ request()->is('perhitungan*') ? 'show' : '' }}" id="collapsePerhitungan"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested">
                            <a class="nav-link mb-2 {{ request()->routeIs('perhitungan.pairwise') ? 'active' : '' }}"
                                href="{{ route('perhitungan.pairwise') }}">
                                <i class="fas fa-th-list me-2"></i>
                                Matriks Perbandingan Berpasangan
                            </a>
                            <a class="nav-link mb-2 {{ request()->routeIs('perhitungan.konsistensi') ? 'active' : '' }}"
                                href="{{ route('perhitungan.konsistensi') }}">
                                <i class="fas fa-check-circle me-2"></i>
                                Uji Konsistensi
                            </a>
                            <a class="nav-link mb-2 {{ request()->routeIs('perhitungan.snorm') ? 'active' : '' }}"
                                href="{{ route('perhitungan.snorm') }}">
                                <i class="fas fa-equals me-2"></i>
                                Normalisasi Snorm De Boer
                            </a>
                            <a class="nav-link mb-2 {{ request()->routeIs('perhitungan.nilai-akhir') ? 'active' : '' }}"
                                href="{{ route('perhitungan.nilai-akhir') }}">
                                <i class="fas fa-chart-line me-2"></i>
                                Nilai Akhir SCM
                            </a>
                        </nav>
                    </div>


                    {{-- Jika manager --}}
                @elseif(Auth::user()->role == 'manager')
                    <!-- Dashboard -->
                    <a class="nav-link mb-3 {{ request()->routeIs('dashboard.manager') ? 'active' : '' }}"
                        href="{{ route('dashboard.manager') }}">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        Dashboard
                    </a>

                    <!-- Data SCM -->
                    <a class="nav-link collapsed mb-3 {{ request()->is('manager/perencanaan*') || request()->is('manager/pengadaan*') || request()->is('manager/produksi*') || request()->is('manager/distribusi*') || request()->is('manager/pengembalian*') ? '' : '' }}"
                        href="#" data-bs-toggle="collapse" data-bs-target="#collapseSCM"
                        aria-expanded="{{ request()->is('manager/perencanaan*') || request()->is('manager/pengadaan*') || request()->is('manager/produksi*') || request()->is('manager/distribusi*') || request()->is('manager/pengembalian*') ? 'true' : 'false' }}"
                        aria-controls="collapseSCM">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data SCM
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ request()->is('manager/perencanaan*') || request()->is('manager/pengadaan*') || request()->is('manager/produksi*') || request()->is('manager/distribusi*') || request()->is('manager/pengembalian*') ? 'show' : '' }}"
                        id="collapseSCM" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested">
                            <a class="nav-link mb-2 {{ request()->routeIs('manager.perencanaan') ? 'active' : '' }}"
                                href="{{ route('manager.perencanaan') }}">
                                <i class="fas fa-clipboard-list me-2"></i> Data Perencanaan
                            </a>
                            <a class="nav-link mb-2 {{ request()->routeIs('manager.pengadaan') ? 'active' : '' }}"
                                href="{{ route('manager.pengadaan') }}">
                                <i class="fas fa-truck-loading me-2"></i> Data Pengadaan
                            </a>
                            <a class="nav-link mb-2 {{ request()->routeIs('manager.produksi') ? 'active' : '' }}"
                                href="{{ route('manager.produksi') }}">
                                <i class="fas fa-industry me-2"></i> Data Produksi
                            </a>
                            <a class="nav-link mb-2 {{ request()->routeIs('manager.distribusi') ? 'active' : '' }}"
                                href="{{ route('manager.distribusi') }}">
                                <i class="fas fa-shipping-fast me-2"></i> Data Distribusi
                            </a>
                            {{-- <a class="nav-link mb-2 {{ request()->routeIs('manager.pengembalian') ? 'active' : '' }}"
                                href="{{ route('manager.pengembalian') }}">
                                <i class="fas fa-undo-alt me-2"></i> Data Pengembalian
                            </a> --}}
                        </nav>
                    </div>

                    <a class="nav-link mb-3 {{ request()->routeIs('manager.scor') ? 'active' : '' }}"
                        href="{{ route('manager.scor') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data SCOR
                    </a>
                    <a class="nav-link mb-3 {{ request()->routeIs('manager.gscor') ? 'active' : '' }}"
                        href="{{ route('manager.gscor') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data GSCOR
                    </a>
                    <a class="nav-link mb-3 {{ request()->routeIs('manager.kpi') ? 'active' : '' }}"
                        href="{{ route('manager.kpi') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data KPI
                    </a>
                    <a class="nav-link mb-3 {{ request()->routeIs('manager.laporan') ? 'active' : '' }}"
                        href="{{ route('manager.laporan') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Laporan
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
