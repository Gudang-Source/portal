<div class="row">
    <div class="col-lg-12 pt-2">
        <div class="card ">
            <div class="card-body">
                <p style="color: #218c74"><b> <i class="<?= icon_berita($row->role_user_admin) ?>">
                        </i> Info <?= jenis_berita($row->role_user_admin) ?></b></p>

                <div class="col-lg-12 text-center">
                    <h5><b><?= strtoupper($row->judul_berita) ?></b></h5>
                </div>
                <div class="col-lg-12 mt-3">
                    <?= $row->isi_berita ?>
                </div>
                <div class="col-lg-12">
                    <small><i><b> Dipublikasi : Bid. <?= admin_role($row->role_user_admin) . ' - ' . bulan_indo($row->created_berita) ?></b></i></small>
                </div>
            </div>
        </div>
    </div>
</div>