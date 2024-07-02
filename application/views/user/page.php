<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <?php $this->load->view('user/template/navbar'); ?>

        <!-- End of Topbar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h3><b><?= $title ?></b></h3>


                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="<?= base_url('user/Dashboard') ?>" method="POST">
                                    <!-- Modal -->
                                    <div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
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

                                    <!-- Modal Detail Problem -->

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


                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No Pendaftaran</th>
                                                <th>No Rekam Medik</th>
                                                <th>Nama Pasien</th>
                                                <th>Tanggal Jam Pasien Masuk</th>
                                                <th>Dokter Jaga IGD</th>
                                                <!-- <th>Tipe Masalah</th>
                                                <th>Keterangan Masalah</th>
                                                <th>Solusi</th>
                                                <th>Tanggal Ajuan</th>
                                                <th>Status</th> -->
                                                <th colspan="2" style="text-align: center;">Detail Aksi</th>
                                                <th>Detail</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ((array) $tiket as $user) {
                                                // $keterangan = $user->MASALAH;
                                                // $sentence_count = count_sentences($keterangan);
                                                // $preview = get_preview($keterangan, 1);
                                                // $idstatus = $user->STATUS_TIKET;
                                                // if ($idstatus == 1) {
                                                //     $css = "badge badge-primary";
                                                // } elseif ($idstatus == 2) {
                                                //     $css = "badge badge-secondary";
                                                // } elseif ($idstatus == 3) {
                                                //     $css = "badge badge-info";
                                                // } elseif ($idstatus == 4) {
                                                //     $css = "badge badge-success";
                                                // } elseif ($idstatus == 5) {
                                                //     $css = "badge badge-warning";
                                                // } elseif ($idstatus == 6) {
                                                //     $css = "badge badge-light";
                                                // } elseif ($idstatus == 7) {
                                                //     $css = "badge badge-light";
                                                // }

                                                $no++
                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= (!empty($user->no_pendaftaran) ? $user->no_pendaftaran : "-") ?></td>

                                                    <td><?= $user->no_rekam_medik ?></td>
                                                    <td><?= $user->nama_pasien ?></td>
                                                    <td style="text-align: center;"><?= (!empty($user->tanggal_jam_pasien_masuk) ? date("Y-m-d", strtotime($user->tanggal_jam_pasien_masuk)) : "-") ?></td>
                                                    <td><?= (!empty($user->dokter_jaga_igd) ? $user->dokter_jaga_igd : "-") ?></td>

                                                    <!--  <td><?= $user->SUB_MASALAH ?></td>
                                                    <td><?= $preview ?>
                                                        <?php if ($sentence_count > 10) : ?>
                                                            <button type="button" class="btn btn-link baca-detail" data-toggle="modal" data-target="#detailModal" data-id="<?= $user->ID_TIKET ?>">Baca Detail</button>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= (!empty($user->solusi) ? $user->solusi : "-") ?></td>
                                                    <td><?= $user->TANGGAL ?></td>
                                                    <td>
                                                        <span class="<?= $css ?>"> <?= $user->isi_STATUS ?></span>
                                                    </td> -->
                                                    <td><a href="<?= site_url('user/Dashboard/edit/' . $user->id) ?>"><button type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>


                                                                <!-- <td><a href="<?= site_url('user/Dashboard/hapus/' . $user->id) ?>"><button type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> -->

                                                    <td><button type="button" onclick="dataHapus(<?php echo $user->id; ?>);" class="btn btn-danger" data-id="<?= $user->id ?>"><i class="fa fa-trash" aria-hidden="true"></i></button></td>

                                                    <!-- <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#fileModal" data-id="<?= $user->id ?>">Detail File</button></td> -->

                                                    <td><a href="<?= site_url('user/Dashboard/track/' . $user->id) ?>"><button type="button" class="btn btn-primary"><i class="fa fa-wpforms" aria-hidden="true"></i>
                                                            </button></a>
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

                </div>
                <!-- modals -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<script>
    function dataHapus(id) {
        console.log("-_-");

        var result = confirm("Apakah Anda yakin ingin menghapus data ini?");
        if (result) {
            // AJAX untuk mendapatkan daftar file
            $.ajax({
                url: '<?= site_url('user/Dashboard/dataHapus') ?>', // Ubah ke endpoint API Anda
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                        alert("Berhasil Dihapus");
                        location.reload();
                        
                },
                error: function() {
               alert("Data Tidak dapat dihapus")
                }
            });
        }
    }
    $(document).ready(function() {
        $('#fileModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var tiketId = button.data('id'); // Dapatkan ID Tiket

            // AJAX untuk mendapatkan daftar file
            $.ajax({
                url: '<?= site_url('user/Dashboard/get_files') ?>', // Ubah ke endpoint API Anda
                type: 'POST',
                data: {
                    id: tiketId
                },
                success: function(response) {
                    var files = JSON.parse(response); // Parsing response
                    var fileList = $("#fileList");
                    fileList.empty(); // Kosongkan daftar sebelum mengisi ulang

                    if (files.length > 0) {
                        files.forEach(function(file) {
                            fileList.append(
                                `<li><a href='<?= base_url('uploads/') ?>${file.file_name}' target='_blank'>${file.file_name}</a></li>`
                            );
                        });
                    } else {
                        fileList.append("<li>Tidak ada file yang ditemukan.</li>");
                    }
                },
                error: function() {
                    $("#fileList").html("Terjadi kesalahan saat mengambil file.");
                }
            });
        });




        // Click Detail Problem

        $('#detailModal').on('show.bs.modal', function(event) {
            var tiketId = $(event.relatedTarget).data('id'); // Dapatkan ID Tiket

            // Tampilkan loading bar saat modal dibuka
            $("#loading-bar").show();

            // AJAX untuk mengambil detail masalah
            $.ajax({
                url: '<?= site_url('user/Dashboard/get_detail_masalah') ?>',
                type: 'POST',
                data: {
                    id: tiketId
                },
                success: function(response) {
                    var detail = JSON.parse(response);

                    // Masukkan data ke textarea
                    $("#fullKeterangan").val(detail.full_masalah[0].MASALAH);

                    console.log(detail.full_masalah[0].MASALAH);
                    // Inisialisasi CKEditor pada textarea
                    CKEDITOR.replace('fullKeterangan', {
                        readOnly: true // Set editor to read-only mode
                    });
                    // Sembunyikan loading bar setelah data diambil
                    $("#loading-bar").hide();
                },
                error: function() {
                    $("#fullKeterangan").val("Terjadi kesalahan saat mengambil detail.");
                    $("#loading-bar").hide(); // Sembunyikan loading bar jika terjadi kesalahan
                }
            });
        });

        // Reset CKEditor ketika modal ditutup untuk menghindari konflik
        $('#detailModal').on('hidden.bs.modal', function() {
            if (CKEDITOR.instances.fullKeterangan) {
                CKEDITOR.instances.fullKeterangan.destroy(); // Hancurkan instance CKEditor
            }
        });
    });
</script>