@extends('layouts.backend')

@section('content')

    <div id="ModuleName" data-moduleName="backendAnimalSpecies">

        <div class="container-fluid mb-4 min-vh-100">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-4">
                    <h2 class="color-mid-grey">Gatunki</h2>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="d-flex justify-content-end">
                        <button id="addSpecies"
                                class="btn teal lighten-1 btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                            Dodaj gatunek <i class="ml-2 fas fa-lg text-white fa-plus"></i></button>
                    </div>
                    <div class="table-responsive">
                        <table id="adminSpeciesTable" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="ID gatunku">ID</th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Nazwa gatunku">Nazwa
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top"
                                    title="Ilość zwierzaków o danym gatunku">Ilość zwierzaków
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data dodania">Data
                                    dodania
                                </th>
                                <th colspan="th-sm" data-toggle="tooltip" data-placement="top"
                                    title="Dodane przez użytkowania">
                                    Dodał
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data edycji">Data
                                    edycji
                                </th>
                                <th colspan="th-sm" data-toggle="tooltip" data-placement="top"
                                    title="Edytowane przez użytkowania">
                                    Edytował
                                </th>
                                <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data
                                usunięcia">Data
                                    usunięcia
                                </th>
                                <th colspan="th-sm" data-toggle="tooltip" data-placement="top"
                                    title="Usunięte przez użytkowania">
                                    Usunął
                                </th>
                                <th colspan="th-sm" data-toggle="tooltip" data-placement="top"
                                    title="Akcje Usuń/Edytuj">
                                    Akcje
                                </th>

                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 mb-4">
                    <h2 class="color-mid-grey">Gatunki z podziałem na rasy</h2>
                </div>
                <div class="col-lg-12 col-md-12">
                    <table id="adminSpeciesWithGenderTable" class="table table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top"
                                title="ID gatunku z podziałem na płeć">ID
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top"
                                title="Nazwa z podziałem na płeć">
                                Nazwa
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Nazwa globalna gatunku">
                                Nazwa - globalna
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Płeć gatunku">Płeć</th>
                            <th colspan="th-sm" data-toggle="tooltip" data-placement="top" title="Data dodania">Data
                                dodania
                            </th>
                            <th colspan="th-sm" data-toggle="tooltip" data-placement="top"
                                title="Dodane przez użytkowania">
                                Dodał
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data edycji">Data edycji
                            </th>
                            <th colspan="th-sm" data-toggle="tooltip" data-placement="top"
                                title="Edytowane przez użytkowania">
                                Edytował
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data
                                usunięcia">Data
                                usunięcia
                            </th>
                            <th colspan="th-sm" data-toggle="tooltip" data-placement="top"
                                title="Usunięte przez użytkowania">
                                Usunął
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

        <div class="modal fade" id="addEditSpeciesModal" tabindex="-1" role="dialog"
             aria-labelledby="Dodaj/Edytuj gatunek"
             aria-hidden="true">
            <div class="modal-dialog modal-lg modal-notify mt-5" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center teal lighten-1">
                        <h4 class="modal-title white-text w-100 font-weight-bold py-2"><span id="addEditModalTitle">Dodaj gatunek</span>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="form_result"></span>
                        <form id="addEditSpecies" style="color: #757575;" method="post">
                            @csrf
                            <div class="md-form mt-0">
                                <input type="text" id="speciesName" name="speciesName" class="form-control">
                                <label for="speciesName">Gatunek</label>
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

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="Usuń gatunek"
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
                            <span id="confirm_form_result"></span>
                            <p id="animalDeleteText" class="text-center">Czy na pewno chcesz usunąć gatunek <span
                                    class="font-weight-bold confirm-animal-species-name d-none"></span></p>
                            <p id="animalRestoreText" class="text-center">Czy na pewno chcesz przywrócić gatunek <span
                                    class="font-weight-bold confirm-animal-species-name d-none"></span></p>
                            <div class="w-50 mx-auto">
                                <div class="d-flex justify-content-around">
                                    <button type="button" id="confirm-yes" data-animal-species-id=""
                                            class="btn success-color btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                                        Tak
                                    </button>
                                    <button type="button" id="confirm-no" data-dismiss="modal"
                                            class="btn danger-color btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                                        Nie
                                    </button>
                                </div>
                                <input id="actionDeleteRestore" type="hidden" value="">
                            </div>
                        </div>
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

            $('#adminSpeciesTable').DataTable({
                language: datatablePL,
                select: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('adminSpecies') }}"
                },
                columns: [
                    {
                        data: 'animal_species_id',
                        name: 'animal_species_id',
                    },
                    {
                        data: 'animal_species_name',
                        name: 'animal_species_name',
                    },
                    {
                        data: 'count_animals_with_species',
                        name: 'count_animals_with_species',
                    },
                    {
                        data: 'species_created_at',
                        name: 'species_created_at',
                    },
                    {
                        data: 'added_user',
                        name: 'added_user',
                    },
                    {
                        data: 'species_edited_at',
                        name: 'species_edited_at',
                    },
                    {
                        data: 'edited_user',
                        name: 'edited_user',
                    },
                    {
                        data: 'species_deleted_at',
                        name: 'species_deleted_at',
                    },
                    {
                        data: 'deleted_user',
                        name: 'deleted_user',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                    }
                ]
            });

            $('#adminSpeciesWithGenderTable').DataTable({
                language: datatablePL,
                select: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('adminSpeciesWithGender') }}"
                },
                columns: [
                    {
                        data: 'animal_dictionary_id',
                        name: 'animal_dictionary_id',
                    },
                    {
                        data: 'animal_dictionary_name',
                        name: 'animal_dictionary_name',
                    },
                    {
                        data: 'animal_species_name',
                        name: 'animal_species_name',
                    },
                    {
                        data: 'animal_gender_name',
                        name: 'animal_gender_name',
                    },
                    {
                        data: 'animal_dictionary_created_at',
                        name: 'animal_dictionary_created_at',
                    },
                    {
                        data: 'added_user',
                        name: 'added_user',
                    },
                    {
                        data: 'animal_dictionary_edited_at',
                        name: 'animal_dictionary_edited_at',
                    },
                    {
                        data: 'edited_user',
                        name: 'edited_user',
                    },
                    {
                        data: 'animal_dictionary_deleted_at',
                        name: 'animal_dictionary_deleted_at',
                    },
                    {
                        data: 'deleted_user',
                        name: 'deleted_user',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                    }
                ]
            });

            $('#adminSpeciesTable_wrapper, #adminSpeciesWithGenderTable_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#adminSpeciesTable_wrapper .dataTables_filter, #adminSpeciesWithGenderTable_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Szukaj");
                $this.removeClass('form-control-sm');
            });
            $('#adminSpeciesTable_wrapper .dataTables_length, #adminSpeciesWithGenderTable_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#adminSpeciesTable_wrapper .dataTables_filter, #adminSpeciesWithGenderTable_wrapper .dataTables_filter').addClass('md-form');
            $('#adminSpeciesTable_wrapper select, #adminSpeciesWithGenderTable_wrapper select').removeClass(
                'custom-select custom-select-sm form-control form-control-sm');
            $('#adminSpeciesTable_wrapper select, #adminSpeciesWithGenderTable_wrapper select').addClass('mdb-select');
            // $('#adminUsersTable_wrapper .mdb-select').materialSelect();
            $('#adminSpeciesTable_wrapper .dataTables_filter, #adminSpeciesWithGenderTable_wrapper .dataTables_filter').find('label').remove();

        </script>

    @endpush

@endsection
