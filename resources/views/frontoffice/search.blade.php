@extends('adminlte::page')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">


    <?php
    $sessions = \App\Sessions::all();
    ?>

    <section class="content">
        <div class ="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des ateliers</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="example1_length">
                                        <label>Montrer
                                            <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> atelier</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="example1_filter" class="dataTables_filter">
                                        <label>Rechercher :<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row"><div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 168px;">Thème</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 218px;">Titre</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 193px;">Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 143px;">Heure de début</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Heure de fin</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Professeur</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 100px;">Participer</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($sessions as $session)
                                        { $courseName = \App\Http\Controllers\SessionController::getCourseLabelById($session->courses_id);
                                        $professorFirstName = \App\Http\Controllers\SessionController::getProfessorFirstName($session->user_id);
                                        $professorLastName = \App\Http\Controllers\SessionController::getProfessorLastName($session->user_id);
                                        ?>

                                        <tr role="row" class="odd">
                                            <td><?php echo $courseName[0]->label?></td>
                                            <td><?php echo $session->title?></td>
                                            <td><?php echo $session->date?></td>
                                            <td><?php echo $session->startedHour?></td>
                                            <td><?php echo $session->endedHour?></td>
                                            <td><?php echo $professorFirstName[0]->firstname.' '.$professorLastName[0]->lastname?></td>
                                            <td><button type="button" class="btn btn-block bg-gradient-warning">Participer</button></td>
                                        </tr><?php } ?>
                                        </tbody>
                                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <script>
                    $(function () {
                        $("#example1").DataTable();
                    });
                </script>



            </div></div></section>

@endsection
