
        <!-- Page Content -->
        <div class="content">
            <div class="row gutters-tiny invisible" data-toggle="appear">
                <!-- Row #1 -->
                <div class="col-md-8 col-xs-12">
                    <a class="block block-transparent bg-image d-flex align-items-stretch" href="javascript:void(0)" style="background-image: url('<?= base_url() ?>assets/backend/img/photos/photo32@2x.jpg');">
                        <div class="block-content block-sticky-options pt-100 bg-black-op">
                            <div class="block-options block-options-left text-white">
                                <div class="block-options-item">
                                    <i class="si si-book-open text-white-op"></i>
                                </div>
                            </div>
                            <div class="block-options text-white">
                                <div class="block-options-item">
                                    <i class="si si-calendar"></i> 0
                                </div> 
                            </div> 
                            <div>
                                <h2 class="h3 font-w700 text-white mb-5">Selamat Datang</h2>
                                <h3 class="h5 text-white-op">Admin</h3>
                                <h3 class="h6 text-white-op">Dinas Perumahan Kawasan Permukiman dan Pertanahan</h3>
                            </div>
                            
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-xs-12 d-flex align-items-stretch">
                    <div class="block block-transparent bg-primary-dark d-flex align-items-center w-100">
                        <div class="block-content block-content-full bg-primary-dark">
                            <div class="py-15 px-20 clearfix border-black-op-b">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-book-open fa-2x text-success"></i>
                                </div>                                
                                <div><h6 class="text-success"><?= count_air_bersih() ?></h6></div>
                                <!-- <div class="font-size-h3 font-w600 text-success" data-toggle="countTo" data-speed="1000" data-to="750">0</div> -->
                                <div class="font-size-sm font-w600 text-uppercase text-success-light">Sumur Dalam</div>
                            </div>
                            <div class="py-15 px-20 clearfix border-black-op-b">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-user-following fa-2x text-danger"></i>
                                </div>
                                <div><h6 class="text-danger"><?= count_air_limbah() ?></h6></div>
                                <!-- <div class="font-size-h3 font-w600 text-danger"><span data-toggle="countTo" data-speed="1000" data-to="980">0</span></div> -->
                                <div class="font-size-sm font-w600 text-uppercase text-danger-light">IPAL</div>
                            </div>  
                        </div>
                    </div>
                </div> 
                <!-- END Row #1 -->
            </div>  
        </div>
        <!-- END Page Content -->
