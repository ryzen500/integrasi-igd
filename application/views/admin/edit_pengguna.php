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
                <h1 class="h3 mb-2 text-gray-800"><b>Ubah Data Pengguna</b></h1>
                    <div class="bg-white py-lg-5 card shadow mb-4">
                        <form class="col row-cols-lg-auto g-4 align-items-center" action="<?php echo site_url('admin/User/Update') ?>" method = "post">                         
                        <input type="hidden" class="form-control" name="id_user" value=" <?php echo $user->id_user ?> ">
                          <div class="row mb-3 ml-12">
                            <label for="masalah" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama_user" value="<?php echo $user->nama_user ?> ">
                            </div>
                          </div>

                          <div class="row mb-3 ml-12">
                            <label for="masalah" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" name="email" value="<?php echo $user->email ?> ">
                            </div>
                          </div>

                          <div class="row mb-3 ml-12">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Departemen</label>
                            <div class="col-sm-10">
                                <select name="id_departemen" class="form-control">
                                    <?php foreach ($departemen as $dpn): ?>
                                        <option value="<?php echo $dpn->ID_DEPARTEMEN ?>" <?php if($dpn->ID_DEPARTEMEN == $user->id_departemen) echo 'selected'; ?>><?php echo $dpn->NAMA_DEPARTEMEN ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                          </div>

                          <div class="row mb-3 ml-12">
                            <label for="masalah" class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="no_telp" value="<?php echo $user->no_telp ?> ">
                            </div>
                          </div>

                          <div class="row mb-3 ml-12">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <select name="id_level" class="form-control">
                                    <?php foreach ($level as $lvl): ?>
                                        <option value="<?php echo $lvl->ID_LEVEL ?>" <?php if($lvl->ID_LEVEL == $user->id_level) echo 'selected'; ?>><?php echo $lvl->NAMA_LEVEL ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                          </div>

                            <br>
                            <div class="col-8 text-center">
                                <input type="submit" class="col-3 btn btn-primary" role="button" value="Simpan">
                                <a class="col-3 btn btn-danger" href="<?=site_url('admin/user')?>" role="button">Kembali</a>
                            </div>
                        </form>
                    </div>
                <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->

      </div>

    </div>
    <!-- End of Page Wrapper -->