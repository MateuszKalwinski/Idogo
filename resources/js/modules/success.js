class Success {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;
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
