@extends('adminlte::page')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        Demande de thème
                    </h3>
                </div>
                <div class="card-body">
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Nom du thème</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        @foreach ($data as $item)
                            <tbody>
                            <td>{{$item->label}}</td>
                            <td>
                                <a href="{{ route('sessionDetails', ['id'=> $item->id ]) }}">
                                    <button type="submit" class="btn btn-block btn-warning">Détails</button>
                                </a>
                            </td>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
