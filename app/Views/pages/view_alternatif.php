<?=$this->Extend('layout/template')?>
<?=$this->Section('content')?>

<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Informasi Alternatif</h5>
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
                                <h5>Pengelolaan Data Alternatif</h5>
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
                                            data-target="#modelId"><i class="fa fa-plus-square"></i>Tambah</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="table-alternatif">
                                                <thead>
                                                    <tr>
                                                        <th>No#</th>
                                                        <th>Alternatif ID</th>
                                                        <th>Inisialisasi</th>
                                                        <th>Kandidat</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Alamat</th>
                                                        <th>HP</th>
                                                        <th>Pendidikan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (count($alternatif) > 0) {$no = 1;?>
                                                    <?php foreach ($alternatif as $row): ?>
                                                    <tr class="paragraf">
                                                        <td class="paragraf"><?=$no++;?></td>
                                                        <td class="paragraf"><?=$row->alternatif_id;?></td>
                                                        <td class="paragraf"><?=$row->inisialisasi;?></td>
                                                        <td class="paragraf"><?=$row->nama;?></td>
                                                        <td class="paragraf"><?=$row->jk;?></td>
                                                        <td class="paragraf"><?=$row->alamat;?></td>
                                                        <td class="paragraf"><?=$row->hp;?></td>
                                                        <td class="paragraf"><?=$row->pendidikan;?></td>
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
                                                                        data-target="#update_alternatif"
                                                                        onclick="show_update('<?=$row->id;?>')">Update</a>
                                                                    <a class="dropdown-item waves-light waves-effect"
                                                                        href="#"
                                                                        onclick="delete_alternatif('<?=$row->id;?>','<?=$row->alternatif_id;?>')">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
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
            </div>
        </div>
    </div>
</div>


<!-- modal tambah -->

<!-- Modal -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
    Launch
</button> -->

<!-- Modal Tambah-->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <form method="POST" action="/alternatif/save" class="form-material"
                            enctype="multipart/form-data" id="alternatif_add">

                            <?=csrf_field();?>

                            <div class="form-group form-primary form-static-label">
                                <input type="text" name="alternatif_id" class="form-control" id="alternatif_id">
                                <span class="form-bar"></span>
                                <label class="float-label">Alternatif ID</label>
                            </div>
                            <div class="form-group form-primary form-static-label">
                                <input type="text" name="inisialisasi_id" class="form-control" id="inisialisasi_id">
                                <span class="form-bar"></span>
                                <label class="float-label">Inisialisasi ID</label>
                            </div>
                            <div class="form-group form-primary form-static-label">
                                <input type="text" name="nama" class="form-control" id="nama">
                                <span class="form-bar"></span>
                                <label class="float-label">Nama Kandidat</label>
                            </div>
                            <div class="form-group form-primary form-static-label">
                                <select name="jk" class="form-control" id="jk">
                                    <option value="Pilih JK">Pilih Jenis Kelamin</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <span class="form-bar"></span>
                                <label class="float-label mb-2">Jenis Kelamin</label>
                            </div>
                            <div class="form-group form-primary form-static-label">
                                <input type="text" name="alamat" class="form-control" id="alamat">
                                <span class="form-bar"></span>
                                <label class="float-label">Alamat</label>
                            </div>
                            <div class="form-group form-primary form-static-label">
                                <input type="text" name="no_hp" class="form-control" id="no_hp">
                                <span class="form-bar"></span>
                                <label class="float-label">No.Handphone</label>
                            </div>
                            <div class="form-group form-primary form-static-label">
                                <input type="text" name="pendidikan" class="form-control" id="pendidikan">
                                <span class="form-bar"></span>
                                <label class="float-label">Pendidikan Terakhir</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="insert_alternatif()">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit -->

<div class="modal fade" id="update_alternatif" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
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
                <div class="col-md-12">

                    <form method="POST" action="/alternatif/update" class="form-material" enctype="multipart/form-data"
                        id="alternatif_update">

                        <?=csrf_field();?>

                        <input type="hidden" name="id_update" class="form-control" id="id_update">

                        <div class="form-group form-primary form-static-label">
                            <input type="text" name="alternatif_id_update" class="form-control"
                                id="alternatif_id_update">
                            <span class="form-bar"></span>
                            <label class="float-label">Alternatif ID</label>
                        </div>
                        <div class="form-group form-primary form-static-label">
                            <input type="text" name="inisialisasi_id_update" class="form-control"
                                id="inisialisasi_id_update">
                            <span class="form-bar"></span>
                            <label class="float-label">Inisialisasi ID</label>
                        </div>
                        <div class="form-group form-primary form-static-label">
                            <input type="text" name="nama_update" class="form-control" id="nama_update">
                            <span class="form-bar"></span>
                            <label class="float-label">Nama Kandidat</label>
                        </div>
                        <div class="form-group form-primary form-static-label">
                            <select name="jk_update" class="form-control" id="jk_update">
                                <option value="Pilih JK">Pilih Jenis Kelamin</option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <span class="form-bar"></span>
                            <label class="float-label mb-2">Jenis Kelamin</label>
                        </div>
                        <div class="form-group form-primary form-static-label">
                            <input type="text" name="alamat_update" class="form-control" id="alamat_update">
                            <span class="form-bar"></span>
                            <label class="float-label">Alamat</label>
                        </div>
                        <div class="form-group form-primary form-static-label">
                            <input type="text" name="no_hp_update" class="form-control" id="no_hp_update">
                            <span class="form-bar"></span>
                            <label class="float-label">No.Handphone</label>
                        </div>
                        <div class="form-group form-primary form-static-label">
                            <input type="text" name="pendidikan_update" class="form-control" id="pendidikan_update">
                            <span class="form-bar"></span>
                            <label class="float-label">Pendidikan Terakhir</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" onclick="update_data()">Update</button>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>