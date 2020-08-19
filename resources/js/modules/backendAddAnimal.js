class BackendAddAnimal {

    constructor(base_url) {
        this.init(base_url);
        this.getSpecies();
        this.getGenders();
        this.getSizes();
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

        $('#speciesId').on('change', function () {
            let speciesId = $('#speciesId').val();
            self.getBreeds(speciesId)
        });

        $('#breedId').on('change', function (){
           let breedId = $('#breedId').val();
            self.getColors(breedId);
            self.getFurs(breedId)

        });
    }

    getSpecies(speciesId = null){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getSpeciesForAddAnimal",
            method:"POST",
            data: {
                speciesId: speciesId,
                type: 'species'
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

                    $('#speciesId').children().remove();

                    $('#speciesId').append('<option value="" disabled selected>Wybierz gatunek *</option>');
                    for (let i=0; i<data.success.length; i++){

                        $('#speciesId').append('<option value="'+ data.success[i].id +'">'+ data.success[i].name +'</option>');
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getBreeds(speciesId = null){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getBreedsForAddAnimal",
            method:"POST",
            data: {
                speciesId: speciesId,
                type: 'breeds'
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

                    $('#breedId').children().remove();

                    $('#breedId').append('<option value="" disabled selected>Wybierz rasę *</option>');
                    for (let i=0; i<data.success.length; i++){

                        $('#breedId').append('<option value="'+ data.success[i].id +'">'+ data.success[i].name +'</option>');
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getGenders(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getGendersForAddAnimal",
            method:"POST",
            data: {},
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

                    $('#genderId').children().remove();

                    $('#genderId').append('<option value="" disabled selected>Wybierz płeć *</option>');
                    for (let i=0; i<data.success.length; i++){

                        $('#genderId').append('<option value="'+ data.success[i].id +'">'+ data.success[i].name +'</option>');
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getSizes(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getSizesForAddAnimal",
            method:"POST",
            data: {},
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

                    $('#sizeId').children().remove();

                    $('#sizeId').append('<option value="" disabled selected>Wybierz wielkość *</option>');
                    for (let i=0; i<data.success.length; i++){

                        $('#sizeId').append('<option value="'+ data.success[i].id +'">'+ data.success[i].name +'</option>');
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getFurs(base_url){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getFursForAddAnimal",
            method:"POST",
            data: {
                breedId: breedId,
                type: 'fur',
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

                    $('#animalFur').children().remove();

                    $('#animalFur').append('<option value="" disabled selected>Wybierz długość futra</option>');
                    for (let i=0; i<data.success.length; i++){

                        $('#animalFur').append('<option value="'+ data.success[i].fur_id +'">'+ data.success[i].fur_name +'</option>');
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getColors(breedId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: base_url + "/getColorsForAddAnimal",
            method:"POST",
            data: {
                breedId: breedId,
                type: 'color',
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

                    $('#animalColor').children().remove();

                    $('#animalColor').append('<option value="" disabled selected>Wybierz kolor futra</option>');
                    for (let i=0; i<data.success.length; i++){

                        $('#animalColor').append('<option value="'+ data.success[i].color_id +'">'+ data.success[i].color_name +'</option>');
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {

            },
        })
    }

    getCharacteristics(base_url){

    }
}
