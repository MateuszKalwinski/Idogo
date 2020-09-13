class BackendShelterApplications {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

        $(document).on('click', '.edit-shelter-application', function () {
            $('.modal-header ').addClass('yellow darken-2').removeClass('danger-color green')
            let applicantName = $(this).closest('tr').find('.application-user-full-name').text();
            $('#applicantName').text(applicantName);

            let applicantShelterName = $(this).closest('tr').find('.application-shelter-name').text();
            $('#applicantShelterName').text(applicantShelterName);

            let applicantShelterAddress = $(this).closest('tr').find('.application-shelter-address').text();
            $('#applicantShelterAddress').text(applicantShelterAddress);

            let applicationShelterId = $(this).closest('tr').find('.edit-shelter-application').attr('data-shelter-application-id');
            $('#applicationShelterId').val(applicationShelterId);


            self.getShelterApplicationStatuses(applicationShelterId);

            $('#EditShelterApplicationModal').modal('show')
        })

        $('#EditShelterApplication').on('submit', function (e) {
            e.preventDefault();

            self.saveShelterApplication(new FormData(this), base_url+ "/adminUpdateShelterApplication")

        })

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

    getShelterApplicationStatuses(applicationShelterId){
        new Helper().ajaxSetup();
        $.ajax({
            url: base_url + "/getShelterApplicationStatuses",
            method: "POST",
            data: {
                applicationShelterId: applicationShelterId,
            },
            cache: true,
            dataType: "json",
            beforeSend: function () {

            },
            success: function (data) {
                var html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';

                } else {

                    let applicationStatuses = $('#animalStatusesId');

                    applicationStatuses.children().remove();
                    applicationStatuses.append('<option value="" disabled selected>Wybierz status aplikacji *</option>');

                    let species = ''
                    $.each(data.success, function (i, applicationStatus) {
                        species += '<option value="' + applicationStatus.id + '">' + applicationStatus.name + '</option>';
                    });

                    applicationStatuses.append(species)

                    $('#animalStatusesId').val(data.success[0].id);

                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
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

    saveShelterApplication(formData, url){
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
                // var html = '';
                // if(data.errors)
                // {
                //     html = '<div class="alert alert-danger">';
                //     for(var count = 0; count < data.errors.length; count++)
                //     {
                //         html += '<p>' + data.errors[count] + '</p>';
                //     }
                //     html += '</div>';
                // }
                // if(data.success)
                // {
                //     html = '<div class="alert alert-success">' + data.success + '</div>';
                //     $('#colorName').val('');
                //     $('#adminAnimalColorsTable').DataTable().ajax.reload();
                // }
                // $('#form_result').html(html);
            }
        })
    }
}
