    <!-- Content Wrapper -->
    <div id="content-wrapper" class="flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('admin/template/navbar');?>
                            <!-- End of Topbar -->
        
        <!-- Content Wrapper -->
        <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>Ubah Data Departemen</b></h1>
                    <div class="bg-white py-lg-5 card shadow mb-12">
                        <form class="col row-cols-lg-auto g-4 align-items-center" action="<?php echo site_url('admin/Departemen/Update') ?>" method="post">
                        <input type="hidden" name="ID_DEPARTEMEN" value=" <?php echo $departemen->ID_DEPARTEMEN ?> ">                         
                          <div class="row mb-3 ml-12">
                            <label for="masalah" class="col-sm-2 col-form-label">Nama Departemen</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="NAMA_DEPARTEMEN" value="<?php echo $departemen->NAMA_DEPARTEMEN ?>">
                            </div>
                          </div>

                            <br>
                            <div class="col-8 text-center">
                                <input type="submit" class="col-3 btn btn btn-primary" role="button" value="Simpan">
                                <a class="col-3 btn btn-danger" href="<?=site_url('admin/departemen')?>" role="button">Kembali</a>
                            </div>
                        </form>
                    </div>
                <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->
      </div>

    </div>
    <!-- End of Page Wrapper -->