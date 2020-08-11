<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
       
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"> Lupa Password Portal Akademik </h3>
            </div>
            <div class="card-body" style="display: block;">
                <?php $this->view('admin/messages'); ?>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form action="<?=site_url('auth/proses_forgot')?>" method="post">
                            <div class="form-group">
                                <label> E-Mail Aktif *</label>
                                <input type="email" name="r_email" value="<?=$this->session->flashdata('reg_email');?>" class="form-control <?=$this->session->flashdata('email') != null ? 'is-warning' : null?>" required>
                                <span style="color:red; font-size: 12px"><i><?=$this->session->flashdata('email');?></i></span>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" name="forgot" class="btn btn-info"> Reset Sekarang </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>