class BackendAnimalColors {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

        $('#addColor').click(function () {
            $('#addEditModalTitle').text('Dodaj kolor')
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2')
            $('#colorName').val('');
            $('label[for="colorName"]').removeClass('active');
            $('#action').val('add');
            $('#animalColorId').val('');
            $('#addEditColorModal').modal('show')
        })
        $(document).on('click', '.edit-animal-color', function () {
            $('#addEditModalTitle').text('Edytuj kolor')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1')
            let animalColorName = $(this).closest('tr').find('.animal-color-name').text();
            $('#colorName').val(animalColorName);
            $('label[for="colorName"]').addClass('active');
            $('#action').val('edit');
            let AnimalColorId = $(this).closest('tr').find('.animal-color-name').attr('data-animal-color-id');
            $('#animalColorId').val(AnimalColorId);
            $('#addEditColorModal').modal('show')
        })

        $('#addEditColor').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add'){
                self.saveAnimalColor(new FormData(this), base_url+ "/adminStoreAnimalColor")
            }else{
                self.saveAnimalColor(new FormData(this), base_url+ "/adminUpdateAnimalColor")
            }
        })

        $(document).on('click', '.delete-animal-color', function () {
            let animalColorId = $(this).closest('tr').find('.animal-color-name').attr('data-animal-color-id');
            $('#confirm-yes').attr('data-animal-color-id', animalColorId);
            let animalColorName = $(this).closest('tr').find('.animal-color-name').text();
            $('#animalColorName').text(animalColorName);
            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let animalColorId = $('#confirm-yes').attr('data-animal-color-id');
            self.deleteAnimalColor(animalColorId);
        })
    }

    deleteAnimalColor(animalColorId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: base_url + "/deleteAnimalColor",
            data: {
                animalColorId: animalColorId,
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
                    $('#adminAnimalColorsTable').DataTable().ajax.reload();
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

    saveAnimalColor(formData, url){
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
                    $('#colorName').val('');
                    $('#adminAnimalColorsTable').DataTable().ajax.reload();
                }
                $('#form_result').html(html);
            }
        })
    }
}
