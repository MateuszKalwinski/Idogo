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
