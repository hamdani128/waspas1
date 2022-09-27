<?=$this->Extend('layout/template')?>
<?=$this->Section('content')?>

<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard</h5>
                    <p class="m-b-0">Welcome to Material Able</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->
<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card bg-c-red total-card">
                            <div class="card-block">
                                <div class="text-left">
                                    <h4>1</h4>
                                    <p class="m-0">Jumlah User</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-c-green total-card">
                            <div class="card-block">
                                <div class="text-left">
                                    <?php if(count($alternatif) > 0) { ?>
                                    <h4><?= count($alternatif); ?></h4>
                                    <?php }else{ ?>
                                    <h4>0</h4>
                                    <?php } ?>
                                    <p class="m-0">Jumlah Alternatif</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-c-blue total-card">
                            <div class="card-block">
                                <div class="text-left">
                                    <?php if(count($kriteria) > 0) { ?>
                                    <h4><?= count($kriteria); ?></h4>
                                    <?php }else{ ?>
                                    <h4>0</h4>
                                    <?php } ?>
                                    <p class="m-0">Jumlah Kriteria</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-c-yellow total-card">
                            <div class="card-block">
                                <div class="text-left">
                                    <?php if(count($penilaian) > 0) { ?>
                                    <h4><?= count($penilaian); ?></h4>
                                    <?php }else{ ?>
                                    <h4>0</h4>
                                    <?php } ?>
                                    <p class="m-0">Jumlah Penilaian</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page-body end -->
        </div>
        <div id="styleSelector"> </div>
    </div>
</div>

<?=$this->EndSection()?>