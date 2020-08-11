<div class="col-lg-12">
        <div class="card card-prirary ">         
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h4><?=strtoupper($row->judul_berita)?></h4>
                        <small>Dipublikasi oleh : Bidang <?=admin_role($row->role_user_admin).' - '.bulan_indo($row->created_berita)?></small>
                        <hr width="50%">
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10 mt-3">
                        <?=$row->isi_berita?>
                    </div>
                    <div class="col-lg-12 text-center m-3">
                        <?php if($row->image_berita != null){?>
                                <img src="<?=base_url().'assets/uploads/pengumuman/'.$row->image_berita?>" alt="">
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>