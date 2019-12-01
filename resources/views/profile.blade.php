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
                        <p>Adresse mail : benjamin.sireau@gmail.com</p>
                        <div class="row"><p>Mot de passe : ********</p>
                            <div class=col-md-1><a class="btn btn-block bg-gradient-primary"
                                                   href="{{route('changePwd')}}">Changer</a></div>
                        </div>
                        <p>Nom : <b>Sireau</b></p>
                        <p>Prénom : <b>Benjamin</b></p>
                        <p>Age : <b>20 ans</b></p>
                        <p>Etablissement : <b>Notre Dame du Roc</b></p>
                        <p>Ville : <b>La Roche sur Yon</b></p>


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
