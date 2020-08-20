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

        $('#speciesId').on('change', function () {
            let speciesId = $('#speciesId').val();
            self.getBreeds(speciesId)
        });

        $('#breedId').on('change', function (e) {
            let breedId = $('#breedId').val();
            self.getFurs(breedId)
            self.getColors(breedId);

        });
    }

    getSpecies(speciesId = null) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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

                    $('#speciesId').children().remove();

                    $('#speciesId').append('<option value="" disabled selected>Wybierz gatunek *</option>');
                    for (let i = 0; i < data.success.length; i++) {

                        $('#speciesId').append('<option value="' + data.success[i].id + '">' + data.success[i].name + '</option>');
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getBreeds(speciesId) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
                    breedId.children().remove();
                    breedId.append('<option value="" disabled selected>Wybierz rasę *</option>');

                    let breeds = '';
                    $.each(data.success, function (i, breed) {
                        breeds += '<option value="' + breed.id + '">' + breed.name + '</option>';
                    });
                    breedId.append(breeds);

                    breedId.materialSelect();
                }
            },
            complete: function () {

            },
        })
    }

    getGenders() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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

                    $('#genderId').children().remove();

                    $('#genderId').append('<option value="" disabled selected>Wybierz płeć *</option>');
                    for (let i = 0; i < data.success.length; i++) {

                        $('#genderId').append('<option value="' + data.success[i].id + '">' + data.success[i].name + '</option>');
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getSizes() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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

                    $('#sizeId').children().remove();

                    $('#sizeId').append('<option value="" disabled selected>Wybierz wielkość *</option>');
                    for (let i = 0; i < data.success.length; i++) {

                        $('#sizeId').append('<option value="' + data.success[i].id + '">' + data.success[i].name + '</option>');
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getFurs(breedId) {
        console.log('test');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log('test1');
        console.log(base_url + "/getFursForAddAnimal")

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
                console.log('test2');

            },
            success: function (data) {
                console.log('test3');

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


                    animalFur.append('<option value="" disabled selected>Wybierz długość futra</option>');

                    let colors = '';
                    $.each(data.success, function (i, fur) {
                        colors += '<option value="' + fur.fur_id + '">' + fur.fur_name + '</option>';
                    });
                    animalFur.append(colors);
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getColors(breedId) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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


                    animalColor.append('<option value="" disabled selected>Wybierz kolor futra</option>');

                    let colors = '';
                    $.each(data.success, function (i, color) {
                        colors += '<option value="' + color.color_id + '">' + color.color_name + '</option>';
                    });
                    animalColor.append(colors);

                    // animalColor.materialSelect();
                }
            },
            complete: function () {

            },
        })
    }

    getCharacteristics(base_url) {

    }
}
