<div class="panel-heading">
    <h6 class="panel-title">Log Activity User </h6>
    <div class="heading-elements">
        <ul class="icons-list">
            <li><a data-action="collapse"></a></li>
            <li><a data-action="reload"></a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 p-3">
        <table class="table tasks-list table-lg">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Sistem Operasi</th>
                    <th>Browser</th>
                    <th>Status</th>
                    <th>Latest Login</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr style="height: 10px;">
                    <td colspan="8"> <span style="color: green;"><i class="icon-circles"></i></span> <b> Aktivitas Akun yang Aktif </b></td>
                </tr>
                <?php 
                    $no = 1;
                    foreach ($row->result() as $key => $data) { 
                        if($data->logout_date == null){?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=ucfirst($data->username_user)?></td>
                                <td><?=$data->os_user?></td>
                                <td><?=$data->browser_user?></td>
                                <td>
                                    <?php if($data->login_date != null && $data->logout_date == null){ ?>
                                        <span style="color: green;"><i class="icon-circles"></i> <b> Online </b></span>
                                    <?php }else if($data->logout_date != null){ ?>
                                        <span style="color: red;"><i class="icon-circles"></i> <b> Offline </b></span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?=$data->logout_date == null ? $data->login_date : $data->logout_date ?>
                                </td>
                                <td>
                                    <a href="" style="color: black;"><i class="icon-info22"></i></a>
                                    <?php if ($data->logout_date == null) { ?>
                                        <a href="<?=site_url('admin/operator/user_pedik/forced/'.$data->id_user)?>" style="color: black;"><i class="icon-exit"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php }
                    }
                ?>
                <tr style="height: 10px;">
                    <td colspan="8"> <span style="color: red;"><i class="icon-history"></i></span> <b> Riwayat Aktivitas </b></td>
                </tr>
                <?php 
                    $no = 1;
                    foreach ($row->result() as $key => $data) { 
                        if($data->logout_date != null){
                            if($key <= 100){?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=ucfirst($data->username_user)?></td>
                                <td><?=$data->os_user?></td>
                                <td><?=$data->browser_user?></td>
                                <td>
                                    <?php if($data->login_date != null && $data->logout_date == null){ ?>
                                        <span style="color: green;"><i class="icon-circles"></i> <b> Online </b></span>
                                    <?php }else if($data->logout_date != null){ ?>
                                        <span style="color: red;"><i class="icon-circles"></i> <b> Offline </b></span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?=$data->logout_date == null ? $data->login_date : $data->logout_date ?>
                                </td>
                                <td>
                                    <a href="" style="color: black;"><i class="fa fa-info"></i></a>
                                </td>
                            </tr>
                        <?php } }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
