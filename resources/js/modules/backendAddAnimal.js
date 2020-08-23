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
