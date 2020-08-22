

$(document).ready(function () {

    var currentModule = $('#ModuleName').attr('data-moduleName');
    moduleLoader(currentModule);


    function moduleLoader(module) {
        if (module == 'frontendIndex') {
            new frontendIndex(base_url);
        }
        if (module == 'frontendAnimals') {
            new frontendAnimals(base_url);
        }
        if (module == 'frontendAnimal') {
            new frontendAnimal(base_url);
        }
        if (module == 'frontendShelter') {
            new frontendShelter(base_url);
        }
        if (module == 'frontendShelters') {
            new frontendShelters(base_url);
        }
        if (module == 'frontendUser') {
            new frontendUser(base_url);
        }
        if (module == 'backendProfile'){
            new backendProfile(base_url);
        }
        if (module == 'backendAnimalColors'){
            new BackendAnimalColors(base_url);
        }
        if (module == 'backendAnimalCharacteristics'){
            new backendAnimalCharacteristics(base_url);
        }
        if (module == 'backendAnimalSpecies'){
            new BackendAnimalSpecies(base_url);
        }
        if (module == 'backendAnimalBreeds'){
            new BackendAnimalBreeds(base_url);
        }
        if (module == 'backendAnimalFurs'){
            new BackendAnimalFurs(base_url)
        }
        if (module == 'backendAnimalSizes'){
            new BackendAnimalSizes(base_url);
        }
        if (module == 'backendAvailableColors'){
            new BackendAvailableColors(base_url);
        }
        if (module == 'backendAvailableFurs'){
            new BackendAvailableFurs(base_url);
        }
        if (module == 'BackendAvailableCharacteristicDictionary'){
            new BackendAvailableCharacteristicDictionary(base_url);
        }
        if (module == 'backendAddAnimal'){
            new BackendAddAnimal(base_url);
        }

    }

    function ajaxSetup() {
     return $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    $('.mdb-select').materialSelect({
        labels: {
            selectAll: 'Wybierz wszystkie',
            optionsSelected: 'wybranych opcji',
            noSearchResults: 'Brak wyników'
        }
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    jQuery.event.special.touchstart = {
        setup: function( _, ns, handle ){
            if ( ns.includes("noPreventDefault") ) {
                this.addEventListener("touchstart", handle, { passive: false });
            } else {
                this.addEventListener("touchstart", handle, { passive: true });
            }
        }
    };


    $(document).on('click', '.favouriteAnimal', function () {
       addAnimalToFavourite($(this));
    });

    $(document).on('click', '.notfavouriteAnimal', function () {
        removeAnimalFromFavourite($(this));
    });

    $(document).on('click', '.favouriteShelter', function () {
        addShelterToFavourite($(this));
    })

    $(document).on('click', '.notfavouriteShelter', function () {
        removeShelterFromFavourite($(this));
    })

    function addAnimalToFavourite(btn) {
        let animalId = btn.attr('data-animal-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: base_url + "/favouriteAnimal",
            data: {
                animalId: animalId,
            },
            dataType: 'json',
            beforeSend: function () {
                btn.prop('disabled', true);
            },
            success: function (data) {
                if (data.original){

                    if (data.original.errors) {
                        var msg = ''

                        jQuery.each(data.original.errors, function (key, value) {
                            msg += value + '<br>'
                        });

                        new Errors().showErrorModal(msg);
                    }

                }else{

                    if (!data['errors']) {
                        btn.removeClass('favouriteAnimal').addClass('notfavouriteAnimal');
                        btn.children().removeClass('text-white text-muted').addClass('pink-text');
                    } else {
                        new Errors().showErrorModal(data['errors']['global']);
                    }

                }

            },
            complete: function () {
                btn.prop('disabled', false);
            },
            error: function (data) {

            }
        });
    }

    function removeAnimalFromFavourite(btn) {
        let animalId = btn.attr('data-animal-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: base_url + "/notFavouriteAnimal",
            data: {
                animalId: animalId,
            },
            dataType: 'json',
            beforeSend: function () {
                btn.prop('disabled', true);
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

                        let splitedUrl = window.location.pathname.split('/');
                        let lastElementSplitedUrl = splitedUrl[splitedUrl.length - 1];
                        var notFavouriteClass;

                        if (lastElementSplitedUrl == 'animals') {
                            notFavouriteClass = 'text-muted'
                        } else {
                            notFavouriteClass = 'text-white'
                        }


                        btn.removeClass('notfavouriteAnimal').addClass('favouriteAnimal');
                        btn.children().removeClass('pink-text').addClass(notFavouriteClass);
                    } else {
                        new Errors().showErrorModal(data['errors']['global']);
                    }

                }

            },
            complete: function () {
                btn.prop('disabled', false);
            },
            error: function (data) {

            }
        });
    }

    function addShelterToFavourite(btn) {
        let shelterId = btn.attr('data-shelter-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: base_url + "/favouriteShelter",
            data: {
                shelterId: shelterId,
            },
            dataType: 'json',
            beforeSend: function () {
                btn.prop('disabled', true);
            },
            success: function (data) {
                if (data.original){

                    if (data.original.errors) {
                        var msg = ''

                        jQuery.each(data.original.errors, function (key, value) {
                            msg += value + '<br>'
                        });

                        new Errors().showErrorModal(msg);
                    }

                }else{

                    if (!data['errors']) {
                        btn.removeClass('favouriteShelter').addClass('notfavouriteShelter');
                        btn.children().removeClass('text-white text-muted').addClass('pink-text');
                    } else {
                        new Errors().showErrorModal(data['errors']['global']);
                    }

                }

            },
            complete: function () {
                btn.prop('disabled', false);
            },
            error: function (data) {

            }
        });
    }

    function removeShelterFromFavourite(btn) {
        let shelterId = btn.attr('data-shelter-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST',
            url: base_url + "/notFavouriteShelter",
            data: {
                shelterId: shelterId,
            },
            dataType: 'json',
            beforeSend: function () {
                btn.prop('disabled', true);
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

                        let splitedUrl = window.location.pathname.split('/');
                        let lastElementSplitedUrl = splitedUrl[splitedUrl.length - 1];
                        var notFavouriteClass;

                        if (lastElementSplitedUrl == 'shelters') {
                            notFavouriteClass = 'text-muted'
                        } else {
                            notFavouriteClass = 'text-white'
                        }


                        btn.removeClass('notfavouriteShelter').addClass('favouriteShelter');
                        btn.children().removeClass('pink-text').addClass(notFavouriteClass);
                    } else {
                        new Errors().showErrorModal(data['errors']['global']);
                    }

                }

            },
            complete: function () {
                btn.prop('disabled', false);
            },
            error: function (data) {

            }
        });
    }

    $(".button-collapse").sideNav();
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(sideNavScrollbar);



    // (function () {
    //
    //     var quotes = $(".quotes");
    //     var quoteIndex = -1;
    //
    //     function showNextQuote() {
    //         ++quoteIndex;
    //         quotes.eq(quoteIndex % quotes.length)
    //             .fadeIn(1000)
    //             .delay(3000)
    //             .fadeOut(1000, showNextQuote);
    //     }
    //
    //     showNextQuote();
    //
    // })();​
});



//room.php
