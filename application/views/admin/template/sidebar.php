        <!-- Sidebar -->
        <script src="<?= base_url() ?>assets/back/js/chart.js"></script>
        <script src="<?= base_url() ?>assets/back/js/chart.min.js"></script>

        <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <img style="height:40px ;" src="<?= base_url('assets/back') ?>/img/logo-back-preview.png" alt="">
                <div class="sidebar-brand-text">IGD RSWB Surabaya</div>
            </div>

            <!--<div class="sidebar-brand d-flex align-items-center justify-content-center">
                <img style="height:40px ;" src="<?= base_url('assets/back') ?>/img/logo-back-preview.png" alt="">
                IGD RSWB Surabaya
            </div>-->

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-database"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= site_url('admin/departemen') ?>">Data Departemen</a>
                        <a class="collapse-item" href="<?= site_url('admin/user') ?>">Data Pengguna</a>
                        <!-- <a class="collapse-item" href="<?= site_url('admin/inventory') ?>">Data Inventori</a> -->
                        <a class="collapse-item" href="<?= site_url('admin/submasalah') ?>">Data Penyebab Masalah</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-ticket-alt"></i>
                    <span>Tiket Complain</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= site_url('admin/dashboard/tiket_selesai') ?>">Riwayat Tiket Complain <br>Selesai</a>
                        <a class="collapse-item" href="<?= site_url('admin/tiket/daftar_tiket') ?>">Daftar Tiket Complain <br> Masuk</a>
                        <hr>
                        <a class="collapse-item" href="<?= site_url('admin/tiket/l_tiket_selesai') ?>">Daftar Tiket Complain <br>Selesai</a>
                        <hr>
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