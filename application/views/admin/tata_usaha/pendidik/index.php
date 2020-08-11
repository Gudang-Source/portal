<div class="panel-heading">
    <h4 class="panel-title"><b> Laman Daftar Tenaga Pendidik </b></h4>
    <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
        </ul>
    </div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>
    <div class="col-lg-12 row">
        <a href="<?= site_url('admin/tata_usaha/pendidik/insert') ?>" class="btn btn-success btn-xs pull-right"><i class="icon-plus-circle2"></i> Tambah </a>
    </div>
    <div class="col-lg-12 mt-15">
        <div class="row">
            <?php foreach ($row->result() as $key => $data) { ?>
                <div class="col-lg-4">
                    <div class="panel panel-body">
                        <div class="media">
                            <div class="media-left">
                                <a href="<?= base_url() . 'assets/uploads/pendidik/' . ($data->image_pendidik == '' ? 'default.png' : $data->image_pendidik) ?>" data-popup="lightbox" target="_blank">
                                    <img src="<?= base_url() . 'assets/uploads/pendidik/' . ($data->image_pendidik == '' ? 'default.png' : $data->image_pendidik) ?>" style="width: 70px; height: 70px;" class="img-circle" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <h6 class="media-heading"><?= substr($data->nama_pendidik, 0, 25) ?></h6>
                                <p class="text-muted"><?= $data->nip_pendidik ?></p>

                                <ul class="icons-list">
                                    <li><a href="<?= site_url('admin/tata_usaha/pendidik/update/' . $data->id_pendidik) ?>" data-popup="tooltip" title="" data-container="body" data-original-title="Update"><i class="icon-pencil7"></i></a></li>
                                    <li><a href="<?= site_url('admin/tata_usaha/pendidik/delete/' . $data->id_pendidik) ?>" onclick="return confirm('Yakin menghapus data (<?= $data->nama_pendidik ?>)')" data-popup="tooltip" title="" data-container="body" data-original-title="Hapus"><i class="icon-trash"></i></a></li>
                                    <li><a data-popup="tooltip" title="" data-container="body" data-original-title="Info"><i class="icon-info22" data-toggle="modal" data-target="#modal_default<?= $key ?>"></i></a></li>
                                    <li><a href="<?= site_url('admin/tata_usaha/pendidik/member_card/' . $data->id_pendidik) ?>" data-popup="tooltip" title="" data-container="body" data-original-title="Card"><i class="icon-vcard"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="modal_default<?= $key ?>" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Informasi Lengkap Tenaga Pendidik</h5>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <td>NIP Pendidik</td>
                                        <td> : </td>
                                        <td><?= $data->nip_pendidik ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pendidik</td>
                                        <td> : </td>
                                        <td><?= $data->nama_pendidik ?></td>
                                    </tr>
                                    <tr>
                                        <td>TTL Pendidik</td>
                                        <td> : </td>
                                        <td><?= $data->tempat_lahir_pendidik . ', ' . date('d M Y', strtotime($data->tanggal_lahir_pendidik)) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td> : </td>
                                        <td><?= $data->gender_pendidik == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pendidikan Terakhir</td>
                                        <td> : </td>
                                        <td><?= $data->pendidikan_terakhir ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Pendidik</td>
                                        <td> : </td>
                                        <td><?= $data->alamat_pendidik ?></td>
                                    </tr>
                                    <tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-link" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    function notif() {
        Swal.fire(
            'Oops...!',
            'Kartu Pelajar tidak dapat dicetak karena status siswa Keluar',
            'error'
        )
    }
</script>