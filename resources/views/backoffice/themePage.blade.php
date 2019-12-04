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
                        <tbody>
                        @foreach ($data as $item)
                            <tr>
                            <td>{{$item->label}}</td>
                            <td>
                                <a href="{{ route('acceptTheme', ['id'=> $item->id ]) }}">
                                    <button type="submit" class="btn btn-block btn-success col-md-4">Accepter</button>
                                </a>
                                <a href="{{ route('refuseTheme', ['id'=> $item->id ]) }}">
                                    <button type="submit" class="btn btn-block btn-warning col-md-4">Refuser</button>
                                </a>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
