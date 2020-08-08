@extends('layouts.backend')

@section('content')

    <div id="ModuleName" data-moduleName="BackendAvailableCharacteristicDictionary">
        <div id="contact" class="container-fluid mb-4 min-vh-100">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-4">
                    <h2 class="color-mid-grey">Cechy zwierzaków dla ras</h2>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="d-flex justify-content-end">
                        <button id="addAvailableCharacteristic"
                                class="btn teal lighten-1 btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                            Dodaj cechę do rasy <i class="ml-2 fas fa-lg text-white fa-plus"></i></button>
                    </div>
                    <table id="adminAvailableCharacteristicTable" class="table table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="ID dostępnej cechy">
                                ID
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Nazwa gatunku zwierzaka">
                                Gatunek
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top"
                                title="Nazwa dostępnej cechy">Cecha
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data dodania">Data
                                dodania
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data aktualizacja">Data
                                aktualizacji
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

        <div class="modal fade" id="addEditAvailableCharacteristicModal" tabindex="-1" role="dialog"
             aria-labelledby="Dodaj/Edytuj cechę"
             aria-hidden="true">
            <div class="modal-dialog modal-lg modal-notify mt-5" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center teal lighten-1">
                        <h4 class="modal-title white-text w-100 font-weight-bold py-2"><span id="addEditModalTitle">Dodaj Cechę dla rasy</span>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="formResult"></span>
                        <form id="addEditAvailableCharacteristic" style="color: #757575;" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col m-2">
                                    <!-- First name -->
                                    <div class="md-form">
                                        <select id="speciesId" name="speciesId" class="mdb-select md-form"
                                                searchable="Wyszukaj gatunek" data-visible-options="10"
                                                data-max-selected-options="-1">

                                        </select>
                                        <button type="button"
                                                class="btn indigo lighten-1 btn-rounded text-white waves-effect waves-light text-transform-none btn-sm btn-save">
                                            Wybierz
                                        </button>
                                    </div>
                                </div>
                                <div class="col m-2">
                                    <!-- First name -->
                                    <div class="md-form">
                                        <select id="characteristics" name="characteristics[]" class="mdb-select md-form" multiple
                                                searchable="Wyszukaj cechy" data-visible-options="10"
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
                                <input type="hidden" name="action" id="action"/>
                                <input type="hidden" name="animalSpeciesId" id="animalSpeciesId"/>
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

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog"
             aria-labelledby="Usuń dostępną cechę dla rasy"
             aria-hidden="true">
            <div class="modal-dialog modal-lg modal-notify mt-5" role="document">
                <div class="modal-content">
                    <div id="confirmModalHeader" class="modal-header text-center danger-color">
                        <h4 class="modal-title white-text w-100 font-weight-bold py-2">Potwierdzenie</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="confirmFormResult"></span>
                        <div id="showHideContent">
                            <p id="animalDeleteText" class="text-center">Czy na pewno chcesz usunąć cechę <span
                                    class="font-weight-bold confirm-animal-characteristic-name"></span> dla <span
                                    class="font-weight-bold confirm-animal-species-name"></span>
                            </p>
                            <div class="w-50 mx-auto">
                                <div class="d-flex justify-content-around">
                                    <button type="button" id="confirm-yes" data-available-characteritic-id=""
                                            class="btn success-color btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                                        Tak
                                    </button>
                                    <button type="button" id="confirm-no" data-dismiss="modal"
                                            class="btn danger-color btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                                        Nie
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @push('scripts')
            <script>
                $(document).ready(function () {
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

                    $('#adminAvailableCharacteristicTable').DataTable({
                        language: datatablePL,
                        select: true,
                        order: [[0, "desc"]],
                        processing: true,
                        serverSide: true,
                        ajax: {
                            url: "{{ route('adminAvailableCharacteristicDictionary') }}"
                        },
                        columns: [
                            {
                                data: 'available_characteristic_id',
                                name: 'available_characteristic_id',
                            },
                            {
                                data: 'species_name',
                                name: 'species_name',
                            },
                            {
                                data: 'characteristic_name',
                                name: 'characteristic_name',
                            },
                            {
                                data: 'available_characteristic_created_at',
                                name: 'available_characteristic_created_at',
                            },
                            {
                                data: 'available_characteristic_updated_at',
                                name: 'available_characteristic_updated_at',
                            },
                            {
                                data: 'action',
                                name: 'action',
                                orderable: false,
                            }
                        ]
                    });

                    $('#adminAvailableCharacteristicTable_wrapper').find('label').each(function () {
                        $(this).parent().append($(this).children());
                    });
                    $('#adminAvailableCharacteristicTable_wrapper .dataTables_filter').find('input').each(function () {
                        const $this = $(this);
                        $this.attr("placeholder", "Szukaj");
                        $this.removeClass('form-control-sm');
                    });
                    $('#adminAvailableCharacteristicTable_wrapper .dataTables_length').addClass('d-flex flex-row');
                    $('#adminAvailableCharacteristicTable_wrapper .dataTables_filter').addClass('md-form');
                    $('#adminAvailableCharacteristicTable_wrapper select').removeClass(
                        'custom-select custom-select-sm form-control form-control-sm');
                    $('#adminAvailableCharacteristicTable_wrapper select').addClass('mdb-select');
                    $('#adminAvailableCharacteristicTable_wrapper select').materialSelect();
                    $('#adminAvailableCharacteristicTable_wrapper .dataTables_filter').find('label').remove();
                });
            </script>

    @endpush

@endsection
