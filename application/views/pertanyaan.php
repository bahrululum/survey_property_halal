<?php
    $sessTrue = $this->session->userdata('username',true);
          if($sessTrue==true AND user_data('tipe_user') == 'member'){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haloo..<?=user_data('first_name');?> silahkan isi survei ini - Property Halal Indonesia</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/login/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/login/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/login/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/login/css/iofrm-theme24.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/lib/bootstrap-sweetalert/sweetalert.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/separate/vendor/sweet-alert-animations.min.css">
</head>
<body>
    <div class="form-body on-top">
        <div class="website-logo">
            <a href="<?=base_url();?>?share=<?=$referral;?>">
                <div class="logo">
                    <img class="logo-size" src="images/logo-light.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder simple-info">
                    <div><img src="<?=base_url();?>assets/login/images/graphic6.svg" alt=""></div>
                    <div><h3>Property Halal Indonesia</h3></div>
                    <div><p>Hai <?=user_data('first_name');?>, Silahkan isi survei Anda dibawah ini :</p></div>
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <form id="form">
                            <input type="hidden" name="id_survei" value="<?=$id_survei;?>">
                        <?php
                            $i  = 1;
                            foreach ($pertanyaan->result_array() as $data) {
                        ?>
                            <div class="row">
                                <div class="col-12">
                                     <label style="font-weight: bold;"><?=$i;?>. <?=$data['pertanyaan'];?></label>
                                     <input type="hidden" name="id_pertanyaan_<?=$i;?>" value="<?=$data['pertanyaan'];?>">
                                    <textarea class="form-control" placeholder="Jawaban Anda" name="jawaban_<?=$i;?>" id="jawaban"></textarea>
                                </div>
                            </div>
                        <?php
                           $i++; }
                        ?>
                        </form>
                        <div class="row top-padding">
                                <div class="col-12 col-sm-12">
                                    <div class="form-button text-center" style="margin-top: -25px">
                                        <button id="btn-daftar" onclick="register();" class="ibtn btn-block" style="margin-top: -25px;">SIMPAN & SELESAI</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?=base_url();?>assets/login/js/jquery.min.js"></script>
<script src="<?=base_url();?>assets/login/js/popper.min.js"></script>
<script src="<?=base_url();?>assets/login/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/login/js/main.js"></script>
<script src="<?=base_url();?>assets/admin/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
    function validasi_input(){
    var jawaban            = $("#jawaban").val();

    if (jawaban == ""){
        swal("Form Survei","Masih ada jawaban kosong","error");
        return (false);
    }
    return (true);
}

function register(){
    var id = '<?=$id_survei;?>';
    var script = ">tpircs/\<;)'noitartsigeRetelpmoC' ,'kcart'(qbf>tpircs<";
    if (validasi_input()==true){
        //$("body").append(script.reverse());       
        var formData = new FormData($('#form')[0]);
        $.ajax({
            type : "POST",
            beforeSend: function(){
                $('#btn-daftar').attr("disabled", true);
                $('#btn-daftar').html("Silahkan tunggu <i class='fa fa-spinner fa-pulse'></i>");
            },
            url : '<?=base_url("simpan/data_jawaban_user_survei");?>', 
            data : formData,
            contentType : false,
            processData : false,
            dataType: "JSON",
            success : function (data){
                $('#btn-daftar').attr("disabled", false);
                $('#btn-daftar').html("SIMPAN & SELESAI");

                if(data.status == true){
                     swal({
        title: "Informasi !",
        text: "Adakah teman keluarga sahabat yang menurut Anda membutuhkan informasi ini",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Iya",
        cancelButtonText: "Tidak",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                data        : ({id,field:'id',table:'tbl_user_survei'}),
                dataType    : 'json',
                type        : 'POST',
                url         : '<?=base_url();?>simpan/cek_user',
                success     : function(data){
                    if(data.status==1){
                        swal({
                            title: "Terimakasih",
                            text: "Silahkan Mengisi Informasi Kenalan Anda",
                            type: "success",
                            type: "success",
                            confirmButtonClass: "btn-success"
                        },function () {
                        window.location.href = data.url;
                    });
                    }else{
                        swal("Maaf!", "Terjadi kesalahan, coba lagi", "error");
                        return false;
                    }                   
                }
            })
        } else {
            swal({
                title: "Terimkasih",
                text: "Telah mengisi survei ini",
                type: "success",
                confirmButtonClass: "btn-success"
            },function () {
                        window.location.href = data.url;
                    });
        }
    });
                }else{
                    swal('Gagal', data.message, "error");
                }
            }
        });
    }
}
</script>
</body>
</html>
<?php
    }else{
?>
<script language="javascript">
setTimeout(function(){
   window.location.href = '<?=base_url();?>';
}, 1);
</script>
<?php
    }
?>