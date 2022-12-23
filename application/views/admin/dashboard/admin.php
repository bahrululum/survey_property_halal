<?php
    $pertanyaan1 = count_data('m_pertanyaan');
    $pertanyaan2 = count_data('m_pertanyaan',array('status_p'=>'aktif'));
    $pertanyaan3 = count_data('m_pertanyaan',array('status_p'=>'tidak'));
    $survei      = count_data('tbl_user_survei');
    $kenalan     = count_data('tbl_data_kenalan');
    date_default_timezone_set("Asia/Makassar");
    $lupdate    = date("Y-m-d H:i:s");
?>

<div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card-box widget-box-two widget-two-primary">
                            <i class="mdi mdi mdi-help widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Jumlah Pertanyaan</p>
                                <h2><span data-plugin="counterup"><?=$pertanyaan1;?></span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                                <p class="text-muted m-0"><b>Last:</b> <?=$lupdate;?></p>
                            </div>
                        </div>
                    </div><!-- end col -->
                     <div class="col-lg-4 col-md-6">
                        <div class="card-box widget-box-two widget-two-success">
                            <i class="mdi mdi mdi-help widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Pertanyaan Aktif</p>
                                <h2><span data-plugin="counterup"><?=$pertanyaan2;?></span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                                <p class="text-muted m-0"><b>Last:</b> <?=$lupdate;?></p>
                            </div>
                        </div>
                    </div><!-- end col -->
                     <div class="col-lg-4 col-md-6">
                        <div class="card-box widget-box-two widget-two-danger">
                            <i class="mdi mdi mdi-help widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Pertanyaan Tidak Aktif</p>
                                <h2><span data-plugin="counterup"><?=$pertanyaan3;?></span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                                <p class="text-muted m-0"><b>Last:</b> <?=$lupdate;?></p>
                            </div>
                        </div>
                    </div><!-- end col -->
                     <div class="col-lg-6 col-md-6">
                        <div class="card-box widget-box-two widget-two-info">
                            <i class="mdi mdi mdi-content-paste widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Jumlah Survei</p>
                                <h2><span data-plugin="counterup"><?=$survei;?></span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                                <p class="text-muted m-0"><b>Last:</b> <?=$lupdate;?></p>
                            </div>
                        </div>
                    </div><!-- end col -->
                     <div class="col-lg-6 col-md-6">
                        <div class="card-box widget-box-two widget-two-info">
                            <i class="mdi mdi mdi-account-multiple widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Jumlah Data Kenalan</p>
                                <h2><span data-plugin="counterup"><?=$kenalan;?></span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                                <p class="text-muted m-0"><b>Last:</b> <?=$lupdate;?></p>
                            </div>
                        </div>
                    </div><!-- end col -->
</div>