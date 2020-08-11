<div class="panel-heading">
    <h4 class="panel-title"><b> Laman Daftar Pengampu Mata Pelajaran <?= ta()->tahun_ajaran . ' - ' . ta()->semester_ta ?></b></h4>
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
        <form action="<?= site_url('admin/akademik/pengampu/index') ?>" method="post">
            <div class="col-lg-5 m-10">
                <select name="cls" class="form-control" required>
                    <option value=""> - Pilih Kelas -</option>
                    <?php foreach ($kelas->result() as $key => $class) { ?>
                        <option value="<?= $class->id_kelas ?>" <?= $class->id_kelas == $this->uri->segment(5) ? 'selected' : null  ?>><?= $class->tingkat_kelas . ' ' . $class->jurusan_kelas . ' ' . $class->nama_kelas . ' - ' . $class->nama_pendidik . ' (' . cek_peserta_kelas($class->id_kelas) . ' Peserta )' ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-lg-1 m-10">
                <button type="submit" class="btn btn-warning btn-sm"> Pilih </button>
            </div>
        </form>
        <?php if ($this->uri->segment(4) == 'data') { ?>
            <div class="col-lg-5 m-10">
                <a href="<?= site_url('admin/akademik/pengampu/insert/' . $this->uri->segment(5)) ?>" class="btn btn-success btn-xs pull-right"><i class="icon-plus-circle2"></i> Tambah </a>
            </div>
        <?php } ?>
    </div>
    <?php if ($this->uri->segment(4) == 'data') { ?>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="border-double">
                            <th>#</th>
                            <th>Kode Mata Pelajaran</th>
                            <th>Mata Pelajaran</th>
                            <th>Tenaga Pendidik</th>
                            <th width="20%">Total Jam / Minggu </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($row->num_rows() > 0) {
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $data->kode_mapel ?></td>
                                    <td><?= $data->nama_mapel ?></td>
                                    <td><?= $data->nama_pendidik ?></td>
                                    <td><?= $data->jumlah_jam . ' Jam / Minggu' ?></td>
                                    <td>
                                        <ul class="icons-list">
                                            <li><a href="<?= site_url('admin/akademik/pengampu/update/' . $data->id_pengampu) ?>"><i class="icon-pencil7"></i></a></li>
                                            <li><a href="<?= site_url('admin/akademik/pengampu/delete/' . $data->id_pengampu . '/' . $this->uri->segment(5)) ?>" onclick="return confirm('Yakin menghapus data  (  [<?= $data->kode_mapel . '] ' . $data->nama_mapel . ' - ' . $data->nama_pendidik  ?> )'  )"><i class="icon-trash"></i></a></li>
                                        </ul>

                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="6" class="text-center"><i><b>Data Pengampu Mata Pelajaran Belum Ditambahkan</b></i></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php } ?>
</div>