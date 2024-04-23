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
                <label for="id" class="col-sm-2 col-form-label">Departemen<sup style="color: red;">*</sup></label>
                <div class="col-sm-10">
                  <div class="input-group ">

                    <select class="form-control" id="id_inventory" name="id_inventory">
                      <option>Pilih Departemen</option>
                      <?php
                      foreach ((array) $departemen as $nama) { ?>
                        <option value="<?= $nama->ID_DEPARTEMEN ?>"><?= $nama->NAMA_DEPARTEMEN ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <!--  -->
              <div class="form-group row ml-5 mr-5" hidden>
                <label for="id" class="col-sm-2 col-form-label">ID Tiket</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="id_tiket" name="id_tiket">
                </div>
              </div>


              <div class="form-group row ml-5 mr-5">
                <!-- Your existing form content here -->

                <label for="file" class="col-sm-2 col-form-label">Upload File</label>
                <div class="col-sm-5" id="file-upload-container">
                  <input type="file" class="form-control" name="files[]" id="file-upload-0">
                </div>
                <button type="button" class="btn btn-secondary" id="add-file-upload">
                  <i class="fas fa-plus"></i> <!-- Plus icon -->
                </button>
              </div>
              <!-- <div class="form-group row ml-5 mr-5">
                        <label for="tiket" class="col-sm-2 col-form-label">Tipe Masalah<sup style="color: red;">*</sup></label>
                        <div class="col-sm-10">
                          <select class="form-control" id="SUB_MASALAH" name="SUB_MASALAH">
                          <option disabled selected>Pilih Tipe Masalah</option>
                            <option value="Software">Software</option>
                            <option value="Hardware">Hardware</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row ml-5 mr-5">
                        <label for="id" class="col-sm-2 col-form-label">Nama Perangkat<sup style="color: red;">*</sup></label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">

                            <select class="form-control" id="id_inventory" name="id_inventory">
                              <option disabled selected>Pilih Perangkat</option>
                              <?php
                              foreach ((array) $inventory as $nama) { ?>
                                <option value="<?= $nama->ID_INVENTORY ?>"><?= $nama->NAMA_INVENTORY ?>
                                </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div> -->
              <div class="form-group row ml-5 mr-5">
                <label for="masalah" class="col-sm-2 col-form-label">Masalah<sup style="color: red;">*</sup></label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="masalah" name="masalah" value=""></textarea>
                  <?= form_error('masalah', '<small class="text-danger pl-3">', '</small>') ?>
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
</script>