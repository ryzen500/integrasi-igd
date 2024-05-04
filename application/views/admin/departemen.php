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
                <h1 class="h3 mb-2 text-gray-800"><b>Data Departemen</b></h1>

                <!-- Begin ADD Data Example -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3 ">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Data
                            </button>
                        </div>
                       
                        <form action="<?php echo site_url('admin/Departemen/simpanData') ?>" method="post">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Departemen</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-sm-12 col-xl-1 m-b-30">
                                                
                                        </div>
                                        <div class="col-sm-12 col-xl-12 m-b-30">
                                            <p>Nama Departemen</p>
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <input type="text" class="form-control" name="NAMA_DEPARTEMEN">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            <!-- End Of ADD Data Example -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <!-- Begin Table data -->     
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 37px;">No</th>
                                                    <!-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 31px;">ID Departemen</th> -->
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 49px;">Departemen</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 29px;">Aksi</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
		                                        $no = 1;
		                                        foreach($user as $u){
                                                ?>
                                                    <tr class="odd">
                                                        <td class="sorting_1"><?php echo $no++ ?></td>
                                                        <!-- <td><?php // echo $u->ID_DEPARTEMEN ?></td> -->
                                                        <td><?php echo $u->NAMA_DEPARTEMEN ?></td>
                                                        <td>
                                                            <a href="<?php echo site_url('admin/Departemen/edit/'.$u->ID_DEPARTEMEN)?>" class="btn btn-info btn-icon-split">
                                                                <span class="icon text-white-50">
                                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                                </span>
                                                            </a>
                                                            <a href="<?php echo site_url('admin/Departemen/delete/'.$u->ID_DEPARTEMEN)?>" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin?')">
                                                                <span class="icon text-white-50">
                                                                <i class="fa fa-trash"></i>
                                                                </span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            <!-- Begin of Form Edit data -->
                                             
                                            <!-- End of form edit data -->        
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            <!-- End of Table data -->
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
                <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->
        