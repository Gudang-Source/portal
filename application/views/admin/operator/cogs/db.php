<div class="panel-heading">
	<h4 class="panel-title"><b> Laman Informasi Sistem dan Database</b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>
<?php $this->view('admin/messages'); ?>	
<div class="panel-body row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td colspan="3"><b><i>Informasi Sistem</i></b></td>
                </tr>
                <tr>
                    <td style="font-style:oblique;"><b>Platform Server</b></td>
                    <td>:</td>
                    <td><?=$_SERVER['SERVER_SOFTWARE']?></td>
                </tr>
                <tr>
                    <td style="font-style:oblique;"><b>Hostname Server</b></td>
                    <td>:</td>
                    <td><?=$_SERVER['SERVER_NAME']?></td>
                </tr>
                <tr>
                    <td style="font-style:oblique;"><b>Alamat IP Server</b></td>
                    <td>:</td>
                    <td><?=$_SERVER['SERVER_ADDR']?></td>
                </tr>
                <tr>
                    <td style="font-style:oblique;"><b>PORT Server</b></td>
                    <td>:</td>
                    <td><?=$_SERVER['SERVER_PORT']?></td>
                </tr>
                <tr>
                    <td style="font-style:oblique;"><b>Browser</b></td>
                    <td>:</td>
                    <td><?=$_SERVER['HTTP_USER_AGENT']?></td>
                </tr>
                <tr>
                    <td colspan="3"><b><i>Informasi Basis Data</i></b></td>
                </tr>
                <tr>
                    <td style="font-style:oblique;"><b>Platform Basis Data</b></td>
                    <td>:</td>
                    <td><?= $this->db->platform()?></td>
                </tr>
                <tr>
                    <td style="font-style:oblique;"><b>Versi Basis Data</b></td>
                    <td>:</td>
                    <td><?=$this->db->version()?></td>
                </tr>
                <tr>
                    <td style="font-style:oblique;"><b>Daftar Tabel Basis Data</b></td>
                    <td>:</td>
                    <td>
                        <?php
                            $tables  =  $this->db->list_tables ();

                            foreach ( $tables  as  $table ){ 
                                echo '['.$table .'],  <a href="'.site_url('admin/operator/cogs/import_field/'.$table).'"><i class="icon-import"></i></a> <br>'; 
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-style:oblique;"><b>Backup Basis Data</b></td>
                    <td>:</td>
                    <td><a href="<?=site_url('admin/operator/cogs/backup_db')?>"><i class="icon-database-export"></i> Backup</a></td>
                </tr>
              
            </table>
        </div>
    </div>
</div>