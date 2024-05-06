
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                <div class="text-center text-wrap">
                                <img style="height:80px ;" src="<?= base_url('assets/back') ?>/img/logo-back-preview.png" alt="">
                                </div>
                                <div class="text-center">
                                <p class="h4 mt-3 mb-4" style="font-weight:bold; font-family:sans-serif"><?=$judul?></p>
                                </div>  
                                <hr class="sidebar-divider my-0 mb-4">
                                    <div class="text-center">
                                        <h4 class="text-gray-900 mb-4"><?=$title?></h4>
                                    </div>
                                    <?= $this->session->flashdata('message')?>
                                    <form class="user" method="POST" action="<?=site_url('login/validation');?>">
                                        <div class="form-group ">
                                            <input type="text" name="username" class="form-control form-control-user" value="<?=set_value('username')?>" placeholder="Masukkan Username" > 
                                                <?=form_error('username','<small class="text-danger pl-3">','</small>')?>
                                        <div class="form-group mt-lg-3 mb-4">
                                            <input type="password" id="password" name="password_user" class="form-control form-control-user" value="<?=set_value('password_user')?>"  placeholder="Kata Sandi">
                                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            <?= form_error('password_user','<small class="text-danger pl-3">','</small>')?>
                                        </div>
                                        <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-user btn-block justify-item-center" name="login">
                                            Masuk
                                        </button>
                                        </div>
                                       <p class="ml-3">Jika selama dalam kurun waktu jam kerja , silakan anda menghubungi telepon  <b style="color:#1E90FF;">2006 & 6031</b></p> 
                                       <!-- <p class="ml-3"><a href="<?=site_url('registration');?>">Jika anda ingin mendaftarkan akun anda, silakan Mendaftar </a></p>  -->

                                       <div>

                                        </div>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    