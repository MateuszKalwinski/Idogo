class backendAnimalCharacteristics {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

        $('#addCharacteristic').click(function () {
            $('#addEditModalTitle').text('Dodaj cechę zwierzaka');
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2');
            $('#characteristicName').val('');
            $('label[for="colorName"]').removeClass('active');
            $('#action').val('add');
            $('#animalCharacteristicId').val('');
            $('#addEditCharacteristicModal').modal('show')
        })
        $(document).on('click', '.edit-dictionary-characteristic', function () {
            $('#addEditModalTitle').text('Edytuj cechę zwierzaka')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1')
            let animalCharacteristicName = $(this).closest('tr').find('.characteristic-dictionary-name').text();
            $('#characteristicName').val(animalCharacteristicName);
            $('label[for="characteristicName"]').addClass('active');
            $('#action').val('edit');
            let AnimalCharacteristicId = $(this).closest('tr').find('.characteristic-dictionary-name').attr('data-characteristic-dictionary-id');
            $('#animalCharacteristicId').val(AnimalCharacteristicId);
            $('#addEditCharacteristicModal').modal('show')
        })

        $('#addEditCharacteristic').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add'){
                self.saveAnimalCharacteristic(new FormData(this), base_url+ "/adminStoreAnimalCharacteristic")
            }else{
                self.saveAnimalCharacteristic(new FormData(this), base_url+ "/adminUpdateAnimalCharacteristic")
            }
        })

        $(document).on('click', '.delete-dictionary-characteristic', function () {
            let animalCharacteristicId = $(this).closest('tr').find('.animal-characteristic-name').attr('data-characteristic-dictionary-id');
            $('#confirm-yes').attr('data-characteristic-dictionary-id', animalCharacteristicId);
            let animalCharacteristicName = $(this).closest('tr').find('.animal-characteristic-name').text();
            $('#animalCharacteristicName').text(animalCharacteristicName);
            $('#confirmModal').modal('show');
        })

        $(document).on('click', '.restore-dictionary-characteristic, .delete-dictionary-characteristic', function () {

            if ($(this).hasClass('restore-dictionary-characteristic')) {
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

            let dictionaryCharacteristicId = $(this).closest('tr').find('.characteristic-dictionary-name').attr('data-characteristic-dictionary-id');
            $('#confirm-yes').attr('data-dictionary-characteristic-id', dictionaryCharacteristicId);
            let dictionaryCharacteristicName = $(this).closest('tr').find('.characteristic-dictionary-name').text();
            $('.confirm-dictionary-characteristic-name').text(dictionaryCharacteristicName);
            $('##showHideContent').show();
            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let dictionaryCharacteristicId = $('#confirm-yes').attr('data-dictionary-characteristic-id');
            let action = $('#actionDeleteRestore').val();

            if (action === 'restore'){
                self.deleteRestoreDictionaryCharacteristic(dictionaryCharacteristicId, base_url + "/restoreAnimalCharacteristic");
            }else{
                self.deleteRestoreDictionaryCharacteristic(dictionaryCharacteristicId, base_url + "/deleteAnimalCharacteristic");
            }

        })
    }

    deleteRestoreDictionaryCharacteristic(animalCharacteristicId, url){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: url,
            data: {
                animalCharacteristicId: animalCharacteristicId,
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
                    $('#showHideContent').slideUp();
                    $('#adminAnimalCharacteristicsTable').DataTable().ajax.reload();
                }
                $('#confirmFormResult').html(html);
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

    saveAnimalCharacteristic(formData, url){
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
                    $('#characteristicName').val('');
                    $('#adminAnimalCharacteristicsTable').DataTable().ajax.reload();
                }
                $('#formResult').html(html);
            }
        })
    }
}
