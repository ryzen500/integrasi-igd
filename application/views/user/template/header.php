<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IGD RSWB Surabaya - Beranda</title>
    <script src="https://kit.fontawesome.com/5ab7515e8e.js" crossorigin="anonymous"></script>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/back/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/back/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Add CKEditor via CDN -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <link href="<?= base_url() ?>assets/back/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/back/css/hideshow.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/back/css/track.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/back/css/select2.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/back/css/select2.css" rel="stylesheet" />

    <style>
        /* CSS untuk animasi loading bar */
        #loading-bar {
            display: none;
            /* Tersembunyi secara default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #ff3d00, #ffdd00, #00c853);
            animation: loadingAnimation 2s linear infinite;
        }

        @keyframes loadingAnimation {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }
    </style>



</head>

<body id="page-top">