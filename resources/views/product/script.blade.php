<script>
    $(document).ready(function(){
        $('#myTable').DataTable({
            processing: true,
            serverside: true,
            ajax: "{{ url('product') }}",
            columns:[{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
            },{
                data: 'nama',
                name: 'nama'
            },{
                data: 'product',
                name: 'Product'
            },{
                data: 'price',
                name: 'Price'
            },{
                data: 'stock',
                name: 'Stock'
            },{
                data: 'description',
                name: 'Description'
            },{
                data: 'aksi',
                name: 'Aksi',
                orderable: false,
                searchable:false,
            },]
        });
    });

    // GLOBAL SET UP
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    // Crete
    $('body').on('click','.tambah-data', function(e){
        e.preventDefault();
        $('#exampleModal').modal('show');
        $('.tambah-simpan').off('click');
        $('.tambah-simpan').on('click', function(){
            simpan();
        });
    });


     // select nyari
    $('#nama').select2({
        dropdownParent: $('#exampleModal'),
        'placeholder': "-- Pilih Users --",
        allowClear:true,
    });

    // PROSES EDIT
    $('body').on('click','.tambah-edit', function(e){
        var link = $(this).data('link');
        var id = $(this).data('id')
        $.ajax({
            url: link,
            type: 'GET',
            success:function(response){
                $('#exampleModal').modal('show');
                $('#nama').val(response.result.nama);
                $('#product').val(response.result.product);
                $('#price').val(response.result.price);
                $('#stock').val(response.result.stock);
                $('#description').val(response.result.description);
                $('.tambah-simpan').off('click')
                $('.tambah-simpan').on('click', function(){
                    simpan(id);
                });
            }
        });
    });


    // FUNGSI SIMPAN UPDATE
    function simpan(id = ''){
        if (id == ''){
            var var_url = "{{ route('product.store') }}";
            var var_type = 'POST';
        }else{
            var var_url = 'product/'+ id + '/update';
            var var_type = 'PUT';
        }
        $.ajax({
            url: var_url,
            type: var_type,
            data: {
                nama: $('#nama').val(),
                product: $('#product').val(),
                price: $('#price').val(),
                stock: $('#stock').val(),
                description: $('#description').val(),
            },
            success:function(response){
                if(response.errors){
                    console.log(response.errors);
                    $('.alert-danger').removeClass('d-none')
                    $('.alert-danger').append('<ul>');
                        $.each(response.errors,function(key,value){
                            $('.alert-danger').find('ul').append("<li>"+ value + "</li>");
                        });
                    $('.alert-danger').append("</ul>");
                }else{
                    //show success message
                    Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.success}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                }
                $('#myTable').DataTable().ajax.reload();
            }
        });
    }

    // PROSES DELETE
    $('body').on('click','.tambah-del', function(e){

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


        // if() == true){
        //     var link = $(this).data('link');
        //     $.ajax({
        //         url: link,y
        //         type: 'DELETE',
        //     });
        //     $('#myTable').DataTable().ajax.reload();
        // }









    // Close Modal
    $('#exampleModal').on('hidden.bs.modal', function(){
        $('#nama').val('');
        $('#product').val('');
        $('#price').val('');
        $('#stock').val('');
        $('#description').val('');


        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');


        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');
    });
</script>
