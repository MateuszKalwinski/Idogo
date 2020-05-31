class BackendAnimalSizes {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

        $('#addSize').click(function () {
            $('#addEditModalTitle').text('Dodaj wielkość zwierzaka')
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2')
            $('#sizeName').val('');
            $('label[for="sizeName"]').removeClass('active');
            $('#action').val('add');
            $('#animalSizeId').val('');
            $('#addEditSizeModal').modal('show')
        })
        $(document).on('click', '.edit-animal-size', function () {
            $('#addEditModalTitle').text('Edytuj wielkość zwierzaka')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1')
            let animalSizeName = $(this).closest('tr').find('.animal-size-name').text();
            $('#sizeName').val(animalSizeName);
            $('label[for="sizeName"]').addClass('active');
            $('#action').val('edit');
            let animalSizeId = $(this).closest('tr').find('.animal-size-name').attr('data-animal-size-id');
            $('#animalSizeId').val(animalSizeId);
            $('#addEditSizeModal').modal('show')
        })

        $('#addEditSize').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add'){
                self.saveAnimalSize(new FormData(this), base_url+ "/adminStoreAnimalSize")
            }else{
                self.saveAnimalSize(new FormData(this), base_url+ "/adminUpdateAnimalSize")
            }
        })

        $(document).on('click', '.delete-animal-fur', function () {
            let AnimalfurId = $(this).closest('tr').find('.animal-fur-name').attr('data-animal-fur-id');
            $('#confirm-yes').attr('data-animal-fur-id', AnimalfurId);
            let animalFurName = $(this).closest('tr').find('.animal-fur-name').text();
            $('#animalFurName').text(animalFurName);
            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let animalFurId = $('#confirm-yes').attr('data-animal-fur-id');
            self.deleteAnimalFur(animalFurId);
        })
    }

    deleteAnimalFur(animalFurId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: base_url + "/deleteAnimalFur",
            data: {
                animalFurId: animalFurId,
            },
            dataType: 'json',
            beforeSend: function () {

                /*
                * TODO DODAĆ EFEKT WCZYTYWANIA CAŁEJ TABELI
                * */
            },
            success:function(data)
            {
                var html = '';
                if(data.errors)
                {
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++)
                    {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                if(data.success)
                {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#adminAnimalFursTable').DataTable().ajax.reload();
                }
                $('#form_result').html(html);
            },
            complete: function () {
                /*
                * TODO ZAKOŃCZYĆ EFEKT ŁADOWANIA CAŁEJ TABELI
                * */
            },
            error: function (data) {

            }
        });
    }

    saveAnimalSize(formData, url){
        $.ajax({
            url: url,
            method:"POST",
            data: formData,
            contentType: false,
            cache:false,
            processData: false,
            dataType:"json",
            success:function(data)
            {
                var html = '';
                if(data.errors)
                {
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++)
                    {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                if(data.success)
                {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#sizeName').val('');
                    $('#adminAnimalSizeTable').DataTable().ajax.reload();
                }
                $('#form_result').html(html);
            }
        })
    }
}
