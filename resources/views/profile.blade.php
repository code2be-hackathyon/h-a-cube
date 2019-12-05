@extends('adminlte::page')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        Profil
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <p>Adresse mail : {{  Auth::user()->email  }}</p>
                        <p>Mot de passe : ********</p>
                        <p>Nom : <b>{{ $user->lastname }}</b></p>
                        <p>Prénom : <b>{{ $user->firstname }}</b></p>
                        <p>Age : <b>{{ $user->age }} ans</b></p>
                        <p>Etablissement : <b>{{ $user->etablissementLabel[0]->label }}</b></p>
                        <p>Ville : <b>{{ $user->etablissementCity[0]->city }}</b></p>


                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-paint-brush"></i> Peintre débutant</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">60% Complete (warning)</span>

                                            </div>
                                        </div>
                                        <p>Plus que <b>20%</b> avant le niveau supérieur</p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-music"></i> Musicien amateur</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete (warning)</span>

                                            </div>
                                        </div>
                                        <p>Plus que <b>40%</b> avant le niveau supérieur</p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
