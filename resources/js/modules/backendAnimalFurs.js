class BackendAnimalFurs {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

        $('#addFur').click(function () {
            $('#addEditModalTitle').text('Dodaj długość futra')
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2')
            $('#furName').val('');
            $('label[for="furName"]').removeClass('active');
            $('#action').val('add');
            $('#animalFurId').val('');
            $('#addEditFurModal').modal('show')
        })
        $(document).on('click', '.edit-animal-fur', function () {
            $('#addEditModalTitle').text('Edytuj długość futra')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1')
            let animalFurName = $(this).closest('tr').find('.animal-fur-name').text();
            $('#furName').val(animalFurName);
            $('label[for="furName"]').addClass('active');
            $('#action').val('edit');
            let AnimalfurId = $(this).closest('tr').find('.animal-fur-name').attr('data-animal-fur-id');
            $('#animalFurId').val(AnimalfurId);
            $('#addEditFurModal').modal('show')
        })

        $('#addEditFur').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add') {
                self.saveAnimalColor(new FormData(this), base_url + "/adminStoreAnimalFur")
            } else {
                self.saveAnimalColor(new FormData(this), base_url + "/adminUpdateAnimalFur")
            }
        })

        $(document).on('click', '.restore-animal-fur, .delete-animal-fur', function () {

            if ($(this).hasClass('restore-animal-fur')) {
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

            let animalFurId = $(this).closest('tr').find('.animal-fur-name').attr('data-animal-fur-id');
            $('#confirm-yes').attr('data-animal-fur-id', animalFurId);
            let animalFurName = $(this).closest('tr').find('.animal-fur-name').text();
            $('.confirm-animal-fur-name').text(animalFurName);
            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            console.log($('#confirm-yes'));
            let animalFurId = $('#confirm-yes').attr('data-animal-fur-id');
            let action = $('#actionDeleteRestore').val();

            self.deleteRestoreAnimalFur(animalFurId, action, base_url + "/deleteRestoreAnimalFur");

        })
    }

    deleteRestoreAnimalFur(animalFurId, action, url) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                animalFurId: animalFurId,
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
                    $('#adminAnimalFursTable').DataTable().ajax.reload();
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

    saveAnimalColor(formData, url) {
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
                    $('#furName').val('');
                    $('#adminAnimalFursTable').DataTable().ajax.reload();
                }
                $('#form_result').html(html);
            }
        })
    }
}
