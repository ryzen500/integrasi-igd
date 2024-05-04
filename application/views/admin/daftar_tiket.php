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
            <h1 class="h3 mb-2 text-gray-800"><b> Tiket </b></h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4 ">

                <div class="card-body">
                    <div class="table-responsive">

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
                                    <th>Tipe Masalah</th>
                                    <th>Keterangan Masalah</th>
                                    <th>Tanggal Ajuan</th>
                                    <th>Teknisi</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                    <th>Detail Attachment Pelapor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($tiket as $mhs):
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $mhs->ID_TIKET ?></td>
                                        <td><?php echo $mhs->NAMA_DEPARTEMEN ?></td>
                                        <td><?php echo $mhs->SUB_MASALAH ?></td>
                                        <td><?php echo $mhs->MASALAH ?></td>
                                        <td><?php echo $mhs->TANGGAL ?></td>
                                        <td><?php echo $mhs->nama_user ?></td>
                                        <td><?php echo $mhs->STATUS ?></td>
                                        <!-- <td>
                                                            <a href="<?php echo site_url('admin/Tiket/edit/' . $mhs->ID_TIKET) ?>" class="btn btn-info">Diserahkan ke Teknisi</a>
                                                            <br>
                                                            <a href="<?php echo site_url('admin/Tiket/edit/' . $mhs->ID_TIKET) ?>" class="btn btn-info">Edit</a>

                                                        </td> -->

                                        <td>
                                            <a href="<?php echo site_url('admin/Tiket/edit/' . $mhs->ID_TIKET) ?>"
                                                class="btn btn-info btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fa fa-american-sign-language-interpreting"
                                                        aria-hidden="true"></i>

                                                </span>
                                            </a>


                                            <a href="<?php echo site_url('admin/Tiket/ambil_tiket/' . $mhs->ID_TIKET) ?>"
                                                class="btn btn-danger">
                                                <span class="icon text-white-50">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </span>
                                            </a>
                                        </td>


                                        <td><button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#fileModal"
                                                data-id="<?= $mhs->ID_TIKET ?>">Detail</button>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

        </div>
    </div>
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