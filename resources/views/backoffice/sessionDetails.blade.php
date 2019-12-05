@extends('adminlte::page')

@if(Auth::check())
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        Détails de l'atelier
                    </h3>
                </div>
                <div class="card-body">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('sessionDetailsValidate', ['id' => $data->id])}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="course_id">Type de cours</label>
                                <input type="text" readonly class="form-control" id="course_id">
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" readonly class="form-control" id="date">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" readonly id="description" cols="40" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nbMaxUsers">Nombre max de personnes</label>
                                <input type="number" class="form-control" readonly id="nbMaxUsers" min="1">
                            </div>
                            <div class="form-group" id="difficulty_div">
                                <label for="difficulty">Difficulté</label>
                                <input type="hidden" class="form-control" id="difficulty">
                                @for($i = 0; $i <= $data->difficulty; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            <div class="form-group">
                                <label for="room">Salle :</label>
                                <input type="text" class="form-control" id="room" value="{{$data->room}}" name="room">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div id="footer">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                    <a href="{{ route('deleteSession', ['id'=> $data->id ]) }}">
                        <button class="btn btn-warning">Supprimer</button>
                    </a>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
@else
    @php(redirect('/register'))
@endif
