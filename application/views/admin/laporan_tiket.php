        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('admin/template/navbar');?>
                <!-- End of Topbar -->
            </div>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>Laporan Tiket</b></h1>
                <!-- DataTales Example -->
                <div class="card shadow mb-4 ">
                <div class="col-md-12">
			</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-8 col-md-8">
                                        <div class="dataTables_length" id="dataTables_length">
                                            <form method="get" action="">
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-3">
                                                    <label>Filter Berdasarkan</label><br>
                                                        <select class="form-control" name="filter" id="filter">
                                                            <option disabled selected value="">Pilih</option>
                                                            <option value="1">Per Bulan</option>
                                                            <option value="2">Per Tahun</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 col-md-2 mr-3" id="form-bulan">
                                                            <label>Bulan</label><br>
                                                            <select class="form-control" name="bulan">
                                                                <option disabled selected value="">Pilih</option>
                                                                <option value="1">Januari</option>
                                                                <option value="2">Februari</option>
                                                                <option value="3">Maret</option>
                                                                <option value="4">April</option>
                                                                <option value="5">Mei</option>
                                                                <option value="6">Juni</option>
                                                                <option value="7">Juli</option>
                                                                <option value="8">Agustus</option>
                                                                <option value="9">September</option>
                                                                <option value="10">Oktober</option>
                                                                <option value="11">November</option>
                                                                <option value="12">Desember</option>
                                                            </select>
                                                    </div>
                                                    <div class="col-sm-3 col-md-2" id="form-tahun">
                                                            <label>Tahun</label><br>
                                                            <select class="form-control" name="tahun">
                                                                <option disabled selected value="">Pilih</option>
                                                                <?php
                                                                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                                                                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                    </div>
                                                </div>
                                                <br>
                                                        <button type="submit" class="btn btn-warning">Tampilkan</button>
                                                        <a class="btn btn-info" href="<?php echo base_url('admin/Tiket'); ?>">Reset Filter</a>
                                                        <a class="btn btn-secondary" href="<?php echo site_url('admin/Tiket/print')?>" target="_blank">  <i class="fa fa-print"></i> Print</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>No. Tiket</th>
                                                    <th>Departemen</th>
                                                    <th>Tipe Masalah</th>
                                                    <th>Keterangan Masalah</th>
                                                    <th>Solusi</th>
                                                    <th>Tanggal Ajuan</th>
                                                    <th>Teknisi</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach ($transaksi as $data):
                                            $idstatus = $data->STATUS_TIKET;
                                            if ($idstatus == 1) {
                                                $css = "badge badge-primary";
                                            } elseif ($idstatus == 2) {
                                                $css = "badge badge-secondary";
                                            } elseif ($idstatus == 3) {
                                                $css = "badge badge-info";
                                            } elseif ($idstatus == 4) {
                                                $css = "badge badge-success";
                                            } elseif ($idstatus == 5) {
                                                $css = "badge badge-warning";
                                            } elseif ($idstatus == 6) {
                                                $css = "badge badge-light";
                                            } elseif ($idstatus == 7) {
                                                $css = "badge badge-light";
                                            }	
                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data->ID_TIKET ?></td>
                                            <td><?php echo $data->NAMA_DEPARTEMEN ?></td>
                                            <td><?php echo $data->SUB_MASALAH ?></td>
                                            <td><?php echo $data->MASALAH ?></td>
                                            <td><?php echo $data->SOLUSI ?></td>
                                            <td><?php echo $data->TANGGAL ?></td>
                                            <td><?php echo $data->nama_user ?></td>
                                            <td><span class="<?= $css ?>"> <?= $data->STATUS ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
                <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->
        