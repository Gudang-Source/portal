<div class="panel-heading">
    <h4 class="panel-title"><b> Laman Daftar Mata Pelajaran <?= ta()->tahun_ajaran . ' - ' . ta()->semester_ta ?></b></h4>
    <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
        </ul>
    </div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>
    <div class="col-lg-12">
        <a href="<?= site_url('admin/akademik/mapel/insert') ?>" class="btn btn-success btn-xs pull-right"><i class="icon-plus-circle2"></i> Tambah </a>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="example">
                <thead>
                    <tr class="border-double">
                        <th>#</th>
                        <th>Kode Mata Pelajaran</th>
                        <th>Mata Pelajaran</th>
                        <th>Rombongan Belajar</th>
                        <th>Inisial Mapel</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $data->kode_mapel ?></td>
                            <td><?= $data->nama_mapel ?></td>
                            <td><?= jurusan($data->rombel_mapel) ?></td>
                            <td><?= $data->inisial_mapel ?></td>
                            <td>
                                <ul class="icons-list">
                                    <li><a href="<?= site_url('admin/akademik/mapel/update/' . $data->id_mapel) ?>"><i class="icon-pencil7"></i></a></li>
                                    <li><a href="<?= site_url('admin/akademik/mapel/delete/' . $data->id_mapel) ?>" onclick="return confirm('Yakin menghapus data (<?= $data->kode_mapel . ' - ' . $data->nama_mapel  ?>)')"><i class="icon-trash"></i></a></li>
                                </ul>

                            </td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>