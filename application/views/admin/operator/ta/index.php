<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Pengelolaan Tahun Ajaran </b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>

<div class="panel-body row">
    <div class="col-lg-12" >
        <?php $this->view('admin/messages'); ?>	
        <a href="<?=site_url('admin/operator/tahun_ajaran/insert')?>" class="btn btn-success btn-sm pull-right"><i class="icon-plus-circle2"></i> Tambah  </a>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="example">
                <thead>
                    <th>#</th>
                    <th>Tahun Ajaran</th>
                    <th>Semester</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$data->tahun_ajaran?></td>
                            <td><?=$data->semester_ta?></td>
                            <td><?=bulan_indo($data->mulai_ta)?></td>
                            <td><?=bulan_indo($data->selesai_ta)?></td>
                            <td>
                                <ul class="icons-list">
                                    <li><a href="<?=site_url('admin/operator/tahun_ajaran/on_ta/'.$data->id_ta)?>" style="color: <?=$data->status_ta == 1 ? 'green' : 'red'?>;"><i class="icon-switch"></i></a></li>
                                </ul>
                            </td>
                            <td>
                                <ul class="icons-list">
                                    <li><a href="<?=site_url('admin/operator/tahun_ajaran/update/'.$data->id_ta)?>"><i class="icon-pencil7"></i></a></li>
                                    <li><a href="<?=site_url('admin/operator/tahun_ajaran/delete/'.$data->id_ta)?>" onclick="return confirm('Yakin menghapus data (<?=$data->tahun_ajaran.' - '.$data->semester_ta?>)')"><i class="icon-trash"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>