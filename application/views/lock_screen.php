
<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/backend/img/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() ?>assets/backend/img/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/backend/img/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="<?= base_url() ?>assets/backend/css/codebase.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="<?= base_url() ?>assets/backend/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body> 
        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('<?= base_url() ?>assets/backend/img/photos/photo34@2x.jpg');">
                    <div class="row mx-0 bg-pulse-op">
                        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                            <div class="p-30 invisible" data-toggle="appear">
                                <p class="font-size-h3 font-w600 text-white">
                                    <i class="fa fa-bell"></i> Amankan <a class="link-effect text-white-op font-w700" href="javascript:void(0)">Data Anda</a>!
                                </p>
                                <p class="font-italic text-white-op">
                                    Copyright &copy; <span class="js-year-copy"><?= date("Y") ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white text-center">
                            <div class="content content-full"> 
                                <!-- Header -->
                                <div class="px-30 pt-10 pb-30">
                                    <a class="link-effect text-pulse font-w700" href="javascript:;">
                                        <i class="si si-fire"></i>
                                        <span class="font-size-xl text-pulse-dark">Database </span><span class="font-size-xl">Perumahan</span>
                                    </a>
                                    <h1 class="h3 font-w700 mt-30 mb-10">Selamat datang kembali, <?= ucfirst($this->session->userdata('username')) ?></h1>
                                    <h2 class="h5 font-w400 text-muted mb-30">Silakan masukkan Password Anda</h2>
                                    <img class="img-avatar img-avatar96" src="https://ui-avatars.com/api/?name=<?= $this->session->userdata('username') ?>&rounded=true" alt="">

                                    <?php $this->load->view('_templates/flashdata')?>
                                </div>
                                <!-- END Header -->

                                <!-- Unlock Form -->
                                <!-- jQuery Validation (.js-validation-lock class is initialized in js/pages/op_auth_lock.js) -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form action="<?= base_url('login/processing_lock')?>" class="js-validation-signin px-30" method="post" id="forms">
                                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                    <input type="hidden" name="username" value="<?= $this->session->userdata('username') ?>" />
                                    <input type="hidden" name="previous_page" value="<?= $this->input->get('page'); ?>">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" class="form-control" id="lock-password" name="password">
                                                <label for="lock-password">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-hero btn-alt-danger">
                                            <i class="si si-lock-open mr-10"></i> Masuk
                                        </button>
                                        <div class="mt-30">
                                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="<?= base_url('login/logout') ?>">
                                                <i class="fa fa-user text-muted mr-5"></i> Bukan Anda? Login
                                            </a>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Unlock Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="<?= base_url() ?>assets/backend/js/core/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/core/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/core/jquery.appear.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/core/jquery.countTo.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/core/js.cookie.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/codebase.js"></script>

        <!-- Page JS Plugins -->
        <script src="<?= base_url() ?>assets/backend/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="<?= base_url() ?>assets/backend/js/pages/op_auth_lock.js"></script>
    </body>
</html>