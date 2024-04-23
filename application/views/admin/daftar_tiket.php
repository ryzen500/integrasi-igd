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
                                         

                                            <a href="<?php  echo site_url('admin/Tiket/ambil_tiket/' . $mhs->ID_TIKET)?>" class="btn btn-danger">
                                                                <span class="icon text-white-50">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                                </span>
                                                            </a>
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