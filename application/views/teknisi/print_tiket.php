<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Tiket</title>
</head>
<body>
    
            <table class="table">
                        <tr>
                            <th>No</th>
                            <th>ID Tiket</th>
                            <th>ID User</th>
                            <th>Nama Tiket</th>
                            <th>Masalah</th>
                            <th>Solusi</th>
                            <th>Tanggal Ajuan</th>
                            <th>Status</th>
                        </tr>

                        <?php
                        $no = 1;
                        foreach ($tiket as $t) : ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $t->ID_TIKET ?></td>
                            <td><?php echo $t->ID_USER ?></td>
                            <td><?php echo $t->NAMA_TIKET ?></td>
                            <td><?php echo $t->MASALAH ?></td>
                            <td><?php echo $t->SOLUSI ?></td>
                            <td><?php echo $t->TANGGAL ?></td>
                            <td><?php echo $t->STATUS ?></td>
                        </tr>

                        <?php endforeach; ?>
            </table>

            <script type="text/javascript">
                window.print()
            </script>
    
</body>
</html>