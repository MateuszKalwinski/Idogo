class BackendAvailableColors {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
        this.getBreeds();
        this.getColors()
    }

    UX(base_url) {
        let self = this;

        $('#addAvailableColor').click(function () {
            $('#addEditModalTitle').text('Dodaj kolor dla rasy');
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2 danger-color green darken-2');
            $('#breedId').val('');
            $('#colors').val('');
            $('#action').val('add');
            $('#animalBreedId').val('');
            $('#addEditAvailableColorModal').modal('show')
        })

        $(document).on('click', '.edit-available-color', function () {
            let animalBreedId = $(this).closest('tr').find('.animal-breed-name').attr('data-animal-breed-id');
            self.getAvailableColorsForBreed(animalBreedId)
            $('#addEditModalTitle').text('Edytuj cechę zwierzaka')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1 danger-color green')
            $('#action').val('edit');
        })


        $('#addEditAvailableColor').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add'){
                self.saveAvailableColors(new FormData(this), base_url+ "/adminStoreAvailableColors")
            }else{
                self.saveAvailableColors(new FormData(this), base_url+ '/adminUpdateAvailAbleColors')
            }
        })

        $(document).on('click', '.delete-available-color', function () {

            let animalSpeciesName = $(this).closest('tr').find('.animal-species-name').text();
            let animalBreedName = $(this).closest('tr').find('.animal-breed-name').text();
            let animalColorName = $(this).closest('tr').find('.animal-color-name').text();
            $('.confirm-animal-color-name').text(animalColorName)
            $('.confirm-animal-breed-name').text(animalSpeciesName +' '+ animalBreedName);
            $('#confirm-yes').attr('data-available-color-id', $(this).attr('data-available-color-id'))
            $('#confirmModalHeader').addClass('danger-color').removeClass('green darken-2 yellow darken-2 teal lighten-1')
            $('#showHideContent').slideDown();

            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let availableColorId = $('#confirm-yes').attr('data-available-color-id');
            self.deleteAvailableColor(availableColorId, base_url + "/deleteAvailableColor")
        })
    }

    getAvailableColorsForBreed(animalBreedId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: base_url + "/getAvailableColorsForBreed",
            data: {
                animalBreedId: animalBreedId,
            },
            dataType: 'json',
            beforeSend: function () {
                $(".edit-available-color[data-available-color-id='" + animalBreedId +"']").html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Wyświetl numery').addClass('disabled');

            },
            success: function (data) {

                if(data.errors)
                {

                }
                if(data.success)
                {
                    for (let i=0; i<data.success.length; i++){
                        $('#colors option[value=' + data.success[i].color_id + ']').attr('selected', true);
                    }
                    $('#colors').materialSelect();
                    $('#breedId').val(animalBreedId)


                }
            },
            complete: function () {
                $(".edit-available-color[data-available-color-id='" + animalBreedId +"']").html('<i class="fas fa-edit"></i>').removeClass('disabled');
                $('#addEditAvailableColorModal').modal('show')
            },
            error: function (data) {

            }
        });
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
                    $('#adminAvailableColorsTable').DataTable().ajax.reload();
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
