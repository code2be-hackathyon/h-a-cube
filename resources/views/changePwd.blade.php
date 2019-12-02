@extends('adminlte::page')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        Changer de mot de passe
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="oldPwd">Ancien mot de passe</label>
                                    <input type="password" class="form-control" id="oldPwd">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="newPwd">Nouveau mot de passe</label>
                                    <input type="password" class="form-control" id="newPwd">
                                </div>
                                <div class="form-group">
                                    <label for="newPwd2">Confirmation du nouveau mot de passe</label>
                                    <input type="password" class="form-control" id="newPwd2">
                                </div>
                            </div>
                            <div id="footer">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
