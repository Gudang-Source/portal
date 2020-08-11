<div class="panel-heading">
    <h4 class="panel-title"><b> Laman <?= $this->uri->segment(4) == 'insert' ? 'Tambah' : 'Update' ?> Mata Pelajaran</b></h4>
    <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
        </ul>
    </div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>
    <form action="<?= site_url('admin/akademik/mapel/proses') ?>" method="POST">
        <div class="col-lg-12">
            <div class="row form-group mt-10">
                <div class="col-lg-12" style="margin-top: 10px;">
                    <label>Mata Pelajaran *</label>
                    <input type="hidden" name="id" value="<?= @$row->id_mapel ?>">
                    <input type="text" name="m_mapel" class="form-control" value="<?= @$row->nama_mapel ?>" required>
                </div>
                <div class="col-lg-4" style="margin-top: 10px;">
                    <label for="">Kode Mata Pelajaran *</label>
                    <input type="text" name="m_kode" class="form-control" value="<?= @$row->kode_mapel ?>" required>
                </div>
                <div class="col-lg-4" style="margin-top: 10px;">
                    <label>Robongan Belajar *</label>
                    <select name="m_rombel" id="" class="form-control" required>
                        <option value="">- pilih -</option>
                        <option value="Umum" <?= @$row->rombel_mapel == 'Umum' ? 'selected' : null ?>> Umum </option>
                        <option value="IPA" <?= @$row->rombel_mapel == 'IPA' ? 'selected' : null ?>> Ilmu Pengetahuan Alam</option>
                        <option value="IPS" <?= @$row->rombel_mapel == 'IPS' ? 'selected' : null ?>> Ilmu Pengetahuan Sosial</option>
                        <option value="Bilingual" <?= @$row->rombel_mapel == 'Bilingual' ? 'selected' : null ?>> Bilingual </option>
                    </select>
                </div>
                <div class="col-lg-4" style="margin-top: 10px;">
                    <label for="">Inisial Mata Pelajaran *</label> <small> (ex. Biologi : Bio) </small>
                    <input type="text" name="m_inisial" class="form-control" value="<?= @$row->inisial_mapel ?>" required>
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