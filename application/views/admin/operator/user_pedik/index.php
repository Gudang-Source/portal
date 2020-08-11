<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Pengelolaan Akun Peserta Didik </b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>	
    <div class="col-lg-12" style="padding-top: 10px;">
    <a href="<?=site_url('admin/operator/user_pedik/insert')?>" class="btn btn-success btn-sm pull-right"><i class="icon-add"></i> Tambah </a>
            <div class="col-lg-12">
                <div class="table-responsive">
               
                    <table class="table table-striped table-hover" id="example">
                        <thead>
                            <tr class="border-double">
                                <th width="25%">Peserta Didik</th>
                                <th>Username</th>
                                <th>E-Mail</th>
                                <th>Akses Terakhir</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($row->result() as $key => $data) { ?>
                                    <tr>
                                        <td>
                                            <div class="media-left" title="<?=$data->nama_siswa?>">
                                                <img src="<?=base_url().'assets/uploads/pedik/'.($data->image_siswa == null ? 'default.jpg' : $data->image_siswa )?>" class="img-circle" alt="">
                                            </div>
                                            <div class="media-body" title="<?=$data->nama_siswa?>">
                                                <div class="media-heading text-semibold"><?=substr($data->nama_siswa,0,18)?></div>
                                                <span class="text-muted"><?=$data->nisn_siswa?></span>
                                            </div>
                                        </td>
                                        <td><?=$data->username_user?></td>
                                        <td><span title="<?=$data->email_user?>"><?=substr($data->email_user,0,25)?></span></td>
                                        <td>
                                            <?php 
                                                if (@get_login_pedik($data->id_user)->login_date) {
                                                   echo get_login_pedik($data->id_user)->login_date;
                                                }else{
                                                    echo "<i> belum pernah login </i>";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if(@get_login_pedik($data->id_user)->login_date != null && @get_login_pedik($data->id_user)->logout_date == null){ ?>
                                                <span style="color: green;"><i class="icon-circles"></i> <b> Online </b></span>
                                            <?php }else if(@get_login_pedik($data->id_user)->logout_date != null){ ?>
                                                <span style="color: red;"><i class="icon-circles"></i> <b> Offline </b></span>
                                            <?php }else { ?>
                                                <span style="color: red;"><i class="icon-circles"></i> <b> Offline </b></span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <ul class="icons-list">
                                                <li><a href="<?=site_url('admin/operator/user_pedik/update/'.$data->id_user)?>"><i class="icon-pencil7"></i></a></li>
                                                <li><a href="<?=site_url('admin/operator/user_pedik/delete/'.$data->id_user)?>" onclick="return confirm('Yakin menghapus data (<?=$data->nama_siswa?>)')"><i class="icon-trash"></i></a></li>
                                                <li><a href="<?=site_url('admin/operator/user_pedik/log_user/'.$data->id_user)?>" data-popup="tooltip" title="" data-container="body" data-original-title="Riwayat"><i class="icon-history"></i></a></li>
                                                <li><a href="<?=site_url('admin/operator/user_pedik/switch/'.$data->id_user)?>" data-popup="tooltip" title="" data-container="body" data-original-title="Status : <?=$data->status_user == 1 ? 'Aktif' : 'Non-Aktif'?>"  style="color: <?=$data->status_user == 1 ? 'green' : 'red'?>;"><i class="icon-switch"></i></a></li>
                                            </ul>
                                        </td>
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