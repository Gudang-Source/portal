<div class="panel-heading">
    <h4 class="panel-title"><b> Laman Daftar Jam Pelajaran <?= ta()->tahun_ajaran . ' - ' . ta()->semester_ta ?></b></h4>
    <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
        </ul>
    </div>
</div>

<div class="panel-body">
    <?php $this->view('admin/messages'); ?>
    <div class="row mb-10">
        <div class="col-lg-8">
            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-bottom bottom-divided">
                    <li class="<?= $this->uri->segment(5) == 1 ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/1') ?>">Senin</a></li>
                    <li class="<?= $this->uri->segment(5) == 2 ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/2') ?>">Selasa</a></li>
                    <li class="<?= $this->uri->segment(5) == 3 ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/3') ?>">Rabu</a></li>
                    <li class="<?= $this->uri->segment(5) == 4 ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/4') ?>">Kamis</a></li>
                    <li class="<?= $this->uri->segment(5) == 5 ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/5') ?>">Jum'at</a></li>
                    <li class="<?= $this->uri->segment(5) == 6 ? 'active' : null ?>"><a href="<?= site_url('admin/akademik/jampel/hari/6') ?>">Sabtu</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 m-10">
            <a href="<?= site_url('admin/akademik/pengampu/insert/' . $this->uri->segment(5)) ?>" class="btn btn-success btn-xs pull-right " style="width: 100%"> Simpan Perubahan <i class=" icon-circle-right2"></i></a>
        </div>
        <div class="col-lg-12">
            <div class="tab-content">

                <div class="tab-pane active" id="senin">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="border-double">
                                    <th>#</th>
                                    <th>Kode Mata Pelajaran</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Tenaga Pendidik</th>
                                    <th width="20%">Total Jam / Minggu </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane <?= $this->uri->segment(5) == 2 ? 'active' : null ?>" id="selasa">
                    Selasa
                </div>

                <div class="tab-pane <?= $this->uri->segment(5) == 3 ? 'active' : null ?>" id="rabu">
                    Rabu
                </div>

                <div class="tab-pane <?= $this->uri->segment(5) == 4 ? 'active' : null ?>" id="kamis">
                    Kamis
                </div>

                <div class="tab-pane <?= $this->uri->segment(5) == 5 ? 'active' : null ?>" id="jumat">
                    Jum'at
                </div>

                <div class="tab-pane <?= $this->uri->segment(5) == 6 ? 'active' : null ?>" id="sabtu">
                    Sabtu
                </div>
            </div>

        </div>

    </div>