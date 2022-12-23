<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/forget17.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 02:31:30 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?> - Dashboard</title>
   <!--  <link rel="icon" type="image/png" href="<?=base_url();?>assets/login/images/icons/logo.png"/> -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/login/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/login/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/login/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/login/css/iofrm-theme17.css">
</head>
<body>
    <div class="form-body without-side">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Login to Dashboard</h3>
                        <p>Silahkan Masukan Username dan Password Anda</p>
                        <form action="<?= base_url();?>auth/login" method="POST">
                            <input class="form-control" type="text" name="identity" placeholder="Username" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button text-center">
                                <button id="submit" type="submit" class="ibtn block">Login</button>
                            </div>
                        </form>
                        <br>
                        <!-- <div class="page-links">
                            <a href="<?=base_url();?>lupa-password">Forget password?</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?=base_url();?>assets/login/js/jquery.min.js"></script>
<script src="<?=base_url();?>assets/login/js/popper.min.js"></script>
<script src="<?=base_url();?>assets/login/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/login/js/main.js"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/forget17.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 02:31:31 GMT -->
</html>

