class BackendAvailableFurs {

    constructor(base_url) {
        this.init(base_url);
        console.log('test');
    }

    init(base_url) {
        this.UX(base_url);
        this.getBreeds();
        this.getFurs()
    }

    UX(base_url) {
        let self = this;

        $('#addAvailableFur').click(function () {
            $('#addEditModalTitle').text('Dodaj dostępną długość futra dla rasy');
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2 danger-color green darken-2');
            $('#breedId').val('');
            $('#furs').val('');
            $('#action').val('add');
            $('#animalBreedId').val('');
            $('#addEditAvailableFurModal').modal('show')
        })

        $(document).on('click', '.edit-available-fur', function () {
            let animalBreedId = $(this).closest('tr').find('.animal-breed-name').attr('data-animal-breed-id');
            self.getAvailableFursForBreed(animalBreedId)
            $('#addEditModalTitle').text('Edytuj dostępną długość futra dla rasy')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1 danger-color green')
            $('#action').val('edit');
        })


        $('#addEditAvailableColor').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add'){
                self.saveAvailableFurs(new FormData(this), base_url+ "/adminStoreAvailableFurs")
            }else{
                self.saveAvailableFurs(new FormData(this), base_url+ '/adminUpdateAvailAbleFurs')
            }
        })

        $(document).on('click', '.delete-available-fur', function () {

            let animalSpeciesName = $(this).closest('tr').find('.animal-species-name').text();
            let animalBreedName = $(this).closest('tr').find('.animal-breed-name').text();
            let animalFurName = $(this).closest('tr').find('.animal-fur-name').text();
            $('.confirm-animal-fur-name').text(animalFurName)
            $('.confirm-animal-breed-name').text(animalSpeciesName +' '+ animalBreedName);
            $('#confirm-yes').attr('data-available-fur-id', $(this).attr('data-available-fur-id'))
            $('#confirmModalHeader').addClass('danger-color').removeClass('green darken-2 yellow darken-2 teal lighten-1')
            $('#showHideContent').slideDown();

            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let availableFurId = $('#confirm-yes').attr('data-available-fur-id');
            self.deleteAvailableFur(availableFurId, base_url + "/deleteAvailableFur")
        })
    }

    getAvailableFursForBreed(animalBreedId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: base_url + "/getAvailableDataForBreed",
            data: {
                animalBreedId: animalBreedId,
                type: 'furs',
            },
            dataType: 'json',
            beforeSend: function () {
                $(".edit-available-fur[data-available-fur-id='" + animalBreedId +"']").html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Wyświetl numery').addClass('disabled');

            },
            success: function (data) {

                if(data.errors)
                {

                }
                if(data.success)
                {
                    for (let i=0; i<data.success.length; i++){
                        $('#furs option[value=' + data.success[i].fur_id + ']').attr('selected', true);
                    }
                    $('#furs').materialSelect();
                    $('#breedId').val(animalBreedId)


                }
            },
            complete: function () {
                $(".edit-available-fur[data-available-fur-id='" + animalBreedId +"']").html('<i class="fas fa-edit"></i>').removeClass('disabled');
                $('#addEditAvailableFurModal').modal('show')
            },
            error: function (data) {

            }
        });
    }

    saveAvailableFurs(formData, url){
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
                    $('#adminAvailableFursTable').DataTable().ajax.reload();
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

    getFurs(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getFurs",
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
