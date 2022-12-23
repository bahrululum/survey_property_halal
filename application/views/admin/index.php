<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
      <!--   <link rel="shortcut icon" href="<?=base_url();?>assets/login/images/icons/logo.png"> -->
        <!-- App title -->
        <title><?=$title?></title>

         <!-- DataTables -->
        <link href="<?=base_url();?>assets/admin/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <!-- Plugins css-->
        <link href="<?=base_url();?>assets/admin/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="<?=base_url();?>assets/admin/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="<?=base_url();?>assets/admin/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

         <!-- Sweet Alert -->
         <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/lib/bootstrap-sweetalert/sweetalert.css">
          <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/separate/vendor/sweet-alert-animations.min.css">

        <!-- App css -->
        <link href="<?=base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/admin/plugins/switchery/switchery.min.css">
        
        <!-- <script src="<?=base_url();?>assets/admin/js/modernizr.min.js"></script> -->
        <!-- <script src="<?=base_url();?>assets/admin/js/jquery.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
        <!-- <script src="<?=base_url();?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script> -->
        <style type="text/css">
            .modal2 {
            display:    none;
            position:   fixed;
            z-index:    9999;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background: rgba( 255, 255, 255, .8 ) 
                        url('<?=base_url();?>assets/loading.png') 
                        50% 50% 
                        no-repeat;
        }

        /* When the body has the loading class, we turn
           the scrollbar off with overflow:hidden */
        body.loading {
            overflow: hidden;   
        }
        body.loading .modal2 {
            display: block;
        }
        </style>
    </head>
    <body class="fixed-left">
    <div class="modal2"><!-- Place at bottom of page --></div>

<script   script type="text/javascript">
    $body = $("body");
    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
        ajaxStop: function() { $body.removeClass("loading"); }    
    }); 
</script>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

       <!-- LOGO -->
                <div class="topbar-left">
                <a href="<?=base_url();?>" class="logo"><span>Survei</span><i class="mdi mdi-layers"></i></a>
                    <!-- Image logo -->
                    <!--<a href="index.html" class="logo">-->
                        <!--<span>-->
                            <!--<img src="assets/images/logo.png" alt="" height="30">-->
                        <!--</span>-->
                        <!--<i>-->
                            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                        <!--</i>-->
                    <!--</a>-->
                </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Navbar-left -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                 
                   
                </ul>

                <!-- Right(Notification) -->
                <ul class="nav navbar-nav navbar-right">
                    

                   

                  

                    <li class="dropdown user-box">
                        <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                            <img src="<?=user_foto();?>" alt="user-img" class="img-circle user-img">
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                            <li>
                                <h5>Hi,  <?=user_name();?></h5>
                            </li>
                            
                           <!--  <li><a href="<?=base_url();?>pengaturan-user"><i class="ti-settings m-r-5"></i> Settings</a></li> -->
                            
                            <li><a href="<?=base_url();?>auth/logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                        </ul>
                    </li>

                </ul> <!-- end navbar-right -->

            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
<?php
    $this->load->view('admin/layout/sidemenu');
?>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
			<div class="content-page">
                 <div class="content">
                    <div class="container">
                            <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title"><?=$title;?></h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="<?=base_url();?>dashboard">Home</a>
                                        </li>
                                        <li class="active">
                                            <?=$title;?>
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
						<!--<div class="runtext-container">
							<div class="main-runtext">
							<marquee direction="" onmouseover="this.stop();" onmouseout="this.start();">
							<div class="holder">
								<div class="text-container">
									MOHON MAAF, minggu tanggal 22 maret 2020 hingga Selasa tanggal 24 maret 2020 kami akan melakukan peningkatan layanan imigrasi server yang mengakibatkan applikasi akan sulit untuk di akses sementara waktu.
								</div>
							</div>
							</marquee>
							</div>
						</div>-->
                        <!-- end row -->
                         <?php $this->load->view($page);?>
                </div> <!-- content -->

                <!-- <footer class="footer text-center">
                    2020 © Dashboard.
                </footer> -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        
        <!-- END wrapper -->
        <script>
            var resizefunc = [];
        </script>
        <!-- Dashboard init -->
        <!-- <script src="<?=base_url();?>assets/admin/pages/jquery.dashboard.js"></script> -->
        
        <!-- jQuery  -->
        <script src="<?=base_url();?>assets/admin/js/bootstrap.min.js"></script>
        <script src="<?=base_url();?>assets/admin/js/detect.js"></script>
        <script src="<?=base_url();?>assets/admin/js/fastclick.js"></script>
        <script src="<?=base_url();?>assets/admin/js/jquery.blockUI.js"></script>
        <script src="<?=base_url();?>assets/admin/js/waves.js"></script>
        <script src="<?=base_url();?>assets/admin/js/jquery.slimscroll.js"></script>
        <script src="<?=base_url();?>assets/admin/js/jquery.scrollTo.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/switchery/switchery.min.js"></script>

        <script src="<?=base_url();?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="<?=base_url();?>assets/admin/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/jszip.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/dataTables.colVis.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <script src="<?=base_url();?>assets/admin/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="<?=base_url();?>assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="<?=base_url();?>assets/admin/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="<?=base_url();?>assets/admin/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/admin/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/admin/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/admin/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/admin/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?=base_url();?>assets/admin/plugins/autocomplete/jquery.mockjax.js"></script>
        <script type="text/javascript" src="<?=base_url();?>assets/admin/plugins/autocomplete/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="<?=base_url();?>assets/admin/plugins/autocomplete/countries.js"></script>
        <!-- <script type="text/javascript" src="<?=base_url();?>assets/admin/pages/jquery.autocomplete.init.js"></script>

        <script type="text/javascript" src="<?=base_url();?>assets/admin/pages/jquery.form-advanced.init.js"></script> -->

        <!-- init -->
        <!-- <script src="<?=base_url();?>assets/admin/pages/jquery.datatables.init.js"></script>
        <script src="<?=base_url();?>assets/admin/pages/jquery.sweet-alert.init.js"></script> -->

        <!-- App js -->
        <script src="<?=base_url();?>assets/admin/js/jquery.core.js"></script>
        <script src="<?=base_url();?>assets/admin/js/jquery.app.js"></script>

    </body>
</html>