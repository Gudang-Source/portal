<div class="panel-heading">
	<h4 class="panel-title"><b> Laman <?=ucfirst($this->uri->segment(4))?> User Peserta Didik </b></h4>
	<div class="heading-elements">
		<ul class="icons-list">
			<li><a data-action="collapse"></a></li>
			<li><a data-action="reload"></a></li>
		</ul>
	</div>
</div>

<div class="panel-body">
	<?php $this->view('admin/messages'); ?>	
	<form action="<?=site_url('admin/operator/user_pedik/proses')?>" method="post">
		<div class="row">
			<div class="col-lg-12">
				<div class="tabbable">
					<div class="tab-content">
						<div class="tab-pane fade in active" id="activity">
							<!-- Timeline -->
							<div class="timeline timeline-left content-group">
								<div class="timeline-container">
									<div class="panel panel-flat timeline-content">
										<div class="panel-body">
											<div class="form-group">
                                                <?php if($this->uri->segment(4) == 'insert'){ ?>
												<div class="row">
													<div class="col-sm-6 <?=$this->session->flashdata('c_nisn') != null ? 'has-error' : null?>">
														<label>NISN Peserta Didik *</label>
														<input type="number" name="up_nisn" placeholder="ex. 164819374" class="form-control" value="<?=$this->session->flashdata('nisn')?>" required>
                                                        <span class="help-block"><?=$this->session->flashdata('c_nisn')?></span>
                                                    </div>
                                                    <div class="col-sm-6">
														<label>E-Mail Peserta Didik *</label>
														<input type="email" name="up_email" placeholder="ex. Eugene@mail.net" class="form-control" value="<?=$this->session->flashdata('email')?>" required>
                                                    </div>
                                                </div>
                                                <?php }else if($this->uri->segment(4) == 'update'){ ?>
                                                    <fieldset class="content-group">
                                                        <div class="form-group has-feedback ">
                                                            <label class="control-label col-lg-2 text-semibold mt-20">NISN Peserta</label>
                                                            <div class="col-lg-10 mt-15">
                                                                <input type="hidden" name="id" value="<?=$row->id_user?>">
                                                                <input type="number" class="form-control" value="<?=$row->nisn_siswa?>" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-feedback ">
                                                            <label class="control-label col-lg-2 text-semibold mt-20">E-Mail</label>
                                                            <div class="col-lg-10 mt-15">
                                                                <input type="email" name="up_email" class="form-control" value="<?=$row->email_user?>" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-feedback ">
                                                            <label class="control-label col-lg-2 text-semibold mt-20">Username</label>
                                                            <div class="col-lg-10 mt-15">
                                                                <input type="text" name="up_name" class="form-control" value="<?=$row->username_user?>" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-feedback ">
                                                            <label class="control-label col-lg-2 text-semibold mt-20">Password </label>
                                                            <div class="col-lg-10 mt-15">
                                                                <input type="password" name="up_pass" class="form-control"  placeholder="Kosongkan jika tidak diperbaharui">
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                <?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <div class="col-lg-12">
                <button type="submit" name="<?=$this->uri->segment(4)?>" class="btn bg-teal-400" style="width: 100%;"><?=$this->uri->segment(4) == 'insert' ? 'Tambahkan' : 'Perbaharui'?> <i class="icon-circle-right2"></i></button>								
            </div>
		</div>
    </form>	
</div>