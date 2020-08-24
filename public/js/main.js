class frontendIndex {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.promotedAnimalsSlick();
        this.promotedSheltersSlick();
        this.getAnimalSpecies(base_url);
        this.counter();
        this.UX(base_url);
    }

    UX() {
        let self = this;


        $('#animalSpecies').on('change', function () {
            $('#searchAnimalsFrom').submit();
        });

    }

    promotedAnimalsSlick(){
        $('.promoted_animals').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            fade: false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
            ]
        });
    }

    promotedSheltersSlick(){
        $('.promoted_shelter').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            fade: false,
            autoplay:false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
            ]
        });
    }

    counter(){
        (function ($){
            $.fn.counter = function() {
                const $this = $(this),
                    numberFrom = parseInt($this.attr('data-from')),
                    numberTo = parseInt($this.attr('data-to')),
                    delta = numberTo - numberFrom,
                    deltaPositive = delta > 0 ? 1 : 0,
                    time = parseInt($this.attr('data-time')),
                    changeTime = 10;

                let currentNumber = numberFrom,
                    value = delta*changeTime/time;
                var interval1;
                const changeNumber = () => {
                    currentNumber += value;
                    //checks if currentNumber reached numberTo
                    (deltaPositive && currentNumber >= numberTo) || (!deltaPositive &&currentNumber<= numberTo) ? currentNumber=numberTo : currentNumber;
                    this.text(parseInt(currentNumber));
                    currentNumber == numberTo ? clearInterval(interval1) : currentNumber;
                }

                interval1 = setInterval(changeNumber,changeTime);
            }
        }(jQuery));

        $(document).ready(function(){

            $('.count-up').counter();
            $('.count1').counter();
            $('.count2').counter();
            $('.count3').counter();

            new WOW().init();

            setTimeout(function () {
                $('.count5').counter();
            }, 3000);
        });
    }


    getAnimalSpecies(base_url){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: base_url + "/getAnimalSpecies",
            data: {},
            dataType: 'json',
            success: function(data) {

                let animal_species = $('#animalSpecies');

                animal_species.children().remove();

                animal_species.append('<option value="" disabled selected>Znajdź...</option>');

                for (var i = 0; i<data.length; i++){
                    animal_species.append('<option value="'+ data[i]['id'] +'">'+ data[i]['name'] +'</option>');
                }

            },
            error: function(data) {
                alert(data);
            }
        });
    }
}

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
                $('#showPhoneNumbers').addClass('d-none')
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

class frontendAnimals {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

    }



    // searchAnimals(){
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //
    //     $.ajax({
    //         type: 'GET',
    //         url: base_url + "/searchAnimals",
    //         data: {
    //             animalSpecies: $('#animalSpecies').val(),
    //             animalBreeds: $('#animalBreeds').val(),
    //             animalAge: $('#animalAge').val(),
    //             animalSizes: $('#animalSizes').val(),
    //             animalGender: $('#animalGender').val(),
    //             animalColor: $('#animalColor').val(),
    //             animalFurs: $('#animalFurs').val(),
    //             option_1: ($('#option_1').is(':checked')) ? 'on' : 'off',
    //             option_2: ($('#option_2').is(':checked')) ? 'on' : 'off',
    //             option_3: ($('#option_3').is(':checked')) ? 'on' : 'off',
    //             option_4: ($('#option_4').is(':checked')) ? 'on' : 'off',
    //             option_5: ($('#option_5').is(':checked')) ? 'on' : 'off',
    //             option_6: ($('#option_6').is(':checked')) ? 'on' : 'off',
    //             option_7: ($('#option_7').is(':checked')) ? 'on' : 'off',
    //             option_8: ($('#option_8').is(':checked')) ? 'on' : 'off',
    //
    //         },
    //         dataType: 'json',
    //         success: function(data) {
    //
    //
    //         },
    //         error: function(data) {
    //             alert(data);
    //         }
    //     });
    // }

}

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

