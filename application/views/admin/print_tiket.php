<?php $this->load->view('admin/template/header'); ?>

<div class="container-fluid">
    <!-- <div class="row align-items-center" style="padding-top: 20px;">
        <div class="col-2">
            <img src="<?php echo base_url('assets/back/img/logo-back-preview.png'); ?>" alt="Left Logo" style="max-width: 100px;
  width: 100px;" />
        </div>
        <div class="col-8 text-center">

            <p style="text-align:center">
                <span style=""> YAYASAN PELAYANAN KESEHATAN BALA KESELAMATAN (YPKBK)</span>
                <br>
                <span style="font-size:24px">
                    <strong>RUMAH SAKIT "WILLIAM BOOTH"</strong>
                </span><br>
                <span style="">
                    Jl. Diponegoro No. 34 Surabaya 60241, Telp. 031-5678917, Fax: 031-5624868 
                </span>
                <br>
                <span>
                    NPWP : 31.650.899.3-423.000
                </span>
            </p>


            <h1 style="font-size: 24px; margin: 0;"><b><?php echo $ket; ?></b></h1>
        </div>
        <div class="col-2 text-right">
            <img src="<?php echo base_url('assets/back/img/logo-right.png'); ?>" alt="Right Logo" style="max-width: 100px;
  width: 100px;" />
        </div>
    </div> -->

    <div class="header">
        <table width="100%" class="headers table-header">

            <!--<TD width="15%" height="50%">-->
            <TR>
                <TD WIDTH="20%" ALIGN="CENTER" VALIGN="MIDDLE">
                    <div align="center">
                        <img src="<?php echo base_url('assets/back/img/logo-back-preview.png'); ?>" class='image_report'
                            style="float:left; max-width: 100px; width:100px;" class='image_report'>
                    </div>
                </TD>
                <TD WIDTH="64%" align="center" style="text-align:center;">
                    <div align="center" class="nama_profil" style="color: black !important; ">
                        <p style="text-align:center"><span style="font-size:11px">YAYASAN PELAYANAN KESEHATAN BALA
                                KESELAMATAN (YPKBK)</span></p>

                        <p style="text-align:center"><span style="font-size:24px"><strong>RUMAH SAKIT &quot;WILLIAM
                                    BOOTH&quot;</strong></span><br />
                            <span style="font-size:10px">Jl. Diponegoro No. 34 Surabaya 60241, Telp. 031-5678917, Fax:
                                031-5624868&nbsp;<br />
                                NPWP : 31.650.899.3-423.000</span>
                        </p>
                    </div>
                </TD>
                <TD WIDTH="20%" ALIGN="CENTER" VALIGN="MIDDLE">
                    <div align="center">
                        <img src="<?php echo base_url('assets/back/img/logo-right.png'); ?>" class='image_report'
                            style="float:left; max-width: 100px; width:100px;" class='image_report'>
                    </div>
                </TD>
            </TR>
            <tr>
                <td colspan="3" style="border-top: 1px solid black;"></td>
            </tr>
            <TR>
                <TD ALIGN=CENTER VALIGN=MIDDLE class="judul-laporan-td" colspan="3">
                    <div align="center">
                        <h3 style="color:black" class="judul-laporan"> <b><?= $ket ?></b></h3>
                    </div>
                </TD>
            </TR>
            <TR>
                <TD ALIGN=CENTER VALIGN=MIDDLE class="" colspan="3">
                    <div align="center">
                        <font color="black"></font>
                    </div>
                </TD>
            </TR>

        </table>

    </div>
</div>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" style="width: 100%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No. Tiket</th>
                    <th>Departemen</th>
                    <th>Tipe Masalah</th>
                    <th>Keterangan Masalah</th>
                    <th>Tanggal Ajuan</th>
                    <th>Teknisi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($transaksi)) {
                    $no = 1;
                    foreach ($transaksi as $data) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $data->ID_TIKET . "</td>";
                        echo "<td>" . $data->NAMA_DEPARTEMEN . "</td>";
                        echo "<td>" . $data->SUB_MASALAH . "</td>";
                        echo "<td>" . $data->MASALAH . "</td>";
                        echo "<td>" . $data->TANGGAL . "</td>";
                        echo "<td>" . $data->nama_user . "</td>";
                        echo "<td>" . $data->STATUS . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    window.print();
</script>