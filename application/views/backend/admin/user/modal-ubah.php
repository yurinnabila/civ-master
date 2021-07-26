<div id="modal_ubah" class="modal" id="modal-normal" tabindex="-1" role="dialog" aria-labelledby="modal-small" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary">
                    <h3 class="block-title">Modal Ubah</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <form id="form_ubah">
                    <div class="block-content">


                        <div class="form-group"> 
                            <div class="row">
                                <input type="hidden" name="id" id="id_data">
                                <div class="col-sm-12">
                                    <label>Username</label>
                                    <input type="text" id="ubah_username" class="form-control" name="username" required/> 
                                    <span id="error_username"></span>
                                </div>
                                <div class="col-sm-12">
                                    <label>Role</label>
                                    <select name="id_role" id="ubah_role" class="form-control">
                                        <?php foreach($role as $r):?>
                                           <option value="<?= @$r->id ?>"><?= @$r->nama ?></option>
                                       <?php endforeach ?>
                                   </select>
                               </div>
                               <div class="col-sm-12">
                                <label>Password</label>
                                <input type="password" id="password" class="form-control" name="password" /> 
                            </div>
                            <div class="col-sm-12">
                                <label>Ulangi Password</label>
                                <input type="password" id="confirm_password" class="form-control" name="confirm_password" /> 
                                <span id="error_confirm_password"></span>
                            </div>
                        </div> 
                    </div> 
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id='buttom_ubah'>Simpan</button>
                </div>
            </form> 
        </div> 
    </div>
</div>
</div>