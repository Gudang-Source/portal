<div class="row">
    <div class="col-lg-12">
        <div class="card card-prirary ">         
            <div class="card-body">
                    <div class="col-lg-12 row">
                        <div class="col-lg-6">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>
                                <span> Profil Peserta Didik </span>
                            </div>
                        </div>
                        <div class="col-6 ">
                            <ul class="nav float-right row">
                                <li class="nav-item" style="color:black">
                                    <a href="#profil" data-toggle="pill" class="nav-link pl-3 pt-0 " style="color:black; font-size: 14px">Biodata Peserta Didik</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#user" data-toggle="pill" class="nav-link pl-3 pt-0 " style="color:black; font-size: 14px">Profil Akun</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#password" data-toggle="pill" class="nav-link pl-3 pt-0" style="color:black; font-size: 14px">Ubah Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="tab-content">
                                <div class="tab-pane fade <?=@$_GET['c'] == null ? 'active show' : null ?>" id="profil">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table">
                                            <tr>
                                                <td width="20%">NISN </td>
                                                <td width="3%">:</td>
                                                <td><?=$row->nisn_siswa?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap </td>
                                                <td>:</td>
                                                <td><?=$row->nama_siswa?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir </td>
                                                <td>:</td>
                                                <td><?=$row->tempat_lahir_siswa?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir </td>
                                                <td>:</td>
                                                <td><?=bulan_indo($row->tanggal_lahir_siswa)?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin </td>
                                                <td>:</td>
                                                <td><?=$row->gender_siswa == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIK </td>
                                                <td>:</td>
                                                <td><?=$row->nik_siswa?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Ayah </td>
                                                <td>:</td>
                                                <td><?=$row->nama_ayah?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Ibu </td>
                                                <td>:</td>
                                                <td><?=$row->nama_ibu?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat </td>
                                                <td>:</td>
                                                <td><?=$row->alamat_siswa?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade  <?=@$_GET['c'] == 1 ? 'active show' : null ?>" id="user">
                                    <form action="<?=site_url('pelajar/user/proses')?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-lg-3"></div>
                                            <span for="inputEmail3" class="col-lg-1 col-form-label">
                                                Email
                                            </span>
                                            <div class="col-lg-4">
                                                <input type="hidden" name="id" value="<?=$row->id_user?>">
                                                <input type="email" name="p_email" class="form-control" id="inputEmail3" placeholder="Email" value="<?=$row->email_user?>" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-lg-3"></div>
                                            <span for="inputEmail3" class="col-lg-1 col-form-label">
                                                Username
                                            </span>
                                            <div class="col-lg-4">
                                                <input type="text" name="p_user" class="form-control" id="inputEmail3" placeholder="Username" value="<?=$row->username_user?>" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-lg-3"></div>
                                            <span for="inputEmail3" class="col-lg-1 col-form-label">
                                                Foto Profil
                                            </span>
                                            <div class="col-lg-4">
                                                <?php if($row->image_siswa != null){ ?>
                                                    <img src="<?=base_url().'assets/uploads/pedik/'.$row->image_siswa?>" width="150px" class="img-responsive">
                                                <?php } ?>
                                                <input type="file" name="image"  id="inputEmail3" class="pt-2" ><br>
                                                <span style="font-size:13px">File bertipe JPG/JPEG/PNG/GIF dan maksimal ukuran file: 2000 KB</span>
                                            </div>
                                            <div class="col-lg-4"></div>
                                        </div>
                                        <div class="col-lg-5">
                                            <button class="btn btn-success btn-sm mt-3 float-right" type="submit" name="user"><i class="fa fa-user"></i> Ubah Profile</button>
                                        </div>
                                    </form>              
                                </div>
                                <div class="tab-pane fade  <?=@$_GET['c'] == 2 ? 'active show' : null ?>" id="password">
                                    <form action="<?=site_url('pelajar/user/proses')?>" method="post">
                                        <div class="form-group row">
                                            <div class="col-lg-3"></div>
                                            <span for="inputEmail3" class="col-lg-2 col-form-label">
                                                Password Baru *
                                            </span>
                                            <div class="col-lg-4">
                                                <input type="hidden" name="id" value="<?=$row->id_user?>">
                                                <input type="password" name="pas_new" class="form-control" id="inputEmail3" placeholder="Password Baru" value="<?=$this->session->flashdata('pas')?>"  required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-lg-3"></div>
                                            <span for="inputEmail3" class="col-lg-2 col-form-label">
                                                Konfirmasi Password Baru *
                                            </span>
                                            <div class="col-lg-4">
                                                <input type="password" name="pas_new_conf" class="form-control" id="inputEmail3" placeholder="Konfirmasi Password Baru" value="<?=$this->session->flashdata('pas_conf')?>"  required>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <button class="btn btn-success btn-sm mt-3 float-right" name="pass" type="submit"><i class="fa fa-lock"></i> Ubah Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
 
</div>
