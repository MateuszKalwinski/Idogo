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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


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


    // searchCity(cityName) {

        // $("#cityName").mdbAutocomplete({
        //     data: base_url + "/searchCities", /* Lecture 17 */
        //     minLength: 2,
        //     select: function (event, ui) {
        //        console.log(ui.item.value);
        //     }
        //
        //
        // });
    // }


}
