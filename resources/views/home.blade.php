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
                    <tr>
                        <td>09/11/2019 de 9h à 11h</td>
                        <td>Cuisine facile et pas chère</td>
                        <td> Alan Cantal</td>
                        <td><span class="badge bg-danger">AS 10</span></td>
                        <td> <i class="fas fa-star"></i></td>
                    </tr>
                    <tr>
                        <td>12/11/2019 de 18h à 19h</td>
                        <td>Montage Vidéo avec Adobe 1ere Pro</td>
                        <td>Jean Siphano</td>
                        <td><span class="badge bg-danger">C 14</span></td>
                        <td>  @for($i = 0; $i < 2; $i++) <i class="fas fa-star"></i> @endfor</td>
                    </tr>
                    <tr>
                        <td>12/11/2019 de 17h à 18h</td>
                        <td>Soutiens en Maths: Probabilitées</td>
                        <td>Nathalie Janniere </td>
                        <td><span class="badge bg-danger">AS 07</span></td>
                        <td>@for($i = 0; $i < 5; $i++) <i class="fas fa-star"></i> @endfor</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3>Quelques cours en relation avec vos centres d'interêts</h3>
                <div  class="row">
                @for($i = 0; $i < 6; $i++)

                    <!--Cours proposés en fonction des recherches deja faites par l'utilisateur -->
                        <div  class="col-md-4">
                            <!-- Widget: user widget style 2 -->
                            <div class="card card-widget widget-user-2">
                                <h3 class="widget-user-username">Musique</h3>
                                <h5 class="widget-user-desc">Guitare accord et melodie par J.Heude Lundi 09/11/2019 de 13h à 14h</h5>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">

                                        <div  class="row">

                                            <div class="col-md-2"></div>

                                            <div  class="col-md-4">
                                                <button type="button" class="btn btn-block bg-gradient-success">S'inscrire</button>
                                            </div>

                                            <div  class="col-md-4">
                                                <button type="button" class="btn btn-block bg-gradient-danger">Supprimer</button>
                                            </div>

                                        </div>



                                    </ul>
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>

                    @endfor
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
                                        <td> <i class="fas fa-star"></i></td>
                                         @endforeach
                                    </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">Envie de vous inscrire à un de ces cours ? Inscrivez-vous sur le site sans plus tarder !</div>
                        </div>
                    </div>
                </div>
            </div>

    @endif
@endif
@endsection
