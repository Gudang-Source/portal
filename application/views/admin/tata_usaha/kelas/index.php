<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Daftar Kelas</b></h4>
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
        <a href="<?=site_url('admin/tata_usaha/kelas/insert')?>" class="btn btn-success btn-xs pull-right"><i class="icon-plus-circle2"></i> Tambah </a>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="example">
                <thead>
                    <tr class="border-double">
                        <th>#</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan Kelas</th>
                        <th>Kapasitas dan Status</th>
                        <th>Wali Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$data->tingkat_kelas.' '.$data->jurusan_kelas.' '.$data->nama_kelas?></td>
                                <td><?=jurusan($data->jurusan_kelas)?></td>
                                <td><?=$data->kapasitas_kelas.' Orang'?> / (<?=count_pedik($data->id_kelas)->num_rows() >= $data->kapasitas_kelas ? 'Penuh' : 'Tersedia'?>)</td>
                                <td><?=$data->nama_pendidik?></td>
                                <td>
                                    <ul class="icons-list">
                                        <li><a href="<?=site_url('admin/tata_usaha/kelas/update/'.$data->id_kelas)?>"><i class="icon-pencil7"></i></a></li>
                                        <li><a href="<?=site_url('admin/tata_usaha/kelas/delete/'.$data->id_kelas)?>" onclick="return confirm('Yakin menghapus data (<?=$data->tingkat_kelas.' '.$data->jurusan_kelas.' '.$data->nama_kelas?>)')"><i class="icon-trash"></i></a></li>
                                            <?php if(count_pedik($data->id_kelas)->num_rows() > 0){?>
                                                <li><a href="" style="color: green;" data-toggle="modal" data-target="#modal_default<?=$key?>"><i class="icon-users"></i></a></li>
                                            <?php }else{ ?>
                                                <li><a onclick="return notif()" style="color: red;"><i class="icon-users"></i> </a></li>
                                            <?php } ?>
                                    </ul>
                                    <div id="modal_default<?=$key?>" class="modal fade">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <?php $class = get_peserta($data->id_kelas)->row(); ?>
                                                    <h5 class="modal-title">Daftar Peserta Didik <?=$class->tingkat_kelas.' '.$class->jurusan_kelas.' '.$class->nama_kelas?></h5>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="col-lg-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-hover" id="example">
                                                                <thead>
                                                                    <tr class="border-double">
                                                                        <th>#</th>
                                                                        <th>NISN Peserta</th>
                                                                        <th>Nama Peserta</th>
                                                                        <th>Tempat, Tanggal Lahir</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        foreach (get_peserta($data->id_kelas)->result() as $key => $row) { ?>
                                                                            <tr>
                                                                                <td><?=$key+1?></td>
                                                                                <td><?=$row->nisn_siswa?></td>
                                                                                <td><?=$row->nama_siswa?></td>
                                                                                <td><?=$row->tempat_lahir_siswa.', '.$row->tanggal_lahir_siswa?></td>
                                                                            </tr>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" onclick="print()"> <i class="icon-printer"></i> Cetak </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

<script>
    function notif(){
        Swal.fire(
            'Oops...!',
            'Daftar tidak tersedia',
            'error'
        )
    }
</script>






