        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('teknisi/template/navbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><b>Riwayat Tiket Saya</b></h1>

                    <!-- Form Text Box -->
                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="<?= base_url('teknisi/Dashboard') ?>" method="POST">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No. Tiket</th>
                                                <th>Departemen</th>
                                                <th>Masalah Utama</th>
                                                <th>Keterangan Masalah</th>
                                                <th>Solusi</th>
                                                <th>Tanggal Ajuan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            $isi = "Tiket Masuk";
                                            foreach ((array)$tiket as $daftartiket) {
                                                $idstatus = $daftartiket->STATUS_TIKET;
                                                        if ($idstatus == 1) {
                                                            $css = "badge badge-primary";
                                                        } elseif ($idstatus == 2) {
                                                            $css = "badge badge-secondary";
                                                        } elseif ($idstatus == 3) {
                                                            $css = "badge badge-info";
                                                        } elseif ($idstatus == 4) {
                                                            $css = "badge badge-success";
                                                        } elseif ($idstatus == 5) {
                                                            $css = "badge badge-warning";
                                                        } elseif ($idstatus == 6) {
                                                            $css = "badge badge-light";
                                                        } elseif ($idstatus == 7) {
                                                            $css = "badge badge-light";
                                                        }

                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $daftartiket->ID_TIKET ?></td>
                                                    <td><?= $daftartiket->NAMA_DEPARTEMEN ?></td>
                                                    <td><?= $daftartiket->SUB_MASALAH ?></td>
                                                    <td><?= $daftartiket->MASALAH ?></td>
                                                    <td><?= $daftartiket->SOLUSI ?></td>
                                                    <td><?= $daftartiket->TANGGAL ?></td>
                                                    <td>
                                                    <span class="<?= $css ?>"> <?= $daftartiket->status ?></span>
                                                    </td>
                                                    

                                                </tr>
                                            <?php
                                            } ?>

                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Button Bawah -->
                    <a href="<?php echo site_url('teknisi/dashboard'); ?>" class="btn btn-primary">Kembali</a>



                </div>
                <!-- End of Content Wrapper -->