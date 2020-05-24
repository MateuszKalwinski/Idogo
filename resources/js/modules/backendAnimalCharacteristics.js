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
        $(document).on('click', '.edit-animal-characteristic', function () {
            $('#addEditModalTitle').text('Edytuj cechę zwierzaka')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1')
            let animalCharacteristicName = $(this).closest('tr').find('.animal-characteristic-name').text();
            $('#characteristicName').val(animalCharacteristicName);
            $('label[for="colorName"]').addClass('active');
            $('#action').val('edit');
            let AnimalCharacteristicId = $(this).closest('tr').find('.animal-characteristic-name').attr('data-characteristic-dictionary-id');
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

        $(document).on('click', '.delete-animal-characteristic', function () {
            let animalCharacteristicId = $(this).closest('tr').find('.animal-characteristic-name').attr('data-characteristic-dictionary-id');
            $('#confirm-yes').attr('data-characteristic-dictionary-id', animalCharacteristicId);
            let animalCharacteristicName = $(this).closest('tr').find('.animal-characteristic-name').text();
            $('#animalCharacteristicName').text(animalCharacteristicName);
            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let animalCharacteristicId = $('#confirm-yes').attr('data-characteristic-dictionary-id');
            self.deleteAnimalCharacteristic(animalCharacteristicId);
        })
    }

    deleteAnimalCharacteristic(animalCharacteristicId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: base_url + "/deleteAnimalCharacteristic",
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
                $('#form_result').html(html);
            }
        })
    }
}
