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
	<?=form_open_multipart('admin/user/update_profile')?>
		<div class="row">
			<div class="col-lg-9">
				<div class="tabbable">
					<div class="tab-content">
						<div class="tab-pane fade in active" id="activity">
							<!-- Timeline -->
							<div class="timeline timeline-left content-group">
								<div class="timeline-container">
									<div class="panel panel-flat timeline-content">
										<div class="panel-body">
											<div class="form-group">
												<div class="row">
													<div class="col-sm-6">
														<label>First name *</label>
														<input type="hidden" name="id" value="<?=$row->id_user_admin?>">
														<input type="text" name="p_name1" placeholder="ex. Eugene" class="form-control" value="<?=$row->nama_depan_user_admin?>" required>
													</div>

													<div class="col-sm-6">
														<label>Last name *</label>
														<input type="text" name="p_name2" placeholder="ex. Kopyov" class="form-control" value="<?=$row->nama_belakang_user_admin?>" required>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<div class="col-sm-6">
														<label>E-Mail *</label>
														<input type="text" name="p_email" placeholder="ex. Ring.mail@mail.com" class="form-control" value="<?=$row->email_user_admin?>" required>
													</div>

													<div class="col-sm-6">
														<label>Nomor Telepon *</label>
														<input type="text" name="p_telp" placeholder="ex. +62..." class="form-control" value="<?=$row->telepon_admin?>" required>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<div class="col-sm-4">
														<label>Tempat Lahir *</label>
														<input type="text" name="p_tempat" placeholder="Munich" class="form-control" value="<?=$row->tempat_lahir_admin?>">
													</div>

													<div class="col-sm-4">
														<label>Tanggal Lahir *</label>
														<input type="date" name="p_tanggal" placeholder="01 January 86" class="form-control" value="<?=$row->tanggal_lahir_admin?>">
													</div>

													<div class="col-sm-4">
														<label>Gender *</label>
														<select name="p_gen" id="" class="form-control">
															<option value="">- pilih -</option>
															<option value="l" <?=$row->gender_admin == 'l' ? 'selected' : null?>> Laki - laki</option>
															<option value="p" <?=$row->gender_admin == 'p' ? 'selected' : null?>> Perempuan</option>
														</select>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<div class="col-sm-12">
														<label>Alamat *</label>
														<textarea name="p_alamat" id="" class="form-control"><?=$row->alamat_admin?></textarea>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<div class="col-sm-6">
														<label>Username *</label>
														<input type="text" name="p_username" placeholder="ex. Eugene" class="form-control" value="<?=$row->username_user_admin?>" required>
													</div>

													<div class="col-sm-6">
														<label>Password *</label><small> (Kosongkan jika tidak diubah) </small>
														<input type="password" name="p_password" placeholder="ex. Kopyov" class="form-control" >
													</div>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<!-- User thumbnail -->
				<div class="thumbnail">
					<div class="thumb thumb-rounded thumb-slide">
						<img src="<?=base_url('/assets/uploads/admin/'.$row->image_user_admin)?>" alt="">
						<div class="caption">
							<span>
								<label for="images" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox">
									<i class="icon-plus2"></i>
								</label>
								<input type="file" name="image" id="images" style="display: none">
								<a href="<?=site_url('admin/user/del_image')?>" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-trash-alt"></i></a>
							</span>
						</div>
					</div>
				
					<div class="caption text-center">
						<h6 class="text-semibold no-margin"><?=$row->nama_depan_user_admin.' '.$row->nama_belakang_user_admin?> <small class="display-block">Bidang <?=admin_role($this->session->userdata('level'))?></small></h6>
					</div>
					<div class="panel-flat">
						<div class="list-group no-border no-padding-top">
							<a href="#" class="list-group-item"><i class="icon-users"></i> Friends</a>
							<a href="#" class="list-group-item"><i class="icon-calendar3"></i> Events <span class="badge bg-teal-400 pull-right">48</span></a>
							<a href="#" class="list-group-item"><i class="icon-bubbles4"></i> Chat settings</a>
						</div>
					</div>
				</div>
				<!-- /user thumbnail -->
				<div class="col-lg-12">
					<button type="submit" name="profil" class="btn bg-teal-400" style="width: 100%;">Perbaharui Profil <i class="icon-circle-right2"></i></button>								
				</div>
			</div>
		</div>
	<?=form_close()?>	
</div>

