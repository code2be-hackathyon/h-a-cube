@extends('adminlte::page')

@section('content')
    @if(false)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Dashboard administrateur</h3></div>

                        <div class="card-body">Test</div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if(Auth::check())

            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Default Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <div class="card">
                <div class="card-body">
                    <h3> N'oubliez pas vos cours déja insrits </h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Cours</th>
                            <th>Professeur</th>
                            <th>Salle</th>
                            <th>Niveau</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sessionsForUser as $item)
                            <tr>
                                <td>{{$item->date.' à '.$item->startedHour.'-'.$item->endedHour}}</td>
                                <td>{{$item->title}}</td>
                                <td> {{$item->user_id[0]->firstname.' '.$item->user_id[0]->lastname}}</td>
                                <td><span class="badge bg-danger">{{$item->room}}</span></td>
                                <td>
                                @for($i = 0; $i < $item->difficulty; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h3>Quelques cours en relation avec vos centres d'interêts</h3>
                    <div class="row">
                    @foreach($dataFromTags as $session)

                        <!--Cours proposés en fonction des recherches deja faites par l'utilisateur -->
                            <div class="col-md-4">
                                <!-- Widget: user widget style 2 -->
                                <div class="card card-widget widget-user-2">
                                    <h3 class="widget-user-username">{{$session->course_id}}</h3>
                                    <h5 class="widget-user-desc">{{$session->title}} par {{$session->user_id}}
                                        le {{$session->date}}
                                        de {{$session->startedHour}} à {{$session->endedHour}}</h5>
                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">

                                            <div class="row">

                                                <div class="col-md-2"></div>

                                                <div class="col-md-4">
                                                    <button type="button" class="btn btn-block bg-gradient-success">
                                                        S'inscrire
                                                    </button>
                                                </div>

                                                <div class="col-md-4">
                                                    <button type="button" class="btn btn-block bg-gradient-danger">
                                                        Supprimer
                                                    </button>
                                                </div>

                                            </div>

                                        </ul>
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
            @if($sessionToVote)
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h3> N'oubliez pas de noter ces cours </h3>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Thème</th>
                                    <th>Date</th>
                                    <th>Note (de 1 à 5)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sessionToVote as $item)
                                    <tr>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->courses_id[0]->label}}</td>
                                        <td>{{$item->date.' à '.$item->startedHour.'-'.$item->endedHour}}</td>
                                        <td>
                                            <form role="form" method="GET" action="{{route('voteForSession')}}">
                                                @csrf
                                                <input type="hidden" name="id" id="id" value="{{$item->id}}"/>
                                                <input type="number" max="5" min="1" value="1" name="note" id="note"/>
                                                <button type="submit">Voter</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        @else

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h3> Vous n'êtes pas connecté(e), voici la liste des cours les plus récents : </h3>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Cours</th>
                                        <th>Professeur</th>
                                        <th>Salle</th>
                                        <th>Niveau</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allSessions_guest as $item)
                                        <tr>
                                            <td>{{$item->date.' à '.$item->startedHour.'-'.$item->endedHour}}</td>
                                            <td>{{$item->title}}</td>
                                            <td> {{$item->user_id[0]->firstname.' '.$item->user_id[0]->lastname}}</td>
                                            <td><span class="badge bg-danger">{{$item->room}}</span></td>
                                            <td>
                                            @for($i = 0; $i < $item->difficulty; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">Envie de vous inscrire à un de ces cours ? Inscrivez-vous sur le
                                site sans plus tarder !
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif <!-- If user is a guest -->
    @endif
@endsection

@section('scripts')

    <script>
        $(function () {
            $('#modal').modal('show');
        });
    </script>

@endsection
