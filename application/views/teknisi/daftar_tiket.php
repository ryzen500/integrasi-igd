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
                    <h1 class="h3 mb-2 text-gray-800"><b>Daftar Tiket</b></h1>

                    <!-- Form Text Box -->
                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="<?= base_url('user/Dashboard') ?>" method="POST">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>No.</th>
                                            <th>No. Tiket</th>
                                            <th>Departemen</th>
                                                        <!-- <th>Nama Tiket</th> -->
                                            <th>Tipe Masalah</th>
                                            <th>Keterangan Masalah</th>
                                            <th>Tanggal Ajuan</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            $isi = "Tiket Masuk";
                                            foreach ((array)$tiket as $daftartiket) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $daftartiket->ID_TIKET ?></td>
                                                    <td><?= $daftartiket->NAMA_DEPARTEMEN ?></td>
                                                    <td><?= $daftartiket->SUB_MASALAH ?></td>
                                                    <td><?= $daftartiket->MASALAH ?></td>
                                                    <td><?= $daftartiket->TANGGAL ?></td>
                                                    <td><?= $daftartiket->status ?></td>
                                                    <td><a href="<?php echo site_url('teknisi/Tiket/ambil_tiket/' . $daftartiket->ID_TIKET) ?>"><button type="button" class="btn btn-primary">Ambil</button></a></td>

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