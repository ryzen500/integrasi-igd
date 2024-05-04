    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('admin/template/navbar');?>
                            <!-- End of Topbar -->
      
        <!-- Content Wrapper -->
        <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>Tambah Data Inventori</b></h1>
                    <div class="bg-white py-lg-5 card shadow mb-4">
                        <form class="col row-cols-lg-auto g-4 align-items-center" action="<?php echo site_url('admin/Inventory/simpanData') ?>" method="post">                         

                          <div class="row mb-3 ml-12">
                            <label for="masalah" class="col-sm-2 col-form-label">Nama Inventori</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="NAMA_INVENTORY">
                            </div>
                          </div>

                          <div class="row mb-3 ml-12">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Departemen</label>
                            <div class="col-sm-10">
                                <select name="ID_DEPARTEMEN" class="form-control">
                                    <?php foreach ($departemen as $divisi): ?>
                                        <option value="<?php echo $divisi->ID_DEPARTEMEN ?>"><?php echo $divisi->NAMA_DEPARTEMEN ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                          </div>

                          <div class="row mb-3 ml-12">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="STATUS" class="form-control">
                                    <option>Status</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                          </div>


                            <br>
                            <div class="col-8 text-center">
                                <input type="submit" class="col-3 btn btn-primary" role="button" value="Simpan">
                                <a class="col-3 btn btn-danger" href="<?=site_url('admin/inventory')?>" role="button">Kembali</a>
                            </div>
                        </form>
                    </div>
                <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->
            </div>

    </div>
    <!-- End of Page Wrapper -->