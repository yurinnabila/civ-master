    <div class="content"> 
        <h2 class="content-heading"><?= @$page_title?></h2>

        <!-- Dynamic Table Full -->
        <div class="block custom">
            <div class="block-header block-header-default">
                <h3 class="block-title"> <small><?= @$detail_page_title; ?></small></h3>
                <div class="float-right">
                    <!-- iki disik isine tombol tambah -->
                    <?php echo $btn_kembali ?>
                    <?php echo $btn_tambah ?>

                </div>
            </div>
            <div class="block-content block-content-full"> 
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped dataex-html5-selectors" id="table-data" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th class="th_center">#</th> 
                                                <th class="th_center">Email</th> 
                                                <th class="th_center">Role</th> 
                                                <th class="th_center">Aksi</th> 
                                            </tr>
                                        </thead>
                                        <tbody id="show_data">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</main>