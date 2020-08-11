<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Pengelolaan Administrator </b></h4>
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
        <span><i>Total <?=$row->num_rows()?> Akun Pengelola</i></span>
        <a href="<?=site_url('admin/operator/user_admin/insert')?>" class="btn btn-success btn-sm pull-right"><i class="icon-add"></i> Tambah Pengelola </a>
    </div>	
    <div class="col-lg-12" style="padding-top: 10px;">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <?php foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td>
                                <div class="media-left media-middle">
                                        <a href="#">
                                            <img src="<?=base_url().'assets/uploads/admin/'.$data->image_user_admin?>" class="img-circle" alt="">
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        <div class="media-heading text-semibold"><?=$data->nama_depan_user_admin.' '.$data->nama_belakang_user_admin?></div>
                                        <span class="text-muted"> Bidang <?=admin_role($data->role_user_admin)?> </span>
                                    </div>
                                </div>
                            </td>
                            <td width="30%">
                                <a href="" style="color: black;"><i class="icon- icon-bubbles2"></i> </a> <?=' '.$data->email_user_admin?>
                            </td>
                            <td width="15%">
                                <ul class="icons-list">
                                    <li><a href="<?=site_url('admin/operator/user_admin/update/'.$data->id_user_admin)?>"><i class="icon-pencil7"></i></a></li>
                                    <li><a href="<?=site_url('admin/operator/user_admin/delete/'.$data->id_user_admin)?>"><i class="icon-trash"></i></a></li>
                                    <li><a href="<?=site_url('admin/user/log_user/'.$data->id_user_admin)?>"><i class="icon-history"></i></a></li>
                                    <li><a href="<?=$data->id_user_admin == $this->session->userdata('userid') ? '#' : site_url('admin/operator/user_admin/switch/'.$data->id_user_admin)?>" style="color: <?=$data->status_user_admin == 1 ? 'green' : 'red'?>;"><i class="icon-switch"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>      
    </div>
</div>