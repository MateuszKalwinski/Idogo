class BackendAvailableColors {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX(base_url) {
        let self = this;

        $('#addAvailableColor').on('click', function () {
            self.getBreeds();
            self.getColors();
        })

        $('#addEditAvailableColor').on('submit', function (e) {
            e.preventDefault();
            self.saveAvailableColors(new FormData(this), base_url+ "/adminStoreAvailableColors")
        })

        $(document).on('click', '.delete-available-color', function () {

            let animalSpeciesName = $(this).closest('tr').find('.animal-species-name').text();
            let animalBreedName = $(this).closest('tr').find('.animal-breed-name').text();
            let animalColorName = $(this).closest('tr').find('.animal-color-name').text();
            $('.confirm-animal-color-name').text(animalColorName)
            $('.confirm-animal-breed-name').text(animalSpeciesName +' '+ animalBreedName);
            $('#confirm-yes').attr('data-available-color-id', $(this).attr('data-available-color-id'))

            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let availableColorId = $('#confirm-yes').attr('data-available-color-id');
            self.deleteAvailableColor(availableColorId, base_url + "/deleteAvailableColor")
        })
    }

    saveAvailableColors(formData, url){
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

    getBreeds(breed_id = null){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getBreeds",
            method:"POST",
            data: {
                breed_id: breed_id
            },
            cache:true,
            dataType:"json",
            beforeSend: function () {
                $('#addAvailableColor').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Dodaj kolor do rasy').addClass('disabled');
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

                }else {

                    $('#breedId').append('<option value="" disabled selected>Wybierz rasę</option>');

                    for (let i=0; i<data.length; i++){
                        let optionGroup = ''
                        optionGroup += '<optgroup label="'+ data[i].species_name +'" data-species-id="'+ data[i].species_id +'">';
                        for (let j=0; j<data[i].breeds.length; j++){
                            optionGroup += '<option value="'+ data[i].breeds[j].id +'">'+ data[i].breeds[j].name +'</option>';
                        }
                        optionGroup += '</optgroup>';

                        $('#breedId').append(optionGroup);
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {
                $('#addEditAvailableColorModal').modal('show');
                $('#addAvailableColor').html('Dodaj Kolor do rasy<i class="ml-2 fas fa-lg text-white fa-plus"></i>').removeClass('disabled');

            },
        })
    }

    getColors(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getColors",
            method:"POST",
            data: {},
            cache:true,
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

                }else {

                    $('#colors').append('<option value="" disabled selected>Wybierz kolor/y</option>');

                    for (let i=0; i<data.length; i++){

                        $('#colors').append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
                    }

                }
                $('#form_result').html(html);
            }
        })
    }

    deleteAvailableColor(availableColorId, url){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: url,
            data: {
                availableColorId: availableColorId,
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
                    $('#adminAvailableColorsTable').DataTable().ajax.reload();
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
}
