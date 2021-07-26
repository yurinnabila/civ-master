<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title><?= @$this->config->item('head_title')?></title>

        <meta name="description" content="<?= @$this->config->item('head_description')?>">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="<?= @$this->config->item('head_title')?>">
        <meta property="og:site_name" content="<?= @$this->config->item('head_site_name')?>">
        <meta property="og:description" content="<?= @$this->config->item('head_description')?>">
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
        <link rel="stylesheet" id="css-main" href="<?= base_url() ?>assets/backend/css/codebase.css">
        <link rel="stylesheet" id="css-main" href="<?= base_url() ?>assets/backend/css/codebase.min.css">

        <?php @$select2 ? $this->load->view('_templates/css/select2'):''; ?> 
        <?php @$datatables_css ? $this->load->view('_templates/css/datatables'):''; ?> 
  
        <?php @$toastr ? $this->load->view('_templates/css/toastr'):''; ?> 
        <?php @$sweet_alert ? $this->load->view('_templates/css/sweet-alert'):''; ?>  
        <?php @$leaflet ? $this->load->view('_templates/css/leaflet'):''; ?> 
        <?php @$dropzone ? $this->load->view('_templates/css/dropzone'):''; ?> 
        <?php @$sumernote ? $this->load->view('_templates/css/sumernote'):''; ?> 
        <?php @$slick ? $this->load->view('_templates/css/slick'):''; ?> 
    </head>
    <body>