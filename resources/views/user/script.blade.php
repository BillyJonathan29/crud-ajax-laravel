<script>
    $(document).ready(function(){
        $('#Table').DataTable({
            processing: true,
            serverside: true,
            ajax : {
                url: "{{ route('user') }}",
            },
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false,
            },{
                data: 'name',
                name: 'name',
            },{
                data: 'username',
                name: 'username',
            },{
                data: 'email',
                name: 'email',
            },{
                data: 'aksi',
                name: 'aksi',
            }]

        })
    });

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    // CREATE
    $('body').on('click','.tambah-data', function(e){
        e.preventDefault();
        $('#exampleModal').modal('show');
        $('.tambah-simpan').off('click');
        $('.tambah-simpan').on('click', function(){
            simpan();
        });
    });

    // select nyari

    // $('#wkwkw').select2({
    //     dropdownParent: $('#Examplemodal');
    //     placeholder: "-- Pilih Users --",
    //     allowClear:true,
    // });


    // Edit
    $('body').on('click', '.tambah-edit', function(e){
        var link = $(this).data('link')
        var id = $(this).data('id')
        $.ajax({
            url: link,
            type: 'GET',
            success:function(response){
                $('#exampleModal').modal('show')
                $('#name').val(response.result.name);
                $('#username').val(response.result.username);
                $('#email').val(response.result.email);
                $('#password').val(response.result.password);
                $('.tambah-simpan').off('click');
                $('.tambah-simpan').on('click', function(){
                    simpan(id);
                });
            }
        });
    });



    // function simpan
    function simpan(id = ''){
        if(id == ''){
            var var_url= "{{ route('user.store') }}";
            var var_type=  'POST';
        }else{
            var var_url= 'user/'+ id +'/update';
            var var_type= 'put';
        }
        $.ajax({
            url: var_url,
            type: var_type,
            data: {
                name: $('#name').val(),
                username: $('#username').val(),
                email: $('#email').val(),
                password: $('#password').val()
            },
            success:function(response){
                if(response.errors){
                    console.log(response.errors);
                    $('.alert-danger').removeClass('d-none')
                    $('.alert-danger').append('<ul>');
                    $.each(response.errors,function(key,value){
                        $('.alert-danger').find('ul').append("<li>"+ value +"</li>");
                    });
                    $('.alert-danger').append('</ul>');
                }else{
                    $('.alert-success').removeClass('d-none');
                    $('.alert-success').html(response.success);
                }
                $('#Table').DataTable().ajax.reload();

            }
        });
    }


    // DELETE
    $('body').on('click', '.tambah-del', function(e){
        if(confirm('yakin data mau di hapus') == true){
            var link = $(this).data('link');
            $.ajax({
                url: link,
                type: 'DELETE',
                success: function(response){
                    $('.alert-success').html(response.success);
                }
            });
            $('#Table').DataTable().ajax.reload();
        }

    });


    // close modal
    $('#exampleModal').on('hidden.bs.modal', function(){
        $('#name').val('');
        $('#username').val('');
        $('#email').val('');


        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');

        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');
    });
</script>
