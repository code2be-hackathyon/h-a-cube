@extends('adminlte::page')
@section('content')
    <?php
    $courses = \App\Courses::where('isAccepted', 1);
    ?>
    <section class="content">
        <div class="container-fluid">
            <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        Créer un atelier
                    </h3>
                </div>
                <div class="card-body">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{route('createSession')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="course_id">Type de cours</label>
                                <select class="form-control" id="course_id" name="course_id">
                                    @foreach($data as $item)
                                        <option id="{{$item->id}}">{{$item->label}}</option>
                                    @endforeach

                                </select>


                            </div>
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="startedHour">Heure de début</label>
                                <input type="time" class="form-control" id="startedHour" name="startedHour" required>
                            </div>
                            <div class="form-group">
                                <label for="endedHour">Heure de fin</label>
                                <input type="time" class="form-control" id="endedHour" name="endedHour" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" cols="40" rows="5"
                                          required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nbMaxUsers">Nombre max de personnes</label>
                                <input type="number" class="form-control" id="nbMaxUsers" name="nbMaxUsers" min="1"
                                       required>
                            </div>
                            <div class="form-group" id="difficulty_div">
                                <label for="difficulty">Difficulté</label>
                                <input type="number" class="form-control" id="difficulty" name="difficulty" min="1"
                                       max="5"
                                       required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div id="footer">
                            <button type="submit" class="btn btn-warning toastsDefaultSuccess">Envoyer</button>
                        </div>
                    </form>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $('.toastsDefaultSuccess').click(function() {
            $(document).Toasts('create', {
                class: 'bg-success',
                title: 'Succès',
                body: 'Votre demande d\'atelier a bien été prise en compte'
            })
        });
    </script>
@endsection
