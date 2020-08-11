<center>
    <div class="col-lg-10 card" ></div>
    <div class="col-lg-10 card" >
        <div class="card-head" >
            <h2 class="mt-5"><b> Profil <?=$row->nama_sekolah?> </b></h2>
            <hr style="width: 60%">
        </div>
        <div>
        <div class="col-lg-6 mt-4">
            <img src="<?=base_url()?>assets/uploads/sekolah/<?=$row->logo_sekolah?>" style="width: 300px">
        </div>
        <center>
        <div class="col-lg-10 text-left">
            <div class="card-body table-responsive mt-2 mb-2">
                <table class="table table-condensed">
                    <tbody>
                        <tr><td>Nama Sekolah</td><td> : </td><td> <?=$row->nama_sekolah?></td></tr>
                        <tr><td>NPSN Sekolah</td><td> : </td><td> <?=$row->npsn_sekolah?></td></tr>
                        <tr><td>Kepala Sekolah</td><td> : </td><td> <?=$row->kepala_sekolah?></td></tr>
                        <tr><td>Bentuk Pendidikan</td><td> : </td><td> <?=$row->bentuk_pendidikan?></td></tr>
                        <tr><td>Akreditasi Sekolah</td><td> : </td><td> <b><?=$row->akreditasi_sekolah?> </b></td></tr>
                        <tr><td>Alamat Sekolah</td><td> : </td><td> <?=$row->alamat_sekolah?></td></tr>
                        <tr><td>Status Sekolah</td><td> : </td><td> <?=$row->status_sekolah?></td></tr>
                        <tr><td>Status Kepemilikan</td><td> : </td><td> <?=$row->status_kepemilikan?></td></tr>
                        <tr><td>SK Pendirian</td><td> : </td><td> <?=$row->sk_pendirian?></td></tr>
                        <tr><td>SK Operasional</td><td> : </td><td> <?=$row->sk_operasional?></td></tr>
                        <tr><td>Waktu Operasional</td><td> : </td><td> <?=$row->waktu_penyelenggaraan?></td></tr>
                        <tr><td>Tahun Ajaran Sekolah</td><td> : </td><td> <?=$row->ta_sekolah?></td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        </center>
    </div>
</center>
