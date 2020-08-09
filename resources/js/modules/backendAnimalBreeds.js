class BackendAnimalBreeds {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
        this.getSpecies();
    }

    UX() {
        let self = this;

        $('#addBreed').click(function () {
            $('#addEditModalTitle').text('Dodaj rasę')
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2')
            $('#breedName').val('');
            $('#speciesId').val('');
            $('label[for="breedName"]').removeClass('active');
            $('#animalBreedId').val('');
            $('#action').val('add');
            $('#addEditBreedModal').modal('show')
        })
        $(document).on('click', '.edit-animal-breed', function () {
            $('#addEditModalTitle').text('Edytuj rasę')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1')
            let animalBreedName = $(this).closest('tr').find('.animal-breed-name').text();
            $('#breedName').val(animalBreedName);
            let speciesId = $(this).closest('tr').find('.animal-species-name').attr('data-animal-species-id');
            $('#speciesId').val(speciesId);

            $('label[for="breedName"]').addClass('active');
            $('#action').val('edit');
            let animalBreedId = $(this).closest('tr').find('.animal-breed-name').attr('data-animal-breed-id');
            $('#animalBreedId').val(animalBreedId);
            $('#addEditBreedModal').modal('show')
        })

        $('#addEditBreed').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add') {
                self.saveAnimalBreed(new FormData(this), base_url + "/adminStoreAnimalBreed")
            } else {
                self.saveAnimalBreed(new FormData(this), base_url + "/adminUpdateAnimalBreed")
            }
        })

        $(document).on('click', '.restore-animal-breed, .delete-animal-breed', function () {

            if ($(this).hasClass('restore-animal-breed')) {
                $('#actionDeleteRestore').val('restore');
                $('#animalRestoreText').removeClass('d-none').children().removeClass('d-none');
                $('#animalDeleteText').addClass('d-none').children().addClass('d-none')
                $('#confirmModalHeader').addClass('green darken-2').removeClass('danger-color teal lighten-1 yellow darken-2')
            } else {
                $('#actionDeleteRestore').val('delete');
                $('#animalDeleteText').removeClass('d-none').children().removeClass('d-none');
                $('#animalRestoreText').addClass('d-none').children().addClass('d-none')
                $('#confirmModalHeader').addClass('danger-color').removeClass('green darken-2 teal lighten-1 yellow darken-2')
            }

            let animalBreedId = $(this).closest('tr').find('.animal-breed-name').attr('data-animal-breed-id');
            $('#confirm-yes').attr('data-animal-breed-id', animalBreedId);
            let animalBreedName = $(this).closest('tr').find('.animal-breed-name').text();
            $('.confirm-animal-breed-name').text(animalBreedName);
            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let animalBreedId = $('#confirm-yes').attr('data-animal-breed-id');
            let action = $('#actionDeleteRestore').val();

            self.deleteRestoreAnimalBreed(animalBreedId, action, base_url + "/deleteRestoreAnimalBreed");

        })
    }

    deleteRestoreAnimalBreed(animalBreedId, action, url) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                animalBreedId: animalBreedId,
                action: action,
            },
            dataType: 'json',
            beforeSend: function () {

                /*
                * TODO DODAĆ EFEKT WCZYTYWANIA CAŁEJ TABELI
                * */
            },
            success: function (data) {
                var html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                if (data.success) {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#adminBreedsTable').DataTable().ajax.reload();
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

    saveAnimalBreed(formData, url) {
        $.ajax({
            url: url,
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                var html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                if (data.success) {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#speciesId').val('');
                    $('#breedName').val('');
                    $('#adminBreedsTable').DataTable().ajax.reload();
                }
                $('#form_result').html(html);
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

                        $('#speciesId').append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }
}
