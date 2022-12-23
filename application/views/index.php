<?php
    $sessTrue = $this->session->userdata('username',true);
        if($sessTrue==true AND user_data('tipe_user') == 'member'){
?>
    <script language="javascript">
        setTimeout(function(){
        window.location.href = '<?=base_url();?>terimakasih/<?=user_data('id_registrasi');?>';
        }, 1);
</script>
<?php
        }else{
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
                    <div><h3>Property Halal Indonesia</h3></div>
                    <div><p>Sialahkan lengkapi data Anda dibawah ini <br>pastikan data yang dimaksukkan lengkap</p></div>
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <form id="form">
                            <input type="hidden" name="share" value="<?=$referral;?>">
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <label style="font-weight: bold;">Nama Lengkap*</label>
                                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" id="nama">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                     <label style="font-weight: bold;">Jenis Kelamin*</label>
                                    <select type="text" class="form-control" name="jk" id="jk" 
                                            style="margin-bottom: 14px;font-size: 15px;font-weight: 300;padding: 9px 20px;">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                             <div class="col-12 col-sm-6">
                                     <label style="font-weight: bold;">Status Pernikahan*</label>
                                    <select type="text" class="form-control" name="status_nikah" id="status_nikah" 
                                            style="margin-bottom: 14px;font-size: 15px;font-weight: 300;padding: 9px 20px;">
                                        <option value="">Pilih Status Pernikahan</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                        <option value="Cerai Mati">Cerai Mati</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                     <label style="font-weight: bold;">Usia*</label>
                                    <input type="text" class="form-control" placeholder="Usia Anda Saat Ini" name="usia" id="usia">
                                </div>
                                <div class="col-12 col-sm-6">
                                     <label style="font-weight: bold;">Pekerjaan*</label>
                                    <input type="text" class="form-control" placeholder="Pekerjaan Anda sekarang" name="pekerjaan" id="pekerjaan">
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-12 col-sm-6">
                                     <label style="font-weight: bold;">Email Aktif</label>
                                    <input type="text" class="form-control" placeholder="E-mail Aktif (Opsional)" name="email" id="email">
                                </div>
                                <div class="col-12 col-sm-6">
                                     <label style="font-weight: bold;">Kontak*</label>
                                    <input type="text" class="form-control" placeholder="Handphone / WhatsApp" name="phone" id="phone">
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-12">
                                     <label style="font-weight: bold;">Alamat*</label>
                                    <textarea class="form-control" placeholder="Alamat Domisili" name="alamat" id="alamat"></textarea>
                                </div>
                            </div>
                        </form>
                        <div class="row top-padding">
                                <div class="col-12 col-sm-12">
                                    <div class="form-button text-center" style="margin-top: -25px">
                                        <button id="btn-daftar" onclick="register();" class="ibtn btn-block" style="margin-top: -25px;">SIMPAN & LANJUTKAN</button>
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
    var nama            = $("#nama").val();
    var jk              = $("#jk").val();
    var status_nikah    = $("#status_nikah").val();
    var usia            = $("#usia").val();
    var pekerjaan       = $("#pekerjaan").val();
    // var email           = $("#email").val();
    // var phone           = $("#phone").val();
    var alamat          = $("#alamat").val();

    if (nama == ""){
        swal("Form Daftar","Silahkan isi nama lengkap","error");
        return (false);
    }
    if (jk == ""){
        swal("Form Daftar","Silahkan isi jenis kelamin","error");
        return (false);
    }
     if (status_nikah == ""){
        swal("Form Daftar","Silahkan isi status nikah","error");
        return (false);
    }
     if (usia == ""){
        swal("Form Daftar","Silahkan isi usia","error");
        return (false);
    }
    if (pekerjaan == ""){
        swal("Form Daftar","Silahkan isi Pekerjaan Sekarang","error");
        return (false);
    }
    //  if (phone == ""){
    //     swal("Form Daftar","Silahkan isi No. telepon / No. HP","error");
    //     return (false);
    // }
     if (alamat == ""){
        swal("Form Daftar","Silahkan isi alamat domisili Anda","error");
        return (false);
    }
    if (nama.length < 5){
        swal("Form Daftar","Panjang Nama Minimal 5 Karater!","error");
        return (false);
    }
    if (alamat.length < 5){
        swal("Form Daftar","Panjang alamat Minimal 5 Karater!","error");
        return (false);
    }
    // if (phone.length < 8){
    //     swal("Form Daftar","Format No. telepon / No. HP tidak benar","error");
    //     return (false);
    // }
    return (true);
}

function register(){
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
            url : '<?=base_url("simpan/data_user_survei");?>', 
            data : formData,
            contentType : false,
            processData : false,
            dataType: "JSON",
            success : function (data){
                $('#btn-daftar').attr("disabled", false);
                $('#btn-daftar').html("SIMPAN & LANJUTKAN");

                if(data.status == true){
                    swal({
                        title: 'Proses Pengisian Data Berhasil',
                        text: data.message,
                        confirmButtonClass: 'btn btn-success btn-bordered',
                        type: "success",
                        showConfirmButton: true,
                    },function () {
                        window.location.href = data.url;
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
    }
?>