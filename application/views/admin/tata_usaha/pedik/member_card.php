<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Kartu Pelajar </b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>
<style>
    td{
        height: 30px;
    }
</style>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>	
    <div class="container">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 col-md-6">
            <center>
                <small>[ <?=$row->nisn_siswa.'-'.$row->nama_siswa?> ]</small>
                <a href="<?php #site_url('admin/tata_usaha/pedik/generate_barcode/'.$row->id_siswa)?>"><i class="icon-barcode2"></i></a>
            </center>
            <div class="thumbnail">
                <div class="thumb text-center" style="background-color: #2c3e50; padding:5px">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2">
                            <img src="<?=base_url().'assets/uploads/sekolah/'.profil()->logo_sekolah?>" class="pull-right" style="width:70px;">
                        </div>
                        <div class="col-lg-8">
                            <span style="font-size: 17px; color: #FFFFFF">
                                <?=strtoupper(profil()->instansi_pemerintah)?>
                            </span>
                            <br>
                            <span style="font-size: 20px;color:#f9ca24 ;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                                <strong><?=strtoupper(profil()->nama_sekolah)?></strong>
                            </span>
                            <br>
                            <span style="font-size: 10px; color: #FFFFFF">
                                <small><?=profil()->alamat_sekolah?></small>
                            </span>
                        </div>
                    </div>
                </div>
            
                <div class="" style="background-color: #ecf0f1;">
                    <div class="col-lg-12 text-center m-10">
                        <span style="font-size: medium; font-family:Arial, Helvetica, sans-serif" class="text-center">
                            <u><b> KARTU PELAJAR </b></u>
                        </span>                   
                    </div>
                    <table border="0" style="width: 100%; margin-top: 10px; ">
                        <tr>
                            <td width="25%" rowspan="4" class="text-center">
                                <img src="<?=base_url().'assets/uploads/siswa/'.($row->image_siswa == '' ? 'default.png' : $row->image_siswa)?>" style="max-width:90px;">
                            </td>
                            <td width="25%">NISN Peserta</td>
                            <td width="3%"> : </td>
                            <td><?=$row->nisn_siswa?></td>
                        </tr>
                        <tr>
                            <td>Nama Peserta</td>
                            <td> : </td>
                            <td><?=$row->nama_siswa?></td>
                        </tr>
                        <tr>
                            <td>Tempat/Tanggal lahir</td>
                            <td> : </td>
                            <td><?=$row->tempat_lahir_siswa.', '.date('d M Y',strtotime($row->tanggal_lahir_siswa))?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin Peserta</td>
                            <td> : </td>
                            <td><?=$row->gender_siswa == 'L' ? 'Laki-laki' : 'Perempuan'?></td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="3">Barcode</td>
                            <td class="text-center">
                                <b><?=profil()->kab_sekolah.', '.date('d M Y')?></b><br>
                                <b>Kepala Sekolah</b><br><br><br>
                                <b> <?=profil()->kepala_sekolah?> </b>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <a href="" class="btn btn-info btn sm" onclick="print()"><i class="icon-printer"></i></a>
        </div>
    </div>
</div>