<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Pengelolaan Thumbnail </b></h4>
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
        <form action="<?=site_url('admin/operator/thumbnail/proses')?>" method="post">
            <div class="col-lg-12">
                <div class="form-group">
                    <label> Author Thumbnail</label><small> <i> (diisi otomatis oleh sistem) </i></small>
                    <input type="hidden" name="id" value="<?=pengumuman_landing()->row()->id_informasi?>">
                    <input type="text" name="i_author" class="form-control" value="<?='Bidang '.admin_role($this->session->userdata('level'))?>" readonly>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label> Judul Thumbnail *</label>
                    <input type="text" name="i_judul" class="form-control" value="<?=pengumuman_landing()->row()->judul_informasi?>">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label> Isi Thumbnail *</label>
                    <textarea name="i_isi" id="editor1" rows="10" cols="80" class="form-control" required><?=pengumuman_landing()->row()->isi_informasi?></textarea>
                    <script>
                        CKEDITOR.replace( 'editor1' );
                    </script>
                </div>
            </div>
            <div class="col-lg-12">
                <button type="submit" name="up_thumbnail" class="btn btn-success" style="width: 100%"> Perbaharui Thumbail </button>
            </div>
        </form>	
    </div>
</div>