<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Daftar Peserta Didik</b></h4>
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
        <a href="<?=site_url('admin/tata_usaha/pedik/reset_kelas')?>" onclick="return confirm('Yakin Reset Kelas Peserta Didik ?')" class="btn btn-danger btn-xs pull-right ml-10"><i class="icon-cancel-square"></i> Reset Kelas </a>
        <a href="#" onclick="return alert('Fitur Dimatikan Sementara !')" class="btn btn-info btn-xs pull-right ml-10"><i class="icon-import"></i> Import </a>
        <a href="" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#modal_default"><i class="icon-plus-circle2"></i> Tambah </a>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="example">
                <thead>
                    <tr class="border-double">
                        <th>#</th>
                        <th>NISN Peserta</th>
                        <th>Nama Peserta</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas Siswa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr id="<?=$no++?>">
                                <td><?=$key+1?></td>
                                <td><?=$data->nisn_siswa?></td>
                                <td><?=$data->nama_siswa?></td>
                                <td><?=$data->tempat_lahir_siswa.', '.$data->tanggal_lahir_siswa?></td>
                                <td><?=$data->gender_siswa == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                <td>
                                    <?php
                                        if(cek_kelas($data->id_kelas) == 'Belum ada'){ ?>
                                            <a href="" data-toggle="modal" data-target="#modal_default<?=$no?>">Belum ada</a>
                                        <?php
                                        }else{ ?>
                                            <a href="" data-toggle="modal" data-target="#modal_default<?=$no?>"><?=cek_kelas($data->id_kelas)?></a>
                                        <?php
                                        }
                                    ?>
                                   <div id="modal_default<?=$no?>" class="modal fade">
                                        <div class="modal-dialog">
                                            <form action="<?=site_url('admin/tata_usaha/pedik/set_kelas')?>" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">Tentukan Kelasnya ?</h5>
                                                    </div>

                                                    <div class="modal-body">
                                                        <label> Silahkan tentukan kelas <b><?=$data->nama_siswa?></b></label>
                                                        <input type="hidden" name="id_siswa" value="<?=$data->id_siswa?>">
                                                        <select name="kelas" class="form-control">
                                                            <option value="">- tidak ada Kelas -</option>
                                                            <?php 
                                                                foreach (get_kelas()->result() as $key => $val) { 
                                                                    $kouta = $val->kapasitas_kelas - cek_peserta_kelas($val->id_kelas);
                                                                    ?>
                                                                    <option value="<?=$val->id_kelas?>" <?=$data->id_kelas == $val->id_kelas ? 'selected' : null ?> <?=$kouta < 1 ? 'disabled' : null ?>><?=$val->tingkat_kelas.' '.$val->jurusan_kelas.' '.$val->nama_kelas.' (Sisa '.$kouta.' Orang)' ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link" data-dismiss="modal"> Batal </button>
                                                        <button type="submit" name="choice" class="btn btn-primary"> Tentukan </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <ul class="icons-list">
                                        <li><a href="<?=site_url('admin/tata_usaha/pedik/update/'.$data->id_siswa)?>"><i class="icon-pencil7"></i></a></li>
                                        <li><a href="<?=site_url('admin/tata_usaha/pedik/delete/'.$data->id_siswa)?>" onclick="return confirm('Yakin menghapus data (<?=$data->nama_siswa?>)')"><i class="icon-trash"></i></a></li>
                                        <?php if($data->status_siswa == 1 || $data->status_siswa == 2){?>
                                            <li><a href="<?=site_url('admin/tata_usaha/pedik/member_card/'.$data->id_siswa)?>"><i class="icon-vcard"></i></a></li>
                                        <?php }else{ ?>
                                            <li><a onclick="return notif()"><i class="icon-vcard" style="color: red;"></i></a></li>
                                        <?php } ?>
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

<div id="modal_default" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=site_url('admin/tata_usaha/pedik/insert')?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Ingin Menambahkan berapa Peserta didik ?, Tuliskan disini</h5>
                </div>
                <div class="modal-body">
                    <h6 class="text-semibold">Banyak Peserta : </h6>
                    <input type="number" name="n_pedik" class="form-control" autofocus>
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> Kirim </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function notif(){
        Swal.fire(
            'Oops...!',
            'Kartu Pelajar tidak dapat dicetak karena status siswa Keluar',
            'error'
        )
    }
</script>


