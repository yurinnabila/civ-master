<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- <div class="" data-toggle="appear">
        <h1 class="h4 font-w700 mb-10 js-appear-enabled animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown" style="color: #42a5f5; margin-bottom: 0px!important;">Aplikasi</h1>
        <h4 class="h5 font-w400 js-appear-enabled animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown" style="margin-bottom: 0px!important;"><b>Estimasi Biaya</b></h4>
</div> -->

<?php $this->load->view('_templates/flashdata')?>

<?php if(@$info_detail){?> 
<div class="row">
    <div class="block-header bg-primary-lighter col-lg-12">
        <h3 class="block-title">Info detail</h3>
        <div class="block-content">

        </div>
    </div>
</div>
<?php } ?>