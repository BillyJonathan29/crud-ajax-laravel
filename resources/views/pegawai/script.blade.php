<script>
    $(document).ready(function(){
        $('#myTable').DataTable({
            processing:true,
            serverside:true,
            ajax:"{{ url('pegawai') }}",
            columns:[{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable:false,
                searchable:false,
            },{
                data: 'nama',
                name: 'Nama'
            },{
                data: 'image',
                name: 'image'
            },{
                data: 'email',
                name: 'Email'
            },{
                data: 'aksi',
                name: 'Aksi'
            },]
        });
    });

    // GLOBAL SETUP

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    //proses simpan

    $('body').on('click','.tombol-tambah', function(e){
        e.preventDefault();
        $('#exampleModal').modal('show');
        $('.tombol-simpan').off('click')
        $('.tombol-simpan').on('click',function(){
            // var nama = $('#nama').val();
            // var email = $('#email').val();
            // console.log(nama +'-'+ email);
            simpan();
        });
    });

    // // search select 2
    // $('#nama').select2({
    //     dropdownParent: $('#exampleModal'),
    //     'placeholder': "-- Pilih Users --",
    //     allowClear:true,
    // });


    // PROSES EDIT
    $('body').on('click','.tombol-edit', function(e){
        var id = $(this).data('id');
        var link = $(this).data('link');
        $.ajax({
            url:link,
            type: 'GET',
            success:function(response){
                $('#exampleModal').modal('show');
                $('#nama').val(response.result.nama);
                $('#image').val(response.result.image);
                $('#email').val(response.result.email);
                $('.tombol-simpan').off('click')
                $('.tombol-simpan').on('click',function(){
                  simpan(id);
                });
            }
        });
    });


    // FUNGSI SIMPAN DAN UPDATE

    function simpan(id = ''){
        if (id == ''){
            var var_url = "{{ route('pegawai.store') }}";
            var var_type = 'POST';
        }else{
            var var_url = 'pegawai/' + id + '/update';
            var var_type = 'put';

        }
        $.ajax({
                url: var_url,
                type: var_type,
                data: {
                    nama: $('#nama').val(),
                    image: $('#image').val(),
                    email: $('#email').val()
                },
                success:function(response){
                    if(response.errors){
                        console.log(response.errors);
                        $('.alert-danger').removeClass('d-none')
                        $('.alert-danger').append("<ul>");
                            $.each(response.errors,function(key,value) {
                                $('.alert-danger').find('ul').append("<li>"+ value +"</li>");
                            });
                        $('.alert-danger').append("</ul>");
                    } else {
                         //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.success}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                    $('#exampleModal').modal('hide')
                    $('#myTable').DataTable().ajax.reload();
                }
            });
    }

    // PROSES DELETE
    $('body').on('click','.tombol-del', function(e){

        let link = $(this).data('link');

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {

                console.log('test');

                //fetch to delete data
                $.ajax({

                    url: link,
                    type: "DELETE",
                    cache: false,
                    success:function(response){
                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.success}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#myTable').DataTable().ajax.reload()
                    }
                });


            }
        })

    });
    // $('body').on('click','.tombol-del', function(e){
    //     if(confirm('yakin mau di hapus') == true){
    //         var link = $(this).data('link');
    //         $.ajax({
    //             url: link,
    //             type: 'DELETE',
    //         });
    //         $('#myTable').DataTable().ajax.reload();
    //     }
    // });

    $('#exampleModal').on('hidden.bs.modal',function(){
        $('#nama').val('');
        $('#image').val('');
        $('#email').val('');

        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');

        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');


    });
</script>
