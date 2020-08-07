class BackendAvailableCharacteristicDictionary {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
        this.getBreeds();
        this.getFurs()
    }

    UX(base_url) {
        let self = this;

        $('#addAvailableCharacteristic').click(function () {
            $('#addEditModalTitle').text('Dodaj cechę dla rasy');
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2 danger-color green darken-2');
            $('#speciesId').val('');
            $('#characteristics').val('');
            $('#action').val('add');
            $('#animalSpeciesId').val('');
            $('#addEditAvailableCharacteristicModal').modal('show')
        })

        $(document).on('click', '.edit-available-characteristic', function () {
            let animalSpeciesId = $(this).closest('tr').find('.animal-species-name').attr('data-animal-species-id');
            self.getAvailableCharacteristicForSpecies(animalSpeciesId)
            $('#addEditModalTitle').text('Edytuj cechę dla rasy')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1 danger-color green')
            $('#action').val('edit');
        })


        $('#addEditAvailableCharacteristic').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add'){
                self.saveAvailableCharacteristics(new FormData(this), base_url+ "/adminStoreAvailableCharacteristics")
            }else{
                self.saveAvailableCharacteristics(new FormData(this), base_url+ '/adminUpdateAvailAbleCharacteristics')
            }
        })

        $(document).on('click', '.delete-available-characteristic', function () {

            let animalSpeciesName = $(this).closest('tr').find('.animal-species-name').text();
            let animalCharacteristicName = $(this).closest('tr').find('.animal-characteristic-name').text();
            $('.confirm-animal-fur-name').text(animalCharacteristicName)
            $('.confirm-animal-species-name').text(animalSpeciesName );
            $('#confirm-yes').attr('data-available-characteristic-id', $(this).attr('data-available-characteristic-id'))
            $('#confirmModalHeader').addClass('danger-color').removeClass('green darken-2 yellow darken-2 teal lighten-1')
            $('#showHideContent').slideDown();
            $('#confirmFormResult').children().remove();
            $('#confirmModal').modal('show');

            /*
            * TODO THIS MIGHT BE NEW MAIL COLOR #657cff
            * */
        })

        $('#confirm-yes').on('click', function () {
            let availableCharacteristicId = $('#confirm-yes').attr('data-available-characteristic-id');
            self.deleteAvailableCharacteristic(availableCharacteristicId, base_url + "/deleteAvailableCharacteristic")
        })
    }

    getAvailableCharacteristicForSpecies(animalSpeciesId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: base_url + "/getAvailableDataForSpecies",
            data: {
                animalSpeciesId: animalSpeciesId,
                type: 'characteristics',
            },
            dataType: 'json',
            beforeSend: function () {
                $('#formResult').children().remove();
                $(".edit-available-characteristic[data-available-characteristic-id='" + animalSpeciesId +"']").html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Wyświetl numery').addClass('disabled');
                $('#characteristics option:selected').each(function() {
                    $(this).prop('selected', false);
                });
            },
            success: function (data) {

                if(data.errors)
                {
                    let html = '';
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++)
                    {
                        html += '<p class="m-0">' + data.errors[count] + '</p>';
                    }
                    html += '</div>';

                    $('#formResult').html(html);
                }
                if(data.success)
                {
                    for (let i=0; i<data.success.length; i++){
                        $('#characteristics option[value=' + data.success[i].fur_id + ']').prop('selected', true);
                    }

                    $('#characteristics').materialSelect();
                    $('#breedId').val(animalSpeciesId)
                }
            },
            complete: function () {
                $(".edit-available-characteristic[data-available-characteristic-id='" + animalSpeciesId +"']").html('<i class="fas fa-edit"></i>').removeClass('disabled');
                $('#addEditAvailableFurModal').modal('show')
            },
            error: function (data) {

            }
        });
    }

    saveAvailableCharacteristics(formData, url){
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
                    $('#adminAvailableCharacteristicTable').DataTable().ajax.reload();
                }
                $('#formResult').html(html);
            }
        })
    }

    getSpecies(species_id = null){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getSpecies",
            method:"POST",
            data: {
                species_id: species_id
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

                    $('#speciesId').append('<option value="" disabled selected>Wybierz gatunek</option>');

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

    getCharacteristics(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getCharacteristics",
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

                    $('#furs').append('<option value="" disabled selected>Wybierz futro/a</option>');

                    for (let i=0; i<data.length; i++){

                        $('#furs').append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
                    }

                }
                $('#form_result').html(html);
            }
        })
    }

    deleteAvailableFur(availableFurId, url){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: url,
            data: {
                availableFurId: availableFurId,
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
                    $('#adminAvailableFursTable').DataTable().ajax.reload();
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
