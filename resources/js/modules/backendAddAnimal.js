class BackendAddAnimal {

    constructor(base_url) {
        this.init(base_url);
        this.getSpecies();
        this.getBreeds(base_url);
        this.getGenders(base_url);
        this.getSizes(base_url);
        this.getFurs(base_url);
        this.getColors(base_url);
        this.getCharacteristics(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;

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
                speciesId: speciesId
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

    getBreeds(base_url, speciesId = null){

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

    getSizes(base_url){
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

    }

    getColors(base_url){

    }

    getCharacteristics(base_url){

    }
}
