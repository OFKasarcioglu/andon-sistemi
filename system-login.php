<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <title>Giriş Paneli | Gebo Pres</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Gebo Pres için yazılmış özel bir andon yazılımıdır." name="description" />
    <meta content="Ömer Faruk KASARCIOĞLU" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Hoşgeldin !</h5>
                                    <p>Kullanıcı bilgileriniz girerek sisteme giriş yapabilirsiniz.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="auth-logo">
                            <a href="system-login.php" class="auth-logo-light">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>

                            <a href="system-login.php" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" action="index.html">

                                <div class="mb-3">
                                    <label for="username" class="form-label">Kullanıcı Adınız</label>
                                    <input type="text" class="form-control" id="username" placeholder="Örn : Gebo">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Şifre</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" placeholder="Örn : 12345" aria-label="Password" aria-describedby="password-addon">
                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>
                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Sisteme Giriş Yap</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
                    <div>
                        <p>© <script>document.write(new Date().getFullYear())</script> <i class="mdi mdi-heart text-danger"></i> Gebo Pres. Tüm hakları saklıdır.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
