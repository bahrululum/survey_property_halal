<?php
    $sessTrue = $this->session->userdata('username',true);
        if($sessTrue==true AND user_data('tipe_user') == 'member'){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survei Property Halal Indonesia</title>
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
                    <?php
                            foreach ($user->result_array() as $data) {
                    ?>
                    <div><h3>Terimakasih <?=$data['nama_lengkap'];?> telah mengisi survei ini</h3></div>
                    <div>
                        <!-- <p>Silahkan copy dan share dibawah ini jika menurut Anda bermanfaat untuk orang lain.</p> -->
                    </div>
                   
                        <!-- <div class="row text-center col-12 col-sm-12">
                                <div class="col-12 col-sm-12 text-center">
                                    <label style="font-weight: bold;color:white">COPY & SHARE LINK</label>
                                    <input type="text" class="form-control text-center" value="<?=base_url();?>?share=<?=user_data('id_registrasi');?>" id="myInput">
                                </div>
                                <br>
                                <div class="col-12 col-sm-12 text-center">
                                        <button id="btn-daftar"  onclick="myFunction()" class="btn btn-warning btn-block">COPY SEKARANG</button>
                                </div>
                         </div> -->
                  
                     
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<script src="<?=base_url();?>assets/login/js/jquery.min.js"></script>
<script src="<?=base_url();?>assets/login/js/popper.min.js"></script>
<script src="<?=base_url();?>assets/login/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/login/js/main.js"></script>
<script src="<?=base_url();?>assets/admin/js/lib/bootstrap-sweetalert/sweetalert.min.js"></script>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  swal({
                title: "Link telah di copy",
                text: copyText.value,
                type: "success",
                confirmButtonClass: "btn-success"
            });
}
</script>
<script type="text/javascript">
    var id = '<?=$id_survei;?>';
    swal({
        title: "Informasi !",
        text: "Anda berkesempatan untuk ikut mereferralkan survei ini, dapatkan beragam keuntungan dan manfaat menarik lainnya.",
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
                            text: "Silahkan melihat aturan mereferalkan survei ini",
                            type: "success",
                            type: "success",
                            confirmButtonClass: "btn-success"
                        },function () {
                        window.location.href = '<?=base_url('informasi-referral');?>/<?=$id_survei;?>';
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
            });
        }
    });
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
