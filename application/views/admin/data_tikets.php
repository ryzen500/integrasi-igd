        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('admin/template/navbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><b>Tiket Saya</b></h1>

                    <!-- Form Text Box -->
                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="<?= base_url('admin/Dashboard') ?>" method="POST">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No. Tiket</th>
                                                <th>Departemen</th>
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
                                                    <td><?= $daftartiket->ID_TIKET?></td>
                                                    <td><?= $daftartiket->NAMA_DEPARTEMEN ?></td>
                                                    <td><?= $daftartiket->SUB_MASALAH ?></td>
                                                    <td><?= $daftartiket->MASALAH ?></td>
                                                    <td><?= $daftartiket->TANGGAL ?></td>
                                                    <td>
                                                        <center><b><?= $daftartiket->status ?></b></center>

                                                    </td>
                                                    <td>
                                                        <?php if ($daftartiket->STATUS_TIKET == 3) { ?>
                                                            <a href="<?php echo site_url('admin/Tiket/ganti_teknisi/' . $daftartiket->ID_TIKET) ?>">
                                                                <button type="button" class="btn btn-primary">
                                                                    Ganti Teknisi
                                                                </button>
                                                            </a>
                                                            <br><br>
                                                            <a class="collapse-item" href="<?= site_url('admin/Tiket/tiket_selesai/' . $daftartiket->ID_TIKET) ?>">
                                                                <button type="button" class="btn btn-primary">
                                                                    Selesai
                                                                </button>
                                                            </a>
                                                        <?php
                                                        } elseif ($daftartiket->STATUS_TIKET == 2) { ?>
                                                            <a href="<?php echo site_url('admin/Tiket/prosess/' . $daftartiket->ID_TIKET) ?>">
                                                                <button type="button" class="btn btn-primary">
                                                                    Proses
                                                                </button>
                                                            </a>
                                                        <?php
                                                        } elseif ($daftartiket->STATUS_TIKET == 5) { ?>
                                                            <a href="<?php echo site_url('admin/Tiket/ganti_teknisi/' . $daftartiket->ID_TIKET) ?>">
                                                                <button type="button" class="btn btn-secondary">
                                                                    Ganti Teknisi
                                                                </button>
                                                            </a> <br><br>
                                                            <a href="<?php echo site_url('admin/Tiket/prosess/' . $daftartiket->ID_TIKET) ?>">
                                                                <button type="button" class="btn btn-primary">
                                                                    Lanjutkan Proses
                                                                </button>
                                                            </a>
                                                        <?php } else { ?>
                                                            
                                                                <button disabled="disabled" type="button" class="btn btn-danger">
                                                                    Menunggu...
                                                                </button>
                                                            <br> <br>
                                                            <a href="<?php echo site_url('admin/Tiket/prosess/' . $daftartiket->ID_TIKET) ?>">
                                                                <button type="button" class="btn btn-primary">
                                                                    Lanjutkan Proses
                                                                </button>
                                                            </a>

                                                        <?php } ?>
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
                    <a href="<?= site_url('admin/dashboard/daftartiket') ?>" class="btn btn-primary">Ambil Tiket</a>
                    <a href="<?php echo site_url('admin/dashboard'); ?>" class="btn btn-primary">Kembali</a>


                </div>
                <!-- End of Content Wrapper -->