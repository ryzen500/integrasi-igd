        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('teknisi/template/navbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><b>Penanganan Tiket</b></h1>

                    <!-- Form Text Box -->
                    <!-- Page Heading -->
                    <form class="col row-cols-lg-auto g-4 align-items-center" method="POST" action="<?php echo site_url('teknisi/Tiket/Update') ?>">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label class="col-form-label">Nomor Tiket</label>
                            </div>
                            <div class="col-sm-4">
                                <input id="ID_TIKET" name="ID_TIKET" type="text" class="form-control" value="<?php echo $tiket->ID_TIKET ?>" readonly>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Tanggal Ajuan</label>
                            </div>
                            <div class="col-sm-4">
                                <input name="TANGGAL" type="text" class="form-control" value=" <?php echo $tiket->TANGGAL ?> " readonly>
                            </div>


                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label class="col-form-label">Nama Pengaju</label>
                            </div>
                            <div class="col-sm-4">
                                <input name="ID_USER" type="text" class="form-control" value=" <?php echo $tiket->nama_user ?> " readonly>
                            </div>
                            <div class="col-sm-2">
                                <label class="col-form-label">Departemen</label>
                            </div>
                            <div class="col-sm-4">
                                <input name="ID_INVENTORY" type="text" class="form-control" value=" <?php echo $tiket->NAMA_DEPARTEMEN ?> " readonly>
                            </div>

                        </div>



                        <div class="row mb-3 ml-12">
                            <label for="sub_masalah" class="col-sm-2 col-form-label">Tipe Masalah</label>

                            <div class="col-sm-10">

                                <select class="form-control" id="SUB_MASALAH" name="SUB_MASALAH">
                                    <option disabled selected>Pilih Tipe Masalah</option>
                                    <option value="Software">Software</option>
                                    <option value="Hardware">Hardware</option>
                                    <option value="Human Error">Human Error</option>
                                </select>
                            </div>
                            <!-- <div class="col-sm-10">
                                <input name="NAMA_TIKET" type="text" class="form-control" id="sub_masalah" value=" <?php echo $tiket->SUB_MASALAH ?> ">
                            </div> -->
                        </div>

                        <div class="row mb-3 ml-12">
                            <label for="masalah" class="col-sm-2 col-form-label">Masalah</label>
                            <div class="col-sm-10">
                                <textarea name="MASALAH" rows="5" cols="5" type="text" class="form-control" id="masalah" readonly><?php echo $tiket->MASALAH ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3 ml-12">
                            <label for="SOLUSI" class="col-sm-2 col-form-label">Solusi</label>
                            <div class="col-sm-10">
                                <textarea name="SOLUSI" rows="5" cols="5" type="text" class="form-control" id="SOLUSI"></textarea>
                            </div>
                        </div>

                        <br>
                        <div class="col-8 text-center">
                            <button class="btn btn-primary col-3 " type="submit">Selesaikan</button>
                            <a class="col-3  btn btn-danger" href="<?php echo site_url('teknisi/dashboard'); ?>" role="button">Kembali</a>
                        </div>
                    </form>

                    <!-- Button Bawah -->

                </div>
                <!-- End of Content Wrapper -->