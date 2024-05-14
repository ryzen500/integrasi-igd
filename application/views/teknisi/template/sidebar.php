        <!-- Sidebar -->
        <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <img style="height:40px ;" src="<?= base_url('assets/back') ?>/img/logo-back-preview.png" alt="">
        <div class="sidebar-brand-text">IGD RSWB Surabaya</div>    </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('teknisi/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#collapseUtilities" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-ticket-alt"></i>
                    <span>Tiket Complain</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <a class="collapse-item" href="<?= site_url('teknisi/dashboard/datatiket') ?>">Tiket Saya</a> -->
                        <a class="collapse-item" href="<?= site_url('teknisi/dashboard/tiket_selesai') ?>">Daftar Tiket <br>Complain Selesai</a>
                        <hr>
                        <a class="collapse-item" href="<?= site_url('teknisi/dashboard/daftartiket') ?>">Daftar Tiket <br> Complain Masuk</a>
                    </div>
                </div>
            </li>




            <footer class="sticky-footer" style="margin-top: 100%;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; IGD RSWB Surabaya <?php echo date('Y'); ?></span>
                    </div>
                </div>
            </footer>

        </ul>
        <!-- End of Sidebar -->