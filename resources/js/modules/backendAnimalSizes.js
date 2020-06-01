class BackendAnimalSizes {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

        $('#addSize').click(function () {
            $('#addEditModalTitle').text('Dodaj wielkość zwierzaka')
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2 danger-color')
            $('#sizeName').val('');
            $('label[for="sizeName"]').removeClass('active');
            $('#action').val('add');
            $('#animalSizeId').val('');
            $('#addEditSizeModal').modal('show')
        })
        $(document).on('click', '.edit-animal-size', function () {
            $('#addEditModalTitle').text('Edytuj wielkość zwierzaka')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1 danger-color')
            let animalSizeName = $(this).closest('tr').find('.animal-size-name').text();
            $('#sizeName').val(animalSizeName);
            $('label[for="sizeName"]').addClass('active');
            $('#action').val('edit');
            let animalSizeId = $(this).closest('tr').find('.animal-size-name').attr('data-animal-size-id');
            $('#animalSizeId').val(animalSizeId);
            $('#addEditSizeModal').modal('show')
        })

        $('#addEditSize').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add') {
                self.saveAnimalSize(new FormData(this), base_url + "/adminStoreAnimalSize")
            } else {
                self.saveAnimalSize(new FormData(this), base_url + "/adminUpdateAnimalSize")
            }
        })

        $(document).on('click', '.restore-animal-size, .delete-animal-size', function () {

            if ($(this).hasClass('restore-animal-size')) {
                $('#actionDeleteRestore').val('restore');
                $('#animalRestoreText').removeClass('d-none').children().removeClass('d-none');
                $('#animalDeleteText').addClass('d-none').children().addClass('d-none')
                $('#confirmModalHeader').addClass('green darken-2').removeClass('danger-color')
            } else {
                $('#actionDeleteRestore').val('delete');
                $('#animalDeleteText').removeClass('d-none').children().removeClass('d-none');
                $('#animalRestoreText').addClass('d-none').children().addClass('d-none')
                $('#confirmModalHeader').addClass('danger-color').removeClass('green darken-2')
            }

            let animalSizeId = $(this).closest('tr').find('.animal-size-name').attr('data-animal-size-id');
            $('#confirm-yes').attr('data-animal-size-id', animalSizeId);
            let animalSizeName = $(this).closest('tr').find('.animal-size-name').text();
            $('.confirm-animal-size-name').text(animalSizeName);
            $('#confirmModal').modal('show');
        })


        $('#confirm-yes').on('click', function () {
            let animalSizeId = $('#confirm-yes').attr('data-animal-size-id');
            let action = $('#actionDeleteRestore').val();

            if (action === 'restore'){
                self.deleteRestoreAnimalSize(animalSizeId, base_url + "/restoreAnimalSize");
            }else{
                self.deleteRestoreAnimalSize(animalSizeId, base_url + "/deleteAnimalSize");
            }

        })
    }

    deleteRestoreAnimalSize(animalSizeId, url) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: url,
            data: {
                animalSizeId: animalSizeId,
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
                    $('#adminAnimalSizeTable').DataTable().ajax.reload();
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

    saveAnimalSize(formData, url) {
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
                    $('#sizeName').val('');
                    $('#adminAnimalSizeTable').DataTable().ajax.reload();
                }
                $('#form_result').html(html);
            }
        })
    }
}
