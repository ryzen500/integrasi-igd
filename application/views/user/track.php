<!-- Content Wrapper -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
                <div class="btn btn-danger mb-3 mt-3"><?= date('l, d M Y', strtotime($track_user->tanggal_pengajuan)) ?>
                </div>
              </div>
              <div class="order-track-step ml-5 mr-5">
                <div class="order-track-status">
                  <span class="order-track-status-dot fas fa-check-circle fa-2xl ml-1"
                    style="color:blue !important"></span>
                  <span class="order-track-status-line"></span>
                </div>
                <div class="order-track-text">
                  <div class="pd bg-white border shad">
                    <div class="nama"><?= !empty($track_user->nama_pelapor) ? $track_user->nama_pelapor : "-" ?> <br>
                      Dari
                      Ruangan (<?= $track_user->user ?> )</div>
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
                    <span class="order-track-status-dot fas fa-check-circle fa-2xl ml-1"
                      style="color:blue !important"></span>
                    <span class="order-track-status-line"></span>
                  </div>
                  <div class="order-track-text">
                    <div class="pd bg-white border shad">

                      <div class="nama">
                        <?= !empty($value->nama_pelapor) ? $value->nama_pelapor . " <br> Dari Ruangan (" . $value->nama_teknisi . ")" : $value->nama_teknisi ?>
                      </div>
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
                  } else {
                    echo "<span class=\"order-track-status-line\"></span>";

                  } ?>
                </div>
              </div>

              <?php
              if ($track_user->STATUS_TIKET == 4) {
                echo "<div class=\"form-group row ml-5 mr-5\">";
                // echo "<a href=" . site_url('user/Dashboard/konfirmasi/' . $track_user->ID_TIKETS) . " class=\"btn btn-info\">Konfirmasi</a>";
                ?>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#confirmationModal">
                  Konfirmasi
                </button>
              <?php } elseif (($track_user->STATUS_TIKET == 7)) {
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

      <div class="modal fade" id="confirmationModal" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Konfirmasi Tiket</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="<?= site_url('user/Dashboard/konfirmasi/' . $track_user->ID_TIKETS) ?>">
              <div class="modal-body">
                <label class=" col-form-label">User Pengkonfirmasi</label>

                <select id="myDropdown2" class="form-control" name="nama_pelapor">
                  <option value="">--Pilih opsi--</option>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-info">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script>
// Tangkap acara klik pada tombol yang membuka modal
$('#confirmButton').on('click', function() {
    // Buka modal ketika tombol diklik
    $('#confirmationModal').modal('show');
});

// Menginisialisasi Select2 saat modal ditampilkan
$('#confirmationModal').on('shown.bs.modal', function () {
    $('#myDropdown2').select2({
        placeholder: 'Masukkan Nama Pelapor...',
        allowClear: true,
        ajax: {
            url: 'http://192.168.30.194/helpdesk-api-dashboard/data-dropdown.php',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return { q: params.term };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (item) {
                        return { id: item.name, text: item.name };
                    })
                };
            },
            cache: true
        }
    });
});

  </script>