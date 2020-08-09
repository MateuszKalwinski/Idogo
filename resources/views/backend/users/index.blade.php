@extends('layouts.backend')

@section('content')


    <div id="contact" class="container-fluid mb-4 min-vh-100">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <h2 class="color-mid-grey">Użytkownicy</h2>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="table-responsive">
                    <table id="adminUsersTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Zdjęcie użytkownika">
                                Zdjęcie
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="ID użytkownika">ID</th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top"
                                title="Imię i nazwisko użytkownika">Imię i nazwisko
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Email użytkownika">
                                Email
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Nazwa schroniska">
                                Schronisko
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top"
                                title="Liczba dodanych zwierząt bez podziału na status">Ilość zwierząt
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data dołączenia">Data
                                dołączenia
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Rola użytkownika">Rola
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Akcje">Akcje</th>
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

            $('#adminUsersTable').DataTable({
                language: datatablePL,
                select: true,
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('adminUsers') }}"
                },
                columns: [
                    {
                        data: 'user_photo',
                        name: 'user_photo',
                    },
                    {
                        data: 'user_id',
                        name: 'user_id',
                    },
                    {
                        data: 'user_full_name',
                        name: 'user_full_name',
                    },
                    {
                        data: 'user_email',
                        name: 'user_email',
                    },
                    {
                        data: 'shelter_name',
                        name: 'shelter_name',
                    },

                    {
                        data: 'count_animals',
                        name: 'count_animals',
                    },
                    {
                        data: 'user_created_at',
                        name: 'user_created_at',
                    },
                    {
                        data: 'user_role',
                        name: 'user_role',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                    }
                ]
            });

            $('#adminUsersTable_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#adminUsersTable_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Szukaj");
                $this.removeClass('form-control-sm');
            });
            $('#adminUsersTable_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#adminUsersTable_wrapper .dataTables_filter').addClass('md-form');
            $('#adminUsersTable_wrapper select').removeClass(
                'custom-select custom-select-sm form-control form-control-sm');
            $('#adminUsersTable_wrapper select').addClass('mdb-select');
            // $('#adminUsersTable_wrapper .mdb-select').materialSelect();
            $('#adminUsersTable_wrapper .dataTables_filter').find('label').remove();

        </script>

    @endpush

@endsection
