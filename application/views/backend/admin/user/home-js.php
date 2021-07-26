<script type="text/javascript">
    let status = true;
    $(document).ready(function(){
        load_table();
        $('#hide_show_data').hide();
        $('#edit_hide_show_data').show();
    }); 

    function load_table(){ 
        $('#table-data').dataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= base_url($uri_segment.'get_data') ?>',
                type: 'GET',
                dataType: 'JSON',
                data: function(d){
                    d[csrf.token_name] = csrf.hash;
                }
            },
            drawCallback: function(res) {
                csrf.token_name = res.json.csrf.token_name;
                csrf.hash = res.json.csrf.hash;
            },
            language: {
                processing: '<div class="spinner-border""></div>'
            },
            order: [],
            columnDefs: [{
                    targets: [0, 3],
                    orderable: false
                },
                {
                    targets: [0, 3],
                    className: 'text-center'
                }

            ],
            scrollX: true
        });
         
    }

    function cek_required_tambah() {
        status = true;
        $('#form_tambah .required').each(function(){
            if( $(this).val() == "" ){
              toastr.error( 'Ada inputan yang belum terisi', 'Gagal', { timeOut: 2000, fadeOut: 2000 });
              status = false;
            }
        });
        return status;
    }

    function cek_required_ubah() {
        status = true;
        $('#form_ubah .required').each(function(){
            if( $(this).val() == "" ){
              toastr.error( 'Ada inputan yang belum terisi', 'Gagal', { timeOut: 2000, fadeOut: 2000 });
              status = false;
            }
        });
        return status;
    }

    $('#form_tambah').submit(function(e) {
        e.preventDefault();

        if (cek_required_tambah() == true) {
            let data = new FormData(this);
            var url  = "<?= base_url($uri_segment.'store') ?>";
            data.append(csrf.token_name, csrf.hash); 

            $.ajax({
                url: url,
                type: "POST",
                data: data,
                dataType : "JSON",
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend:function(){
                    $('#buttom_tambah').text("proses...");
                },
                success: function(data) {
                    if (data.status == true) {
                        load_table(); 
                        $('#modal_tambah').modal('hide');
                      
                        $('#buttom_tambah').text("Simpan"); 
                        toastr.success( 'Data berhasil ditambahkan', 'Berhasil', { timeOut: 2000, fadeOut: 2000 });
                    } else { 
                        $('#buttom_tambah').text("Simpan");
                        toastr.error( 'Periksa Inputan Anda', { timeOut: 2000, fadeOut: 2000 });
                    }                  

                    csrf.token_name = data.csrf.token_name;
                    csrf.hash = data.csrf.hash; 
                    
                },
                error: function () {
                    toastr.error( 'Periksa Inputan Anda', { timeOut: 2000, fadeOut: 2000 });
                    location.reload();
                }
            });
        } 
    });

    $('#form_ubah').submit(function(e) {
        e.preventDefault();

        if (cek_required_ubah() == true) {
            let data = new FormData(this);
            var url  = "<?php echo base_url($uri_segment.'store') ?>";
            data.append(csrf.token_name, csrf.hash); 

            $.ajax({
                url: url,
                type: "POST",
                data: data,
                dataType : "JSON",
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend:function(){
                    $('#buttom_ubah').text("proses...");
                },
                success: function(data) {
                    if (data.status == true) {
                        load_table(); 
                        toastr.success( 'Data berhasil diubah', 'Berhasil', { timeOut: 2000, fadeOut: 2000 });
                        $('#modal_ubah').modal('hide');
                        $('#ubah_email').val("");
                        $('#ubah_username').val("");
                        $('#ubah_password').val("");
                        $('#ubah_confirm_password').val("");
                        $('#buttom_ubah').text("Simpan"); 
                    } else { 
                        $('#buttom_ubah').text("Simpan");
                        $('#error_edit_username').html(data.username);
                        $('#error_edit_confirm_password').html(data.confirm_password);
                        toastr.error( 'Periksa Inputan Anda', { timeOut: 2000, fadeOut: 2000 });
                        // location.reload();
                    }                  

                    csrf.token_name = data.csrf.token_name;
                    csrf.hash = data.csrf.hash; 
                    
                },
                error: function () {
                    toastr.error( 'Periksa Inputan Anda', { timeOut: 2000, fadeOut: 2000 });
                    location.reload();
                }
            });
        } 
    });

    $('#tombol_tambah').click(function(){
        $('#modal_tambah').modal('show');
        get_penduduk();
    });

    $('#show_data').on('click','.tombol_ubah',function(){
        var id = $(this).attr('data'); 

        $.ajax({
            url: "<?= base_url($uri_segment.'detail') ?>",
            type: 'POST',
            dataType: 'JSON',
            data: {
                id:id,
                [csrf.token_name]: csrf.hash
            },
            success: function(data){
                if (data.status == true) {
                    $('#id_data').val(data.data.id);
                    $('#ubah_username').val(data.data.username);
                    $('#ubah_role').val(data.data.id_role);
                    
                    $('#modal_ubah').modal('show');
                } else {
                    toastr.error( 'Koneksi Bermasalah', { timeOut: 2000, fadeOut: 2000 }); 
                }
                csrf.token_name = data.csrf.token_name;
                csrf.hash = data.csrf.hash; 
                
            },
            error: function () {
                toastr.error( 'Periksa Inputan Anda', { timeOut: 2000, fadeOut: 2000 });
                // location.reload();
            }
        }); 
    });

    // Menampilkan model 

    $('#show_data').on('click','.tombol_hapus',function(){
        var id = $(this).attr('data');
        Swal.fire({
          title: 'Apakah Anda Yakin',
          text: "Anda akan menghapus data ini",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus',
          cancelButtonText: 'Tidak',
          confirmButtonClass: 'btn btn-warning',
          cancelButtonClass: 'btn btn-danger ml-1',
          buttonsStyling: false,
        }).then(function (result) {

          if (result.value) {
            $.ajax({
                url: "<?php echo base_url($uri_segment.'delete/') ?>"+id,
                type: "POST",
                data: 
                    {
                        [csrf.token_name]: csrf.hash
                    }
                ,
                dataType : "JSON", 
                success: function(data) { 
                    toastr.success('Data berhasil dihapus');
                    load_table();
                    $('#table-data').DataTable().ajax.reload();

                    csrf.token_name = data.csrf.token_name;
                    csrf.hash = data.csrf.hash;              
                },
            });
            
          }
        });
        
    }); 


</script>
