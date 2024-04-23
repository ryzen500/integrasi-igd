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
                <h1 class="h3 mb-2 text-gray-800"><b>Halaman Penanganan Tiket</b></h1>

                <a href="<?php echo site_url('teknisi/ambiltiket'); ?>" class="btn btn-primary"  >Alihkan Ajuan</a>
                <!-- tracking -->
    <section class="flex bg-gray-100 pt-5">
  <div class="w-full">
    <ul>
      <li class="relative flex items-baseline gap-6 pb-5">
        <div class="before:absolute before:left-[5.5px] before:h-full before:w-[1px] before:bg-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" class="bi bi-circle-fill fill-gray-400" viewBox="0 0 16 16">
            <circle cx="8" cy="8" r="8" />
          </svg>
        </div>
        <div class="bg-white rounded p-2 box-border w-full border border-stone-800" >
            <div class="flex justify-between">
                <p><span class="text-blue-500 font-4 font-bold">Anisa Rahmah </span> mengajukan tiket</p>
                <div class="flex gap-2 items-center">
                    <p>18 Des 2022</p>
                    <i class="fa-regular fa-clock"></i>
                    <p>08:55:21</p>
                </div>
            </div>
            <div class="w-full bg-stone-500 my-2" style="height: 0.5px;"></div>
          <p class="mt-2 text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores incidunt blanditiis dignissimos, enim earum mollitia.</p>
        </div>
      </li>
      <li class="relative flex items-baseline gap-6 pb-5">
        <div class="before:absolute before:left-[5.5px] before:h-full before:w-[1px] before:bg-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" class="bi bi-circle-fill fill-gray-400" viewBox="0 0 16 16">
            <circle cx="8" cy="8" r="8" />
          </svg>
        </div>
        <div class="bg-white rounded p-2 box-border w-full border border-stone-800" >
            <div class="flex justify-between">
                <p><span class="text-blue-500 font-4 font-bold">Aufa Ardilla </span> merespon tiket</p>
                <div class="flex gap-2 items-center">
                    <p>18 Des 2022</p>
                    <i class="fa-regular fa-clock"></i>
                    <p>08:55:21</p>
                </div>
            </div>
            <div class="w-full bg-stone-500 my-2" style="height: 0.5px;"></div>
          <p class="mt-2 text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores incidunt blanditiis dignissimos, enim earum mollitia.</p>
        </div>
      </li>
</section>

<h1 class="h3 mb-2 text-gray-800"><b>Respon</b></h1>
<div id="texteditor">
  <p><br><br><br><br><br><br><br><br></p>
</div>

<br><br>

<!-- Button Kirim Respon -->
<a href="<?php echo site_url('teknisi/ambiltiket'); ?>" class="btn btn-primary"  >Kirim Respon</a>

        </div>
        <!-- End of Content Wrapper -->
        