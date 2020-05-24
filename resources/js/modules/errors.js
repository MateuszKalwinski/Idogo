class Errors {

    constructor(base_url) {
        this.init(base_url);
    }

    init(base_url) {
        this.UX(base_url);
    }

    UX() {
        let self = this;
        $(document).on('click', '.modal-error-close', function () {
            $('#modalError').modal('hide');

            setTimeout(function(){
                $('#modalError').remove();
            }, 1000);


        });
    }

    showErrorModal(msg) {
        $('body').append(
            '    <div class="modal fade right" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"' +
            '      aria-hidden="true" data-backdrop="true">' +
            '      <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">' +
            '        <div class="modal-content">' +
            '          <div class="modal-header">' +
            '            <p class="heading">Ups! coś poszło nie tak. </p>' +
            '          </div>' +
            '          <div class="modal-body">' +
            '            <div class="row">' +
            '              <div class="col-12">' +
            '                <p>' + msg + '</p>' +
            '              </div>' +
            '            </div>' +
            '          </div>' +
            '            <div class="modal-footer flex-center">' +
            '              <button class="modal-error-close w-50 btn btn-danger btn-rounded text-white waves-effect waves-light text-transform-none">' +
            '                  Zamknij' +
            '              </button>'+
            '            </div>' +
            '          </div>' +
            '        </div>' +


            '      </div>' +
            '    </div>'
        );

        $('#modalError').modal({backdrop: 'static', keyboard: false});
        $('#modalError').modal('show');
    }

}
