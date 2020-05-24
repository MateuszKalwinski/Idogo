class backendProfile {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

        /*
        * DODAWANIE NUMERU TELEFONU
        * */
        $('#add-phone-number').on('click', function () {
            $('#phone-title-modal').text('Dodaj numer telefonu')
            $('#save-phone-number').attr('data-phone-id', '');
            $('#phone-number').val('');
            $("label[for='phone-number']").removeClass('active');
            $('#phone-modal').modal('show');
        })

        /*
        * EDYCJA NUMERU TELEFONU
        * */
        $('.edit-phone-number ').on('click', function () {
            let phoneNumber = $(this).closest('tr').find('.phone-number').text();
            $('#save-phone-number').attr('data-phone-id', $(this).attr('data-phone-id'));
            $('#phone-number').val(phoneNumber);
            $("label[for='phone-number']").addClass('active');
            $('#phone-title-modal').text('Edytuj numer telefonu');
            $('#phone-modal').modal('show');
        })

        /*
        * ZAPIS DODAWANIA/EDYCJI TELEFONU
        * */
        $('#save-phone-number').on('click', function () {
            self.savePhoneNumber()
        })

        $('.delete-phone-number').on('click', function () {
            let phoneId = $(this).attr('data-phone-id')
            self.deletePhoneNumber(phoneId);
        })
    }

    savePhoneNumber() {

        let saveBtn = $('#save-phone-number');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: base_url + "/savePhoneNumber",
            data: {
                phoneId: saveBtn.attr('data-phone-id'),
                phoneNumber: $('#phone-number').val()
            },
            dataType: 'json',
            beforeSend: function () {
                saveBtn.prop('disabled', true);
            },
            success: function (data) {

                if (data.original) {

                    if (data.original.errors) {
                        var msg = ''

                        jQuery.each(data.original.errors, function (key, value) {
                            msg += value + '<br>'
                        });

                        new Errors().showErrorModal(msg);
                    }

                }else {

                    if (!data['errors']) {

                        new Success().showSuccessModal('Zapisano',data['success']['global']);

                    } else {
                        new Errors().showErrorModal(data['errors']['global']);
                    }

                }

            },
            complete: function () {
                saveBtn.prop('disabled', false);
            },
            error: function (data) {

            }
        });
    }

    deletePhoneNumber(phoneId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: base_url + "/deletePhoneNumber",
            data: {
                phoneId: phoneId,
            },
            dataType: 'json',
            beforeSend: function () {

                /*
                * TODO DODAĆ EFEKT WCZYTYWANIA CAŁEJ TABELI
                * */
            },
            success: function (data) {

                if (data.original) {

                    if (data.original.errors) {
                        var msg = ''

                        jQuery.each(data.original.errors, function (key, value) {
                            msg += value + '<br>'
                        });

                        new Errors().showErrorModal(msg);
                    }

                }else {

                    if (!data['errors']) {

                        new Success().showSuccessModal('Usunięto', data['success']['global'])

                    } else {
                        new Errors().showErrorModal(data['errors']['global']);
                    }

                }

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
