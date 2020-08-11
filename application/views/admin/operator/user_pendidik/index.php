<div class="panel-heading">
    <h4 class="panel-title"><b> Laman Pengelolaan Akun Tenaga Pendidik </b></h4>
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
        <span><i>Total <?= $row->num_rows() ?> Akun Tenaga Pendidik</i></span>
        <a href="<?= site_url('admin/operator/user_pendidik/insert') ?>" class="btn btn-success btn-sm pull-right"><i class="icon-add"></i> Tambah Pengelola </a>
    </div>
    <div class="col-lg-12" style="padding-top: 10px;">
        <div class="row">
            <?php foreach ($row->result() as $key => $data) { ?>
                <div class="col-lg-4">
                    <div class="panel panel-body">
                        <div class="media">
                            <div class="media-left">
                                <?php
                                if ($data->image_pendidik != null) {
                                    $img = base_url() . 'assets/uploads/pendidik/' . $data->image_pendidik;
                                } else {
                                    $img = base_url() . 'assets/uploads/pendidik/default.png';
                                }
                                ?>
                                <a href="<? $img ?>" data-popup="lightbox">
                                    <img src="<?= $img ?>" style="width: 70px; height: 70px;" class="img-circle" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <h6 class="media-heading"><?= substr($data->nama_pendidik, 0, 25) ?></h6>
                                <p class="text-muted">NIP. <?= $data->nip_pendidik ?></p>

                                <ul class="icons-list">
                                    <li><a href="<?= site_url('admin/operator/user_pendidik/update/' . $data->id_user) ?>" data-popup="tooltip" title="" data-container="body" data-original-title="Edit"><i class="icon-pencil5"></i></a></li>
                                    <li><a href="<?= site_url('admin/operator/user_pendidik/delete/' . $data->id_user) ?>" data-popup="tooltip" title="" data-container="body" data-original-title="Hapus"><i class="icon-trash"></i></a></li>
                                    <li><a href="<?= site_url('admin/operator/user_pendidik/log_user/' . $data->id_user) ?>" data-popup="tooltip" title="" data-container="body" data-original-title="Riwayat"><i class="icon-history"></i></a></li>
                                    <li><a href="<?= site_url('admin/operator/user_pendidik/switch/' . $data->id_user) ?>" data-popup="tooltip" title="" data-container="body" data-original-title="Status : <?= $data->status_user == 1 ? 'Aktif' : 'Non-Aktif' ?>" style="color: <?= $data->status_user == 1 ? 'green' : 'red' ?>;"><i class="icon-switch"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>