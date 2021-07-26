    </main>
    <!-- END Main Container -->
    <!-- Footer -->
    <footer id="page-footer" class="opacity-0">
        <div class="content py-20 font-size-xs clearfix">
            <div class="float-right">
                Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
            </div>
            <div class="float-left">
                <a class="font-w600" href="https://goo.gl/po9Usv" target="_blank">Codebase 2.0</a> &copy; <span class="js-year-copy">2017</span>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Fade In Modal -->
<div class="modal fade" id="modal-profil" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-update-profil-user">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Edit Profil</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="form-group"> 
                            <div class="row">
                                <div class="col-sm-12" hidden>
                                    <label>ID</label>
                                    <input type="text" class="form-control" name="id" value="<?= $this->session->userdata('id') ?>" required/> 
                                </div>
                                <?php
                                if($this->session->userdata() == 'Pengawas'){
                                    ?>
                                    <div class="col-sm-12">
                                        <label>Username</label>
                                        <input type="text" id="profil_username" class="form-control" name="username" required/> 
                                        <span id="error_profil_username"></span>
                                    </div>
                                <?php } ?>
                                <div class="col-sm-12">
                                    <label>Password Lama</label>
                                    <input type="password" id="profil_old_password" class="form-control" name="old_password" required/> 
                                    <span id="error_profil_old_password"></span>
                                </div>
                                <div class="col-sm-12">
                                    <label>Password Baru</label>
                                    <input type="password" id="profil_new_password" class="form-control" name="new_password" required/> 
                                </div>
                                <div class="col-sm-12">
                                    <label>Ulangi Password Baru</label>
                                    <input type="password" id="profil_confirm_password" class="form-control" name="confirm_password" required/> 
                                    <span id="error_profil_confirm_password"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-alt-success">
                        <i class="fa fa-check"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Fade In Modal -->

<?php //$this->load->view('_templates/modals/loading')?>
<?php
if (isset($modal)){
    foreach ($modal as $include_modal) {
        $this->load->view($include_modal);
    }
}
?> 

<!-- Codebase Core JS -->
<script src="<?= base_url() ?>assets/backend/js/core/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/core/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/core/jquery.slimscroll.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/core/jquery.scrollLock.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/core/jquery.appear.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/core/jquery.countTo.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/core/js.cookie.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/codebase.js"></script>

<script type="text/javascript">
    const csrf = {
        token_name: '<?=$this->security->get_csrf_token_name()?>',
        hash: '<?=$this->security->get_csrf_hash()?>'
    } 

  
</script>
<!-- END: Theme JS-->
<?php
@$chart_bundle ? $this->load->view('_templates/js/chart-bundle'):'';
@$toastr ? $this->load->view('_templates/js/toastr'):'';
@$sweet_alert ? $this->load->view('_templates/js/sweet-alert'):'';
@$leaflet ? $this->load->view('_templates/js/leaflet'):'';
@$select2 ? $this->load->view('_templates/js/select2'):'';
@$dropzone ? $this->load->view('_templates/js/dropzone'):'';
@$highchart ? $this->load->view('_templates/js/highchart'):'';
@$datatables_js ? $this->load->view('_templates/js/datatables'):'';
@$sumernote ? $this->load->view('_templates/js/sumernote'):'';
@$slick ? $this->load->view('_templates/js/slick'):''; 
@$wizard ? $this->load->view('_templates/js/wizard'):'';
@$script ? $this->load->view($script):'';
?>


   <script src="<?= base_url('vendor/usertimeout/jquery.userTimeout.min.js'); ?>"></script>
    <!-- END: Page JS-->
    <script>
        $.sessionTimeout({
            keepAliveUrl: '<?= current_url(); ?>',
            logoutUrl: '<?= base_url('login?page='.current_url()); ?>',
            redirUrl: '<?= base_url('login/session_timeout?page='.current_url()); ?>',
            warnAfter: 50*1000*60, //5 minutes
            redirAfter: 100*1000*60, //10 minutes
            countdownSmart: true,
            countdownMessage: 'Redirecting in {timer} seconds.',
            ajaxType : 'get'
        });
    </script>

    <script type="text/javascript">
        $('#forms').on('submit', function(){
            $('#modal-loading-content').html('');
            $('#modal-loading').modal({
                show: true,
                backdrop: 'static',
                keyboard: false
            }); 
            $('#btn-submit').prop('disabled', true);
            $('#modal-loading-content').html('<?= '<p class="text-center mt-1"><img style="width: 50px;" src="'.base_url('assets/gif/loading.gif').'">Loading...</p>'?>');
        })
        function edit_user(id)
        {
            ajaxModal('<?php echo base_url('pengguna/edit_user/') ?>'+id,'Edit Akun Pengguna','5%');
        }
        function edit_foto_user(id)
        {
            ajaxModal('<?php echo base_url('pengguna/edit_foto_user/') ?>'+id,'Edit Foto Pengguna','5%');
        }

        $('#button_edit_profil').click(function(){
            $('#modal-profil').modal('show');
        })

        $('#form-update-profil-user').submit(function(e) {
            e.preventDefault();
            let data = new FormData(this);
            var url  = "<?= base_url('update_user/index') ?>";
            data.append(csrf.token_name, csrf.hash); 

            let post  = $.ajax({
                url         : url,
                type        : 'POST',
                data        : data,
                dataType    : 'json',
                processData : false,
                contentType : false,
                cache       : false,
                async       : false,
            });
            post.done(function(respon){
                csrf.token_name = respon.csrf.token_name;
                csrf.hash = respon.csrf.hash;

                if(respon.status == true){
                    toastr.success( 'Data berhasil ditambahkan', 'Berhasil', { timeOut: 2000, fadeOut: 2000 });
                    $('#error_profil_confirm_password').html('');
                    $('#error_profil_old_password').html('');
                    setTimeout(() => window.location.reload(), 2500);
                }else{
                    if (typeof respon.username !== 'undefined') {
                        $('#error_profil_username').html(respon.username);
                    }
                    $('#error_profil_confirm_password').html(respon.confirm_password);
                    $('#error_profil_old_password').html(respon.old_password);
                    toastr.error( 'Periksa kembali inputan nda', 'Gagal', { timeOut: 2000, fadeOut: 2000 });
                }
            }, "json");
            post.fail(function(respon){
                toastr.error( 'Ada inputan yang belum terisi', 'Gagal', { timeOut: 2000, fadeOut: 2000 });
                location.reload();
            }, "json");
            post.always(function () {
                $('#api_button_simpan').html('Simpan');
            });
        })
    </script>

</body>
</html>
