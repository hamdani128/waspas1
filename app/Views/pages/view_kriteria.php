<?=$this->Extend('layout/template');?>
<?=$this->section('content')?>

<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Informasi Kriteria</h5>
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
                                <h5>Pengelolaan Data kriteria</h5>
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
                                            <table class="table table-hover" id="table-kriteria">
                                                <thead>
                                                    <tr>
                                                        <th>No#</th>
                                                        <th>Kriteria ID</th>
                                                        <th>Nama Kriteria</th>
                                                        <th>Bobot</th>
                                                        <th>Jenis</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (count($kriteria) > 0) {$no = 1;?>
                                                    <?php foreach ($kriteria as $row): ?>
                                                    <tr class="paragraf">
                                                        <td class="paragraf"><?=$no++;?></td>
                                                        <td class="paragraf"><?=$row->kriteria_id;?></td>
                                                        <td class="paragraf"><?=$row->nama;?></td>
                                                        <td class="paragraf"><?=$row->bobot;?></td>
                                                        <td class="paragraf"><?=$row->jenis;?></td>
                                                        <td class="paragraf"><?=$row->keterangan;?></td>
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
                                                                        data-target="#update_kriteria"
                                                                        onclick="show_update_kriteria('<?=$row->id;?>')">Update</a>
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

<!-- Modal Update -->
<div class="modal fade" id="update_kriteria" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Update Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <form action="/kriteria/update" method="post" id="kriteria_update">
                        <?=csrf_field()?>

                        <input type="hidden" name="id_update" class="form-control" id="id_update">
                        <div class="form-group form-primary form-static-label">
                            <label class="float-label">Kode Kriteria</label>
                            <input type="text" name="kode_update" class="form-control" id="kode_update">
                            <span class="form-bar"></span>
                        </div>
                        <div class="form-group form-primary form-static-label">
                            <label class="float-label">Kriteria</label>
                            <input type="text" name="nama_update" class="form-control" id="nama_update">
                            <span class="form-bar"></span>
                        </div>
                        <div class="form-group form-primary form-static-label">
                            <label class="float-label">Bobot Nilai</label>
                            <input type="text" name="bobot_update" class="form-control" id="bobot_update">
                            <span class="form-bar"></span>
                        </div>
                        <div class="form-group form-primary form-static-label">
                            <label class="float-label">Jenis Kriteria</label>
                            <input type="text" name="jenis_update" class="form-control" id="jenis_update">
                            <span class="form-bar"></span>
                        </div>
                        <div class="form-group form-primary form-static-label">
                            <label class="float-label">Keterangan</label>
                            <textarea name="keterangan_update" class="form-control" id="keterangan_update" cols="30"
                                rows="5"></textarea>
                            <span class="form-bar"></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection();?>