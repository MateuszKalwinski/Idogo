@extends('layouts.backend')

@section('content')


    <div id="contact" class="container-fluid mb-4 min-vh-100">

        <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
                <h2 class="color-mid-grey">Zgłoszenia schronisk</h2>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="table-responsive">
                    <table id="adminShelterApplicationTable" class="table table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="ID zgłoszenia">ID</th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Imie i nazwisko">Imie i
                                nazwisko
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Adres email">Email</th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top"
                                title="Użytkownik na podstawie przypisanego maila">Użytkownik
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Numer telefonu">
                                Telefon
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Adres schroniska">
                                Adres
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Numer NIP">NIP</th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Numer REGON">REGON</th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data wysłania wniosku">
                                Data Wysłania wniosku
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Status wniosku">Status
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

            $('#adminShelterApplicationTable').DataTable({
                language: datatablePL,
                select: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('adminShelterApplication') }}"
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                    },
                    {
                        data: 'nameAndSurname',
                        name: 'nameAndSurname',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'user',
                        name: 'user',
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                    },
                    {
                        data: 'address',
                        name: 'address',
                    },
                    {
                        data: 'nip',
                        name: 'nip',
                    },
                    {
                        data: 'regon',
                        name: 'regon',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'shelterApplicationStatus',
                        name: 'shelterApplicationStatus',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                    }
                ]
            });

            $('#adminShelterApplicationTable_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#adminShelterApplicationTable_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Szukaj");
                $this.removeClass('form-control-sm');
            });
            $('#adminShelterApplicationTable_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#adminShelterApplicationTable_wrapper .dataTables_filter').addClass('md-form');
            $('#adminShelterApplicationTable_wrapper select').removeClass(
                'custom-select custom-select-sm form-control form-control-sm');
            $('#adminShelterApplicationTable_wrapper select').addClass('mdb-select');
            $('#adminShelterApplicationTable_wrapper .dataTables_filter').find('label').remove();


        </script>

    @endpush

@endsection
