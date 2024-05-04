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
            <h1 class="h3 mb-2 text-gray-800"><b>Riwayat Tiket Saya</b></h1>

            <!-- Form Text Box -->
            <!-- Page Heading -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="<?= base_url('admin/Dashboard') ?>" method="POST">
                            <div class="modal fade" id="fileModal" tabindex="-1" role="dialog"
                                aria-labelledby="fileModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="fileModalLabel">Daftar File</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul id="fileList"></ul>
                                            <!-- Daftar file akan diisi dengan JavaScript -->
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <th>Detail <br>Attachment (Pelapor)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $isi = "Tiket Masuk";
                                    foreach ((array) $tiket as $daftartiket) {
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


                                            <td><button type="button" class="btn btn-info" data-toggle="modal"
                                                    data-target="#fileModal"
                                                    data-id="<?= $daftartiket->ID_TIKET ?>">Detail</button>
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
            <a href="<?php echo site_url('admin/dashboard'); ?>" class="btn btn-primary">Kembali</a>



        </div>
        <!-- End of Content Wrapper -->

        <script>
            $(document).ready(function () {
                $('#fileModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget);
                    var tiketId = button.data('id'); // Dapatkan ID Tiket

                    // AJAX untuk mendapatkan daftar file
                    $.ajax({
                        url: '<?= site_url('admin/Dashboard/get_files') ?>', // Ubah ke endpoint API Anda
                        type: 'POST',
                        data: { id: tiketId },
                        success: function (response) {
                            var files = JSON.parse(response); // Parsing response
                            var fileList = $("#fileList");
                            fileList.empty(); // Kosongkan daftar sebelum mengisi ulang

                            if (files.length > 0) {
                                files.forEach(function (file) {
                                    fileList.append(
                                        `<li><a href='<?= base_url('uploads/') ?>${file.file_name}' target='_blank'>${file.file_name}</a></li>`
                                    );
                                });
                            } else {
                                fileList.append("<li>Tidak ada file yang ditemukan.</li>");
                            }
                        },
                        error: function () {
                            $("#fileList").html("Terjadi kesalahan saat mengambil file.");
                        }
                    });
                });
            });
        </script>