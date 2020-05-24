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
