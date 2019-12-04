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
            @php(//TODO finish modal) @endphp
            @if($sessionToVote)
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                    Launch Default Modal
                </button>
            @endif
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
                                <td> {{$îtem->user_id->firstname.' '.$item->user_id->lastname}}</td>
                                <td><span class="badge bg-danger">{{$item->room}}</span></td>
                                @foreach($allSessions_guest->difficulty as $dif)
                                    <td><i class="fas fa-star"></i></td>
                                @endforeach
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
                                    <h5 class="widget-user-desc">{{$session->title}} par {{$session->user_id}} le {{$session->date}}
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
                                            <td> {{$îtem->user_id->firstname.' '.$item->user_id->lastname}}</td>
                                            <td><span class="badge bg-danger">{{$item->room}}</span></td>
                                            @foreach($allSessions_guest->difficulty as $dif)
                                                <td><i class="fas fa-star"></i></td>
                                            @endforeach
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
