@extends('layouts.backend')

@section('content')


<div id="contact" class="container-fluid mb-4 min-vh-100">
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-4">
            <h2 class="color-mid-grey">Gatunki</h2>
        </div>
        <div class="col-lg-12 col-md-12">
            <table id="adminBreedsTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="ID rasy">ID</th>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Nazwa rasy">Nazwa rasy</th>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Nazwa gatunku">Nazwa gatunku</th>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Ilość zwierzaków o danej rasie">Ilość zwierzaków</th>
                        <th class="th-sm" data-toggle="tooltip" data-placement="top" title="Opis rasy">Opis rasy</th>
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

        $('#adminBreedsTable').DataTable({
            language: datatablePL,
            select: true,
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('adminBreeds') }}"
            },
            columns:[
                {
                    data:'animal_breed_id',
                    name: 'animal_breed_id',
                },
                {
                    data:'animal_breed_name',
                    name: 'animal_breed_name',
                },
                {
                    data:'animal_species_name',
                    name: 'animal_species_name',
                },
                {
                    data:'count_animals_with_breed',
                    name: 'count_animals_with_breed',
                },
                {
                    data:'breed_description',
                    name: 'breed_description',
                },
                {
                    data:'animal_breed_created_at',
                    name: 'animal_breed_created_at',
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
            ]
        });

        $('#adminBreedsTable_wrapper').find('label').each(function () {
            $(this).parent().append($(this).children());
        });
        $('#adminBreedsTable_wrapper .dataTables_filter').find('input').each(function () {
            const $this = $(this);
            $this.attr("placeholder", "Szukaj");
            $this.removeClass('form-control-sm');
        });
        $('#adminBreedsTable_wrapper .dataTables_length').addClass('d-flex flex-row');
        $('#adminBreedsTable_wrapper .dataTables_filter').addClass('md-form');
        $('#adminBreedsTable_wrapper select').removeClass(
            'custom-select custom-select-sm form-control form-control-sm');
        $('#adminBreedsTable_wrapper select').addClass('mdb-select');
        $('#adminBreedsTable_wrapper .dataTables_filter').find('label').remove();

    </script>

@endpush

@endsection
