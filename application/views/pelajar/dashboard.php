<div class="row">
    <div class="col-lg-9">
        <div class="card card-prirary ">         
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="small-box bg-info">
                            <div class="icon">
                                <i class="fas fa-landmark" style="font-size: 120px; color:#FFFFFF; opacity:0.4;"></i>
                            </div>
                            <div class="inner p-4" >
                                <span >
                                    <h1><?=profil_user_student()->status_siswa == 1  ? 'AKTIF' : (profil_user_student()->status_siswa == 2 ? 'PINDAH' : 'TIDAK AKTIF')?></h1>
                                    <h6>Status Peserta Didik</h6>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="small-box bg-info">
                            <div class="icon">
                                <i class="fas fa-graduation-cap" style="font-size: 120px; color:#FFFFFF; opacity:0.4;"></i>
                            </div>
                            <div class="inner p-4" >
                                <span >
                                    <h1>93,7</h1>
                                    <h6>Nilai Terakhir</h6>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="small-box bg-info">
                            <div class="icon">
                                <i class="fas fa-book" style="font-size: 120px; color:#FFFFFF; opacity:0.4;"></i>
                            </div>
                            <div class="inner p-3" >
                                <span >
                                    <h6>Genap</h6>
                                    <h4 class="pb-2">2019 / 2020</h4>
                                    <h6>Tahun Ajaran - Semester</h6>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-8 text-center">
                        <center>
                        <div class="responsive small-box">
                            <canvas id="canvas" class="p-4"></canvas>
                        </div>
                        </center>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-body p-0">
                            <div class="p-3">
                                <p><b> INFORMASI TERBARU </b></p>
                                <ul class="products-list">
                                    <?php foreach (get_berita(3)->result() as $key => $data) { ?>
                                        <li class="item">
                                            <div class="product-img">
                                                <img src="<?=base_url().'assets/uploads/pengumuman/'.($data->image_berita == null ? 'placeholder.jpg' : $data->image_berita)?>" alt="Product Image" class="img-size-50">
                                            </div>
                                            <div class="product-info">
                                                <a href="<?=site_url('pelajar/dashboard/pengumuman/'.$data->id_berita)?>" class="product-title" style="color:black"><?=$data->judul_berita?>
                                                    <span class="badge badge-secondary float-right"><?=date('d/m',strtotime($data->created_berita))?></span></a>
                                                <span class="product-description">
                                                    <a href="<?=site_url('pelajar/dashboard/pengumuman/'.$data->id_berita)?>" style="color:black">Bidang <?=admin_role($data->role_user_admin)?></a>
                                                </span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card card-prirary ">         
            <div class="card-body">
                <h6 class="pb-3">
                    <i class="fa fa-tags"></i> 
                    INFO AKADEMIK 
                </h6>
                <div class="callout callout-success">
                    <h6> Mulai Sekolah </h6>
                    <h4><?=get_masuk()?></h4>
                </div>
                <div class="callout callout-danger">
                    <h6> Libur Sekolah </h6>
                    <h4><?=get_libur()?></h4>
                </div>
                
                <div class="callout callout-warning">
                    <h6> Ujian Sekolah </h6>
                    <h4><?=get_raport()?></h4>
                </div>
            </div>
        </div>
        <div class="card card-prirary ">         
            <div class="card-body">

            </div>
        </div>
    </div>
</div>
<script>
		var config = {
			type: 'line',
			data: {
				labels: ['I', 'II', 'III', 'IV', 'V', 'VI','VII','VIII','IX','X'],
				datasets: [{
					label: 'Nilai Akumulatif Prestasi',
					backgroundColor: window.chartColors.yellow,
					borderColor: window.chartColors.yellow,
					data: [
						88,67,95,77,85,92,88,67,95,77,85,92
					],
					fill: false,
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Bandingkan Nilai Semestermu'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Semester'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Rata-rata Nilai'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
</script>