@extends('layouts.backend')

@section('content')

    <div id="ModuleName" data-moduleName="backendAnimalSizes">
        <div id="contact" class="container-fluid mb-4 min-vh-100">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-4">
                    <h2 class="color-mid-grey">Wielkość zwierzaków</h2>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="d-flex justify-content-end">
                        <button id="addSize"
                            class="btn teal lighten-1 btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                            Dodaj wielkość zwierzaka <i class="ml-2 fas fa-lg text-white fa-plus"></i></button>
                    </div>
                    <table id="adminAnimalSizeTable" class="table table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="ID wielkości">ID</th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Nazwa wielkości zwierzaka">
                                Wielkość
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data dodania">Data
                                dodania
                            </th>
                            <th colspan="th-sm" data-toggle="tooltip" data-placement="top"
                                title="Dodane przez użytkowania">Dodał
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data edycji">Data
                                edycji
                            </th>
                            <th colspan="th-sm" data-toggle="tooltip" data-placement="top"
                                title="Edytowane przez użytkowania">Edytował
                            </th>
                            <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data usunięcia">Data
                                usunięcia
                            </th>
                            <th colspan="th-sm" data-toggle="tooltip" data-placement="top"
                                title="Usunięte przez użytkowania">Usunął
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

        <div class="modal fade" id="addEditSizeModal" tabindex="-1" role="dialog" aria-labelledby="Dodaj/Edytuj wielkość zwirzaka"
             aria-hidden="true">
            <div class="modal-dialog modal-lg modal-notify mt-5" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center teal lighten-1">
                        <h4 class="modal-title white-text w-100 font-weight-bold py-2"><span id="addEditModalTitle">Dodaj wielkość zwierzaka</span></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="form_result"></span>
                        <form id="addEditSize" style="color: #757575;" method="post">
                            @csrf
                            <div class="md-form mt-0">
                                <input type="text" id="sizeName" name="sizeName" class="form-control">
                                <label for="sizeName">Wielkość zwierzaka</label>
                            </div>
                            <div class="md-form mt-0 mb-0 text-left">
                                <input type="hidden" name="action" id="action" />
                                <input type="hidden" name="animalSizeId" id="animalSizeId" />
                                <button type="submit" name="action_button" id="action_button" class="btn indigo lighten-1 btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                                    Zapisz</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="Usuń wielkość zwierzaka"
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
                        <span id="confirm_form_result"></span>
                        <p id="animalDeleteText" class="text-center">Czy na pewno chcesz usunąć wielkość zwierzaka <span class="font-weight-bold confirm-animal-size-name d-none"></span></p>
                        <p id="animalRestoreText" class="text-center">Czy na pewno chcesz przywrócić wielkość zwierzaka <span class="font-weight-bold confirm-animal-size-name d-none"></span></p>
                        <div class="w-50 mx-auto">
                            <div class="d-flex justify-content-around">
                                <button type="button" id="confirm-yes" data-animal-size-id="" class="btn success-color btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
                                    Tak
                                </button>
                                <button type="button" id="confirm-no" data-dismiss="modal" class="btn danger-color btn-rounded pl-5 pr-5 text-white waves-effect waves-light text-transform-none m-0 mb-3">
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


    @push('scripts')
        <script>
            $(document).ready(function(){
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

            $('#adminAnimalSizeTable').DataTable({
                language: datatablePL,
                select: true,
                order: [[0, "desc"]],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('adminAnimalSize') }}"
                },
                columns: [
                    {
                        data: 'animal_size_id',
                        name: 'animal_size_id',
                    },
                    {
                        data: 'animal_size_name',
                        name: 'animal_size_name',
                    },
                    {
                        data: 'size_created_at',
                        name: 'size_created_at',
                    },
                    {
                        data: 'added_user',
                        name: 'added_user',
                    },
                    {
                        data: 'size_edited_at',
                        name: 'size_edited_at',
                    },
                    {
                        data: 'edited_user',
                        name: 'edited_user',
                    },
                    {
                        data: 'size_deleted_at',
                        name: 'size_deleted_at',
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

            $('#adminAnimalSizeTable_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#adminAnimalSizeTable_wrapper .dataTables_filter').find('input').each(function () {
                const $this = $(this);
                $this.attr("placeholder", "Search");
                $this.removeClass('form-control-sm');
            });
            $('#adminAnimalSizeTable_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#adminAnimalSizeTable_wrapper .dataTables_filter').addClass('md-form');
            $('#adminAnimalSizeTable_wrapper select').removeClass(
                'custom-select custom-select-sm form-control form-control-sm');
            $('#adminAnimalSizeTable_wrapper select').addClass('mdb-select');
            $('#adminAnimalSizeTable_wrapper .dataTables_filter').find('label').remove();
            });
        </script>

    @endpush

@endsection
