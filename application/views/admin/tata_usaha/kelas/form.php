<div class="panel-heading">
    <h4 class="panel-title"><b> Laman <?= $this->uri->segment(4) == 'insert' ? 'Tambah' : 'Update' ?> Detail Kelas</b></h4>
    <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
        </ul>
    </div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>
    <form action="<?= site_url('admin/tata_usaha/kelas/proses') ?>" method="POST">
        <div class="col-lg-12">
            <div class="row form-group mt-10">
                <div class="col-lg-8">
                    <label>Wali Kelas *</label>
                    <input type="hidden" name="id" value="<?= @$row->id_kelas ?>">
                    <select name="k_wali" id="" class="form-control">
                        <option value="">- pilih -</option>
                        <?php
                        $count = 0;
                        foreach (get_wali_kelas()->result() as $key => $guru) {
                            if ($this->uri->segment(4) == 'insert') {
                                if (cek_wali_kelas($guru->id_pendidik) == 0) { ?>
                                    <option value="<?= $guru->id_pendidik ?>" <?= $guru->id_pendidik == @$row->id_pendidik ? 'selected' : null ?>><?= $guru->nip_pendidik . ' - ' . $guru->nama_pendidik ?></option>
                                <?php }
                            } else { ?>
                                <option value="<?= $guru->id_pendidik ?>" <?= $guru->id_pendidik == @$row->id_pendidik ? 'selected' : null ?>><?= $guru->nip_pendidik . ' - ' . $guru->nama_pendidik ?></option>
                        <?php }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="">Kode Random Kelas</label>
                    <input type="text" name="k_kode" class="form-control" value="<?= $this->uri->segment(4) == 'insert' ? random_string('nozero', 6) . '' . date('dmY') : $row->id_kelas ?>" readonly>
                </div>

                <div class="col-lg-6" style="margin-top: 10px;">
                    <label>Tingkat Kelas *</label>
                    <input type="text" name="k_tingkat" class="form-control" value="<?= @$row->tingkat_kelas ?>" required>
                </div>
                <div class="col-lg-6" style="margin-top: 10px;">
                    <label>Jurusan Kelas *</label>
                    <select name="k_jurusan" class="form-control" required>
                        <option value=""> - pilih - </option>
                        <option value="Umum" <?= @$row->jurusan_kelas == 'Umum' ? 'selected' : null ?>>Reguler</option>
                        <option value="IPA" <?= @$row->jurusan_kelas == 'IPA' ? 'selected' : null ?>>Ilmu Pengetahuan Alam</option>
                        <option value="IPS" <?= @$row->jurusan_kelas == 'IPS' ? 'selected' : null ?>>Ilmu Pengetahuan Sosial</option>
                    </select>
                </div>
                <div class="col-lg-6" style="margin-top: 10px;">
                    <label>Nama Kelas *</label>
                    <input type="text" name="k_nama" class="form-control" value="<?= @$row->nama_kelas ?>" required>
                </div>
                <div class="col-lg-6" style="margin-top: 10px;">
                    <label>Kapasitas Ruang Kelas *</label>
                    <input type="number" name="k_kapasitas" class="form-control" value="<?= @$row->kapasitas_kelas ?>" required>
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