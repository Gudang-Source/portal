<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Import Peserta Didik</b></h4> 
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
    <p>Note : Silahkan Uploads FIle data Siswa dalam bentuk XLS, XLSX, atau CSV</p>	
    <form action="<?=site_url('admin/tata_usaha/pedik/import_proses')?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-12">
                <div class="dropzone-wrapper">
                    <div class="dropzone-desc">
                        <i class="glyphicon glyphicon-download-alt"></i>
                        <p class="files" style="user-select: none;">Choose an image file or drag it here.</p> 
                    </div>
                    <input type="file" name="berkas" class="dropzone"  id="fileku" required onchange="getname(this)" multiple>
                </div>
            </div>
            <div class="col-lg-12 mt-10">
                <a href="<?=base_url()?>assets/admin/examples/example_student.xlsx" class="btn btn-info"><i class="fa fa-arrow-alt-circle-down"></i> Download Format</a>
               <button type="submit" name="import_file" class="btn btn-info pull-right" style="width: 30%; margin-left: 10px"> Import </button>
            </div>
        </div>
    </form>
</div>

<script>
    function getname(obj){
        var _v = obj.value;
        var _klist = _v.split(".");;
        var extn = _klist[_klist.length-1];
        if(extn == "xls" || extn == "xlsx" || extn == "csv"){
            Swal.fire(
                'Good Job ... ',
                'File berhasil Di uploads, silahkan import untuk melanjutkan',
                'success9'
            )
            var _url = _v.split("\\");;
            var name = _url[_url.length-1];
            console.log(name);
            $(".files").text(name);
        }else{
            Swal.fire(
                'Stop...!',
                'Jenis File yang di Uploads tidak didukung, pastikan menguploads (CSV, XLSX, dan XLS)',
                'warning'
            )
            $(obj).val("");
        }
    }
</script>