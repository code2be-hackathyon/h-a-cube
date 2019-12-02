@extends('adminlte::page')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        Proposer un thème
                    </h3>
                </div>
                <div class="card-body">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="courseName">Nom du cours</label>
                                <input type="text" class="form-control" id="courseName">
                            </div>
                        </div>
                        <div id="footer">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>

@endsection
