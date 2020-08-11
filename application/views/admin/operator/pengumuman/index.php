<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Pengelolaan Pengumuman </b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>

<div class="panel-body row">
    <div class="col-lg-12 row" >
        <?php $this->view('admin/messages'); ?>
        <div class="col-lg-12">
        <a href="<?=site_url('admin/operator/pengumuman/insert')?>" class="btn btn-success btn-xs pull-right"><i class="icon-plus-circle2"></i> Tambah </a>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="example">
                <thead>
                    <tr class="border-double">
                        <th>#</th>
                        <th>Pengelolaan</th>
                        <th>Judul Pengumuman</th>
                        <th>Isi Pengumuman</th>
                        <th>Image Pengumuman</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$data->nama_depan_user_admin.' - bid. '.admin_role($data->role_user_admin)?></td>
                                <td><?=$data->judul_berita?></td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#modal_isi" style="color:black">
                                        <?=substr($data->isi_berita,0,200).' ... '?>
                                    </a>
                                    <div id="modal_isi" class="modal fade" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                                    <h5 class="modal-title">Isi Pengumuman</h5>
                                                </div>

                                                <div class="modal-body">
                                                    <p><?=$data->isi_berita?></p>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="media-left media-middle">
                                        <a href="<?=base_url().'assets/uploads/pengumuman/'.($data->image_berita == null ? 'placeholder.jpg' : $data->image_berita)?>" target="_blank">
                                            <img src="<?=base_url().'assets/uploads/pengumuman/'.($data->image_berita == null ? 'placeholder.jpg' : $data->image_berita)?>" class="img-circle" style="width: 50px; height: 50px">
                                        </a>
                                    </div>    
                                </td>
                                <td>
                                    <ul class="icons-list">
                                        <?php if($data->id_user_admin == $this->session->userdata('userid')){ ?>
                                            <li><a href="<?=site_url('admin/operator/pengumuman/update/'.$data->id_berita)?>"><i class="icon-pencil7"></i></a></li>
                                        <?php } ?>
                                        <li><a href="<?=site_url('admin/operator/pengumuman/delete/'.$data->id_berita)?>" onclick="return confirm('Yakin menghapus data (<?=$data->judul_berita?>)')"><i class="icon-trash"></i></a></li>
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