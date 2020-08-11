<div class="panel-heading">
	<h4 class="panel-title"><b> Laman <?=ucfirst($this->uri->segment(4))?> Pengumuman </b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>
    <?=form_open_multipart('admin/operator/pengumuman/proses')?>
        <div class="row mt-10">
            <div class="col-lg-12 ">
                <div class="form-group">
                    <label class="control-label col-lg-2"><b> Judul Pengumuman *</b></label>
                    <div class="col-lg-10">
                        <input type="hidden" name="id" value="<?=@$row->id_berita?>">
                        <input type="text" name="p_judul" class="form-control" value="<?=@$row->judul_berita?>" required>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-10">
                <div class="form-group">
                    <label class="control-label col-lg-2"><b> Isi Pengumuman *</b></label>
                    <div class="col-lg-10">
                    <textarea name="p_isi" id="editor1" rows="10" cols="80" class="form-control" required><?=@$row->isi_berita?></textarea>
                        <script>
                            CKEDITOR.replace( 'editor1' );
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-10">
                <div class="form-group">
                    <label class="control-label col-lg-2"><b> Foto/Gambar/Brosur/Banner Pengumuman </b></label>
                    <div class="col-lg-10">
                        <?php if(@$row->image_berita != null){?>
                            <img src="<?=base_url().'assets/uploads/pengumuman/'.$row->image_berita?>" class="mb-10">
                        <?php } ?>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-10">
                <button type="submit" name="<?=$this->uri->segment(4)?>" class="btn bg-teal-400" style="width: 100%;"><?=$this->uri->segment(4) == 'insert' ? 'Tambahkan' : 'Perbaharui' ?> Pengumuman <i class="icon-circle-right2"></i></button>
            </div>
        </div>
    <?=form_close()?>	
</div>