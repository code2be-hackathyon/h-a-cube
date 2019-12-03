@extends('adminlte::page')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        Demande de cours
                    </h3>
                </div>
                <div class="card-body">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('newCourse')}}" method="post" role="form">
                    @csrf <!-- {{ csrf_field() }} -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="courseName">Nom du cours</label>
                                <input type="text" class="form-control" name="courseValue" id="courseValue">
                            </div>
                            <div>
                                <label for="courseDescription">Description du cours</label>
                                <textarea class="form-control" name="courseDescription"  id="courseDescription" cols="40" rows="5"></textarea>
                            </div>
                        </div>
                        <div id="footer">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
