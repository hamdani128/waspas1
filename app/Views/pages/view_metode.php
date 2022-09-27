<?=$this->Extend('layout/template')?>
<?=$this->Section('content')?>

<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Informasi Perhitungan Metode Waspas</h5>
                    <!-- <p class="m-b-0"></p> -->
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Modul Master Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Page-header end -->
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Konversi Penilaian</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li>
                                            <i class="fa fa fa-wrench open-card-option"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-window-maximize full-card"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-minus minimize-card"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-refresh reload-card"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-trash close-card"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="table-penilaian-metode">
                                                <thead>
                                                    <tr>
                                                        <th>No#</th>
                                                        <th>Alterntif ID</th>
                                                        <th>Kandidat</th>
                                                        <th>Kriteria 1</th>
                                                        <th>Kriteria 2</th>
                                                        <th>Kriteria 3</th>
                                                        <th>Kriteria 4</th>
                                                        <th>Kriteria 5</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="penilaian-metode">
                                                    <?php if (count($penilaian) > 0) {$no = 1;?>
                                                    <?php foreach ($penilaian as $row): ?>
                                                    <tr class="paragraf">
                                                        <td class="paragraf"><?=$no++;?></td>
                                                        <td class="paragraf"><?=$row->alternatif_id;?></td>
                                                        <td class="paragraf"><?=$row->nama;?></td>
                                                        <td class="paragraf"><?=$row->nilai1;?></td>
                                                        <td class="paragraf"><?=$row->nilai2;?></td>
                                                        <td class="paragraf"><?=$row->nilai3;?></td>
                                                        <td class="paragraf"><?=$row->nilai4;?></td>
                                                        <td class="paragraf"><?=$row->nilai5;?></td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <?php } else {?>
                                                    <tr>
                                                        <td colspan="8" class="text-center">Tidak Ada Data</td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mb-4">
                    <div class="col-sm-12">
                        <button class="btn waves-effect waves-light btn-success" onclick="Methode()"><i
                                class="fas fa-cogs"></i>Proses</button>
                        <button class="btn waves-effect waves-light btn-primary" onclick="Cetak_Laporan()"><i
                                class="fas fa-print"></i>Cetak Laporan</button>
                        <h5 id="time_waktu" style="padding-top: 10px;">

                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Normalisasi Penilaian</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li>
                                            <i class="fa fa fa-wrench open-card-option"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-window-maximize full-card"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-minus minimize-card"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-refresh reload-card"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-trash close-card"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="table-penilaian-normalisasi">
                                                <thead>
                                                    <tr>
                                                        <th>No#</th>
                                                        <th>Alterntif ID</th>
                                                        <th>Kandidat</th>
                                                        <th>Kriteria 1</th>
                                                        <th>Kriteria 2</th>
                                                        <th>Kriteria 3</th>
                                                        <th>Kriteria 4</th>
                                                        <th>Kriteria 5</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="normalisasi">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Normalisasi Penilaian Terbobot</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li>
                                            <i class="fa fa fa-wrench open-card-option"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-window-maximize full-card"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-minus minimize-card"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-refresh reload-card"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-trash close-card"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="table-normalisasi-terbobot">
                                                <thead>
                                                    <tr>
                                                        <th>No#</th>
                                                        <th>Alterntif ID</th>
                                                        <th>Kandidat</th>
                                                        <th>Xijw</th>
                                                        <th>(xij)^wj</th>
                                                        <th>Hasil</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="normalisasi-terbobot">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Hasil Keputusan</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li>
                                            <i class="fa fa fa-wrench open-card-option"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-window-maximize full-card"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-minus minimize-card"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-refresh reload-card"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-trash close-card"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="table-hasil">
                                                <thead>
                                                    <tr>
                                                        <th>No#</th>
                                                        <th>Alterntif ID</th>
                                                        <th>Kandidat</th>
                                                        <th>Hasil</th>
                                                        <th>Rangking</th>
                                                        <th>Percentasi(%)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="rangking">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection();?>