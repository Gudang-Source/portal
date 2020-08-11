<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Logo Sekolah</b></h4><small> (Max. 5MB, Format: JPG, JPEG, PNG, Bitmap) </small>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>
<link rel="stylesheet" href="<?=base_url()?>assets/admin/dev/style_drop.css">
<script src="<?=base_url()?>assets/admin/dev/app.js"></script>

<div class="panel-body">
	<?php $this->view('admin/messages'); ?>		
        <form action="<?=site_url('admin/operator/sekolah/logo_proses')?>" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="id" value="<?=$row->id_sekolah?>">
            <div class="row">
                <div class="col-lg-12 text-center" style="padding-bottom: 30px;">
                    <img src="<?=base_url().'assets/uploads/sekolah/'.$row->logo_sekolah?>" style="width: 200px;">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                </div>
                <div class="col-lg-12">
                    <div class="dropzone-wrapper">
                        <div class="dropzone-desc">
                            <i class="glyphicon glyphicon-download-alt"></i>
                            <p>Choose an image file or drag it here.</p>
                        </div>
                        <input type="file" name="image" class="dropzone"  id="fileku" required>
                    </div>
                    <p id="status"></p><span id="total"></span> 
            </div>
            <div class="row">
                <div class="col-lg-12" style="padding-top: 30px">
                    <span style="color: red;"><i>* Drag atau pilih file -> upload logo -> perbaharui </i></span>
                    <button type="submit" name="logo"  class="btn btn-primary pull-right">
                        Perbaharui <i class="icon-arrow-right6 "></i>
                    </button>
                    <button type="button" onclick="uploadFile()" class="btn btn-warning pull-right" style="margin-right: 10px;">
                        Upload Logo <i class="icon-upload"></i>
                    </button>
                </div>
            </div>
        </form> 
</div>