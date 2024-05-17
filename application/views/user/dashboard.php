        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('user/template/navbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 text-gray-800"><b>Beranda</b></h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Laporan Masuk</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $laporantiket ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-download fa-2x text-gray-900"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Laporan yang Dibuat Oleh Pengguna <br><?= $this->session->userdata('nama_user'); ?> </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $laporanyangdibuatsaya ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-clock fa-2x text-gray-900"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Pengguna</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $laporanuser ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chart-line fa-2x text-gray-900"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total Dokter</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $laporandokter ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-square fa-2x text-gray-900"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Detail Masalah Dialog -->

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-7">

                            <div class="card">
                                <div class="card-header py-3">
                                    <h3 class="m-0 font-weight-bold text-primary"> 5 Pencatatan Pendaftaran <br> Terbaru</h3>
                                    <h6 class="m-1 font-weight-italic text-primary">-</h6>
                                </div>

                                <div class="card-body text-left">

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nomer Pendaftaran</th>
                                                <th scope="col">No Rekam Medik</th>
                                                <th scope="col">Dokter Jaga IGD</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($pendaftaran_terakhir as $pt) {
                                                $no++; ?>
                                                <tr>
                                                    <th scope="row"><?= $no ?></th>
                                                    <td><?php echo $pt->no_pendaftaran; ?></td>
                                                    <td><?php echo $pt->no_rekam_medik; ?></td>
                                                    <td ><?php echo $pt->dokter_jaga_igd; ?></td>
                                                </tr>
                                            <?php  }    ?>



                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-6 col-lg-5">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h3 class="m-0 font-weight-bold text-primary">Pelapor PPA</h3>
                                    <h6 class="m-1 font-weight-italic text-primary">-</h6>
                                </div>

                                <div class="card-body text-left">

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Pelapor</th>
                                                <th scope="col">Total Laporan yang dikirim</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($laporan_ppa as $laporanppa) {
                                                $no++; ?>
                                                <tr>
                                                    <th scope="row"><?= $no ?></th>
                                                    <td><?php echo $laporanppa->nama_user; ?></td>
                                                    <td style="text-align: center;"><?php echo $laporanppa->total_laporan_rekap; ?></td>
                                                </tr>
                                            <?php  }    ?>



                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->