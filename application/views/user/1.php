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

                                            <a href="<?php echo site_url('user/Tiket/ambil_tiket/' . $tiketpen->ID_TIKET) ?>">
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