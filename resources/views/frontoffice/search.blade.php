@extends('adminlte::page')
@section('content')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">


    <?php
    $sessions = \App\Sessions::where('isAccepted', 1)->get();
    ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des ateliers</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable"
                                           role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 168px;">Thème
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 418px;">Titre
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 193px;">Date
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending"
                                                style="width: 143px;">Heure de début
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 100px;">Heure de fin
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 100px;">Professeur
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 200px;">Participer
                                            </th>
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
                                            <td><?php echo date('d/m/Y',strtotime($session->date))?></td>
                                            <td><?php echo $session->startedHour?></td>
                                            <td><?php echo $session->endedHour?></td>
                                            <td><?php echo $professorFirstName[0]->firstname . ' ' . $professorLastName[0]->lastname?></td>
                                            <td>
                                                @csrf
                                                <a href="{{ route('registerToSession', ['id'=> $session->id, 'user_id' => Auth::user()->id]) }}">
                                                    <button class="btn btn-block bg-gradient-warning">Participer
                                                    </button>
                                                </a>
                                        </tr><?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>


                </div>
            </div>
    </section>

@endsection
@section('js')
    @parent
    <script>
        $(function () {
            $("#example1").DataTable(
                {
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
                    }
                }
            );
        });
    </script>
@endsection