class frontendShelters {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {

        let self = this;

        $('#cityName').on('input', function () {
            let cityName = $('#cityName').val();
            if (cityName.length >= 2){
                self.searchCity(cityName);
            }
        })

    }

        searchCity(cityName) {
        new Helper().ajaxSetup()
        $.ajax({
            type: 'GET',
            url: base_url + "/searchCities",
            data: {
                term: cityName,
            },
            dataType: 'json',
            beforeSend: function () {
                // btn.prop('disabled', true);
            },
            success: function (data) {

                $("#cityName").autocomplete({
                    source: data,
                    select: function (event, ui) {
                        $('#cityId').val(ui.item.id)
                    }
                })

            },
            complete: function () {
                // btn.prop('disabled', false);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
}

class frontendUser {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {

        let self = this;

        $('#showPhoneNumbers').click(function () {
            let userId = $(this).attr('data-user-id');
            self.showPhoneNumbers(userId);
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

class BackendAnimalColors {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

        $('#addColor').click(function () {
            $('#addEditModalTitle').text('Dodaj kolor')
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2 danger-color green darken-2')
            $('#colorName').val('');
            $('label[for="colorName"]').removeClass('active');
            $('#action').val('add');
            $('#animalColorId').val('');
            $('#addEditColorModal').modal('show')
        })

        $(document).on('click', '.edit-animal-color', function () {
            $('#addEditModalTitle').text('Edytuj kolor')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1 danger-color green')
            let animalColorName = $(this).closest('tr').find('.animal-color-name').text();
            $('#colorName').val(animalColorName);
            $('label[for="colorName"]').addClass('active');
            $('#action').val('edit');
            let AnimalColorId = $(this).closest('tr').find('.animal-color-name').attr('data-animal-color-id');
            $('#animalColorId').val(AnimalColorId);
            $('#addEditColorModal').modal('show')
        })

        $('#addEditColor').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add'){
                self.saveAnimalColor(new FormData(this), base_url+ "/adminStoreAnimalColor")
            }else{
                self.saveAnimalColor(new FormData(this), base_url+ "/adminUpdateAnimalColor")
            }
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

    saveAnimalColor(formData, url){
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
                    $('#adminAnimalColorsTable').DataTable().ajax.reload();
                }
                $('#form_result').html(html);
            }
        })
    }
}

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
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2 danger-color green darken-2')
            $('#sizeName').val('');
            $('label[for="sizeName"]').removeClass('active');
            $('#action').val('add');
            $('#animalSizeId').val('');
            $('#addEditSizeModal').modal('show')
        })
        $(document).on('click', '.edit-animal-size', function () {
            $('#addEditModalTitle').text('Edytuj wielkość zwierzaka')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1 danger-color green')
            let animalSizeName = $(this).closest('tr').find('.animal-size-name').text();
            $('#sizeName').val(animalSizeName);
            $('label[for="sizeName"]').addClass('active');
            $('#action').val('edit');
            let animalSizeId = $(this).closest('tr').find('.animal-size-name').attr('data-animal-size-id');
            $('#animalSizeId').val(animalSizeId);
            $('#form_result').html('');
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
                $('#confirmModalHeader').addClass('green darken-2').removeClass('danger-color yellow darken-2 teal lighten-1')
            } else {
                $('#actionDeleteRestore').val('delete');
                $('#animalDeleteText').removeClass('d-none').children().removeClass('d-none');
                $('#animalRestoreText').addClass('d-none').children().addClass('d-none')
                $('#confirmModalHeader').addClass('danger-color').removeClass('green darken-2 yellow darken-2 teal lighten-1')
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

class backendAnimalCharacteristics {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

        $('#addCharacteristic').click(function () {
            $('#addEditModalTitle').text('Dodaj cechę zwierzaka');
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2 danger-color green darken-2');
            $('#characteristicName').val('');
            $('label[for="colorName"]').removeClass('active');
            $('#action').val('add');
            $('#animalCharacteristicId').val('');
            $('#addEditCharacteristicModal').modal('show')
        })
        $(document).on('click', '.edit-dictionary-characteristic', function () {
            $('#addEditModalTitle').text('Edytuj cechę zwierzaka')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1 danger-color green')
            let animalCharacteristicName = $(this).closest('tr').find('.characteristic-dictionary-name').text();
            $('#characteristicName').val(animalCharacteristicName);
            $('label[for="characteristicName"]').addClass('active');
            $('#action').val('edit');
            let AnimalCharacteristicId = $(this).closest('tr').find('.characteristic-dictionary-name').attr('data-characteristic-dictionary-id');
            $('#animalCharacteristicId').val(AnimalCharacteristicId);
            $('#addEditCharacteristicModal').modal('show')
        })

        $('#addEditCharacteristic').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add'){
                self.saveAnimalCharacteristic(new FormData(this), base_url+ "/adminStoreAnimalCharacteristic")
            }else{
                self.saveAnimalCharacteristic(new FormData(this), base_url+ "/adminUpdateAnimalCharacteristic")
            }
        })

