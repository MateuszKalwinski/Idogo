class frontendAnimal {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
        this.slider()
    }

    UX() {
        let self = this;

        $("#scrollToMap").click(function () {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#map").offset().top
            }, 1000);
        });

        $("#scrollToContact").click(function () {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#contact").offset().top
            }, 1000);
        });

        $('#showPhoneNumbers').click(function () {
            let userId = $(this).attr('data-user-id');
            self.showPhoneNumbers(userId);
        });

        $('#sendReport').click(function () {
            self.sendReport();
        })


    }

    slider() {
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            asNavFor: '.slider-nav',
        });
        $('.slider-nav').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            centerMode: false,
            arrows: true,
            focusOnSelect: true
        });
    }

    showPhoneNumbers(user_id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: base_url + "/getPhoneNumbers",
            data: {
                user_id: user_id,
            },
            dataType: 'json',
            beforeSend: function () {
                $('#showPhoneNumbers').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Wyświetl numery').addClass('disabled');
            },
            success: function (data) {
                $('#user_phones').children().remove();
                for (var i = 0; i < data.length; i++) {
                    $('#user_phones').append('<p class="card-text">' + data[i].phone + '</p>')
                }
            },
            complete: function () {
                $('#showPhoneNumbers').html('Wyświetl numery<i class=" ml-2 fas fa-lg text-white fa-phone"></i>').removeClass('disabled');
            },
            error: function (data) {
                alert(data);
            }
        });
    }

    sendReport(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let sendBtn = $('#sendReport')
        $.ajax({
            type: 'POST',
            url: base_url + "/sendReport",
            data: {
                reportViolationReason: $("input[name='reportViolation']:checked").val(),
                reportViolationText: $('#reportViolationText').val(),
                animalId: sendBtn.attr('data-animal-id'),
            },
            dataType: 'json',
            beforeSend: function () {
                sendBtn.prop('disabled', true);
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
                        $('#reportViolationModal').modal('hide');
                        new Success().showSuccessModal('Zapisano',data['success']['global']);

                    } else {
                        $('#reportViolationModal').modal('hide');
                        new Errors().showErrorModal(data['errors']['global']);
                    }

                }

            },
            complete: function () {
                sendBtn.prop('disabled', false);
            },
            error: function (data) {

            }
        });
    }


}
