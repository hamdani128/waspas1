<?=$this->Extend('layout/template');?>
<?=$this->section('content')?>

<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Informasi Penilaian</h5>
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

                    <?php if (session()->getFlashdata('message') !== null): ?>
                    <div onload="PesanSuccess('<?php echo session()->getFlashdata('message'); ?>')"></div>
                    <?php endif;?>

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Pengelolaan Data Penilaian</h5>
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
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <button class="btn waves-effect waves-light btn-primary" data-toggle="modal"
                                            data-target="#tambahpenilaian"><i
                                                class="fa fa-plus-square"></i>Tambah</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="table-penilaian">
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
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (count($penilaian) > 0) {$no = 1;?>
                                                    <?php foreach ($penilaian as $row): ?>
                                                    <tr class="paragraf">
                                                        <td class="paragraf"><?=$no++;?></td>
                                                        <td class="paragraf"><?=$row->alternatif_id;?></td>
                                                        <td class="paragraf"><?=$row->nama;?></td>
                                                        <td class="paragraf"><?=$row->kriteria1;?></td>
                                                        <td class="paragraf"><?=$row->kriteria2;?></td>
                                                        <td class="paragraf"><?=$row->kriteria3;?></td>
                                                        <td class="paragraf"><?=$row->kriteria4;?></td>
                                                        <td class="paragraf"><?=$row->kriteria5;?></td>
                                                        <td>
                                                            <div class="dropdown-inverse dropdown open">
                                                                <button
                                                                    class="btn btn-inverse dropdown-toggle waves-effect waves-light "
                                                                    type="button" id="dropdown-7" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="true">
                                                                    Pilih</button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdown-7"
                                                                    data-dropdown-in="fadeIn"
                                                                    data-dropdown-out="fadeOut">
                                                                    <a class="dropdown-item waves-light waves-effect"
                                                                        href="#" data-toggle="modal"
                                                                        data-target="#update_penilaian"
                                                                        onclick="show_update_penilaian('<?=$row->id;?>')">Update</a>
                                                                    <a class="dropdown-item waves-light waves-effect"
                                                                        href="#"
                                                                        onclick="delete_penilaian('<?=$row->id;?>','<?=$row->alternatif_id;?>')">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <?php } else {?>
                                                    <tr>
                                                        <td colspan="9" class="text-center">Tidak Ada Data</td>
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
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahpenilaian" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Tambah Data Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/penilaian/save" method="POST" enctype="multipart/form-data" id="penilaian_add">

                    <?=csrf_field()?>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group form-primary form-static-label">
                                <select name="alternatif_id" class="form-control" id="alternatif_id">
                                    <option value="Pilih alternatif ID">Pilih ID Alternatif</option>
                                    <?php foreach ($alternatif as $row): ?>
                                    <option value="<?=$row->alternatif_id;?>"><?=$row->alternatif_id;?></option>
                                    <?php endforeach?>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Nama Kandidat</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Penilaian Prestasi (C1)</label>
                                <select name="kriteria1" class="form-control" id="kriteria1">
                                    <option value="Pilih Penilaian">Pilih Penilaian</option>
                                    <option value="Sangat Baik">Sangat Baik</option>
                                    <option value="Cukup Baik">Cukup Baik</option>
                                    <option value="Baik">Baik</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Nilai Parameter</label>
                                <input type="text" name="nilai1" class="form-control" id="nilai1">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Penilaian Wawancara (C2)</label>
                                <select name="kriteria2" class="form-control" id="kriteria2">
                                    <option value="Pilih Penilaian">Pilih Penilaian</option>
                                    <option value="Sangat Baik">Sangat Baik</option>
                                    <option value="Cukup Baik">Cukup Baik</option>
                                    <option value="Baik">Baik</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Nilai Parameter</label>
                                <input type="text" name="nilai2" class="form-control" id="nilai2">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Penilaian Pendapatan Orang Tua(C3)</label>
                                <input type="text" name="kriteria3" class="form-control" id="kriteria3">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Nilai Parameter</label>
                                <input type="text" name="nilai3" class="form-control" id="nilai3">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Penilaian Penampilan (C4)</label>
                                <select name="kriteria4" class="form-control" id="kriteria4">
                                    <option value="Pilih Penilaian">Pilih Penilaian</option>
                                    <option value="Sangat Bagus">Sangat Bagus</option>
                                    <option value="Cukup Bagus">Cukup Bagus</option>
                                    <option value="Bagus">Bagus</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Nilai Parameter</label>
                                <input type="text" name="nilai4" class="form-control" id="nilai4">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Penilaian Penampilan (C5)</label>
                                <select name="kriteria5" class="form-control" id="kriteria5">
                                    <option value="Pilih Penilaian">Pilih Penilaian</option>
                                    <option value="Sangat Bagus">Sangat Bagus</option>
                                    <option value="Cukup Bagus">Cukup Bagus</option>
                                    <option value="Bagus">Bagus</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Nilai Parameter</label>
                                <input type="text" name="nilai5" class="form-control" id="nilai5">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="simpan_penilaian()">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Update -->
<div class="modal fade" id="update_penilaian" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/penilaian/update" method="POST" enctype="multipart/form-data" id="penilaian_update">

                    <?=csrf_field()?>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group form-primary form-static-label">
                                <input type="hidden" name="id_update" class="form-control" id="id_update">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-primary form-static-label">
                                <span class="form-bar"></span>
                                <label class="float-label">Alternatif ID</label>
                                <input type="text" name="alternatif_id_update" class="form-control"
                                    id="alternatif_id_update">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Nama Kandidat</label>
                                <input type="text" name="nama_update" class="form-control" id="nama_update">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Penilaian Prestasi (C1)</label>
                                <select name="kriteria1_update" class="form-control" id="kriteria1_update">
                                    <option value="Pilih Penilaian">Pilih Penilaian</option>
                                    <option value="Sangat Baik">Sangat Baik</option>
                                    <option value="Cukup Baik">Cukup Baik</option>
                                    <option value="Baik">Baik</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Nilai Parameter</label>
                                <input type="text" name="nilai1_update" class="form-control" id="nilai1_update">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Penilaian Wawancara (C2)</label>
                                <select name="kriteria2_update" class="form-control" id="kriteria2_update">
                                    <option value="Pilih Penilaian">Pilih Penilaian</option>
                                    <option value="Sangat Baik">Sangat Baik</option>
                                    <option value="Cukup Baik">Cukup Baik</option>
                                    <option value="Baik">Baik</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Nilai Parameter</label>
                                <input type="text" name="nilai2_update" class="form-control" id="nilai2_update">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Penilaian Hasil tertulis (C3)</label>
                                <input type="text" name="kriteria3_update" class="form-control" id="kriteria3_update"
                                    onkeypress="myKriteria3_update()">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Nilai Parameter</label>
                                <input type="text" name="nilai3_update" class="form-control" id="nilai3_update">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Penilaian Penampilan (C4)</label>
                                <select name="kriteria4_update" class="form-control" id="kriteria4_update">
                                    <option value="Pilih Penilaian">Pilih Penilaian</option>
                                    <option value="Sangat Bagus">Sangat Bagus</option>
                                    <option value="Cukup Bagus">Cukup Bagus</option>
                                    <option value="Bagus">Bagus</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Nilai Parameter</label>
                                <input type="text" name="nilai4_update" class="form-control" id="nilai4_update">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Penilaian Penampilan (C5)</label>
                                <select name="kriteria5_update" class="form-control" id="kriteria5_update">
                                    <option value="Pilih Penilaian">Pilih Penilaian</option>
                                    <option value="Sangat Bagus">Sangat Bagus</option>
                                    <option value="Cukup Bagus">Cukup Bagus</option>
                                    <option value="Bagus">Bagus</option>
                                </select>
                                <span class="form-bar"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group form-primary form-static-label">
                                <label class="float-label">Nilai Parameter</label>
                                <input type="text" name="nilai5_update" class="form-control" id="nilai5_update">
                                <span class="form-bar"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" onclick="update_penilaian()">Update</button>
            </div>
        </div>
    </div>
</div>


<?=$this->endSection();?>