        $(document).on('click', '.restore-dictionary-characteristic, .delete-dictionary-characteristic', function () {

            if ($(this).hasClass('restore-dictionary-characteristic')) {
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

            let dictionaryCharacteristicId = $(this).closest('tr').find('.characteristic-dictionary-name').attr('data-characteristic-dictionary-id');
            $('#confirm-yes').attr('data-dictionary-characteristic-id', dictionaryCharacteristicId);
            let dictionaryCharacteristicName = $(this).closest('tr').find('.characteristic-dictionary-name').text();
            $('.confirm-dictionary-characteristic-name').text(dictionaryCharacteristicName);
            $('#showHideContent').show();
            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let dictionaryCharacteristicId = $('#confirm-yes').attr('data-dictionary-characteristic-id');
            let action = $('#actionDeleteRestore').val();

            if (action === 'restore'){
                self.deleteRestoreDictionaryCharacteristic(dictionaryCharacteristicId, base_url + "/restoreAnimalCharacteristic");
            }else{
                self.deleteRestoreDictionaryCharacteristic(dictionaryCharacteristicId, base_url + "/deleteAnimalCharacteristic");
            }

        })
    }

    deleteRestoreDictionaryCharacteristic(animalCharacteristicId, url){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: url,
            data: {
                animalCharacteristicId: animalCharacteristicId,
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
                    $('#adminAnimalCharacteristicsTable').DataTable().ajax.reload();
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

    saveAnimalCharacteristic(formData, url){
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
                    $('#characteristicName').val('');
                    $('#adminAnimalCharacteristicsTable').DataTable().ajax.reload();
                }
                $('#formResult').html(html);
            }
        })
    }
}

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
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2 danger-color green darken-2')
            $('#speciesName').val('');
            $('label[for="speciesName"]').removeClass('active');
            $('#action').val('add');
            $('#animalSpeciesId').val('');
            $('#addEditSpeciesModal').modal('show')
        })
        $(document).on('click', '.edit-animal-species', function () {
            $('#addEditModalTitle').text('Edytuj gatunek')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1 danger-color green')
            let AnimalSpeciesName = $(this).closest('tr').find('.animal-species-name').text();
            $('#speciesName').val(AnimalSpeciesName);
            $('label[for="speciesName"]').addClass('active');
            $('#action').val('edit');
            let AnimalSpeciesId = $(this).closest('tr').find('.animal-species-name').attr('data-animal-species-id');
            $('#animalSpeciesId').val(AnimalSpeciesId);
            $('#form_result').html('');
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

        $(document).on('click', '.restore-animal-species, .delete-animal-species', function () {

            if ($(this).hasClass('restore-animal-species')) {
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

            let animalSpeciesId = $(this).closest('tr').find('.characteristic-dictionary-name').attr('data-characteristic-dictionary-id');
            $('#confirm-yes').attr('data-animal-species-id', animalSpeciesId);
            let animalSpeciesName = $(this).closest('tr').find('.animal-species-name').text();
            $('.confirm-animal-species-name').text(animalSpeciesName);
            $('#showHideContent').show();
            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let animalSpeciesId = $('#confirm-yes').attr('data-animal-species-id');
            let action = $('#actionDeleteRestore').val();

            if (action === 'restore'){
                self.deleteRestoreAnimalSpecies(animalSpeciesId, base_url + "/restoreAnimalSpecies");
            }else{
                self.deleteRestoreAnimalSpecies(animalSpeciesId, base_url + "/deleteAnimalSpecies");
            }

        })
    }

    deleteRestoreAnimalSpecies(animalSpeciesId, url){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: url,
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
                    $('#showHideContent').slideUp();
                    $('#adminSpeciesTable').DataTable().ajax.reload();
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

class BackendAvailableColors {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
        this.getBreeds();
        this.getColors()
    }

    UX(base_url) {
        let self = this;

        $('#addAvailableColor').click(function () {
            $('#addEditModalTitle').text('Dodaj dostępny kolor dla rasy');
            $('.modal-header ').addClass('teal lighten-1').removeClass('yellow darken-2 danger-color green darken-2');
            $('#breedId').val('');
            $('#colors').val('');
            $('#action').val('add');
            $('#animalBreedId').val('');
            $('#addEditAvailableColorModal').modal('show')
        })

        $(document).on('click', '.edit-available-color', function () {
            let animalBreedId = $(this).closest('tr').find('.animal-breed-name').attr('data-animal-breed-id');
            self.getAvailableColorsForBreed(animalBreedId)
            $('#addEditModalTitle').text('Edytuj dostępne kolory dla rasy')
            $('.modal-header ').addClass('yellow darken-2').removeClass('teal lighten-1 danger-color green')
            $('#action').val('edit');
        })


        $('#addEditAvailableColor').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add'){
                self.saveAvailableColors(new FormData(this), base_url+ "/adminStoreAvailableColors")
            }else{
                self.saveAvailableColors(new FormData(this), base_url+ '/adminUpdateAvailAbleColors')
            }
        })

        $(document).on('click', '.delete-available-color', function () {

            let animalSpeciesName = $(this).closest('tr').find('.animal-species-name').text();
            let animalBreedName = $(this).closest('tr').find('.animal-breed-name').text();
            let animalColorName = $(this).closest('tr').find('.animal-color-name').text();
            $('.confirm-animal-color-name').text(animalColorName)
            $('.confirm-animal-breed-name').text(animalSpeciesName +' '+ animalBreedName);
            $('#confirm-yes').attr('data-available-color-id', $(this).attr('data-available-color-id'))
            $('#confirmModalHeader').addClass('danger-color').removeClass('green darken-2 yellow darken-2 teal lighten-1')
            $('#showHideContent').slideDown();

            $('#confirmModal').modal('show');
        })

        $('#confirm-yes').on('click', function () {
            let availableColorId = $('#confirm-yes').attr('data-available-color-id');
            self.deleteAvailableColor(availableColorId, base_url + "/deleteAvailableColor")
        })
    }

    getAvailableColorsForBreed(animalBreedId){
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
                type: 'colors',
            },
            dataType: 'json',
            beforeSend: function () {
                $(".edit-available-color[data-available-color-id='" + animalBreedId +"']").html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Wyświetl numery').addClass('disabled');

            },
            success: function (data) {

                if(data.errors)
                {

                }
                if(data.success)
                {
                    for (let i=0; i<data.success.length; i++){
                        $('#colors option[value=' + data.success[i].color_id + ']').attr('selected', true);
                    }
                    $('#colors').materialSelect();
                    $('#breedId').val(animalBreedId)


                }
            },
            complete: function () {
                $(".edit-available-color[data-available-color-id='" + animalBreedId +"']").html('<i class="fas fa-edit"></i>').removeClass('disabled');
                $('#addEditAvailableColorModal').modal('show')
            },
            error: function (data) {

            }
        });
    }

    saveAvailableColors(formData, url){
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
                    $('#adminAvailableColorsTable').DataTable().ajax.reload();
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

    getColors(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getColors",
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

                    $('#colors').append('<option value="" disabled selected>Wybierz kolor/y</option>');

                    for (let i=0; i<data.length; i++){

                        $('#colors').append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
                    }

                }
                $('#form_result').html(html);
            }
        })
    }

    deleteAvailableColor(availableColorId, url){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: url,
            data: {
                availableColorId: availableColorId,
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
                    $('#adminAvailableColorsTable').DataTable().ajax.reload();
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

class BackendAvailableFurs {

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


        $('#addEditAvailableFur').on('submit', function (e) {
            e.preventDefault();
            if ($('#action').val() === 'add') {
                self.saveAvailableFurs(new FormData(this), base_url + "/adminStoreAvailableFurs")
            } else {
                self.saveAvailableFurs(new FormData(this), base_url + '/adminUpdateAvailAbleFurs')
            }
        })

        $(document).on('click', '.delete-available-fur', function () {

            let animalSpeciesName = $(this).closest('tr').find('.animal-species-name').text();
            let animalBreedName = $(this).closest('tr').find('.animal-breed-name').text();
            let animalFurName = $(this).closest('tr').find('.animal-fur-name').text();
            $('.confirm-animal-fur-name').text(animalFurName)
            $('.confirm-animal-breed-name').text(animalSpeciesName + ' ' + animalBreedName);
            $('#confirm-yes').attr('data-available-fur-id', $(this).attr('data-available-fur-id'))
            $('#confirmModalHeader').addClass('danger-color').removeClass('green darken-2 yellow darken-2 teal lighten-1')
            $('#showHideContent').slideDown();
            $('#confirmFormResult').children().remove();
            $('#confirmModal').modal('show');

            /*
            * TODO THIS MIGHT BE NEW MAIL COLOR #657cff
            * */
        })

        $('#confirm-yes').on('click', function () {
            let availableFurId = $('#confirm-yes').attr('data-available-fur-id');
            self.deleteAvailableFur(availableFurId, base_url + "/deleteAvailableFur")
        })
    }

    getAvailableFursForBreed(animalBreedId) {
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
                $('#formResult').children().remove();
                $(".edit-available-fur[data-available-fur-id='" + animalBreedId + "']").html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Wyświetl numery').addClass('disabled');
                $('#furs option:selected').each(function () {
                    $(this).prop('selected', false);
                });
            },
            success: function (data) {

                if (data.errors) {
                    let html = '';
                    html = '<div class="alert alert-danger">';
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p class="m-0">' + data.errors[count] + '</p>';
                    }
                    html += '</div>';

                    $('#formResult').html(html);
                }
                if (data.success) {
                    for (let i = 0; i < data.success.length; i++) {
                        $('#furs option[value=' + data.success[i].fur_id + ']').prop('selected', true);
                    }

                    $('#furs').materialSelect();
                    $('#breedId').val(animalBreedId)
                }
            },
            complete: function () {
                $(".edit-available-fur[data-available-fur-id='" + animalBreedId + "']").html('<i class="fas fa-edit"></i>').removeClass('disabled');
                $('#addEditAvailableFurModal').modal('show')
            },
            error: function (data) {

            }
        });
    }

    saveAvailableFurs(formData, url) {
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
                    $('#adminAvailableFursTable').DataTable().ajax.reload();
                }
                $('#formResult').html(html);
            }
        })
    }

    getBreeds(breed_id = null) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getBreeds",
            method: "POST",
            data: {
                breed_id: breed_id
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

                    $('#breedId').append('<option value="" disabled selected>Wybierz rasę</option>');

                    for (let i = 0; i < data.length; i++) {
                        let optionGroup = ''
                        optionGroup += '<optgroup label="' + data[i].species_name + '" data-species-id="' + data[i].species_id + '">';
                        for (let j = 0; j < data[i].breeds.length; j++) {
                            optionGroup += '<option value="' + data[i].breeds[j].id + '">' + data[i].breeds[j].name + '</option>';
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

    getFurs() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getFurs",
            method: "POST",
            data: {},
            cache: true,
            dataType: "json",
            success: function (data) {
                var html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';

                } else {

                    $('#furs').append('<option value="" disabled selected>Wybierz futro/a</option>');

                    for (let i = 0; i < data.length; i++) {

                        $('#furs').append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                    }

                }
                $('#form_result').html(html);
            }
        })
    }

    deleteAvailableFur(availableFurId, url) {
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

class BackendAvailableCharacteristicDictionary {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
        this.getSpecies();
        this.getCharacteristics()
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
            $('.confirm-animal-characteristic-name').text(animalCharacteristicName)
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
                        $('#characteristics option[value=' + data.success[i].characteristic_dictionary_id + ']').prop('selected', true);
                    }

                    $('#characteristics').materialSelect();
                    $('#speciesId').val(animalSpeciesId)
                }
            },
            complete: function () {
                $(".edit-available-characteristic[data-available-characteristic-id='" + animalSpeciesId +"']").html('<i class="fas fa-edit"></i>').removeClass('disabled');
                $('#addEditAvailableCharacteristicModal').modal('show')
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

                        $('#speciesId').append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
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

                    $('#characteristics').append('<option value="" disabled selected>Wybierz cechę/y</option>');

                    for (let i=0; i<data.length; i++){

                        $('#characteristics').append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
                    }

                }
                $('#form_result').html(html);
            }
        })
    }

    deleteAvailableCharacteristic(availableCharacteristicId, url){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: url,
            data: {
                availableCharacteristicId: availableCharacteristicId,
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
                    $('#adminAvailableCharacteristicTable').DataTable().ajax.reload();
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

class BackendAddAnimal {

    constructor(base_url) {
        this.init(base_url);
        this.getSpecies();
        this.getGenders();
        this.getSizes();
    }

    init(base_url) {
        this.UX();
    }

    UX() {
        let self = this;
        var delayTimer;

        $('#breedId, #animalFur, #animalColor, #inBreedType').prop('disabled', true);

        $('.input-images-1').imageUploader();
        $('#speciesId').on('change', function () {
            let speciesId = $('#speciesId').val();
            self.getBreeds(speciesId);
            self.getCharacteristics(speciesId);
        });

        $('#breedId').on('change', function (e) {
            let breedId = $('#breedId').val();
            self.getFurs(breedId)
            self.getColors(breedId);
        });

        $('#cityName').on('input', function () {
            let cityName = $('#cityName').val();
            if (cityName.length >= 2){
                clearTimeout(delayTimer);
                delayTimer = setTimeout(function() {
                    self.searchCity(cityName);
                }, 1000);
            }
        })
    }

    getSpecies(speciesId = null) {
        new Helper().ajaxSetup();
        $.ajax({
            url: base_url + "/getSpeciesForAddAnimal",
            method: "POST",
            data: {
                speciesId: speciesId,
                type: 'species'
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

                    let speciesId = $('#speciesId');

                    speciesId.children().remove();
                    speciesId.append('<option value="" disabled selected>Wybierz gatunek *</option>');

                    let species = ''
                    $.each(data.success, function (i, single_species) {
                        species += '<option value="' + single_species.id + '">' + single_species.name + '</option>';
                    });

                    speciesId.append(species)
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getBreeds(speciesId) {
        new Helper().ajaxSetup();
        $.ajax({
            url: base_url + "/getBreedsForAddAnimal",
            method: "POST",
            data: {
                speciesId: speciesId,
                type: 'breeds'
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
                    let breedId = $('#breedId');
                    let inBreedType = $('#inBreedType');

                    breedId.children().remove();

                    if (data.success.length > 0) {
                        breedId.append('<option value="" disabled selected>Wybierz rasę</option>');

                        let breeds = '';
                        $.each(data.success, function (i, breed) {
                            breeds += '<option value="' + breed.id + '">' + breed.name + '</option>';
                        });
                        breedId.append(breeds);
                        breedId.prop('disabled', false);
                        inBreedType.prop('disabled', false);
                    } else {
                        breedId.prop('disabled', true);
                        inBreedType.prop('disabled', true);
                        breedId.append('<option value="" disabled selected>Brak ras dla wybranego gatunku</option>');
                    }


                    breedId.materialSelect();
                }
            },
            complete: function () {

            },
        })
    }

    getCharacteristics(speciesId) {
        new Helper().ajaxSetup();
        $.ajax({
            url: base_url + "/getCharacteristicsForAddAnimal",
            method: "POST",
            data: {
                speciesId: speciesId,
                type: 'characteristic',
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
                    let animalCharacteristics = $('#animalCharacteristics');
                    animalCharacteristics.children().remove();

                    if (data.success.length > 0) {
                        animalCharacteristics.append('<option value="" disabled selected>Wybierz cechy zwierzaka</option>');

                        let characteristics = '';
                        $.each(data.success, function (i, characteristic) {
                            characteristics += '<option value="' + characteristic.id + '">' + characteristic.name + '</option>';
                        });

                        animalCharacteristics.append(characteristics);
                        animalCharacteristics.prop('disabled', false);
                        animalCharacteristics.materialSelect();
                    } else {
                        animalCharacteristics.prop('disabled', true);
                        animalCharacteristics.append('<option value="" disabled selected>Brak cech dla wybranego gatunku</option>');
                    }
                }
            },
            complete: function () {

            },
        })
    }

    getGenders() {
        new Helper().ajaxSetup();
        $.ajax({
            url: base_url + "/getGendersForAddAnimal",
            method: "POST",
            data: {},
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

                    let genderId = $('#genderId');

                    genderId.children().remove();
                    genderId.append('<option value="" disabled selected>Wybierz płeć *</option>');

                    let genders = '';
                    $.each(data.success, function (i, gender) {
                        genders += '<option value="' + gender.id + '">' + gender.name + '</option>';
                    });

                    genderId.append(genders);

                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getSizes() {
        new Helper().ajaxSetup();
        $.ajax({
            url: base_url + "/getSizesForAddAnimal",
            method: "POST",
            data: {},
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
                    let sizeId = $('#sizeId');

                    sizeId.children().remove();
                    sizeId.append('<option value="" disabled selected>Wybierz wielkość *</option>');

                    let sizes = ''
                    $.each(data.success, function (i, size) {
                        sizes += '<option value="' + size.id + '">' + size.name + '</option>';
                    });
                    sizeId.append(sizes);
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getFurs(breedId) {
        new Helper().ajaxSetup();
        $.ajax({
            url: base_url + "/getFursForAddAnimal",
            method: "POST",
            data: {
                breedId: breedId,
                type: 'fur'
            },
            // cache:true,
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
                    let animalFur = $('#animalFur');
                    animalFur.children().remove();

                    if (data.success.length > 0) {
                        animalFur.append('<option value="" disabled selected>Wybierz długość futra</option>');

                        let furs = '';
                        $.each(data.success, function (i, fur) {
                            furs += '<option value="' + fur.fur_id + '">' + fur.fur_name + '</option>';
                        });
                        animalFur.append(furs);
                        animalFur.prop('disabled', false);
                    } else {
                        animalFur.prop('disabled', true);
                        animalFur.append('<option value="" disabled selected>Brak długości futra dla wybranej rasy</option>');
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getColors(breedId) {
        new Helper().ajaxSetup();
        $.ajax({
            url: base_url + "/getColorsForAddAnimal",
            method: "POST",
            data: {
                breedId: breedId,
                type: 'color',
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

                    let animalColor = $('#animalColor');
                    animalColor.children().remove();
                    if (data.success.length > 0) {

                        animalColor.append('<option value="" disabled selected>Wybierz kolor futra</option>');

                        let colors = '';
                        $.each(data.success, function (i, color) {
                            colors += '<option value="' + color.color_id + '">' + color.color_name + '</option>';
                        });
                        animalColor.append(colors);
                        animalColor.prop('disabled', false);
                    } else {
                        animalColor.prop('disabled', true);
                        animalColor.append('<option value="" disabled selected>Brak kolorów dla wybranej rasy</option>');
                    }
                }
            },
            complete: function () {

            },
        })
    }

    searchCity(cityName) {
        new Helper().ajaxSetup()
        $.ajax({
            type: 'GET',
            url: 'http://localhost/hi-puppy/hi-puppy/public' + "/searchCities",
            data: {
                term: cityName,
            },
            dataType: 'json',
            beforeSend: function () {
                // btn.prop('disabled', true);
            },
            success: function (data) {

                $("#cityName").autocomplete({
                    source: data,
                    select: function (event, ui) {
                        $('#cityId').val(ui.item.id)
                    }
                })

            },
            complete: function () {
                // btn.prop('disabled', false);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
}

class Errors {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;
        $(document).on('click', '.modal-error-close', function () {
            $('#modalError').modal('hide');

            setTimeout(function(){
                $('#modalError').remove();
            }, 1000);


        });
    }

    showErrorModal(msg) {
        $('body').append(
            '    <div class="modal fade right" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"' +
            '      aria-hidden="true" data-backdrop="true">' +
            '      <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">' +
            '        <div class="modal-content">' +
            '          <div class="modal-header">' +
            '            <p class="heading">Ups! coś poszło nie tak. </p>' +
            '          </div>' +
            '          <div class="modal-body">' +
            '            <div class="row">' +
            '              <div class="col-12">' +
            '                <p>' + msg + '</p>' +
            '              </div>' +
            '            </div>' +
            '          </div>' +
            '            <div class="modal-footer flex-center">' +
            '              <button class="modal-error-close w-50 btn btn-danger btn-rounded text-white waves-effect waves-light text-transform-none">' +
            '                  Zamknij' +
            '              </button>'+
            '            </div>' +
            '          </div>' +
            '        </div>' +


            '      </div>' +
            '    </div>'
        );

        $('#modalError').modal({backdrop: 'static', keyboard: false});
        $('#modalError').modal('show');
    }

}

class Success {

    constructor() {
        this.init();
    }

    init() {
        this.UX();
    }

    UX() {
        $(document).on('click', '.modal-success-close', function () {
            $('#modalSuccess').modal('hide');

            setTimeout(function(){
                $('#modalSuccess').remove();
            }, 1000);


        });
    }

    showSuccessModal(title, msg) {
        $('body').append(
            '    <div class="modal fade right" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"' +
            '      aria-hidden="true" data-backdrop="true">' +
            '      <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-success" role="document">' +
            '        <div class="modal-content">' +
            '          <div class="modal-header">' +
            '            <p class="heading">'+ title +' </p>' +
            '          </div>' +
            '          <div class="modal-body">' +
            '            <div class="row">' +
            '              <div class="col-12">' +
            '                <p>' + msg + '</p>' +
            '              </div>' +
            '            </div>' +
            '          </div>' +
            '            <div class="modal-footer flex-center">' +
            '              <button class="modal-success-close w-50 btn btn-success btn-rounded text-white waves-effect waves-light text-transform-none">' +
            '                  Zamknij' +
            '              </button>'+
            '            </div>' +
            '          </div>' +
            '        </div>' +
            '      </div>' +
            '    </div>'
        );

        $('#modalSuccess').modal({backdrop: 'static', keyboard: false});
        $('#modalSuccess').modal('show');
    }

}

class Helper {

    ajaxSetup(){
        return $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

}
