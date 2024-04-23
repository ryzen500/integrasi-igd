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
                <h3 class="container-fluid"><b><?=$title?></b></h3>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="bg-white py-lg-5">
                            <div class="form-group col-lg-6 ml-5">
                            <?= $this->session->flashdata('message')?>
                            </div>
                    
                            <form method="POST" action="<?= base_url('user/Dashboard/ubah_password_action');?>">
                            <div class="form-group row ml-5 mr-5">
                              <label for="id" class="col-sm-2 col-form-label">Kata Sandi Lama<sup style="color: red;">*</sup></label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" value="<?=set_value('password')?>">
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                <?=form_error('password','<small class="text-danger pl-3">','</small>')?>
                              </div>
                            </div>
                            <div class="form-group row ml-5 mr-5">
                              <label for="email" class="col-sm-2 col-form-label">Kata Sandi Baru<sup style="color: red;">*</sup></label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="password1" name="password1" value="<?=set_value('password1')?>">
                                <span toggle="#password1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                <?=form_error('password1','<small class="text-danger pl-3">','</small>')?>
                              </div>
                            </div>
                            <div class="form-group row ml-5 mr-5">
                              <label for="departemen" class="col-sm-2 col-form-label">Konfirmasi Kata Sandi<sup style="color: red;">*</sup></label>
                              <div class="col-sm-10">
                              <input type="password" class="form-control" id="password2" name="password2" value="<?=set_value('password2')?>">
                              <?=form_error('password2','<small class="text-danger pl-3">','</small>')?>
                              </div>
                            </div>
                            <div class="form-group row justify-content-end ml-5">
                              <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary" >Simpan</button>
                              <button type="reset" class="btn btn-danger">Batal</button>
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