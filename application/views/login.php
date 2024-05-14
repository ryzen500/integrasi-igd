
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IGD RSWB Surabaya - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url()?>assets/back/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url()?>assets/back/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/back/css/login.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url()?>assets/back/css/hideshow.css" rel="stylesheet">
    <body class="bg-gradient-primary">
    
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
                                <img style="height:80px ;" src="<?= base_url('assets/back') ?>/img/logo.png" alt="">
                                </div>
                                <div class="text-center">
                                <p class="h4 mt-3 mb-4" style="font-weight:bold; font-family:sans-serif"><?=$judul?></p>
                                </div>  
                                <hr class="sidebar-divider my-0 mb-4">
                                    <div class="text-center">
                                        <h4 class="text-gray-900 mb-4"><?=$title?></h4>
                                    </div>
                                    <?= $this->session->flashdata('message')?>
                                    <form class="user" method="POST" action="<?=base_url('login/validation');?>">
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
                                       <p class="ml-3">Jika anda ingin bertanya seputar akun anda, silakan anda hubungi <b style="color:#1E90FF;">081234567890</b></p> 
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

    <!-- Bootstrap core JavaScript-->
<script src="<?= base_url()?>assets/back/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/back/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url()?>assets/back/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()?>assets/back/js/sb-admin-2.min.js"></script>
    <script src="<?=base_url()?>assets/back/js/hideshow.js"></script>

</body>

</html>