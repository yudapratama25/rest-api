<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>REST CLIENT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/login.css">
    </head>
    <body>
        <div class="background">
            <img src="<?= base_url(); ?>assets/login/img/login-bg.png" class="login-bg" alt="">
            <div class="login-box">
                <div class="img-box">
                    <img src="<?= base_url(); ?>assets/login/img/D.png" alt=""><br>
                </div>
                <h3 class="title">REST CLIENT</h3>
                <form action="<?= base_url('Login/masuk') ?>" method="post">
                    <input type="text" autofocus name="username" placeholder="Username"><br>
                    <input type="password" name="password" placeholder="Password">
                    <div class="btn-box">
                        <button type="submit" name="button">Log In</button>
                    </div>
                </form>
                <hr>
                <a href="<?= base_url('Login/daftar'); ?>" class="need-help">Sign Up</a>
            </div>
        </div>
    </body>
</html>
