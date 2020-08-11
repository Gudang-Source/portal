<div class="panel-heading">
	<h4 class="panel-title"><b> Laman <?=$page == 'insert' ? 'Tambah' : 'Update'?> Struktural Sekolah </b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>

<div class="panel-body row">
    <div class="col-lg-12" style="margin-bottom: 30px;">
        <a href="<?=site_url('admin/operator/struktur')?>" class="btn btn-warning btn-sm"><i class="icon-circle-left2"></i> Struktural </a>
    </div>
    <?=form_open_multipart('admin/operator/struktur/proses')?>
    <div class="row">
        <div class="col-lg-12 pt-15">
            <div class="form-group">
                <label class="col-lg-3 control-label">Jabatan Struktural *</label>
                <div class="col-lg-9">
                    <input type="hidden" name="id" value="<?=$row->id_struktur?>">
                    <input type="text" name="s_jabatan" class="form-control" placeholder="Wk. Kurikulum" value="<?=$row->jabatan_struktur?>" required>
                </div>
            </div>
        </div>
        <div class="col-lg-12 pt-15">
            <div class="form-group">
                <label class="col-lg-3 control-label">NIP Pejabat Struktural *</label>
                <div class="col-lg-9">
                    <input type="text" name="s_nip" class="form-control" value="<?=$row->nip_pejabat?>" placeholder="ex. 12341527111155561120" required>
                </div>
            </div>
        </div>
        <div class="col-lg-12 pt-15">
            <div class="form-group">
                <label class="col-lg-3 control-label">Nama Pejabat Struktural  *</label>
                <div class="col-lg-9">
                    <input type="text" name="s_name" class="form-control" value="<?=$row->nama_pejabat?>" placeholder="ex. muh sabbnin M.pd" required>
                </div>
            </div>
        </div>
        <div class="col-lg-12 pt-15">
            <div class="form-group">
                <label class="col-lg-3 control-label">Masa Jabatan Struktural *</label>
                <div class="col-lg-9">
                    <input type="date" name="s_masajabat" id="" value="<?=$row->batas_jabatan?>" class="form-control" required>
                </div>
            </div>
        </div>    
        <div class="col-lg-12 pt-15">
            <div class="form-group">
                <label class="col-lg-3 control-label">Tingkat Prioritas Struktural *</label>
                <div class="col-lg-9">
                    <input type="number" name="s_prioritas" id="" value="<?=$row->tingkat_prioritas?>" class="form-control" placeholder="ex 1 or 2 or 3 or n" required>
                </div>
            </div>
        </div>    
        <div class="col-lg-12 pt-15">
            <div class="form-group">
                <label class="col-lg-3 control-label">Image Pejabat Struktural * <br><small>Kosongkan jika tidak diubah</small></label>
                <div class="col-lg-9">
                    <input type="file" name="image" class="form-control">
                </div>
            </div>
        </div> 
        <div class="col-lg-12 pt-15">
            <button type="submit" name="<?=$page?>" class="btn btn-success btn-sm pull-right"> <?=$page == 'insert' ? 'Tambahkan' : 'Perbaharui'?> <i class="icon-arrow-right6"></i></button>
        </div>       
    </div>
    <?=form_close()?>
</div>