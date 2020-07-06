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
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2 danger-color green darken-2')
            $('#colorName').val('');
            $('label[for="colorName"]').removeClass('active');
            $('#action').val('add');
            $('#animalColorId').val('');
            $('#addEditColorModal').modal('show')
        })
        $(document).on('click', '.edit-animal-color', function () {
            $('#addEditModalTitle').text('Edytuj kolor')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1 danger-color green')
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
        console.log('test');

        $(document).on('click', '.restore-animal-color, .delete-animal-color', function () {

            if ($(this).hasClass('restore-animal-color')) {
                $('#actionDeleteRestore').val('restore');
                $('#animalRestoreText').removeClass('d-none').children().removeClass('d-none');
                $('#animalDeleteText').addClass('d-none').children().addClass('d-none')
                $('#confirmModalHeader').addClass('green darken-2').removeClass('danger-color yellow darken-2 teal lighten-1')
            } else {
                $('#actionDeleteRestore').val('delete');
                $('#animalDeleteText').removeClass('d-none').children().removeClass('d-none');
                $('#animalRestoreText').addClass('d-none').children().addClass('d-none')
                $('#confirmModalHeader').addClass('danger-color').removeClass('green darken-2 yellow darken-2 teal lighten-1')
            }

            let animalColorId = $(this).closest('tr').find('.animal-color-name').attr('data-animal-color-id');
            $('#confirm-yes').attr('data-animal-color-id', animalColorId);
            let animalColorName = $(this).closest('tr').find('.animal-color-name').text();
            $('.confirm-animal-color-name').text(animalColorName);
            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let animalColorId = $('#confirm-yes').attr('data-animal-color-id');
            let action = $('#actionDeleteRestore').val();

            if (action === 'restore'){
                self.deleteRestoreAnimalColor(animalColorId, base_url + "/restoreAnimalColor");
            }else{
                self.deleteRestoreAnimalColor(animalColorId, base_url + "/deleteAnimalColor");
            }

        })
    }

    deleteRestoreAnimalColor(animalColorId, url){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: url,
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
