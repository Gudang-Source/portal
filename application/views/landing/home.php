<div class="row">
    <div class="col-lg-9 pt-2">
        <div class="card ">
            <div class="card-body">
                <h4 style="color: #218c74"><b><i class="fa fa-bookmark"></i> PENGUMUMAN </b></h4>
                <div class="card card-body" style="background-color: #f1f4f7;">
                    <p><?= pengumuman_landing()->row()->isi_informasi ?></p>
                    <span class="mt-2"><i> <small><?= pengumuman_landing()->row()->updated_informasi == null ? 'Dipublikasi ' : 'Disunting ' ?> : <?= pengumuman_landing()->row()->author_informasi . ' - ' . (pengumuman_landing()->row()->updated_informasi == null ? date('d/m/Y', strtotime(pengumuman_landing()->row()->created_informasi)) : date('d/m/Y', pengumuman_landing()->row()->updated_informasi)) . ' ' ?> </small></i></span>
                </div>
                <hr>
                <h5 style="color: #218c74"><b><i class="fa fa-newspaper"></i> INFORMASI DAN BERITA </b></h5>
                <div class="row mt-3">
                    <?php foreach (get_berita(3)->result() as $key => $data) {  ?>
                        <!-- <div class="col-lg-4">
                            <div class="card card-body" style="overflow: hidden;">
                                <div class="col-lg-12">
                                    <p><b><?= $data->judul_berita ?>
                                            <span class="badge badge-secondary float-right"></b></p>
                                    <hr>
                                </div>
                                <div class="col-lg-12">
                                    <?= substr($data->isi_berita, 0, 240) . '...' ?>
                                </div>
                                <div class="col-lg-12">
                                    <a href="" class="btn btn-info btn-sm mt-2"><i class="fa fa-plus"></i> Lihat Lebih </a>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-sm-4">
                            <div class="card">
                                <p class="card-header"><b> <i class="<?= icon_berita($data->role_user_admin) ?>"></i> Info <?= jenis_berita($data->role_user_admin) ?></b>
                                    <small class="badge badge-primary float-right"><?= date('d/m', strtotime($data->created_berita)) ?></small></p>
                                <div class="card-body">
                                    <small class="card-title" style="font-size:12px"><b><?= $data->judul_berita ?></b></small><br>
                                    <small> <?= substr($data->isi_berita, 100, 240) ?> </small><br>
                                    <form action="<?= site_url('id/info') ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $data->id_berita ?>">
                                        <button type="submit" name="more" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Lihat Lebih </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 pt-2">
        <div class="card">
            <div class="card-header" style="height:44px">
                <h6 style="color: #218c74"><b><i class="fa fa-users"></i> LOGIN PORTAL </b></h6>
            </div>
            <div class="card-body">
                <?php $this->view('admin/messages'); ?>
                <form action="<?= site_url('auth/process') ?>" method="post">
                    <div class="form-group">
                        <span style="color:red; font-size: 12px"><i><?= $this->session->flashdata('aktivasi'); ?></i></span>
                        <span style="color:red; font-size: 12px"><i><?= $this->session->flashdata('username'); ?></i></span>
                        <input type="text" name="username" class="form-control <?= $this->session->flashdata('username') != null ? 'is-invalid' : null ?> <?= $this->session->flashdata('aktivasi') != null ? 'is-warning' : null ?>" value="<?= $this->session->flashdata('u-ser') ?>" placeholder="Username" required autofocus>
                    </div>
                    <div class="form-group">
                        <span style="color:red; font-size: 12px"><i><?= $this->session->flashdata('password'); ?></i></span>
                        <input type="password" name="password" class="form-control <?= $this->session->flashdata('password') != null ? 'is-invalid' : null ?>  <?= $this->session->flashdata('aktivasi') != null ? 'is-warning' : null ?>" value="<?= $this->session->flashdata('u-pas') ?>" placeholder="Password" id="pass" required>
                        <span id="mybutton" onclick="change()"><i class="fa fa-eye-slash"></i>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <a href="<?= site_url('auth/forgot') ?>"> Lupa Password ?</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary float-right" style="width:70%"> Login <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <h4 class="pt-1">Punya Akun ?</h4>
                <p> Silahakan Klik<a href="<?= site_url('auth/register') ?>"><b> Link Ini </b></a> Untuk Mendaftar</p>
                <h4 class="pt-1">Belum Aktivasi Akun ?</h4>
                <p> Klik <a href="<?= site_url('auth/register') ?>"><b> Link Ini </b></a> Untuk Aktivasi Ulang</p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function change() {
        var x = document.getElementById('pass').type;

        if (x == 'password') {
            document.getElementById('pass').type = 'text';
            document.getElementById('mybutton').innerHTML = '<i class="fa fa-eye"></i>';
        } else {
            document.getElementById('pass').type = 'password';
            document.getElementById('mybutton').innerHTML = '<i class="fa fa-eye-slash"></i>';
        }
    }

    function close_window() {
        if (confirm("Close Window?")) {
            close();
        }
    }
</script>