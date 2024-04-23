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
            <h1 class="h3 mb-2 text-gray-800">Tiket</h1>
            <div class="bg-white py-lg-5 card shadow mb-4">
                <form class="col row-cols-lg-auto g-4 align-items-center" method="POST" action="<?php echo site_url('admin/Tiket/Update') ?>">
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label class="col-form-label">Nomor Tiket</label>
                        </div>
                        <div class="col-sm-4">
                            <input id="ID_TIKET" name="ID_TIKET" type="text" class="form-control" value=" <?php echo $tiket->ID_TIKET ?> " readonly>
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
                        <label for="tipe_masalah" class="col-sm-2 col-form-label">Tipe Masalah</label>
                        <div class="col-sm-10">

                            <select class="form-control" id="SUB_MASALAH" name="SUB_MASALAH">
                              <option disabled selected>Pilih Tipe Masalah</option>
                                <option value="Software">Software</option>
                                <option value="Hardware">Hardware</option>
                                <option value="Human Error">Human Error</option>
                            </select>
                        </div> 
                        <!-- <div class="col-sm-10">
                            <input type="text" name="MASALAH" rows="5" cols="5" type="text" class="form-control" id="tipe_masalah" value="<?php echo $tiket->SUB_MASALAH ?>" readonly>
                        </div> -->
                    </div>
                    <div class="row mb-3 ml-12">
                        <label for="masalah" class="col-sm-2 col-form-label">Masalah</label>
                        <div class="col-sm-10">
                            <textarea name="MASALAH" rows="5" cols="5" type="text" class="form-control" id="masalah" readonly><?php echo $tiket->MASALAH ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3 ml-12">
                        <label for="masalah" class="col-sm-2 col-form-label">Teknisi</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="TEKNISI" name="TEKNISI">
                                <option value="">Pilih</option>

                                <?php
                                foreach ((array)$teknisi as $nama) { ?>
                                    <option value="<?= $nama->id_user ?>"><?= $nama->nama_user ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="col-8 text-center">
                        <button class="btn btn-primary col-3 " type="submit">Tugaskan</button>
                        <a class="col-3  btn btn-danger" href="<?= site_url('admin/tiket') ?>" role="button">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>

</div>
    <!-- End of Page Wrapper -->