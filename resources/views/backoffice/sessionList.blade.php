@extends('adminlte::page')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des ateliers en ligne</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Titre de l'atelier</th>
                                <th>Matière</th>
                                <th>Date</th>
                                <th>Animateur</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            @foreach ($data as $item)
                            <tbody>
                                <td>{{$item->title}}</td>
                                <td>{{$item->courses_id[0]->label}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->user_id[0]->firstname.' '.$item->user_id[0]->lastname}}</td>
                                <td>
                                    <a href="{{ route('sessionDetails', ['id'=> $item->id ]) }}">
                                        <button type="submit" class="btn btn-block btn-warning">Détails</button>
                                    </a>
                                </td>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
