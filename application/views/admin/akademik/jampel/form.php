<div class="panel-heading">
    <h4 class="panel-title"><b> Laman <?= $this->uri->segment(4) == 'insert' ? 'Tambah' : 'Update' ?> Jam Pelajaran</b></h4>
    <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
        </ul>
    </div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>
    <form action="<?= site_url('admin/akademik/jampel/proses') ?>" method="POST">
        <div class="col-lg-12">
            <?php $rentang = explode(" - ", @$row->rentang_jampel) ?>
            <div class="row form-group mt-10">
                <div class="col-lg-6" style="margin-top: 10px;">
                    <label>Jam Mulai *</label>
                    <input type="hidden" name="id" value="<?= @$row->id_jampel ?>">
                    <input type="text" name="j_mulai" class="form-control" placeholder="ex. 07.30" value="<?= @$rentang[0] ?>" required>
                </div>
                <div class="col-lg-6" style="margin-top: 10px;">
                    <label>Jam Selesai *</label>
                    <input type="text" name="j_selesai" class="form-control" placeholder="ex. 09.00" value="<?= @$rentang[1] ?>" required>
                </div>
                <div class="col-lg-4" style="margin-top: 10px;">
                    <label for="">Hari Jam Pelajaran *</label> <small> (Menyesuaikan dengan tab hari yang dipilih) </small>
                    <input type="text" class="form-control" value="<?= conv_day($day) ?>" readonly>
                    <input type="hidden" name="j_day" value="<?= $day ?>">
                </div>
                <div class="col-lg-4" style="margin-top: 10px;">
                    <label for="">Durasi Jam Pelajaran *</label> <small> (ex. 40 Menit) </small>
                    <input type="number" name="j_durasi" class="form-control" placeholder=" Angka dalam menit" value="<?= @$row->durasi_jampel ?>" required>
                </div>
                <div class="col-lg-4" style="margin-top: 10px;">
                    <label for="">Urutan Jam Pelajaran*</label>
                    <input type="number" name="j_urut" class="form-control" value="<?= @$row->urutan_jampel ?>" required>
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