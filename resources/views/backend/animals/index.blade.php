@extends('layouts.backend')

@section('content')


<div id="contact" class="container-fluid mb-4 min-vh-100">
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-4">
            <h2 class="color-mid-grey">Gatunki</h2>
        </div>
        <div class="col-lg-12 col-md-12">
            <table id="adminAnimalsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Zdjęcie zwierzaka">Zdjęcie</th>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="ID zwierzaka">ID</th>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Imie zwierzaka">Imię</th>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Gatunek zwierzaka">Gatunek</th>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Rasa zwierzaka">Rasa</th>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Płeć zwierzaka">Płeć</th>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Cena zwierzaka">Cena</th>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Status zwierzaka">Status</th>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Data dodania">Data dodania</th>
                        <th colspan="th-sm" data-toggle="tooltip" data-placement="top" title="Dodane przez użytkowania">Dodał</th>
                        <th colspan="th-sm" data-toggle="tooltip" data-placement="top" title="Akcje Usuń/Edytuj">Akcje</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        const datatablePL = {
                "processing":     "Przetwarzanie...",
                "search":         "Szukaj:",
                "lengthMenu":     "Pokaż _MENU_ pozycji",
                "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
                "infoEmpty":      "Pozycji 0 z 0 dostępnych",
                "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
                "infoPostFix":    "",
                "loadingRecords": "Wczytywanie...",
                "zeroRecords":    "Nie znaleziono pasujących pozycji",
                "emptyTable":     "Brak danych",
                "paginate": {
                    "first":      "Pierwsza",
                    "previous":   "Poprzednia",
                    "next":       "Następna",
                    "last":       "Ostatnia"
                },
                "aria": {
                    "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
                    "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
                }
            }

        $('#adminAnimalsTable').DataTable({
            language: datatablePL,
            select: true,
            order: [[1, "desc"]],
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('adminAnimals') }}"
            },
            columns:[
                {
                    data:'animal_photos',
                    name: 'animal_photos',
                },
                {
                    data:'animal_id',
                    name: 'animal_id',
                },
                {
                    data:'animal_name',
                    name: 'animal_name',
                },
                {
                    data:'animal_species_name',
                    name: 'animal_species_name',
                },
                {
                    data:'animal_breed_name',
                    name: 'animal_breed_name',
                },
                {
                    data:'animal_gender_name',
                    name: 'animal_gender_name',
                },
                {
                    data:'animal_price',
                    name: 'animal_price',
                },
                {
                    data:'animal_status_name',
                    name: 'animal_status_name',
                },
                {
                    data:'animal_created_at',
                    name: 'animal_created_at',
                },
                {
                    data:'added_user',
                    name: 'added_user',
                },
                {
                    data:'action',
                    name: 'action',
                    orderable: false,
                }
            ],
        });

        $('#adminAnimalsTable_wrapper').find('label').each(function () {
            $(this).parent().append($(this).children());
        });
        $('#adminAnimalsTable_wrapper .dataTables_filter').find('input').each(function () {
            const $this = $(this);
            $this.attr("placeholder", "Szukaj");
            $this.removeClass('form-control-sm');
        });
        $('#adminAnimalsTable_wrapper .dataTables_length').addClass('d-flex flex-row');
        $('#adminAnimalsTable_wrapper .dataTables_filter').addClass('md-form');
        $('#adminAnimalsTable_wrapper select').removeClass(
            'custom-select custom-select-sm form-control form-control-sm');
        $('#adminAnimalsTable_wrapper select').addClass('mdb-select');
        $('#adminAnimalsTable_wrapper .dataTables_filter').find('label').remove();

    </script>

@endpush

@endsection
