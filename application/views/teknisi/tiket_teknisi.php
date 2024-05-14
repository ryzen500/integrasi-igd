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
        <h1 class="h3 mb-2 text-gray-800"><b>Laporan Tiket</b></h1>

        <!-- Button Cetak -->
        <a class="btn btn-danger" href=" <?php echo base_url('teknisi/print') ?>"> <i class="fa fa-print"></i>Cetak Laporan</a>
        

        

<!--MENAMPILKAN DATA DAN FITUR SEARCH & FILTER DATA-->
                        
<div class="container">
	<div class="row" style="margin-top: 50px;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						<label>Pilih Filter Bulan</label>
						<select class="form-control bulan" name="">
							<option>-- Pilih --</option>
							<option value="Januari">Januari</option>
							<option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
							<option value="April">April</option>
                            <option value="Mei">Mei</option>
							<option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
							<option value="Agustus">Agustus</option>
                            <option value="September">September</option>
							<option value="Oktober">Oktober</option>
                            <option value="November">November</option>
							<option value="Desember">Desember</option>
						</select>
					</div>
				</div>
			</div>
		</div>

					<div class="form-group">
						<label>Pilih Filter Tahun</label>
						<select class="form-control TANGGAL" name="">
							<option>-- Pilih --</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
                            <option value="2023">2023</option>
						</select>
					</div>

		<div class="col-md-12">
            <div class="table-responsive">
            <table id="tabelData" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Tiket</th>
                            <th>ID User</th>
                            <th>Nama Tiket</th>
                            <th>Masalah</th>
                            <th>Solusi</th>
                            <th>Tanggal Ajuan</th>
                            <th>Bulan</th>
                            <th>Status</th>
                            <th>Nama Teknisi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;  
                        foreach ($tiket as $row) { ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?= $row->ID_TIKET ?></td>
                            <td><?= $row->ID_USER ?></td>
                            <td><?= $row->NAMA_TIKET ?></td>
                            <td><?= $row->MASALAH ?></td>
                            <td><?= $row->SOLUSI ?></td>
                            <td><?= $row->TANGGAL ?></td>
                            <td><?= $row->bulan ?></td>
                            <td><?= $row->STATUS ?></td>
                            <td><?= $row->NAMA_TEKNISI ?></td>

                        </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>
            </div>
		</div>
		
	</div>
</div>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

       

                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                                    Showing 1 to 10 of 57 entries
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                        </li>
                                        <li class="paginate_button page-item active">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">
                                                1
                                            </a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">
                                                2
                                            </a>
                                        </li>
                                        <li class="paginate_button page-item next" id="dataTable_next">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">
                                            Next
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <script type="text/javascript">
            $(document).ready(function() {
                $('#tabelData').DataTable();
                function filterData () {
                    $('#tabelData').DataTable().search(
                        $('.bulan').val()
                        ).draw();
                }
                $('.bulan').on('change', function () {
                    filterData();
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#tabelData').DataTable();
                function filterData () {
                    $('#tabelData').DataTable().search(
                        $('.TANGGAL').val()
                        ).draw();
                }
                $('.TANGGAL').on('change', function () {
                    filterData();
                });
            });
        </script>

        

        
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; IGD RSWB Surabaya <?php echo date('Y'); ?></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
        <!-- End of Main Content -->


        
</div>
<!-- End of Content Wrapper -->
