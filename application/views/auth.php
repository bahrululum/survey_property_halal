<!doctype html>
<html lang="en">


<!-- Mirrored from arasari.studio/projects/forny/templates/03_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Jan 2020 05:35:51 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Authentication forms">
    <meta name="author" content="Arasari Studio">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/style-front/images/favicon.png">
    <title><?= $title; ?> - Bintaro Learning Center</title>
    <link href="<?=base_url();?>assets/style-front/login/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/style-front/login/css/common.css" rel="stylesheet">

    <link rel="stylesheet" type='text/css' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&amp;display=swap" rel="stylesheet">
<link href="<?=base_url();?>assets/style-front/login/css/theme-03.css" rel="stylesheet">
<link href="<?=base_url();?>/assets/admin/css/lib/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

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
                        url('<?=base_url();?>assets/index.png') 
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
        .price_2s {
    font-weight: 900;
    font-size: 23px;
    line-height: 44px;
    text-decoration-line: line-through;
    color: #9FA4A7;
}
.price_2 {
    font-weight: 500;
    font-size: 24px;
    line-height: 44px;
    color: #1E9BBA;
}
.diskon {
    background: #F8EAEA;
    border-radius: 8px;
    position: sticky;
    width: 121px;
    height: 84px;
    padding: 15px 20px 5px 20px;
}
.t-diskon {
    font-style: normal;
    font-weight: 500;
    font-size: 11px;
    line-height: 15px;
    letter-spacing: 0.24em;
    text-transform: uppercase;
    color: #C64F53;
}
.t-jumlah {
    font-style: normal;
    font-weight: bold;
    font-size: 36px;
    line-height: 48px;
    display: flex;
    align-items: center;
    color: #C64F53;
}
.none_style {
    list-style-type: none;
    margin-left: -20px;
}
.color-check {
    color: #1E9BBA;
}
.mb-15 {
    margin-bottom: 15px !important;
}
.mt-10 {
    margin-top: 10px !important;
}
.form-control {
    border-radius: 0;
    box-shadow: none;
    border-color: #d2d6de
}

.select2-hidden-accessible {
    border: 0 !important;
    clip: rect(0 0 0 0) !important;
    height: 1px !important;
    margin: -1px !important;
    overflow: hidden !important;
    padding: 0 !important;
    position: absolute !important;
    width: 1px !important
}
.select2-container--default .select2-selection--single .select2-selection__placeholder {
    color: #000000a3;
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 16px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
}

.select2-container--default .select2-selection--single,
.select2-selection .select2-selection--single {
    border: 1px solid #d2d6de;
    border-radius: 0;
    padding: 6px 12px;
    height: 34px
}

.select2-container--default .select2-selection--single {
    background-color: #f5f7fa;
    border: 1px solid #aaa;
    border-radius: 4px
}

.select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 28px;
    user-select: none;
    -webkit-user-select: none
}

.select2-container .select2-selection--single .select2-selection__rendered {
    padding-right: 10px
}

.select2-container .select2-selection--single .select2-selection__rendered {
    padding-left: 0;
    padding-right: 0;
    height: auto;
    margin-top: -3px
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px
}

.select2-container--default .select2-selection--single,
.select2-selection .select2-selection--single {
    border: 1px solid #f5f7fa00;
    border-radius: 20px;
    padding: 6px 12px;
    height: 40px !important
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 6px !important;
    right: 1px;
    width: 20px
}
    </style>

</head>

<body>

<?php $this->load->view($content);?>

<script src="<?=base_url();?>/assets/admin/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
    <script src="<?=base_url();?>assets/style-front/login/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/style-front/login/js/main.js"></script>
    <script src="<?=base_url();?>assets/style-front/login/js/demo.js"></script>
    
    <div class="modal2"><!-- Place at bottom of page --></div>

<script type="text/javascript">
    $body = $("body");
    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
         ajaxStop: function() { $body.removeClass("loading"); }    
    }); 
</script>
</body>


<!-- Mirrored from arasari.studio/projects/forny/templates/03_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Jan 2020 05:35:54 GMT -->
</html>