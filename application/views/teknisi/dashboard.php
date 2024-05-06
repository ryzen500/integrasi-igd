        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('teknisi/template/navbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 text-gray-800"><b>Beranda</b></h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tiket Masuk</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tiket_masuk ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-download fa-2x text-gray-900"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Baru Saja Diambil</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $diajukan ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-clock fa-2x text-gray-900"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Dalam Proses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dalam_proses ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-line fa-2x text-gray-900"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Sudah Ditangani</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sudah_ditangani ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-square fa-2x text-gray-900"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Detail Masalah Dialog -->

                        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel">Detail Masalah</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Loading bar animasi -->
                                        <div id="loading-bar"></div>
                                        <div class="form-group row center">
                                            <div class="col-sm-10">
                                                <label for="masalah" class="col-form-label">Masalah<sup style="color: red;">*</sup></label>
                                                <textarea id="fullKeterangan" name="fullKeterangan"></textarea>
                                                <?= form_error('masalah', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>


                                        <!-- Textarea untuk CKEditor -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h3 class="m-0 font-weight-bold text-primary">Tiket</h3>
                                    <h6 class="m-1 font-weight-italic text-primary">Status : Tiket Masuk</h6>
                                </div>
                                <div class="card-body text-left">
                                    <?php
                                    foreach ($tiket_diajukan as $tiketpen) {
                                    ?>
                                        <h6 class="m-0 font-weight-bold text-dark"><?= $tiketpen->nama_user ?> &nbsp;| <?= $tiketpen->NAMA_DEPARTEMEN ?></h6>
                                        <div class="text-xs font-weight-bold mb-1">

                                            <?php
                                            $keterangan = $tiketpen->MASALAH;
                                            $sentence_count = count_sentences($keterangan);
                                            $preview = get_preview($keterangan, 5);
                                            ?>
                                            Masalah : <?= $preview ?>
                                        </div>
                                        <div class="button-wrapper">
                                            <?php if ($sentence_count > 10) : ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailModal" data-id="<?= $tiketpen->ID_TIKET ?>">Baca Detail</button>
                                            <?php endif; ?>

                                            <a href="<?php echo site_url('teknisi/Tiket/ambil_tiket/' . $tiketpen->ID_TIKET) ?>">
                                                <button type="button" class="btn btn-success">Ambil</button>
                                            </a>
                                        </div>
                                        <hr>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-6 col-lg-5">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h3 class="m-0 font-weight-bold text-primary">Tiket</h3>
                                    <h6 class="m-1 font-weight-italic text-primary">Status : Selesai</h6>
                                </div>

                                <div class="card-body text-left">

                                    <?php
                                    foreach ($tiket_selesai as $tiketpen) {

                                    ?>
                                        <h6 class="m-0 font-weight-bold text-dark"><?= $tiketpen->nama_user ?> &nbsp;| <?= $tiketpen->NAMA_DEPARTEMEN ?></h6>
                                        <div class="text-xs font-weight-bold mb-1">

                                            <?php
                                            $keterangan = $tiketpen->MASALAH;
                                            $sentence_count = count_sentences($keterangan);
                                            $preview = get_preview($keterangan, 5);
                                            ?>
                                            Masalah : <?= $preview ?></div>
                                        <?= $tiketpen->ID_TIKET ?>

                                        <hr>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->