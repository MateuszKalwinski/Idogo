class frontendShelter {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
        this.slider()
    }

    UX() {

        let self = this;

        $("#scrollToMap").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#map").offset().top
            }, 1000);
        });

        $("#scrollToAnimalsForAdoption").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#animalsForAdoption").offset().top
            }, 1000);
        });

        $("#scrollToAnimalsAdopted").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#animalsAdopted").offset().top
            }, 1000);
        });

        $('#showPhoneNumbers').click(function () {
            let userId = $(this).attr('data-user-id');
            self.showPhoneNumbers(userId);
        });

    }

    slider(){
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            asNavFor: '.slider-nav'
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

    showPhoneNumbers(user_id){
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
            beforeSend: function() {
                $('#before_send').fadeIn();
            },
            success: function(data) {
                $('#showPhoneNumbers').addClass('d-none');
                $('#user_phones').children().remove();
                for (var i=0; i<data.length; i++){
                    $('#user_phones').append('<p class="card-text">'+ data[i].phone +'</p>')
                }
            },
            complete: function() {
                $('#before_send').fadeOut();
            },
            error: function(data) {
                alert(data);
            }
        });
    }



}
