@extends('adminlte::page')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        Chercher un atelier
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Cours en rapport avec le thème : Allemand</th>
                                                <th>Date</th>
                                                <th>Heure</th>
                                                <th>Professeur</th>
                                                <th>Participer</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Chimie</td>
                                                <td>26-12-2019</td>
                                                <td>20h30</td>
                                                <td>Benjamin sireau</td>
                                                <td>
                                                    <button type="button" class="btn btn-block bg-gradient-primary">
                                                        Participer
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Developpement</td>
                                                <td>01-01-2020</td>
                                                <td>14h15</td>
                                                <td>Hélène Ruais</td>
                                                <td>
                                                    <button type="button" class="btn btn-block bg-gradient-primary">
                                                        Participer
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Anglais</td>
                                                <td>19-02-2020</td>
                                                <td>17h30</td>
                                                <td>Cédric Dupont</td>
                                                <td>
                                                    <button type="button" class="btn btn-block bg-gradient-primary">
                                                        Participer
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Cuisine</td>
                                                <td>25-03-2020</td>
                                                <td>18h30</td>
                                                <td>Bob Martineau</td>
                                                <td>
                                                    <button type="button" class="btn btn-block bg-gradient-primary">
                                                        Participer
                                                    </button>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p>Rechercher un cours ou un thème en particulier : </p>
                                        <form>
                                            <input type="text" placeholder="Allemand">
                                        </form>
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td><p>Thème : Allemand</p>
                                                    <br>
                                                    <button type="button" class="btn btn-block bg-gradient-primary">
                                                        Ajouter
                                                    </button>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
