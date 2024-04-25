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
                                    <div class="modal fade" id="fileModal" tabindex="-1" role="dialog"
                                        aria-labelledby="fileModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="fileModalLabel">Daftar File</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                <th>No. Tiket Ajuan Complain</th>
                                                <th>Departemen</th>
                                                <th>Nama Pelapor</th>
                                                <th>Tipe Masalah</th>
                                                <th>Keterangan Masalah</th>
                                                <th>Solusi</th>
                                                <th>Tanggal Ajuan</th>
                                                <th>Status</th>
                                                <th>Detail Attachment</th>
                                                <th>Opsi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ((array) $tiket as $user) {
                                                $idstatus = $user->STATUS_TIKET;
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

                                                $no++
                                                    ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $user->ID_TIKET ?></td>
                                                    <td><?= $user->DEPARTEMEN ?></td>
                                                    <td><?= (!empty($user->nama_pelapor) ? $user->nama_pelapor : "-") ?></td>

                                                    <td><?= $user->SUB_MASALAH ?></td>
                                                    <td><?= $user->MASALAH ?></td>
                                                    <td><?= (!empty($user->solusi) ? $user->solusi : "-")?></td>
                                                    <td><?= $user->TANGGAL ?></td>
                                                    <td>
                                                        <span class="<?= $css ?>"> <?= $user->isi_STATUS ?></span>
                                                    </td>
                                                    <td><button type="button" class="btn btn-info" data-toggle="modal"
                                                            data-target="#fileModal"
                                                            data-id="<?= $user->ID_TIKET ?>">Detail</button></td>



                                                    <td><a
                                                            href="<?= site_url('user/Dashboard/track/' . $user->ID_TIKET) ?>"><button
                                                                type="button" class="btn btn-primary"><i
                                                                    class="fas fa-solid fa-faw fa-file-alt"></i></button></a>
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
$(document).ready(function() {
    $('#fileModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var tiketId = button.data('id'); // Dapatkan ID Tiket

        // AJAX untuk mendapatkan daftar file
        $.ajax({
            url: '<?= site_url('user/Dashboard/get_files') ?>', // Ubah ke endpoint API Anda
            type: 'POST',
            data: { id: tiketId },
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
});
</script>
