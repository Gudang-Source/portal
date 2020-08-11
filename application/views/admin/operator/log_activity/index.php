<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Aktivitas Pengguna</b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>
<?php $this->view('admin/messages'); ?>	
<div class="panel-body row">
    <div class="col-lg-7">
        <span style="color:red"><i> * Log Akan direset Otomatis Tiap Bulannya</i></span>
    </div>
    <div class="col-lg-5">
        <div class="tabbable">
            <ul class="nav nav-tabs nav-tabs-bottom bottom-divided nav-justified">
                <li class="<?=@$c == 'a' ? 'active' : null ?>"><a href="<?=site_url('admin/operator/log_aktivitas/log/a')?>" aria-expanded="true">Pengelola</a></li>
                <li class="<?=@$c == 'b' ? 'active' : null ?>"><a href="<?=site_url('admin/operator/log_aktivitas/log/b')?>" aria-expanded="false">Tenaga Pendidik</a></li>
                <li class="<?=@$c == 'c' ? 'active' : null ?>"><a href="<?=site_url('admin/operator/log_aktivitas/log/c')?>" aria-expanded="false">Peserta Didik</a></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-12 mt-10">
            <div class="tab-content">
                <div class="tab-pane <?=@$c == 'a' ? 'active' : (@$c == 'b' ? 'active' : 'active') ?>" >
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="example">
                            <thead>
                                <tr class="border-double">
                                    <th>#</th>
                                    <th>Identitas</th>
                                    <th>Username</th>
                                    <th>Browser</th>
                                    <th>Sistem Operasi</th>
                                    <th>Alamat IP</th>
                                    <th>Login</th>
                                    <th>Logout</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td><?=$key+1?></td>
                                            <?php
                                                if($c == 'a'){ ?>
                                                    <td><?='bid. '.admin_role($data->role_user_admin)?></td>
                                                    <td><?=$data->username_user_admin?></td>
                                                <?php
                                                }else if($c == 'b'){ ?>
                                                    <td><?=$data->nip_pendidik?></td>
                                                    <td><?=$data->username_user?></td>
                                                <?php
                                                }else  if($c == 'c'){ ?>
                                                    <td><?=$data->nisn_siswa?></td>
                                                    <td><?=$data->username_user?></td>
                                                <?php
                                                }
                                            ?>
                                            <td><?=$data->browser_user?></td>
                                            <td><?=$data->os_user?></td>
                                            <td><?=$data->ip_user?></td>
                                            <td><?=$data->login_date?></td>
                                            <td><?=$data->logout_date?></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

               
            </div>
    </div>
</div>