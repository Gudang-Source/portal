<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Struktural Sekolah </b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>

<div class="panel-body row">
    <div class="col-lg-12" style="margin-bottom: 20px;">
        <a href="<?=site_url('admin/operator/struktur/insert')?>" class="btn btn-success btn-sm pull-right"><i class="icon-pen-plus"></i> Tambah Struktural </a>
    </div>
    <?php $this->view('admin/messages'); ?>	
    <?php 
        foreach ($row->result() as $key => $data) { ?>
            <div class="col-lg-3 col-md-6">
                <div class="thumbnail">
                    <div class="thumb thumb-rounded">
                        <img src="<?=base_url()?>assets/uploads/struktur/<?=$data->image_pejabat == null ? 'default.png' : $data->image_pejabat ?>" alt="" style="height:160px">
                        <div class="caption-overflow">
                            <span>
                                <a href="<?=site_url('admin/operator/struktur/update/'.$data->id_struktur)?>" class="btn bg-success-400 btn-icon btn-xs"  data-popup="tooltip" data-original-title="Update Profil"><i class="icon-grid6"></i></a>
                                <a href="<?=site_url('admin/operator/struktur/delete/'.$data->id_struktur)?>" class="btn bg-success-400 btn-icon btn-xs"  data-popup="tooltip" data-original-title="Hapus Profil"><i class="icon-link"></i></a>
                                <a href="#" class="btn bg-success-400 btn-icon btn-xs"   data-popup="tooltip" data-original-title="Info Profil" data-toggle="modal" data-target="#modal_default<?=$key?>">
                                    <i class="icon-info22"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div id="modal_default<?=$key?>" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Detail Profil Struktur</h5>
                                </div>

                                <div class="modal-body">
                                    <div class="table-responsive pre-scrollable">
                                        <table class="table">
                                            <tr><td>Jabatan Struktural</td><td> : </td><td><?=$data->jabatan_struktur?></td></tr>
                                            <tr><td>NIP Pejabat</td><td> : </td><td><?=$data->nip_pejabat?></td></tr>
                                            <tr><td>Nama Pejabat</td><td> : </td><td><?=$data->nama_pejabat?></td></tr>
                                            <tr><td>Masa Jabatan</td><td> : </td><td><?=date('d M Y',strtotime($data->batas_jabatan))?></td></tr>
                                            <tr><td>Registrasi</td><td> : </td><td><?=date('d M Y',strtotime($data->created_jabatan))?></td></tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="caption text-center">
                        <h6 class="text-semibold no-margin"><?=$data->nama_pejabat?> <small class="display-block"> <?=$data->jabatan_struktur?></small></h6>
                        <ul class="icons-list mt-15">
                            <li><a href="#" data-popup="tooltip" title="" data-container="body" data-original-title="Chat DM"><i class="icon-bubbles4"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
    <?php }
    ?>
    
</div>
