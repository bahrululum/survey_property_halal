<!DOCTYPE html>
<html class="account-pages-bg" style="height: 100%;background-position: center;background-repeat:repeat;background-size: cover;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=base_url();?>assets/admin/images/favicon.ico">
        <!-- App title -->
        <title>Selemat Datang Di <?=user_name();?></title>
         <!-- DataTables -->
         <link href="<?=base_url();?>assets/admin/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url();?>assets/admin/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <!-- App css -->
        <link href="<?=base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/admin/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/admin/plugins/switchery/switchery.min.css">
        <link href="<?=base_url();?>assets/admin/css/custom.css" rel="stylesheet" type="text/css" />
        
          <!-- Sweet Alert -->
          <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/lib/bootstrap-sweetalert/sweetalert.css">
          <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/separate/vendor/sweet-alert-animations.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?=base_url();?>assets/admin/js/modernizr.min.js"></script>
        <script src="assets/admin/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
        <!-- <script src="assets/admin/js-tr/produk/list-produk.js"></script> -->
        <script src="<?=base_url();?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
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
                        url('<?=base_url();?>assets/tunggu.png') 
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


    <body class="bg-transparent" style="padding-bottom: 0px;">
    
       
    <?php $this->load->view($page);?>
    
        <script>
            var resizefunc = [];

        </script>

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

        <!-- App js -->
        <script src="<?=base_url();?>assets/admin/js/jquery.core.js"></script>
        <script src="<?=base_url();?>assets/admin/js/jquery.app.js"></script>
        <div class="modal2"><!-- Place at bottom of page --></div>

        <script   script type="text/javascript">
            $body = $("body");
            $(document).on({
                ajaxStart: function() { $body.addClass("loading");    },
                ajaxStop: function() { $body.removeClass("loading"); }    
            }); 
        </script>
        

    </body>
</html>