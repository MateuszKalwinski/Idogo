class BackendAnimalSpecies {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

        $('#addSpecies').click(function () {
            $('#addEditModalTitle').text('Dodaj gatunek')
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2')
            $('#speciesName').val('');
            $('label[for="speciesName"]').removeClass('active');
            $('#action').val('add');
            $('#animalSpeciesId').val('');
            $('#addEditSpeciesModal').modal('show')
        })
        $(document).on('click', '.edit-animal-species', function () {
            $('#addEditModalTitle').text('Edytuj gatunek')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1')
            let AnimalSpeciesName = $(this).closest('tr').find('.animal-species-name').text();
            $('#speciesName').val(AnimalSpeciesName);
            $('label[for="speciesName"]').addClass('active');
            $('#action').val('edit');
            let AnimalSpeciesId = $(this).closest('tr').find('.animal-species-name').attr('data-animal-species-id');
            $('#animalSpeciesId').val(AnimalSpeciesId);
            $('#addEditSpeciesModal').modal('show')
        })

        $('#addEditSpecies').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add'){
                self.saveAnimalSpecies(new FormData(this), base_url+ "/adminStoreAnimalSpecies")
            }else{
                self.saveAnimalSpecies(new FormData(this), base_url+ "/adminUpdateAnimalSpecies")
            }
        })

        $(document).on('click', '.delete-animal-species', function () {
            let animalSpeciesId = $(this).closest('tr').find('.animal-species-name').attr('data-animal-species-id');
            $('#confirm-yes').attr('data-animal-species-id', animalSpeciesId);
            let animalSpeciesName = $(this).closest('tr').find('.animal-species-name').text();
            $('#animalSpeciesName').text(animalSpeciesName);
            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let animalSpeciesId = $('#confirm-yes').attr('data-animal-species-id');
            self.deleteAnimalSpecies(animalSpeciesId);
        })
    }

    deleteAnimalSpecies(animalSpeciesId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: base_url + "/deleteAnimalSpecies",
            data: {
                animalSpeciesId: animalSpeciesId,
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
                    $('#adminSpeciesTable').DataTable().ajax.reload();
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

    saveAnimalSpecies(formData, url){
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
                    $('#adminSpeciesTable').DataTable().ajax.reload();
                }
                $('#form_result').html(html);
            }
        })
    }
}
