<div class="row p-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="row p-2 pt-3">
                <div class="col-lg-12 text-center mt-3  mb-3">
                    <h4><strong class="m-2">Riwayat Login Sistem Portal</strong></h4>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-10 table-responsive ">
                    <table class="table table-bordered m-2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Sistem Operasi</th>
                                <th>Browser</th>
                                <th>Status</th>
                                <th>Latest Login</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($row->result() as $key => $data) { ?>
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
                                           
                                        </tr>
                                    <?php  
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



