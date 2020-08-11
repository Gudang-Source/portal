<div class="panel-heading">
    <h4 class="panel-title"><b> Laman Daftar Jam Pelajaran <?= ta()->tahun_ajaran . ' - ' . ta()->semester_ta ?></b></h4>
    <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
        </ul>
    </div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>
    <div class="row mb-10">
        <div class="col-lg-8">
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-bottom bottom-divided">
                    <li class="<?= $this->uri->segment(5) == 1 ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/1') ?>">Senin</a></li>
                    <li class="<?= $this->uri->segment(5) == 2 ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/2') ?>">Selasa</a></li>
                    <li class="<?= $this->uri->segment(5) == 3 ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/3') ?>">Rabu</a></li>
                    <li class="<?= $this->uri->segment(5) == 4 ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/4') ?>">Kamis</a></li>
                    <li class="<?= $this->uri->segment(5) == 5 ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/5') ?>">Jum'at</a></li>
                    <li class="<?= $this->uri->segment(5) == 6 ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/6') ?>">Sabtu</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 m-10">
            <a href="<?= site_url('admin/akademik/jampel/insert/' . $this->uri->segment(5)) ?>" class="btn btn-success btn-xs pull-right mr-5"><i class="icon-plus-circle2"></i> Tambah </a>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="border-double">
                            <th>Jam Ke</th>
                            <th>Rentang Waktu</th>
                            <th>Durasi</th>
                            <th width="20%">Pembuatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $data->urutan_jampel ?></td>
                                <td><?= $data->rentang_jampel ?></td>
                                <td><?= $data->durasi_jampel . ' Menit' ?></td>
                                <td><?= $data->created_jampel ?></td>
                                <td>
                                    <ul class="icons-list">
                                        <li><a href="<?= site_url('admin/akademik/jampel/update/' . $data->hari_jampel . '/' . $data->id_jampel) ?>"><i class="icon-pencil7"></i></a></li>
                                        <li><a href="<?= site_url('admin/akademik/jampel/delete/' . $data->hari_jampel . '/'  . $data->id_jampel) ?>" onclick="return confirm('Yakin menghapus data (<?= conv_day($data->hari_jampel) . ' - ' . $data->rentang_jampel  ?>)')"><i class="icon-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>