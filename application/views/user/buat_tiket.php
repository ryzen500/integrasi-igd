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
            <form method="POST" action="<?= site_url('user/Dashboard/buat_tiket_action'); ?>" enctype="multipart/form-data">
              <!--  -->


              <div class="form-group row ml-5 mr-5">
                <!-- Your existing form content here -->
                <label for="file" class="col-sm-2 col-form-label">No Pendaftaran</label>
                <div class="col-sm-10" id="file-upload-container">
                  <select id="myDropdown" class="form-control" name="no_pendaftaran">
                    <option value="">--Pilih opsi--</option>
                  </select>
                </div>
              </div>



              <div class="form-group row ml-5 mr-5">
                <label for="id" class="col-sm-2 col-form-label">Tanggal MRS</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="tanggal_mrs" name="tanggal_mrs" readonly>
                </div>
              </div>



              <div class="form-group row ml-5 mr-5">
                <label for="id" class="col-sm-2 col-form-label">Tanggal Masuk ke IGD</label>
                <div class="col-sm-10">
                  <input type="datetime" class="form-control" id="tanggal_triase" name="tanggal_triase" readonly>
                </div>
              </div>



              <div class="form-group row ml-5 mr-5">
                <!-- Your existing form content here -->
                <label for="file" class="col-sm-2 col-form-label">Nama Pasien</label>
                <div class="col-sm-10" id="file-upload-container">
                  <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" readonly>
                  
                </div>
                
              </div>
              



              <div class="form-group row ml-5 mr-5">
                <!-- Your existing form content here -->
                <label for="file" class="col-sm-2 col-form-label">Nomor Rekam Medik</label>
                <div class="col-sm-10" id="file-upload-container">
                <input type="text" class="form-control" id="no_rekam_medik" name="nomor_rekam_medik" readonly>
                </div>
                
              </div>
              
              
              <div class="form-group row ml-5 mr-5">
                <!-- Your existing form content here -->
                <label for="file" class="col-sm-2 col-form-label">Dokter Jaga IGD</label>
                <div class="col-sm-10" id="file-upload-container">
                  <input type="text" class="form-control" id="dokter_jaga_igd" name="dokter_jaga_igd" readonly>

                  <!-- <select id="divisi_pelapor" class="form-control" name="dokter_jaga_igd">
                    <option value="">--Pilih opsi--</option>
                  </select> -->
                </div>
              </div>


              <!--  -->
              <div class="form-group row ml-5 mr-5">
                <label for="id" class="col-sm-2 col-form-label">Tanggal Lahir Pasien</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="tanggal_lahir_pasien" name="tanggal_lahir_pasien" readonly>
                </div>
              </div>







              <div class="form-group row ml-5 mr-5">
                <label for="masalah" class="col-sm-2 col-form-label">Diagnosa Primer</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="diagnosa_primer" name="diagnosa_primer">

                  <?= form_error('masalah', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>




              <!-- <div class="form-group row ml-5 mr-5">
                <label for="diagnosa_tambahan" class="col-sm-2 col-form-label">Diagnosa Tambahan</label>
                <div class="col-sm-10">
                  <input class="form-control" id="diagnosa_tambahan" name="diagnosa_tambahan" value="" />

                  <?= form_error('diagnosa_tambahan', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div> -->



              <div class="form-group row ml-5 mr-5">
                <label for="diagnosa_sekunder" class="col-sm-2 col-form-label">Diagnosa Sekunder</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="diagnosa_sekunder" name="diagnosa_sekunder">

                  <?= form_error('diagnosa_sekunder', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>



              <div class="form-group row ml-5 mr-5">
                <label for="tekanan_darah" class="col-sm-2 col-form-label" style="text-align: center;">Tekanan Darah</label>
                <div class="col-sm-2">
                  <input class="form-control" id="tekanan_darah" name="tekanan_darah" value="" />

                  <?= form_error('tekanan_darah', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <label for="detak_nadi" class="col-sm-2 col-form-label" style="text-align: center;">Detak Nadi</label>
                <div class="col-sm-2">
                  <input class="form-control" id="detak_nadi" name="detak_nadi" value="" />

                  <?= form_error('detak_nadi', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <label for="pernafasan" class="col-sm-2 col-form-label" style="text-align: center;">Pernafasan</label>
                <div class="col-sm-2">
                  <input class="form-control" id="pernafasan" name="pernafasan" value="" />

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
                  <input class="form-control" id="suhu_tubuh" name="suhu_tubuh" value="" />

                  <?= form_error('suhu_tubuh', '<small class="text-danger pl-3">', '</small>') ?>
                </div>


                <label for="tinggi_badan" class="col-sm-2 col-form-label" style="text-align: center;">Tinggi badan</label>
                <div class="col-sm-2">
                  <input class="form-control" id="tinggi_badan" name="tinggi_badan" value="" />

                  <?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <label for="berat_badan" class="col-sm-2 col-form-label" style="text-align: center;">Berat badan</label>
                <div class="col-sm-2">
                  <input class="form-control" id="berat_badan" name="berat_badan" value="" />

                  <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>



              <!-- 
              <div class="form-group row ml-5 mr-5">


              </div> -->


              <!-- <div class="form-group row ml-5 mr-5">
          

              </div> -->


              <div class="form-group row ml-5 mr-5">

                <label for="GCS" class="col-sm-2 col-form-label" style="text-align: center;">GCS</label>

                <div class="col-sm-1">
                  <input class="form-control" id="gcs" name="GCS" value="" />

                  <?= form_error('GCS', '<small class="text-danger pl-3">', '</small>') ?>
                </div>


                <label for="spo2" class="col-sm-2 col-form-label" style="text-align: center;">SPO2 (1)</label>

                <div class="col-sm-2">
                  <input class="form-control" type="number" id="spo2" name="spo2" value="" placeholder="SPO2 (1)" />

                  <?= form_error('spo2', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <!--  -->
              </div>


              <div class="form-group row ml-5 mr-5">

                <label for="LK" class="col-sm-2 col-form-label" style="text-align: center;">LK</label>

                <div class="col-sm-2">
                  <input class="form-control" type="number" id="lk" name="LK" value="" placeholder="CM" />

                  <?= form_error('LK', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <label for="LL" class="col-sm-2 col-form-label" style="text-align: center;">LL</label>

                <div class="col-sm-2">
                  <input class="form-control" type="number" id="ll" name="LL" value="" placeholder="CM" />

                  <?= form_error('LL', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <label for="LD" class="col-sm-2 col-form-label" style="text-align: center;">LD</label>

                <div class="col-sm-2">
                  <input class="form-control" type="number" id="ld" name="LD" value="" placeholder="CM" />

                  <?= form_error('LD', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <!--  -->
              </div>
              <div class="form-group row ml-5 mr-5">
                <label for="id" class="col-sm-2 col-form-label"> Keluhan Utama <sup style="color: red;">*</sup></label>

                <div class="col-sm-10">
                  <input class="form-control" id="keluhan_utama" name="keluhan_utama" value="" />

                  <?= form_error('keluhan_utama', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>


              <div class="form-group row ml-5 mr-5">
                <label for="id" class="col-sm-2 col-form-label"> Anamnesis / Riwayat Penyakit Sekarang <sup style="color: red;">*</sup></label>

                <div class="col-sm-10">
                  <input class="form-control" id="anamnesis" name="anamnesis" value="" />

                  <?= form_error('anamnesis', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>


              <div class="form-group row ml-5 mr-5">
                <label for="id" class="col-sm-2 col-form-label"> Riwayat Penyakit Dahulu <sup style="color: red;">*</sup></label>

                <div class="col-sm-10">
                  <input class="form-control" id="riwayat_penyakit_dahulu" name="riwayat_penyakit_dahulu" value="" />

                  <?= form_error('riwayat_penyakit_dahulu', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>


              <div class="form-group row ml-5 mr-5">
                <label for="id" class="col-sm-2 col-form-label"> Riwayat Alergi Obat <sup style="color: red;">*</sup></label>

                <div class="col-sm-10">
                  <input class="form-control" id="riwayat_alergi_obat" name="riwayat_alergi_obat" value="" />

                  <?= form_error('riwayat_alergi_obat', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>


              <div class="form-group row ml-5 mr-5">
                <label for="id" class="col-sm-2 col-form-label"> Riwayat Alergi Makanan <sup style="color: red;">*</sup></label>

                <div class="col-sm-10">
                  <input class="form-control" id="riwayat_alergi_makanan" name="riwayat_alergi_makanan" value="" />

                  <?= form_error('riwayat_alergi_makanan', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>

              <div class="form-group row ml-5 mr-5">
                <label for="tindakan_medis" class="col-sm-2 col-form-label">Tindakan Medis<sup style="color: red;">*</sup></label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="tindakan_medis" name="tindakan_medis" value=""></textarea>
                  <?= form_error('tindakan_medis', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>



              <div class="form-group row ml-5 mr-5">
                <label for="konsultasi_dokter_spesialis" class="col-sm-2 col-form-label">Konsultasi Dokter Spesialis<sup style="color: red;">*</sup></label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="konsultasi_dokter_spesialis" name="konsultasi_dokter_spesialis" value=""></textarea>
                  <?= form_error('konsultasi_dokter_spesialis', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>



              <div class="form-group row ml-5 mr-5">
                <label for="tindakan_di_igd" class="col-sm-2 col-form-label">Tindakan Di IGD<sup style="color: red;">*</sup></label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="tindakan_di_igd" name="tindakan_di_igd" value=""></textarea>
                  <?= form_error('tindakan_di_igd', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>


              <div class="form-group row ml-5 mr-5">
                <label for="tindakan_di_igd" class="col-sm-2 col-form-label">Hasil Penunjang<sup style="color: red;">*</sup></label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="hasil_penunjang" name="hasil_penunjang"></textarea>
                  <small class="text-danger pl-3" id="form-error"></small>
                </div>
              </div>


              <div class="form-group row ml-5 mr-5">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan Pasien<sup style="color: red;">*</sup></label>
                <div class="col-sm-10">
                  <input class="form-control" id="keterangan" name="keterangan" value="" />
                  <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>


              <div class="form-group row ml-5 mr-5">
                <label for="jam_pindah" class="col-sm-2 col-form-label">Jam pindah / KRS / MRS <sup style="color: red;">*</sup></label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="jam_pindah" name="jam_pindah" value=""></textarea>
                  <?= form_error('jam_pindah', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <input hidden type="text" name="id_user" id="id_user" value="<?= $user['id_user'] ?>"></input>


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

      // var url = 'http://192.168.30.194/helpdesk-api-dashboard/panggilDataPendaftaran.php';

        var url = '<?php echo site_url('user/Dashboard/getData'); ?>';
      // var url = 'http://helpdesk.myftp.org:998/helpdesk-api-dashboard/panggilDataPendaftaran.php';

      var divisi_pelapor = 'http://helpdesk.myftp.org:998/helpdesk-api-dashboard/panggilDataPendaftaran.php';




      $('#myDropdown').select2({
        placeholder: 'Masukkan  No Pendaftaran...',
        allowClear: true,
        ajax: {
          url: url, // Endpoint API
          dataType: 'json',
          data: function(params) {
            return {
              q: params.term // Mengambil parameter pencarian dari input
            };
          },
          processResults: function(data) {

            // Menyiapkan informasi tambahan dari child_diagnosa jika ada


            return {
              results: data.map(function(item) {
                // Declare variables using destructuring assignment
                var {
                  additionalInfo = '',
                    additionaltekanan_darah = '',
                    additionaltinggibadan = '',
                    additionalberatbadan = '',
                    additionalgcs = '',
                    additional_lk = '',
                    additional_ll = '',
                    additional_ld = '',
                    additional_keluhan_utama = '',
                    riwayatpenyakitterdahulu = '',
                    riwayatalergiobat = '',
                    reaksialergiobat = '',
                    reaksialergimakanan = '',
                    keterangananamesa = '',
                    tindakanmedis = '',
                    konsultasidokter = '',
                    no_pendaftaran = '',
                    additionaldetak_nadi = '',
                    additionalpernafasan = '',
                    additionalsuhutubuh = '',
                    additionaldpjp_id = '',
                    additional_spo = '',
                    tanggal_triase = '',
                    additional_anamnesis = ''




                } = {};


                if (item.child_diagnosa && item.child_diagnosa.length > 0) {
                  // Jika ada child_diagnosa, gabungkan diagnosa_nama menjadi satu string
                  additionalInfo = item.child_diagnosa.map(function(diagnosa) {
                    return diagnosa.diagnosa_nama;
                  }).join(', ');


                }

                // Triase
                if (item.child_triase && item.child_triase.length > 0) {
                  additionaltekanan_darah = item.child_triase.map(function(triase) {
                    return `${triase.td_systolic} / ${triase.td_diastolic}`;
                  }).join(', ');

                  additionaldetak_nadi = item.child_triase.map(function(triase) {
                    return triase.detaknadi;
                  }).join(', ');

                  tanggal_triase = item.child_triase.map(function(triase){

                    return triase.tglasesmentriase;
                  }).join(', ');

                  console.log("Tanggal triase ",tanggal_triase);

                  additionalpernafasan = item.child_triase.map(function(triase) {
                    return triase.pernapasan;
                  }).join(', ');

                  additionaldpjp_id = item.child_triase.map(function(triase) {
                    return `${triase.gelardepan} ${triase.nama_pegawai} ${triase.gelarbelakang_nama}`;
                  }).join(', ');


                  additional_spo = item.child_triase.map(function(triase) {
                    return `${triase.spo}`;
                  }).join(', ');


                  additionalsuhutubuh = item.child_triase.map(function(triase) {
                    return triase.suhutubuh;
                  }).join(', ');

                  additionaltinggibadan = item.child_triase.map(function(triase) {
                    return triase.tinggibadan_cm;
                  }).join(', ');

                  additionalberatbadan = item.child_triase.map(function(triase) {
                    return triase.beratbadan_kg;
                  }).join(', ');

                  additionalgcs = item.child_triase.map(function(triase) {
                    return triase.gcs_nilai;
                  }).join(', ');


                  additional_lk = item.child_triase.map(function(triase) {
                    return triase.lingkar_kepala;
                  }).join(', ');



                  additional_ll = item.child_triase.map(function(triase) {
                    return triase.lingkar_lengan;
                  }).join(', ');



                  additional_ld = item.child_triase.map(function(triase) {
                    return triase.lingkar_dada;
                  }).join(', ');


                  // Menampilkan additionalTriase di konsol browser
                  // console.log("anamnesa :", keterangananamesa);
                }


                // Penunjang 

                var content = '';
                var columnSplit = false;

                let indexs = 0;
                item.chilDataPenunjang.forEach(function(items, index) {
                  indexs++;
                  if (items.separator) {
                    content += '\n';
                    columnSplit = true;
                  } else {
                    content += indexs + ". (" + items.kelompoktindakanbpjs_nama + ") " + items.daftartindakan_nama + "\n";
                  }
                });

                $('#hasil_penunjang').val(content.trim());

                // Anamnesa
                if (item.child_anamnesa && item.child_anamnesa.length > 0) {
                  additional_keluhan_utama = item.child_anamnesa.map(function(anamnesa) {
                    return anamnesa.keluhanutama;
                  }).join(', ');
                  riwayatpenyakitterdahulu = item.child_anamnesa.map(function(anamnesa) {
                    return anamnesa.riwayatpenyakitterdahulu;
                  }).join(', ');


                  keterangananamesa = item.child_anamnesa.map(function(anamnesa) {
                    console.log("Anamnesa ", anamnesa);

                    // Menghapus tag HTML
                    let cleanedText = anamnesa.keterangananamesa.replace(/<\/?[^>]+(>|$)/g, "");

                    // Menghilangkan karakter khusus (di sini, kita menghilangkan koma ganda)
                    cleanedText = cleanedText.replace(/[^\w\s]/g, "");

                    return cleanedText;
                  }).join(', ');

                  riwayatalergiobat = item.child_anamnesa.map(function(anamnesa) {
                    return anamnesa.riwayatalergiobat;
                  }).join(', ');

                  reaksialergimakanan = item.child_anamnesa.map(function(anamnesa) {
                    return anamnesa.reaksialergimakanan;
                  }).join(', ');


                  riwayatalergiobat = item.child_anamnesa.map(function(anamnesa) {
                    return anamnesa.riwayatalergiobat;
                  }).join(', ');



                  tindakanmedis = item.child_anamnesa.map(function(anamnesa) {
                    return anamnesa.tindakanmedis;
                  }).join(', ');


                  konsultasidokter = item.child_anamnesa.map(function(anamnesa) {
                    return anamnesa.konsultasidokter;
                  }).join(', ');


                  console.log(keterangananamesa);
                }


                $("#keluhan_utama").val(additional_keluhan_utama);
                $("#tanggal_triase").val(tanggal_triase);

                $("#no_pendaftaran").val(item.no_pendaftaran);
                $("#no_rekam_medik").val(item.no_rekam_medik);

                $("#nama_pasien").val(item.nama_pasien);
                $("#diagnosa_primer").val(item.diagnosa_nama);
                $("#tanggal_mrs").val(item.tgl_pendaftaran);
                $("#tanggal_lahir_pasien").val(item.tanggal_lahir);
                $("#dokter_jaga_igd").val(`${item.gelardepan} ${item.nama_pegawai} ${item.gelarbelakang_nama}`);

                $("#detak_nadi").val(additionaldetak_nadi);
                $("#pernafasan").val(additionalpernafasan);
                $("#suhu_tubuh").val(additionalsuhutubuh);
                $("#tinggi_badan").val(additionaltinggibadan);
                $("#berat_badan").val(additionalberatbadan);
                $("#anamnesis").val(keterangananamesa);
                $("#gcs").val(additionalgcs);
                $("#lk").val(additional_lk);
                $("#ll").val(additional_ll);
                $("#ld").val(additional_ld);
                $("#spo2").val(additional_spo);
                if (CKEDITOR.instances.tindakan_medis) {
                  CKEDITOR.instances.tindakan_medis.destroy(); // Hancurkan instance CKEditor
                  $("#tindakan_medis").val(tindakanmedis);
                  CKEDITOR.replace('tindakan_medis'); // 'editor1' is the ID of the text area

                }

                if (CKEDITOR.instances.konsultasi_dokter_spesialis) {
                  CKEDITOR.instances.konsultasi_dokter_spesialis.destroy(); // Hancurkan instance CKEditor
                  $("#konsultasi_dokter_spesialis").val(konsultasidokter);
                  CKEDITOR.replace('konsultasi_dokter_spesialis'); // 'editor1' is the ID of the text area

                }
                $("#riwayat_penyakit_dahulu").val(riwayatpenyakitterdahulu);
                $("#riwayat_alergi_obat").val(riwayatalergiobat);
                $("#riwayat_alergi_makanan").val(reaksialergimakanan);
                $("#tekanan_darah").val(additionaltekanan_darah);
                $("#diagnosa_sekunder").val(additionalInfo);
                return {
                  id: item.no_pendaftaran,
                  text: ` ${item.no_rekam_medik} -- ${item.no_pendaftaran} --  ${item.tgl_pendaftaran}` // Sesuaikan dengan format data dari endpoint
                };
              })
            };
          }
        }
      });





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
    CKEDITOR.replace('tindakan_medis'); // 'editor1' is the ID of the text area
    CKEDITOR.replace('konsultasi_dokter_spesialis'); // 'editor1' is the ID of the text area

    // CKEDITOR.replace('diagnosa_tambahan'); // 'editor1' is the ID of the text area
    // CKEDITOR.replace('keterangan'); // 'editor1' is the ID of the text area
    // CKEDITOR.replace('jam_pindah'); // 'editor1' is the ID of the text area
    CKEDITOR.replace('tindakan_di_igd'); // 'editor1' is the ID of the text area
  </script>