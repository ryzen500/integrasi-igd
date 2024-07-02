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

          <!-- Page Heading -->
          <div class="bg-white py-lg-5">
            <form method="POST" action="<?= site_url('user/Dashboard/edit_tiket_action'); ?>" enctype="multipart/form-data">
              <!--  -->

              <?php
              foreach ($laporan_rekap as $key => $tes) {
                # code...


              ?>


                <script type="text/javascript">
                  var diagnosa_tambahan = '<?php echo $tes->diagnosa_tambahan; ?>';
                  var konsultasi_dokter_spesialis = "<?php echo $tes->konsultasi_dokter_spesialis; ?>";
                  var tindakan_di_igd = "<?php echo $tes->tindakan_di_igd; ?>";
                  var keterangan = "<?php echo $tes->keterangan; ?>";
                </script>
                <div class="form-group row ml-5 mr-5">
                  <!-- Your existing form content here -->
                  <label for="file" class="col-sm-2 col-form-label">Nomor Rekam Medik</label>
                  <div class="col-sm-10" id="file-upload-container">

                    <input type="text" class="form-control" id="no_rekam_medik" value="<?php echo $tes->no_rekam_medik; ?>" name="no_rekam_medik" readonly>

                  </div>
                </div>



                <div class="form-group row ml-5 mr-5">
                  <label for="id" class="col-sm-2 col-form-label">Tanggal MRS</label>
                  <div class="col-sm-10">
                    <input type="date" value="<?php echo  date("Y-m-d", strtotime($tes->tanggal_jam_pasien_masuk)); ?>" class="form-control" id="tanggal_mrs" name="tanggal_mrs" readonly>
                  </div>
                </div>



                <div class="form-group row ml-5 mr-5">
                  <!-- Your existing form content here -->
                  <label for="file" class="col-sm-2 col-form-label">Nama Pasien</label>
                  <div class="col-sm-10" id="file-upload-container">
                    <input type="text" class="form-control" id="nama_pasien" value="<?php echo $tes->nama_pasien; ?>" name="nama_pasien" readonly>
                    <input type="hidden" class="form-control" id="no_pendaftaran" value="<?php echo $tes->no_pendaftaran; ?>" name="no_pendaftaran" readonly>
                    <input type="hidden" class="form-control" id="" value="<?php echo $tes->id; ?>" name="id" readonly>

                  </div>

                </div>


                <div class="form-group row ml-5 mr-5">
                  <!-- Your existing form content here -->
                  <label for="file" class="col-sm-2 col-form-label">Dokter Jaga IGD</label>
                  <div class="col-sm-10" id="file-upload-container">
                    <input type="text" class="form-control" id="nama_pasien" value="<?php echo $tes->dokter_jaga_igd; ?>" name="nama_pasien" readonly>

                  </div>
                </div>


                <!--  -->
                <div class="form-group row ml-5 mr-5">
                  <label for="id" class="col-sm-2 col-form-label">Tanggal Lahir Pasien</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir_pasien" value="<?php echo $tes->tanggal_lahir_pasien; ?>" name="tanggal_lahir_pasien" readonly>
                  </div>
                </div>







                <div class="form-group row ml-5 mr-5">
                  <label for="masalah" class="col-sm-2 col-form-label">Diagnosa Primer</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="diagnosa_primer" value="<?php echo $tes->diagnosa_primer; ?>" name="diagnosa_primer">

                    <?= form_error('masalah', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>



                <div class="form-group row ml-5 mr-5">
                  <label for="diagnosa_tambahan" class="col-sm-2 col-form-label">Diagnosa Tambahan</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="diagnosa_tambahan" name="diagnosa_tambahan" value="<?php echo $tes->diagnosa_tambahan; ?>" />

                    <?= form_error('diagnosa_tambahan', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>



                <div class="form-group row ml-5 mr-5">
                  <label for="diagnosa_sekunder" class="col-sm-2 col-form-label">Diagnosa Sekunder</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="diagnosa_sekunder" value="<?php echo $tes->diagnosa_sekunder; ?>" name="diagnosa_sekunder">

                    <?= form_error('diagnosa_sekunder', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group row ml-5 mr-5">
                  <label for="tekanan_darah" class="col-sm-2 col-form-label" style="text-align: center;">Tekanan Darah</label>
                  <div class="col-sm-2">
                    <input class="form-control" id="tekanan_darah" name="tekanan_darah" value="<?php echo $tes->tekanan_darah; ?>" />

                    <?= form_error('tekanan_darah', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <label for="detak_nadi" class="col-sm-2 col-form-label" style="text-align: center;">Detak Nadi</label>
                  <div class="col-sm-2">
                    <input class="form-control" id="detak_nadi" name="detak_nadi" value="<?php echo $tes->detak_nadi; ?>" />

                    <?= form_error('detak_nadi', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <label for="pernafasan" class="col-sm-2 col-form-label" style="text-align: center;">Pernafasan</label>
                  <div class="col-sm-2">
                    <input class="form-control" id="pernafasan" name="pernafasan" value="<?php echo $tes->pernafasan; ?>" />

                    <?= form_error('pernafasan', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>



                <!-- <div class="form-group row ml-5 mr-5">
               
              </div>
 -->


                <!-- 
              <div class="form-group row ml-5 mr-5">
            

              </div> -->

                <div class="form-group row ml-5 mr-5">
                  <label for="suhu_tubuh" class="col-sm-2 col-form-label" style="text-align: center;">Suhu Tubuh</label>
                  <div class="col-sm-2">
                    <input class="form-control" id="suhu_tubuh" name="suhu_tubuh" value="<?php echo $tes->suhu_tubuh ?>" />

                    <?= form_error('suhu_tubuh', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>


                  <label for="tinggi_badan" class="col-sm-2 col-form-label" style="text-align: center;">Tinggi badan</label>
                  <div class="col-sm-2">
                    <input class="form-control" id="tinggi_badan" name="tinggi_badan" value="<?php echo $tes->tinggi_badan ?>" />

                    <?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <label for="berat_badan" class="col-sm-2 col-form-label" style="text-align: center;">Berat badan</label>
                  <div class="col-sm-2">
                    <input class="form-control" id="berat_badan" name="berat_badan" value="<?php echo $tes->berat_badan ?>" />

                    <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>



                <div class="form-group row ml-5 mr-5">

                  <label for="GCS" class="col-sm-2 col-form-label" style="text-align: center;">GCS</label>

                  <div class="col-sm-1">
                    <input class="form-control" id="gcs" name="GCS" value="<?php echo $tes->GCS; ?>" />

                    <?= form_error('GCS', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>



                  <label for="spo2" class="col-sm-2 col-form-label" style="text-align: center;">SPO2 (1)</label>

                  <div class="col-sm-2">
                    <input class="form-control" type="number" id="spo2" name="spo2" value="<?php  echo $tes->spo;?>" placeholder="SPO2 (1)" />

                    <?= form_error('spo2', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <!--  -->
                </div>


                <div class="form-group row ml-5 mr-5">

                  <label for="LK" class="col-sm-2 col-form-label" style="text-align: center;">LK</label>

                  <div class="col-sm-2">
                    <input class="form-control" type="number" value="<?php echo $tes->LK; ?>" id="lk" name="LK" value="" placeholder="CM" />

                    <?= form_error('LK', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <label for="LL" class="col-sm-2 col-form-label" style="text-align: center;">LL</label>

                  <div class="col-sm-2">
                    <input class="form-control" type="number" id="ll" value="<?php echo $tes->LL; ?>" name="LL" value="" placeholder="CM" />

                    <?= form_error('LL', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <label for="LD" class="col-sm-2 col-form-label" style="text-align: center;">LD</label>

                  <div class="col-sm-2">
                    <input class="form-control" type="number" id="ld" value="<?php echo $tes->LD; ?>" name="LD" value="" placeholder="CM" />

                    <?= form_error('LD', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <!--  -->
                </div>
                <div class="form-group row ml-5 mr-5">
                  <label for="id" class="col-sm-2 col-form-label"> Keluhan Utama <sup style="color: red;">*</sup></label>

                  <div class="col-sm-10">
                    <input class="form-control" id="keluhan_utama" name="keluhan_utama" value="<?php echo $tes->keluhan_utama; ?>" />

                    <?= form_error('keluhan_utama', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>


                <div class="form-group row ml-5 mr-5">
                  <label for="id" class="col-sm-2 col-form-label"> Anamnesis / Riwayat Penyakit Sekarang <sup style="color: red;">*</sup></label>

                  <div class="col-sm-10">
                    <input class="form-control" id="anamnesis" name="anamnesis" value="<?php echo $tes->anamnesis; ?>" />

                    <?= form_error('anamnesis', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>


                <div class="form-group row ml-5 mr-5">
                  <label for="id" class="col-sm-2 col-form-label"> Riwayat Penyakit Dahulu <sup style="color: red;">*</sup></label>

                  <div class="col-sm-10">
                    <input class="form-control" id="riwayat_penyakit_dahulu" name="riwayat_penyakit_dahulu" value="<?php echo $tes->riwayat_penyakit_dahulu; ?>" />

                    <?= form_error('riwayat_penyakit_dahulu', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>


                <div class="form-group row ml-5 mr-5">
                  <label for="id" class="col-sm-2 col-form-label"> Riwayat Alergi Obat <sup style="color: red;">*</sup></label>

                  <div class="col-sm-10">
                    <input class="form-control" id="riwayat_alergi_obat" name="riwayat_alergi_obat" value="<?php echo $tes->riwayat_alergi_obat; ?>" />


                    <?= form_error('riwayat_alergi_obat', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>


                <div class="form-group row ml-5 mr-5">

                  <label for="id" class="col-sm-2 col-form-label"> Riwayat Alergi Makanan <sup style="color: red;">*</sup></label>

                  <div class="col-sm-10">
                    <input class="form-control" id="riwayat_alergi_makanan" name="riwayat_alergi_makanan" value="<?php echo $tes->riwayat_alergi_makanan; ?>" />

                    <?= form_error('riwayat_alergi_makanan', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>

                <div class="form-group row ml-5 mr-5">
                  <label for="tindakan_medis" class="col-sm-2 col-form-label">Tindakan Medis<sup style="color: red;">*</sup></label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="tindakan_medis" name="tindakan_medis" ><?php echo htmlspecialchars($tes->tindakan_medis, ENT_QUOTES, 'UTF-8'); ?></textarea>
                    <?= form_error('tindakan_medis', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>



                <div class="form-group row ml-5 mr-5">
                  <label for="konsultasi_dokter_spesialis" class="col-sm-2 col-form-label">Konsultasi Dokter Spesialis<sup style="color: red;">*</sup></label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="konsultasi_dokter_spesialis" name="konsultasi_dokter_spesialis" value=""><?php echo htmlspecialchars($tes->konsultasi_dokter_spesialis, ENT_QUOTES, 'UTF-8'); ?></textarea>
                    <?= form_error('konsultasi_dokter_spesialis', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>



                <div class="form-group row ml-5 mr-5">
                  <label for="tindakan_di_igd" class="col-sm-2 col-form-label">Tindakan Di IGD<sup style="color: red;">*</sup></label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="tindakan_di_igd" name="tindakan_di_igd" value=""><?php echo htmlspecialchars($tes->tindakan_di_igd, ENT_QUOTES, 'UTF-8'); ?></textarea>
                    <?= form_error('tindakan_di_igd', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>


                <div class="form-group row ml-5 mr-5">
                <label for="tindakan_di_igd" class="col-sm-2 col-form-label">Hasil Penunjang<sup style="color: red;">*</sup></label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="hasil_penunjang" name="hasil_penunjang" value=""><?php echo $tes->hasil_penunjang; ?></textarea>
                  <small class="text-danger pl-3" id="form-error"></small>
                </div>
              </div>



                <div class="form-group row ml-5 mr-5">
                  <label for="keterangan" class="col-sm-2 col-form-label">Keterangan<sup style="color: red;">*</sup></label>
                  <div class="col-sm-10">
                    <input class="form-control" id="keterangan" name="keterangan" value="<?php echo $tes->keterangan; ?>" />
                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>


                <div class="form-group row ml-5 mr-5">
                  <label for="jam_pindah" class="col-sm-2 col-form-label">Jam Pindah <sup style="color: red;">*</sup></label>
                  <div class="col-sm-10">
                    <input class="form-control" id="jam_pindah" name="jam_pindah" value="<?php echo $tes->jam_pindah; ?>" />
                    <?= form_error('jam_pindah', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>
                <input hidden type="text" name="id_user" id="id_user" value="<?= $tes->id_user ?>"></input>


              <?php
              }
              ?>
              <div class="form-group row justify-content-end ml-5">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Ajukan</button>
                  <button type="reset" class="btn btn-danger">Batal</button>
                </div>
              </div>
            </form>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script>
    // JavaScript to add a new file upload field when the "plus" icon is clicked
    $(document).ready(function() {
      let fileUploadIndex = 1; // Track the file upload count

      // var url = 'http://192.168.30.194/helpdesk-api-dashboard/data-dropdown.php';

      var url = 'http://localhost/helpdesk-api-dashboard/panggilDataPendaftaran.php';

      var divisi_pelapor = 'http://localhost/helpdesk-api-dashboard/data-dropdowndokter.php';



      // Dropdown




      $('#divisi_pelapor').select2({
        placeholder: 'Masukkan  Dokter Jaga IGD ',
        allowClear: true,
        ajax: {
          url: divisi_pelapor, // Endpoint API
          dataType: 'json',
          delay: 250, // Penundaan untuk mengurangi beban server
          data: function(params) {
            console.log(params.term)
            return {
              q: params.term // Mengambil parameter pencarian dari input
            };
          },
          processResults: function(data) {
            return {
              results: data.map(function(item) {
                console.log(item.ID_DEPARTEMEN);
                return {
                  id: `${item.gelardepan} ${item.nama_pegawai} ${item.gelarbelakang_nama} `,
                  text: `${item.gelardepan} ${item.nama_pegawai} ${item.gelarbelakang_nama} ` // Sesuaikan dengan format data dari endpoint
                };
              })
            };
          }
        }
      });




      $('#add-file-upload').click(function() {
        // Create a new file input
        let newFileInput = `
      <div class="input-group mt-3" id="file-upload-${fileUploadIndex}">
        <input type="file" class="form-control" name="files[]">
        <button type="button" class="btn btn-danger remove-file-upload  ml-2" data-id="file-upload-${fileUploadIndex}">
          <i class="fas fa-minus"></i> <!-- Minus icon -->
        </button>
      </div>
    `;

        $('#file-upload-container').append(newFileInput); // Add the new input
        fileUploadIndex++; // Increment the index
      });



      // Remove file upload when the "minus" icon is clicked
      $(document).on('click', '.remove-file-upload', function() {
        const id = $(this).data('id');
        $(`#${id}`).remove(); // Remove the corresponding file input
      });



    });

    // if (CKEDITOR.instances.diagnosa_tambahan) {
    //   // Hancurkan instance CKEditor jika sudah ada
    //   CKEDITOR.instances.diagnosa_tambahan.destroy();
    // }

    // Setel nilai textarea sebelum menginisialisasi ulang CKEditor
    // $("#diagnosa_tambahan").val(diagnosa_tambahan);

    // Inisialisasi ulang CKEditor
    // CKEDITOR.replace('diagnosa_tambahan');

    // Tunggu sampai CKEditor siap, kemudian setel nilai ke editor
    // CKEDITOR.instances.diagnosa_tambahan.on('instanceReady', function() {
    //   CKEDITOR.instances.diagnosa_tambahan.setData(diagnosa_tambahan);
    // });



    if (CKEDITOR.instances.tindakan_medis) {
      // Hancurkan instance CKEditor jika sudah ada
      CKEDITOR.instances.tindakan_medis.destroy();
    }

    // Setel nilai textarea sebelum menginisialisasi ulang CKEditor

    // Inisialisasi ulang CKEditor
    CKEDITOR.replace('tindakan_medis');

    // Tunggu sampai CKEditor siap, kemudian setel nilai ke editor
    CKEDITOR.instances.tindakan_medis.on('instanceReady', function() {
      CKEDITOR.instances.tindakan_medis.setData(tindakan_medis);
    });



    // -------

    if (CKEDITOR.instances.konsultasi_dokter_spesialis) {
      // Hancurkan instance CKEditor jika sudah ada
      CKEDITOR.instances.konsultasi_dokter_spesialis.destroy();
    }


    console.log("Konsultasi Dokter Spesialis ", konsultasi_dokter_spesialis);

    // Inisialisasi ulang CKEditor
    CKEDITOR.replace('konsultasi_dokter_spesialis');

    // Tunggu sampai CKEditor siap, kemudian setel nilai ke editor
    CKEDITOR.instances.konsultasi_dokter_spesialis.on('instanceReady', function() {
      CKEDITOR.instances.konsultasi_dokter_spesialis.setData(konsultasi_dokter_spesialis);
    });



    // ------- TIndakan DI IGD

    if (CKEDITOR.instances.tindakan_di_igd) {
      // Hancurkan instance CKEditor jika sudah ada
      CKEDITOR.instances.tindakan_di_igd.destroy();
    }


    console.log("Konsultasi Dokter Spesialis ", tindakan_di_igd);

    // Inisialisasi ulang CKEditor
    CKEDITOR.replace('tindakan_di_igd');

    // Tunggu sampai CKEditor siap, kemudian setel nilai ke editor
    CKEDITOR.instances.tindakan_di_igd.on('instanceReady', function() {
      CKEDITOR.instances.tindakan_di_igd.setData(tindakan_di_igd);
    });
  </script>