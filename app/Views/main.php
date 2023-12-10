

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">
    <title>DESSLAND POS</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?=site_url('public/assets/delicious.webp')?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=site_url('public/assets/delicious.webp')?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=site_url('public/assets/delicious.webp')?>">
    <link href="<?=site_url('public/assets/css/bootstrap.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=site_url('public/assets/css/ui.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=site_url('public/assets/fonts/fontawesome/css/fontawesome-all.min.css')?>" type="text/css" rel="stylesheet">
    <link href="<?=site_url('public/assets/css/OverlayScrollbars.css')?>" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=site_url('public/assets/css/custom.css')?>">
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Include jQuery Library -->
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI Library -->
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        .avatar {
            vertical-align: middle;
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }

        .bg-default,
        .btn-default {
            background-color: #f2f3f8;
        }

        .btn-error {
            color: #ef5f5f;
        }
    </style>
</head>

<body>
    <?php  echo view('layouts/navbar.php'); ?>   
    <?php  echo view($layouts); ?>

    <script src="<?=site_url('public/assets/js/bootstrap.bundle.min.js')?>" type="text/javascript"></script>
    <script src="<?=site_url('public/assets/js/OverlayScrollbars.js')?>" type="text/javascript"></script>
    <script>
        $(function() {
            console.log("ready!");
            $("#cart").height(445);
            $("#cart").overlayScrollbars({});
        });
    </script>
</body>

</html>