<div class="panel-heading">
    <h4 class="panel-title"><b> Laman <?= $this->uri->segment(4) == 'insert' ? 'Tambah' : 'Update' ?> Pengampu Mata Pelajaran</b></h4>
    <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
        </ul>
    </div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>
    <form action="<?= site_url('admin/akademik/pengampu/proses') ?>" method="POST">
        <input type="hidden" name="id" value="<?= @$row->id_pengampu ?>">
        <input type="hidden" name="id_kelas" value="<?= $this->uri->segment(4) == 'insert' ? $this->uri->segment(5) : @$row->id_kelas ?>">
        <div class="col-lg-12">
            <div class="row form-group mt-10">
                <div class="col-lg-6" style="margin-top: 10px;">
                    <label>Mata Pelajaran *</label>
                    <select name="p_mapel" class="form-control" required>
                        <option value="">- pilih -</option>
                        <?php
                        if ($this->uri->segment(4) == 'insert') {

                            $jurusan = get_kelas($this->uri->segment(5))->row()->jurusan_kelas;
                        } else {
                            $jurusan = get_kelas($row->id_kelas)->row()->jurusan_kelas;
                        }
                        ?>
                        <?php foreach (get_mapel_jurusan($jurusan)->result() as $key => $mpl) {
                            if (get_pengampu($this->uri->segment(5), $mpl->id_mapel)->num_rows() == 0) { ?>
                                <option value="<?= $mpl->id_mapel ?>" <?= @$row->id_mapel == $mpl->id_mapel ? 'selected' : null ?>><?= $mpl->kode_mapel . ' - ' . $mpl->nama_mapel ?></option>
                        <?php
                            }
                        } ?>
                    </select>
                </div>
                <div class="col-lg-6" style="margin-top: 10px;">
                    <label for="">Pengampu Mata Pelajaran *</label>
                    <select name="p_pendidik" class="form-control" required>
                        <option value="">- pilih -</option>
                        <?php foreach ($pendidik->result() as $key => $pdk) { ?>
                            <option value="<?= $pdk->id_pendidik ?>" <?= $pdk->id_pendidik == @$row->id_pendidik ? 'selected' : null ?>><?= $pdk->nip_pendidik . ' - ' . $pdk->nama_pendidik ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4" style="margin-top: 10px;">
                    <label>Total Jam Mengajar *</label>
                    <input type="number" name="p_jam" value="<?= @$row->jumlah_jam ?>" placeholder="ex. 12 (hanya angka)" class="form-control" required>
                </div>
                <div class="col-lg-4" style="margin-top: 10px;">
                    <label>Tahun Ajaran </label><small> ( Mengikuti Tahun Ajaran Aktif ) </small>
                    <input type="text" name="p_ta" value="<?= ta()->tahun_ajaran . ' - ' . ta()->semester_ta ?>" class="form-control" readonly>
                </div>
                <div class="col-lg-4" style="margin-top: 10px;">
                    <label>Kelas </label><small> ( Sesuai Kelas yang ditambahkan ) </small>
                    <?php
                    if ($this->uri->segment(4) == 'insert') {
                        $kelas = cek_kelas($this->uri->segment(5));
                    } else {
                        $kelas = cek_kelas($row->id_kelas);
                    }
                    ?>
                    <input type="text" name="p_kelas" value="<?= $kelas ?>" class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="text-right">
                <button type="submit" name="<?= $this->uri->segment(4) ?>" class="btn btn-primary"> <?= $this->uri->segment(4) == 'insert' ? 'Tambahkan' : 'Perbaharui' ?> <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </form>
</div>