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
                <h3 class="container-fluid"><b><?= $title ?></b></h3>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <div class="bg-white py-lg-5 ">
                    <form method="POST" action="<?= base_url('user/Dashboard/ubah_profil'); ?>">


                      <div class="form-group row ml-5 mr-5">
                        <label for="id" class="col-sm-2 col-form-label">No. Pegawai<sup style="color: red;">*</sup></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="id" name="id_user" value="<?= $user['id_user'] ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row ml-5 mr-5">
                        <label for="id" class="col-sm-2 col-form-label">Nama Lengkap<sup style="color: red;">*</sup></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $user['nama_user']?>">
                          <?=form_error('nama_user','<small class="text-danger pl-3">','</small>')?>
                        </div>
                      </div>
                      <div class="form-group row ml-5 mr-5">
                        <label for="id" class="col-sm-2 col-form-label">Email<sup style="color: red;">*</sup></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                          <?=form_error('email','<small class="text-danger pl-3">','</small>')?>
                        </div>
                      </div>
                      <!--  -->


                      <div class="form-group row ml-5 mr-5">
                        <label for="id" class="col-sm-2 col-form-label">Departemen<sup style="color: red;">*</sup></label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">

                            <select class="form-control" id="id_departemen" name="id_departemen">
                              <option selected value="<?= $user['id_departemen'] ?>"><?= $user['departemen'] ?></option>
                              <?php
                              foreach ((array)$departemen as $nama) { ?>
                                <option value="<?= $nama->ID_DEPARTEMEN ?>"><?= $nama->NAMA_DEPARTEMEN ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row ml-5 mr-5">
                        <label for="id" class="col-sm-2 col-form-label">No. Telepon<sup style="color: red;">*</sup></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $user['no_telp'] ?>">
                          <?=form_error('no_telp','<small class="text-danger pl-3">','</small>')?>
                        </div>
                      </div>



                      <div class="form-group row justify-content-end ml-5">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                         <a href="<?= site_url('user/Dashboard/profil')?>"> <button type="button" class="btn btn-danger ml-2">Batal</button></a>
                        </div>
                      </div>

                    </form>

                  </div>





                </div>

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