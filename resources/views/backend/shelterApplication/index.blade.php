@extends('layouts.backend')

@section('content')

    <div id="ModuleName" data-moduleName="BackendShelterApplications">
        <div id="contact" class="container-fluid mb-4 min-vh-100">

            <div class="row">
                <div class="col-lg-12 col-md-12 mb-4">
                    <h2 class="color-mid-grey">Zgłoszenia schronisk</h2>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="table-responsive">
                        <table id="adminShelterApplicationTable" class="table table-striped table-bordered"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="ID zgłoszenia">ID
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Imie i nazwisko">
                                    Imie i
                                    nazwisko
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Nazwa schroniska">
                                    Nazwa schroniska
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Adres email">Email
                                </th>
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
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Numer REGON">REGON
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top"
                                    title="Data wysłania wniosku">
                                    Data Wysłania wniosku
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Status wniosku">
                                    Status
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Akcje">Akcje</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="EditShelterApplicationModal" tabindex="-1" role="dialog" aria-labelledby="Edytuj aplikacje schroniska"
             aria-hidden="true">
            <div class="modal-dialog modal-lg modal-notify mt-5" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center yellow darken-2">
                        <h4 class="modal-title white-text w-100 font-weight-bold py-2"><span id="addEditModalTitle">Edytuj aplikacje schrosnika</span>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="form_result"></span>
                        <form id="EditShelterApplication" style="color: #757575;" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col m-2">
                                    <!-- First name -->
                                    <div class="md-form">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Imię i nazwisko wnioskującego: <span id="applicantName" class="font-weight-bold"></span></li>
                                            <li class="list-group-item">Nazwa schroniska: <span id="applicantShelterName" class="font-weight-bold"></span></li>
                                            <li class="list-group-item">Adres schroniska: <span id="applicantShelterAddress" class="font-weight-bold"></span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col m-2">
                                    <div class="md-form">
                                        <select id="animalStatusesId" name="animalStatusesId" class="mdb-select md-form"
                                                searchable="Wyszukaj rasę" data-visible-options="10"
                                                data-max-selected-options="-1">

                                        </select>
                                        <button type="button"
                                                class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none btn-sm btn-save">
                                            Wybierz
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="md-form mt-0 mb-0 text-left">
                                <input type="hidden" name="applicationShelterId" id="applicationShelterId"/>
                                <button type="submit" name="action_button" id="action_button"
                                        class="btn indigo lighten-1 btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                                    Zapisz
                                </button>
                            </div>
                        </form>
                    </div>
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
                responsive: true,
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
                        data: 'shelterName',
                        name: 'shelterName',
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
