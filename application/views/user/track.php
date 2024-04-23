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
                  <div class="card py-lg-5">

                    <form method="POST" action="<?= base_url('user/Dashboard/track'); ?>">

                      <div class="ml-5 mr-5">
                        <div class="btn btn-danger mb-3 mt-3"><?= date('l, d M Y', strtotime($track_user->tanggal_pengajuan)) ?></div>
                      </div>
                      <div class="order-track-step ml-5 mr-5">
                        <div class="order-track-status">
                        <span class="order-track-status-dot fas fa-check-circle fa-2xl ml-1" style="color:blue !important"></span>
                          <span class="order-track-status-line"></span>
                        </div>
                      <div class="order-track-text">
                        <div class="pd bg-white border shad">
                          <div class="nama"><?= $track_user->user ?></div>
                          <div class="status"><?= "Tiket Masuk" ?></div>
                          <i class="fas fa-clock clock"></i>
                          <div class="jam"><?= date('H:i:s', strtotime($track_user->tanggal_pengajuan)) ?></div>
                          <i class="far fa-calendar-alt calendar"></i>
                          <div class="waktu"><?= date('d-M-Y', strtotime($track_user->tanggal_pengajuan)) ?></div> 
                        <div></div>
                      </div>
                    </div>
                      </div>
                      
                      <?php
                      foreach ($track as $value) {

                      ?>
                      <div class="order-track-step ml-5 mr-5">
                        <div class="order-track-status">
                          <span class="order-track-status-dot fas fa-check-circle fa-2xl ml-1" style="color:blue !important"></span>
                          <span class="order-track-status-line"></span>
                        </div>
                        <div class="order-track-text">
                          <div class="pd bg-white border shad">
                          
                            <div class="nama"><?= $value->nama_teknisi ?></div>
                            <div class="status"><?= $value->status ?></div>
                            <i class="fas fa-clock clock"></i>
                            <div class="jam"><?= date('H:i:s', strtotime($value->TANGGAL)) ?></div>
                            <i class="far fa-calendar-alt calendar"></i>
                            <div class="waktu"><?= date('d-M-Y', strtotime($value->TANGGAL)) ?></div> 
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                      <div class="order-track-step ml-5 mr-5">
                        <div class="order-track-status">
                          <span class="order-track-status-dot fas fa-circle fa-2xl ml-1" style="color:grey !important"></span>
                          
                        <?php if ($track_user->STATUS_TIKET != 7) {
                          echo ""; 
                        }else{
                        echo  "<span class=\"order-track-status-line\"></span>";

                        } ?>  
                        </div>
                      </div>
                        
                      <?php
                      if ($track_user->STATUS_TIKET == 4) {
                        echo "<div class=\"form-group row ml-5 mr-5\">";
                        echo "<a href=" . site_url('user/Dashboard/konfirmasi/' . $track_user->ID_TIKETS) . " class=\"btn btn-info\">Konfirmasi</a>";
                      } elseif (($track_user->STATUS_TIKET == 7)) {
                        echo "<div class=\"btn btn-dark disabled form-group row ml-5 mt-3\">";
                        echo "Sudah Dikonfirmasi";
                      } else {
                        echo "<div class=\"btn btn-warning disabled form-group row ml-5\">";  
                        echo "Dalam Progress";
                      }

                      ?>
                      </div>



                    </form>

                  </div>

                </div>
                <!-- /.container-fluid -->

                <!-- End of Main Content -->



              </div>
              <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
              <i class="fas fa-angle-up"></i>
            </a>