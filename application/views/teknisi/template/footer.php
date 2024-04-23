
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url()?>assets/back/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/back/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/back/vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url()?>assets/back/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()?>assets/back/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url()?>assets/back/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>assets/back/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url()?>assets/back/js/demo/datatables-demo.js"></script>
   

   

<script type="text/javascript">
            $(document).ready(function() {
                $('#tabelData').DataTable();
                function filterData () {
                    $('#tabelData').DataTable().search(
                        $('.bulan').val()
                        ).draw();
                }
                $('.bulan').on('change', function () {
                    filterData();
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#tabelData').DataTable();
                function filterData () {
                    $('#tabelData').DataTable().search(
                        $('.TANGGAL').val()
                        ).draw();
                }
                $('.TANGGAL').on('change', function () {
                    filterData();
                });
            });
        </script>

</body>

</html>