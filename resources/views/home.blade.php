@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <table class="table table-hover" id="usertable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(() => {
            var employeeListDatatable = $('#usertable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('home.getData') }}",
                    "type": "POST",
                    "async": "True",
                    "data": {},
                },
                "order": [[0, "asc"]],
                "pageLength": 10,
                "scrollX": true,
                // "columnDefs": [
                //     {"orderable": false, "targets": 0},
                //     {"orderable": false, "targets": 2},
                //     {"orderable": false, "targets": 6},
                //     {"orderable": false, "targets": 7},
                // ],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                // 'buttons': [
                //     {
                //         'extend': 'excelHtml5',
                //         'title': 'Employee List',
                //         'exportOptions': {
                //             'columns': [0, 1, 3, 4, 5, 6]
                //         }
                //     },
                //     {
                //         'extend': 'pdfHtml5',
                //         'title': 'Employee List',
                //         'exportOptions': {
                //             'columns': [0, 1, 3, 4, 5, 6]
                //         }
                //     },
                //     {
                //         'extend': 'print',
                //         'title': 'Employee List',
                //         'exportOptions': {
                //             'columns': [0, 1, 3, 4, 5, 6]
                //         }
                //     },
                // ]

            });
            employeeListDatatable.buttons().container()
                .appendTo('#employeeexports');
        });



    </script>

@endsection
