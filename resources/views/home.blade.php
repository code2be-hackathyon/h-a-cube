@extends('adminlte::page')

@section('content')
    @if(Auth::check() && Auth::user()->usertype_id == 1)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Demande de Session</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">

                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table id="exemple1" class="table table-head-fixed">
                            <thead>
                            <tr>
                                <th>Date et Horaires</th>
                                <th>Animateur</th>
                                <th>Thème</th>
                                <th>Description</th>
                                <th>Accepter</th>
                                <th>Refuser</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dataFromSession as $item)
                                @if(!$item->isAccepted)
                                    <tr>
                                        <!-- /  $dataFromDate = DB::table('sessions')->select('*')->where('date'== (date('Y-m-d ')));
                                        var_dump($dataFromDate);  -->
                                        <td>{{date('d/m/Y',strtotime($item->date)).' de '.$item->startedHour.' à '.$item->endedHour}}</td>
                                        <td>{{$item->user_id[0]->firstname}}</td>
                                        <td>{{$item->courses_id[0]->label}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>
                                            <a href="{{ route('acceptSession', ['id'=> $item->id ]) }}">
                                                <button type="button" class="btn btn-block bg-gradient-warning">
                                                    Accepter
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('refuseSession', ['id'=> $item->id ]) }}">
                                                <button type="button" class="btn btn-block bg-gradient-danger">Refuser
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>




        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sessions de cette semaine </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed">
                            <thead>
                            <tr>
                                <th>Date et Horaires</th>
                                <th>Animateur</th>
                                <th>Thème</th>
                                <th>Description</th>
                                <th>Salle</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dataFromDate as $item)
                                @if($item->isAccepted)
                                    <tr>
                                        <td>{{date('d/m/Y',strtotime($item->date)).' de '.$item->startedHour.' à '.$item->endedHour}}</td>
                                        <td>{{$item->user_id[0]->firstname}}</td>
                                        <td>{{$item->courses_id[0]->label}}</td>
                                        <td>{{$item->description}}</td>
                                        @if($item->room)
                                            <td>{{$item->room}}</td>
                                        @else
                                            <td><small class="badge badge-danger"><i class="far fa-calendar-times"></i>
                                                    Pas de salle</small></td>
                                        @endif
                                        <td>
                                            <a href="{{ route('sessionDetails', ['id'=> $item->id ]) }}">
                                                <button type="submit" class="btn btn-block btn-warning">Détails</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
                    @if(count($sessionsForUser->toArray()) > 0)
                        <h3> Le dernier cours auquel vous êtes inscrit : </h3>
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
                                    <td>{{date('d/m/Y',strtotime($item->date)).' de '.$item->startedHour.' à '.$item->endedHour}}</td>
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
                            @else
                                <h3>Vous n'êtes inscrit à aucun cours</h3>
                            @endif
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
                                        <td>{{date('d/m/Y',strtotime($item->date)).' de '.$item->startedHour.' à '.$item->endedHour}}</td>
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
            <div class="row">
                <div class="col-12">
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
                                        <td>{{date('d/m/Y',strtotime($item->date)).' de '.$item->startedHour.' à '.$item->endedHour}}</td>
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
                        <div class="card-footer">Envie de vous inscrire à un de ces cours ? <a href="{{route("login")}}">Connectez-vous<a> sur le
                            site sans plus tarder !
                        </div>
                    </div>
                </div>
            </div>

        @endif <!-- If user is a guest -->
    @endif
@endsection
