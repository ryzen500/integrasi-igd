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



                <form method="POST" action="" enctype="multipart/form-data">
                  <?php foreach ($track_user as $key => $track_users) {
                    # code...
                  ?>
                    <table>
                      <tr>
                        <td style="width: 200px; padding-top: 7px;">
                          <label for="file" style="text-align: center;">Nomor Rekam Medik</label>
                        <td style="width: 500px; padding-left:8px;">
                          <?php echo $track_users->no_rekam_medik ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Tanggal Pendaftaran / Register</label>
                        <td style="width: 200px; padding-left:8px;">
                          <?php echo date("Y-m-d", strtotime($track_users->tanggal_jam_pasien_masuk));  ?>
                        </td>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Nama Pasien</label>
                        <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                          <?php echo $track_users->nama_pasien;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Dokter Jaga IGD</label>
                        <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                          <?php echo $track_users->dokter_jaga_igd;  ?>
                        </td>
                        </td>
                      </tr>

                      <!-- Space -->
                      <tr>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "" ?>
                        </td>
                        </td>
                      </tr>
                      <!-- Space -->
                      <tr>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Diagnosa Utama</label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo $track_users->diagnosa_primer;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "";  ?>
                        </td>
                        </td>
                      </tr>

                      <!-- Space -->
                      <tr>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "" ?>
                        </td>
                        </td>
                      </tr>
                      <!-- Space -->
                      <tr>
                        <td style="width: 100px;height:100px; padding-top: 7px;">
                          <label for="file">Diagnosa Sekunder</label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo $track_users->diagnosa_sekunder;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "";  ?>
                        </td>
                        </td>
                      </tr>

                      <tr>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Tekanan Darah</label>
                        <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                          <?php echo $track_users->tekanan_darah;  ?>
                        </td>
                      <tr>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Detak Nadi</label>
                        <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                          <?php echo $track_users->detak_nadi;  ?>
                        </td>
                        </td>
                      </tr>
                      </td>
                      <td style="width: 100px;padding-top: 7px;">
                        <label for="file">Pernafasan</label>
                      <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                        <?php echo $track_users->pernafasan;  ?>
                      </td>
                      </td>
                      <tr>

                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Suhu Tubuh</label>
                        <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                          <?php echo $track_users->suhu_tubuh;  ?>
                        </td>
                        </td>
                      </tr>
                      <tr>

                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Tinggi badan</label>
                        <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                          <?php echo $track_users->tinggi_badan;  ?>
                        </td>
                        </td>

                      </tr>

                      <tr>

                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Berat badan</label>
                        <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                          <?php echo $track_users->berat_badan;  ?>
                        </td>
                        </td>
                      </tr>


                      <tr>

                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">GCS</label>
                        <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                          <?php echo $track_users->GCS;  ?>
                        </td>
                        </td>

                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">SPO2</label>
                        <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                          <?php echo $track_users->spo;  ?>
                        </td>
                        </td>
                      </tr>


                      <tr>

                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Lingkar Kepala (LK) </label>
                        <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                          <?php echo $track_users->LK;  ?>
                        </td>
                        </td>

                      </tr>

                      <tr>

                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Lingkar Lengan (LL)</label>
                        <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                          <?php echo $track_users->LL;  ?>
                        </td>
                        </td>
                      </tr>


                      <tr>

                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Lingkar Dada (LD) </label>
                        <td style="width: 200px;" style="padding-bottom:5px;padding-left:8px;">
                          <?php echo $track_users->LD;  ?>
                        </td>
                        </td>
                      </tr>
                      <!-- keluar -->



                      <!-- Space -->
                      <tr>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "" ?>
                        </td>
                        </td>
                      </tr>
                      <!-- Space -->
                      <tr>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Keluhan Utama</label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo $track_users->keluhan_utama;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "";  ?>
                        </td>
                        </td>
                      </tr>

                      <tr>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Anamnesis</label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo $track_users->anamnesis;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "";  ?>
                        </td>
                        </td>
                      </tr>



                      <tr>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Riwayat Penyakit Dahulu</label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo $track_users->riwayatpenyakit_terdahulu;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "";  ?>
                        </td>
                        </td>
                      </tr>

                      <tr>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Riwayat Alergi Obat</label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo $track_users->riwayat_alergi_obat;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "";  ?>
                        </td>
                        </td>
                      </tr>



                      <tr>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file">Riwayat Alergi Makanan</label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo $track_users->riwayat_alergi_makanan;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "";  ?>
                        </td>
                        </td>
                      </tr>



                      <tr>
                        <td style="width: 100px;height:100px; padding-top: 7px;">
                          <label for="file">Tindakan Medis</label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo $track_users->tindakan_medis;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "";  ?>
                        </td>
                        </td>
                      </tr>



                      <tr>
                        <td style="width: 100px;height:100px; padding-top: 7px;">
                          <label for="file">Konsultasi Dokter Medis</label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo $track_users->konsultasi_dokter_spesialis;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "";  ?>
                        </td>
                        </td>
                      </tr>


                      <tr>
                        <td style="width: 100px;height:100px; padding-top: 7px;">
                          <label for="file">Tindakan Di IGD</label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo $track_users->tindakan_di_igd;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "";  ?>
                        </td>
                        </td>
                      </tr>


                      <tr>
                        <td style="width: 100px;height:100px; padding-top: 7px;">
                          <label for="file">Keterangan</label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo $track_users->keterangan;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "";  ?>
                        </td>
                        </td>
                      </tr>





                      <tr>
                        <td style="width: 100px; height: 100px; padding-top: 7px;">
                          <label for="file">Hasil Penunjang</label>
                        </td>
                        <td style="width: 200px; padding-bottom: 5px; vertical-align: top;">
                          <?php
                          // Assuming $track_users->hasil_penunjang contains the string with penunjang items
                          $penunjangString = $track_users->hasil_penunjang;

                          // Split the string by the numbers followed by a dot and space
                          $penunjangItems = preg_split('/(?=\d+\.\s)/', $penunjangString, -1, PREG_SPLIT_NO_EMPTY);

                          foreach ($penunjangItems as $item) {
                            echo trim($item) . "<br/>";
                          }
                          ?>
                        </td>
                        <td style="width: 100px; padding-top: 7px;">
                          <label for="file"></label>
                        </td>
                        <td style="width: 200px; padding-bottom: 5px;">
                          <?php echo ""; ?>
                        </td>
                      </tr>





                      <tr>
                        <td style="width: 100px;height:100px; padding-top: 7px;">
                          <label for="file">Jam pindah / KRS / MRS</label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo $track_users->jam_pindah;  ?>
                        </td>
                        </td>
                        <td style="width: 100px;padding-top: 7px;">
                          <label for="file"></label>
                        <td style="width: 200px;" style="padding-bottom:5px">
                          <?php echo "";  ?>
                        </td>
                        </td>
                      </tr>



                      </tr>

                      <!-- Sisipkan baris dan kolom tabel untuk setiap elemen form yang Anda miliki -->
                    </table>
                  <?php }  ?>
                  <!-- Sisipkan tombol submit dan reset di luar tabel -->
                  <div class="form-group row justify-content-end ml-5">
                    <div class="col-sm-10">
                      <button type="button" class="btn btn-success" id="downloadButton">Download</button>
                      <button type="button" class="btn btn-primary" id="printButton">Print Preview</button>

                      <button type="reset" class="btn btn-danger">Back</button>
                    </div>
                  </div>
                </form>

                <!-- <div class="btn btn-danger mb-3 mt-3"><?= date('l, d M Y', strtotime($track_userss->tanggal_jam_pasien_masuk)) ?> -->
              </div>
              <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#confirmationModal">
                Konfirmasi
              </button> -->
          </div>



        </div>



        </form>

      </div>

    </div>
    <!-- /.container-fluid -->

    <!-- End of Main Content -->

    <div class="modal fade" id="confirmationModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Konfirmasi Tiket</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="<?= site_url('user/Dashboard/konfirmasi/' . $track_users->id) ?>">
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


  var id = <?php echo $track_users->id; ?> // atau var id = someVariable;

  // Tangkap acara klik pada tombol download
  $('#downloadButton').on('click', function() {
    // Redirect user ke fungsi download
    window.location.href = '<?= site_url('user/Dashboard/download_pdf') ?>' + '/' + id;

  });

  var id = <?php echo $track_users->id; ?> // atau var id = someVariable;

  // Tangkap acara klik pada tombol print
  $('#printButton').on('click', function() {
    // Buka modal ketika tombol diklik
    window.open('<?= site_url('user/Dashboard/print_preview') ?>' + '/' + id, '_blank');


  });

  // Menginisialisasi Select2 saat modal ditampilkan
  $('#confirmationModal').on('shown.bs.modal', function() {
    $('#myDropdown2').select2({
      placeholder: 'Masukkan Nama Pelapor...',
      allowClear: true,
      ajax: {
        url: 'http://192.168.30.194/helpdesk-api-dashboard/data-dropdown.php',
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            q: params.term
          };
        },
        processResults: function(data) {
          return {
            results: data.map(function(item) {
              return {
                id: item.name,
                text: item.name
              };
            })
          };
        },
        cache: true
      }
    });
  });
</script>