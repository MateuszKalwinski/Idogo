class BackendAvailableColors {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        console.log('test');
        this.UX(base_url);
    }

    UX() {
        let self = this;

        $('#addAvailableColor').on('click', function () {
            self.getBreeds();
            self.getColors();
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
                $('#addAvailableColor').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Dodaj kolor do rasy').addClass('disabled');
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

                    $('#breeds').append('<option value="" disabled selected>Wybierz rasę/y</option>');

                    for (let i=0; i<data.length; i++){
                        let optionGroup = ''
                        optionGroup += '<optgroup label="'+ data[i].species_name +'" data-species-id="'+ data[i].species_id +'">';
                        for (let j=0; j<data[i].breeds.length; j++){
                            optionGroup += '<option value="'+ data[i].breeds[j].id +'">'+ data[i].breeds[j].name +'</option>';
                        }
                        optionGroup += '</optgroup>';

                        $('#breeds').append(optionGroup);
                    }
                }
                $('#form_result').html(html);
            },
            complete: function () {
                $('#addEditAvailableColorModal').modal('show');
                $('#addAvailableColor').html('Dodaj Kolor do rasy<i class="ml-2 fas fa-lg text-white fa-plus"></i>').removeClass('disabled');

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


}
