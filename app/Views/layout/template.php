<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <title>Deccission Supprt System - WASPAS</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?=base_url()?>/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/icon/themify-icons/themify-icons.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/style.css">
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/js/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/js/datatable/datatables.min.css">
    <!-- SweetAlert -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/js/sweetalert/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/js/sweetalert/sweetalert2.min.css">
    <!-- notification -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/pages/notification/notification.css">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?=$this->include('layout/topbar')?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?=$this->include('layout/sidebar')?>

                    <div class="pcoded-content">
                        <?=$this->renderSection('content')?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Required Jquery -->
    <script type="text/javascript" src="<?=base_url()?>/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- waves js -->
    <script src="<?=base_url()?>/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?=base_url()?>/assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- slimscroll js -->
    <script src="<?=base_url()?>/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- menu js -->
    <script src="<?=base_url()?>/assets/js/pcoded.min.js"></script>
    <script src="<?=base_url()?>/assets/js/vertical/vertical-layout.min.js"></script>
    <!-- Script -->
    <script type="text/javascript" src="<?=base_url()?>/assets/js/script.js"></script>
    <!-- Script -->
    <script type="text/javascript" src="<?=base_url()?>/assets/js/datatable/datatables.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/assets/js/datatable/datatables.min.js"></script>
    <!-- SweetAlert -->
    <script type="text/javascript" src="<?=base_url()?>/assets/js/sweetalert/sweetalert2.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/assets/js/sweetalert/sweetalert2.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/assets/js/sweetalert/sweetalert2.all.js"></script>
    <script type="text/javascript" src="<?=base_url()?>/assets/js/sweetalert/sweetalert2.all.min.js"></script>
    <!-- Notification -->

    <script type="text/javascript">
    $(document).ready(function() {
        $('#table-alternatif').DataTable();
        $('#table-kriteria').DataTable();
        $('#table-penilaian').DataTable();
        $('#table-penilaian-metode').DataTable();
        $('#table-penilaian-metode').DataTable();
        $('#table-normalisasi-terbobot').DataTable();
        $('#table-hasil').DataTable();
    });

    $('#alternatif_id').change(function() {
        $.ajax({
            url: '/penilaian/alternatif/get/' + this.value,
            method: "GET",
            async: true,
            dataType: 'json',
            //check this in Firefox browser
            success: function(data) {
                $("#nama").val(data);
            }
        });
        return false;
    })
    </script>

</body>

</html>