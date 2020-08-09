@extends('layouts.backend')

@section('content')


    <div id="contact" class="container-fluid mb-4 min-vh-100">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <h2 class="color-mid-grey">Cechy zwierzaków</h2>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="table-responsive">
                    <table id="adminViolationReportsTable" class="table table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="ID zgłoszenia">ID</th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Typ zgłoszenia">Typ
                                zgłoszenia
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Nazwa zgłoszenia">
                                Nazwa
                            </th>
                            <th colspan="th-sm" data-toggle="tooltip" data-placement="top" title="Powód zgłoszenia">
                                Powód
                            </th>
                            <th colspan="th-sm" data-toggle="tooltip" data-placement="top" title="Treść zgłoszenia">
                                Treść
                            </th>
                            <th colspan="th-sm" data-toggle="tooltip" data-placement="top" title="Zgłaszający">
                                Zgłoszający
                            </th>
                            <th colspan="th-sm" data-toggle="tooltip" data-placement="top"
                                title="Numer IP zgłaszającego">Numer IP
                            </th>
                            <th colspan="th-sm" data-toggle="tooltip" data-placement="top" title="Akcje Usuń/Edytuj">
                                Akcje
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })

            const datatablePL = {
                "processing": "Przetwarzanie...",
                "search": "Szukaj:",
                "lengthMenu": "Pokaż _MENU_ pozycji",
                "info": "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
                "infoEmpty": "Pozycji 0 z 0 dostępnych",
                "infoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
                "infoPostFix": "",
                "loadingRecords": "Wczytywanie...",
                "zeroRecords": "Nie znaleziono pasujących pozycji",
                "emptyTable": "Brak danych",
                "paginate": {
                    "first": "Pierwsza",
                    "previous": "Poprzednia",
                    "next": "Następna",
                    "last": "Ostatnia"
                },
                "aria": {
                    "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
                    "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
                }
            }

            $('#adminViolationReportsTable').DataTable({
                language: datatablePL,
                select: true,
                order: [[0, "desc"]],
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('adminViolationReports') }}"
                },
                columns: [
                    {
                        data: 'violation_report_id',
                        name: 'violation_report_id',
                    },
                    {
                        data: 'violation_report_type',
                        name: 'violation_report_type',
                    },
                    {
                        data: 'violation_report_type_link',
                        name: 'violation_report_type_link',
                    },
                    {
                        data: 'violation_report_reason',
                        name: 'violation_report_reason',
                    }, {
                        data: 'violation_report_text',
                        name: 'violation_report_text',
                    },
                    {
                        data: 'added_user',
                        name: 'added_user',
                    },
                    {
                        data: 'violation_report_ip_address',
                        name: 'violation_report_ip_address',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                    }
                ]
            });

            $('#adminViolationReportsTable_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#adminViolationReportsTable_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Szukaj");
                $this.removeClass('form-control-sm');
            });
            $('#adminViolationReportsTable_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#adminViolationReportsTable_wrapper .dataTables_filter').addClass('md-form');
            $('#adminViolationReportsTable_wrapper select').removeClass(
                'custom-select custom-select-sm form-control form-control-sm');
            $('#adminViolationReportsTable_wrapper select').addClass('mdb-select');
            $('#adminViolationReportsTable_wrapper .dataTables_filter').find('label').remove();

        </script>

    @endpush

@endsection
