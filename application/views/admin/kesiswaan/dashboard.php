<div class="panel-heading">
	<h4 class="panel-title"><b> Laman <?=ucfirst($this->uri->segment(3))?></b></h4>
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
        Halaman Dashboard Admin Bidang Kesiswaan
    </div>
</div>