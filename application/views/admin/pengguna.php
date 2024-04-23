        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('admin/template/navbar');?>
                <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>Data Pengguna</b></h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="btn btn-primary" href="<?=site_url('admin/user/tambahData')?>">Tambah Data</a>
                        </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 17px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 61px;">ID User</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 100px;">Nama</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 21px;">Departemen</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 32px;">Level</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 32px;">Email</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 12px;">No. Telepon</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 100px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no = 1;
                                                    foreach ($user as $mhs):	
                                                ?>
                                                    <tr class="odd">
                                                    <td><?php echo $no++ ?></td>
                                                        <td><?php echo $mhs->id_user ?></td>
                                                        <td><?php echo $mhs->nama_user ?></td>
                                                        <td><?php echo $mhs->NAMA_DEPARTEMEN ?></td>
                                                        <td><?php echo $mhs->NAMA_LEVEL ?></td>
                                                        <td><?php echo $mhs->email ?></td>
                                                        <td><?php echo $mhs->no_telp ?></td>
                                                        <td>
                                                            <a href="<?php echo site_url('admin/user/edit/'.$mhs->id_user)?>" class="btn btn-info btn-icon-split">
                                                                <span class="icon text-white-50">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </span>
                                                            </a>
                                                            <a href="<?php echo site_url('admin/user/delete/'.$mhs->id_user)?>" class="btn btn-danger">
                                                                <span class="icon text-white-50">
                                                                <i class="fa fa-trash"></i>
                                                                </span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
                <!-- End of Main Content -->

                

        </div>
        <!-- End of Content Wrapper -->
        