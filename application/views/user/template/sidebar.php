<!-- Sidebar -->
<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <img style="height:40px ;" src="<?= base_url('assets/back') ?>/img/logo-back-preview.png" alt="">
        <div class="sidebar-brand-text">IGD RSWB Surabaya</div>    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item mt-0">
        <a class="nav-link" href="<?php echo site_url('user/Dashboard/index'); ?>" aria-expanded="true">
            <i class="fas fa-fw fa-ticket-alt"></i>
            <span>Data Global</span>
        </a>

    </li>

    <li class="nav-item mt-0">
        <a class="nav-link" href="<?php echo site_url('user/Dashboard/index_per_user'); ?>" aria-expanded="true">
            <i class="fas fa-fw fa-ticket-alt"></i>
            <span>Data Saya</span>
        </a>

    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('user/Dashboard/buat_tiket'); ?>" aria-expanded="true">
            <i class="fas fa-solid fa-faw fa-plus-square"></i>
            <span>Buat Data </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="<?php echo site_url('login/logout'); ?>" aria-expanded="true">
        <i class="fas fa-sign-out-alt  mr-2 text-gray-400"></i>
            <span>Keluar</span>
        </a>
    </li>



    <!-- Footer -->
    <footer class="sticky-footer" style="margin-top:100% ;">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; IGD RSWB Surabaya <?php echo date('Y'); ?></span>
                </div>
            </div>
    </footer>

    
    <!-- End of Footer -->
</ul>
<!-- End of Sidebar -->