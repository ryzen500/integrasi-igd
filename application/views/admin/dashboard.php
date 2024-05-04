<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php $this->load->view('admin/template/navbar'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><b>Beranda</b></h1>
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
                                        Tiket Masuk</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_total ?></div>
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
                                        Belum Ditangani</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_diajukan ?>
                                    </div>
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
                                        Dalam Proses</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_dalamproses ?>
                                    </div>
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
                                        Sudah Ditangani</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_selesai ?>
                                    </div>
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

                <!-- Area Chart -->
                <div class="col-xl-6 col-lg-7">
                    <div class="card">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Tiket</h3>
                            <h6 class="m-1 font-weight-italic text-primary">Status : Tiket Masuk</h6>
                        </div>
                        <div class="card-body text-left">
                            <?php
                            foreach ($tiket_diajukan as $tiketpen) {
                                ?>
                                <h6 class="m-0 font-weight-bold text-dark"><?= $tiketpen->nama_user ?> &nbsp;|
                                    <?= $tiketpen->NAMA_DEPARTEMEN ?>
                                </h6>
                                <div class="text-xs font-weight-bold mb-1">
                                    Masalah : <?= $tiketpen->MASALAH ?>
                                </div>
                                <div class="text-xs font-weight-bold mb-1">
                                    Status : <?= $tiketpen->status ?>
                                </div>
                                <a href="<?php echo site_url('admin/Tiket/edit/' . $tiketpen->ID_TIKET) ?>"><button
                                        type="button" class="btn btn-primary">Edit</button></a>

                                <hr>
                                <?php
                            }
                            ?>
                            <a href="<?= site_url('admin/tiket/daftar_tiket') ?>"><button type="button"
                                    class="btn btn-primary">Semua Tiket</button></a>

                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-6 col-lg-5">
                    <div class="card">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Tiket</h3>
                            <h6 class="m-1 font-weight-italic text-primary">Status : Selesai</h6>
                        </div>

                        <div class="card-body text-left">

                            <?php
                            foreach ($tiket_selesai as $tiketpen) {
                                ?>
                                <h6 class="m-0 font-weight-bold text-dark"><?= $tiketpen->nama_user ?> &nbsp;|
                                    <?= $tiketpen->NAMA_DEPARTEMEN ?>
                                </h6>
                                <div class="text-xs font-weight-bold mb-1">
                                    Masalah : <?= $tiketpen->MASALAH ?></div>
                                <?= $tiketpen->ID_TIKET ?>

                                <hr>
                                <?php
                            }
                            ?>
                            <a href="<?= site_url('admin/tiket') ?>"><button type="button" class="btn btn-primary">Semua
                                    Tiket Selesai</button></a>


                        </div>
                    </div>
                </div>
            </div>

            <br>
            <!-- Area Chart -->
            <div class="row">
                <?php
                // echo $baru = count($chart);s
                $no = 0;
                $no1 = 0;
                $no2 = 0;
                $no3 = 0;
                $no4 = 0;
                $no5 = 0;
                $no6 = 0;
                foreach ($chart as $value) {
                    $tanggal = date('M', strtotime($value->TANGGAL));

                    // $ID_STATUS = $value->$ID_STATUS;
                    $id_status = $value->ID_STATUS;
                    if ($tanggal == 'Jul' && $id_status == 7) {
                        $no1++;
                    } elseif ($tanggal == 'Aug' && $id_status == 7) {
                        $no2++;
                    } elseif ($tanggal == 'Sep' && $id_status == 7) {
                        $no3++;
                    } elseif ($tanggal == 'Oct' && $id_status == 7) {
                        $no4++;
                    } elseif ($tanggal == 'Nov' && $id_status == 7) {
                        $no5++;
                    } elseif ($tanggal == 'Dec' && $id_status == 7) {
                        $no6++;
                    }
                }
                // echo ' hasil  =' . $no1 . $no2 . $no3 . $no4 . $no5 . $no6;
                ?>




                <!-- Bar Chart -->


                <div class="col-xl-9 col-lg-7">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="data-perbaikan-tab" data-toggle="tab" href="#data-perbaikan"
                                role="tab" aria-controls="data-perbaikan" aria-selected="true">Data Monitoring
                                Harian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="diagram-lain-tab" data-toggle="tab" href="#diagram-lain" role="tab"
                                aria-controls="diagram-lain" aria-selected="false">Diagram Monitoring Bulanan</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- Tab Data Perbaikan -->
                        <div class="tab-pane fade show active" id="data-perbaikan" role="tabpanel"
                            aria-labelledby="data-perbaikan-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Perbaikan Data Harian</h6>
                                </div>
                                <div class="card-body">
                                    <div id="Data_perbaikan" style="height: 370px; width: 100%;"></div>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Diagram Lain -->
                        <div class="tab-pane fade" id="diagram-lain" role="tabpanel" aria-labelledby="diagram-lain-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Diagram Monitoring Bulanan</h6>
                                </div>
                                <div class="card-body">
                                    <div id="Diagram_lain" style="height: 370px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Script to initialize charts -->
                <script>
                    window.onload = function () {

                        // Fungsi untuk membuat label berdasarkan objek Date
                        function formatDateLabel(date) {
                            var day = String(date.getDate()).padStart(2, '0');
                            var month = String(date.getMonth() + 1).padStart(2, '0');
                            var hour = String(date.getHours()).padStart(2, '0');
                            var minute = "00"; // Menetapkan menit sebagai "00" untuk setiap jam
                            return `${day}/${month} ${hour}:${minute}`;
                        }

                        // Fungsi untuk menghasilkan data 24 jam dalam sehari
                        function generate24HourData() {
                            var data = [];
                            var today = new Date();

                            for (var i = 0; i < 24; i++) {
                                // Buat objek Date untuk setiap jam dalam hari ini
                                var date = new Date(today.getFullYear(), today.getMonth(), today.getDate(), i, 0, 0);
                                // Buat label menggunakan formatDateLabel
                                var label = formatDateLabel(date);
                                // Tambahkan data dengan label dan y = 0
                                data.push({ label: label, y: 0 });
                            }

                            return data;
                        }
                        // Inisialisasi dataPoints dengan data default 24 jam
                        var dataPoints = generate24HourData();

                        // Mengambil data dari controller
                        var requestPerMenit = <?php echo json_encode($requestPerMenit); ?>;

                        // Tambahkan data dari requestPerMenit
                        requestPerMenit.forEach(function (item) {
                            var days = new Date(item.tanggal);
                            var formattedLabel = formatDateLabel(days);

                            // Temukan indeks berdasarkan label
                            var existingIndex = dataPoints.findIndex(point => point.label === formattedLabel);

                            console.log(existingIndex);
                            if (existingIndex !== -1) {
                                // Jika label sudah ada, tambahkan jumlah tiket
                                dataPoints[existingIndex].y += parseInt(item.jumlah_tiket);
                            } else {
                                // Jika label belum ada, tambahkan data baru
                                dataPoints.push({ label: formattedLabel, y: parseInt(item.jumlah_tiket) });
                            }
                        });

                        // Mengurutkan dataPoints berdasarkan waktu untuk memastikan urutan yang benar
                        // dataPoints.sort((a, b) => new Date(a.label) - new Date(b.label));
                        dataPoints.sort((a, b) => {
                            var dateA = new Date(a.label.replace('/', ' ').replace(':', ' '));
                            var dateB = new Date(b.label.replace('/', ' ').replace(':', ' '));
                            return dateA - dateB; // Urutkan berdasarkan waktu
                        });

                        // Membuat chart dengan dataPoints yang sudah diurutkan
                        var chart = new CanvasJS.Chart("Data_perbaikan", {
                            theme: "light2",
                            animationEnabled: true,
                            title: {
                                text: "Data Monitoring Harian"
                            },
                            data: [{
                                type: "area",
                                dataPoints: dataPoints
                            }]
                        });

                        chart.render();


                        // Function to add a new data point every minute
                        // function addNewData() {
                        //     var currentTime = new Date();
                        //     var formattedTime = formatTime(currentTime);

                        //     var randomY = Math.floor(Math.random() * 50) + 20;

                        //     dataPoints.push({ label: formattedTime, y: randomY });

                        //     // Limit the number of data points to avoid overcrowding
                        //     if (dataPoints.length > 10) {
                        //         dataPoints.shift(); // Remove the oldest data point
                        //     }

                        //     // Re-render the chart with updated data
                        //     chart1.render();
                        // }

                        // // Set interval to update chart every minute
                        // setInterval(addNewData, 60000); // 60000 milliseconds = 1 minute
                        // Chart for Diagram Lain
                        
                        var chart2 = new CanvasJS.Chart("Diagram_lain", {
                            theme: "light1",
                            animationEnabled: true,
                            title: {
                                text: "Diagram Monitoring Bulanan"
                            },
                            data: [{
                                type: "pie",
                                dataPoints: [
                                    <?php foreach ($data_perbaikan as $key => $value) { ?> {
                                            label: "<?= $value->nama_bulan ?>",
                                            y: <?= $value->total ?>
                                        },
                                    <?php } ?>
                                ]
                            }]
                        });
                        chart2.render();
                    }



                    function fetchAndUpdateData(date) {
                        // URL endpoint API
                        const apiUrl = `http://localhost/helpdesk-api-dashboard/dashboard-api.php?date=${date}`;

                        fetch(apiUrl)  // Mengambil data dari API
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');  // Tangani kesalahan HTTP
                                }
                                return response.json();  // Konversi respons menjadi JSON
                            })
                            .then(data => {
                                console.log("Data received:", data);  // Memeriksa data yang diterima

                                // Update grafik atau komponen lain
                                updateChart(data);  // Fungsi untuk memperbarui chart atau data lainnya
                            })
                            .catch(error => {
                                console.error('There was a problem with the fetch operation:', error);  // Tangani kesalahan jika terjadi
                            });
                    }

                    // Contoh fungsi untuk memperbarui grafik
                    function updateChart(data) {
                        var dataPoints = [];

                        // Konversi data dari API menjadi dataPoints untuk chart
                        data.forEach(item => {
                            var tanggal = new Date(item.TANGGAL);  // Konversi string tanggal menjadi Date
                            var label = formatDateLabel(tanggal);  // Buat label untuk chart

                            dataPoints.push({ label: label, y: parseInt(item.jumlah_tiket) });  // Tambahkan data ke chart
                        });

                        // Update chart dengan data baru
                        var chart1 = new CanvasJS.Chart("Data_perbaikan", {
                            theme: "light2",
                            animationEnabled: true,
                            title: {
                                text: "Data Monitoring Harian"
                            },
                            data: [{
                                type: "area",
                                dataPoints: dataPoints
                            }]
                        });

                        chart1.render();  // Render chart dengan data yang baru
                    }



                    // Memanggil fetchAndUpdateData saat halaman selesai dimuat
                    document.addEventListener("DOMContentLoaded", function () {
                        const today = new Date();
                        const formattedDate = today.toISOString().split('T')[0];  // Format tanggal seperti '2024-04-22'

                        fetchAndUpdateData(formattedDate);  // Panggil fungsi untuk mengambil data dan memperbarui grafik
                    });

                    // Atau, memanggil setiap 10 menit untuk memperbarui grafik secara otomatis
                    setInterval(function () {
                        const today = new Date();
                        const formattedDate = today.toISOString().split('T')[0];

                        fetchAndUpdateData(formattedDate);  // Panggil fungsi secara berkala untuk memperbarui grafik
                    }, 60000);  // 600000 ms = 10 menit
                </script>


                <!--                         
                        <div class="col-xl-9 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Data Perbaikan Data Bulanan
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar" class="col-xl-9 col-lg-7">
                                        <div id="Data_perbaikan" style="height: 370px; width: 100%;"></div>
                                    </div>
                                    <hr>
                                    <script type="text/javascript">
                                        window.onload = function() {

                                            var no1 = parseInt("<?php echo $no1 ?>");
                                            var no2 = parseInt("<?php echo $no2 ?>");
                                            var no3 = parseInt("<?php echo $no3 ?>");
                                            var no4 = parseInt("<?php echo $no4 ?>");
                                            var no5 = parseInt("<?php echo $no5 ?>");
                                            var no6 = parseInt("<?php echo $no6 ?>");
                                            // var xc = 100 + no1;
                                            // alert(xc);

                                            var chart = new CanvasJS.Chart("Data_perbaikan", {
                                                theme: "light1", // "light2", "dark1", "dark2"
                                                animationEnabled: false, // change to true		
                                                title: {
                                                    text: "Data Perbaikan Tahun 2024"
                                                },
                                                data: [{
                                                    // Change type to "bar", "area", "spline", "pie",etc.
                                                    type: "column",
                                                    dataPoints: [
                                                        <?php foreach ($data_perbaikan as $key => $value) { ?> {
                                                                label: "<?= $value->nama_bulan ?>",
                                                                y: <?= $value->total ?>
                                                            },
                                                        <?php } ?>
                                                    ]
                                                }]
                                            });
                                            chart.render();

                                        }
                                    </script>

                                </div>
                            </div>
                        </div> -->



                <div class="col-xl-3 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Jumlah dan Persentase Penyebab Terjadinya issue / kendala
                            </h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4">
                                <canvas id="trouble"></canvas>
                                <!-- <button class="btn invisible" id="backButton">Back</button> -->
                            </div>
                            <hr>
                            <script>
                                const trouble = document.getElementById('trouble');

                                new Chart(trouble, {
                                    type: 'pie',
                                    data: {
                                        labels: [
                                            <?php foreach ($chart_tiket as $key => $value) { ?> '<?= $value->SUB_MASALAH ?>',
                                            <?php } ?>
                                        ],
                                        datasets: [{
                                            label: [

                                            ],
                                            data: [
                                                <?php foreach ($chart_tiket as $key => $value) { ?>                                                     <?= $value->Total ?>,
                                                <?php } ?>
                                            ],
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)'
                                            ],
                                            borderWidth: 1,
                                            hoverOffset: 4
                                        }],
                                    },
                                    // options: {
                                    //     scales: {
                                    //         y: {
                                    //             beginAtZero: true
                                    //         }
                                    //     }
                                    // }
                                });
                            </script>
                        </div>
                    </div>
                </div>


                <!-- Donut Chart -->
                <div class="col-xl-3 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Top Teknisi
                            </h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4">
                                <canvas id="teknisi"></canvas>
                                <!-- <button class="btn invisible" id="backButton">Back</button> -->
                            </div>
                            <hr>
                            <script>
                                const ttn = document.getElementById('teknisi');

                                new Chart(ttn, {
                                    type: 'pie',
                                    data: {
                                        labels: [
                                            <?php foreach ($chart_teknisi as $key => $value) { ?> '<?= $value->nama_teknisi ?>',
                                            <?php } ?>
                                        ],
                                        datasets: [{
                                            label: 'My First Dataset',
                                            data: [
                                                <?php foreach ($chart_teknisi as $key => $value) { ?>                                                     <?= $value->total ?>,
                                                <?php } ?>
                                            ],
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)'
                                            ],
                                            borderWidth: 1,
                                            hoverOffset: 4
                                        }],
                                    },
                                    // options: {
                                    //     scales: {
                                    //         y: {
                                    //             beginAtZero: true
                                    //         }
                                    //     }
                                    // }
                                });
                            </script>
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

<!-- End of Page Wrapper -->