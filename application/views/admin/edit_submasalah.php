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
                <h1 class="h3 mb-2 text-gray-800"><b> Ubah Data Penyebab Masalah</b></h1>
                    <div class="bg-white py-lg-5 card shadow mb-4">
                        <form class="col row-cols-lg-auto g-4 align-items-center" action="<?php echo site_url('admin/Inventory/Update') ?>" method="post">
                        <input type="hidden" name="ID_SUBMASALAH" value=" <?php echo $inventory->ID_SUBMASALAH ?> ">                         
                          <div class="row mb-3 ml-12">
                            <label for="masalah" class="col-sm-2 col-form-label">Nama Penyebab Masalah</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="NAMA_SUBMASALAH" value="<?php echo $inventory->NAMA_SUBMASALAH ?>">
                            </div>
                          </div>

                          <!-- <div class="row mb-3 ml-12">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Departemen</label>
                            <div class="col-sm-10">
                                <select name="ID_DEPARTEMEN" class="form-control">
                                    <?php foreach ($departemen as $prodi): ?>
                                        <option value="<?php echo $prodi->ID_DEPARTEMEN ?>" <?php if($prodi->ID_DEPARTEMEN == $inventory->ID_DEPARTEMEN) echo 'selected'; ?>><?php echo $prodi->NAMA_DEPARTEMEN ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                          </div>

                          <div class="row mb-3 ml-12">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="STATUS" class="form-control">
                                <option value="<?php echo $inventory->STATUS ?>"><?php echo $inventory->STATUS ?></option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                          </div> -->

                            <br>
                            <div class="col-8 text-center">
                                <input type="submit" class="col-3 btn btn-primary" role="button" value="Simpan">
                                <a class="col-3 btn btn-danger" href="<?=site_url('admin/submasalah')?>" role="button">Kembali</a>
                            </div>
                        </form>
                    </div>
                <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->

      </div>

    </div>
    <!-- End of Page Wrapper -->