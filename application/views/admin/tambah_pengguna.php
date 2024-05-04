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
                <h1 class="h3 mb-2 text-gray-800"><b>Tambah Data Pengguna</b></h1>
                    <div class="bg-white py-lg-5 card shadow mb-4">
                        <form class="col row-cols-lg-auto g-4 align-items-center" action="<?php echo site_url('admin/User/simpanData') ?>" method="post">                         

                          <div class="row mb-3 ml-12">
                            <label for="masalah" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="nama_user">
                            </div>
                          </div>

                          <div class="row mb-3 ml-12">
                            <label for="masalah" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" name="email">
                            </div>
                          </div>

                          <div class="row mb-3 ml-12">
                            <label for="masalah" class="col-sm-2 col-form-label">Kata Sandi</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="password_user">
                            </div>
                          </div>

                          <div class="row mb-3 ml-12">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Departemen</label>
                            <div class="col-sm-10">
                                <select name="id_departemen" class="form-control">
                                    <?php foreach ($departemen as $divisi): ?>
                                        <option value="<?php echo $divisi->ID_DEPARTEMEN ?>"><?php echo $divisi->NAMA_DEPARTEMEN ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                          </div>

                          <div class="row mb-3 ml-12">
                            <label for="masalah" class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" name="no_telp">
                            </div>
                          </div>

                          <div class="row mb-3 ml-12">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <select name="id_level" class="form-control">
                                    <?php foreach ($level as $lvl): ?>
                                        <option value="<?php echo $lvl->ID_LEVEL?>"><?php echo $lvl->NAMA_LEVEL ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                          </div>

                            <br>
                            <div class = "form-group" hidden>
                                <input type="text" name="user_status" class="form-control" value="1" >
                            </div>
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