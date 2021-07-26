<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(@$this->session->flashdata('success')){?>  
<div class="row col-12">
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p class="mb-0"><?= $this->session->flashdata('success')?></p>
    </div>
</div>

<?php } if(@$this->session->flashdata('failed')){?>  
<div class="row col-12">
    <div class="block-content">
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <span><?= $this->session->flashdata('failed')?></span>
        </div>
    </div>
</div>
<?php } ?>
