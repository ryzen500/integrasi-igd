                        // Chart for Data Perbaikan



                        function generate24HourData() {
                            var data = [];
                            var today = new Date();

                            // Membuat array default dengan 24 jam untuk tanggal hari ini
                            for (var i = 0; i < 24; i++) {
                                var date = new Date(today.getFullYear(), today.getMonth(), today.getDate(), i, 0); // Setiap jam di hari ini
                                var label = String(date.getDate()).padStart(2, '0') + '/' + String(date.getMonth() + 1).padStart(2, '0') + ' ' +
                                    String(i).padStart(2, '0') + ':00';
                                data.push({ label: label, y: 0 }); // Mulai dengan 0
                            }

                            return data;
                        }

                        // Mengambil data yang dikirim dari kontroler
                        var requestPerMenit = <?php echo json_encode($requestPerMenit); ?>;

                        // Menggabungkan data yang datang dengan array default 24 jam
                        var dataPoints = generate24HourData();

                        // Fungsi untuk mengonversi objek Date ke format yang sesuai dengan label
                        function formatDateLabel(date) {
                            var day = String(date.getDate()).padStart(2, '0');
                            var month = String(date.getMonth() + 1).padStart(2, '0');
                            var hour = String(date.getHours()).padStart(2, '0');

                            return `${day}/${month} ${hour}:00`; // Format label yang cocok dengan dataPoints
                        }

                        // Memastikan format data dan indeks sesuai
                        requestPerMenit.forEach(function (item, index) {
                            var hour = item.jam;
                            var days = new Date(item.tanggal);

                            console.log(days);
                            var minute = item.menit;
                            var jams = item.jumlah_tiket;

                            // var minute = item.menit;


                        // Mengambil label dari days
                        var formattedLabel = formatDateLabel(days);

                        // Cari indeks dataPoints berdasarkan formattedLabel
                        var matchingIndex = dataPoints.findIndex(point => point.label === formattedLabel);

                            console.error(matchingIndex);

                            dataPoints[matchingIndex].y = parseInt(item.jumlah_tiket);
                        if (matchingIndex !== -1) {
                            // Jika indeks ditemukan, perbarui nilai y
                        } else {
                            console.error("Label tidak ditemukan di dataPoints");
                        }

                            // Periksa apakah minute adalah 0, untuk memastikan cocok dengan data default
                            // var label = dataPoints[hour].label;

                            // console.log("Item", item);
                            // dataPoints[hour].y = parseInt(item.jumlah_tiket);
                        });

                        console.log("data Point", dataPoints);
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

                        chart1.render();


