@extends('adminlte::page')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- COLOR PALETTE -->
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <h3 class="card-title">
                        Demande de session
                    </h3>
                </div>
                <div class="card-body">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="course_id">Type de cours</label>
                                <input list="courses" class="form-control" id="course_id">

                                <datalist id="courses">
                                    <option id="1">Cuisine</option>
                                    <option id="2">Chant</option>
                                </datalist>

                            </div>
                            <div class="form-group">
                                <input type="hidden" id="user_id" value=" {{}}">
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" cols="40" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nbMaxUsers">Nombre max de personnes</label>
                                <input type="number" class="form-control" id="nbMaxUsers" min="1">
                            </div>
                            <div class="form-group" id="difficulty_div">
                                <label for="difficulty">Difficulté</label>
                                <input type="number" class="form-control" id="difficulty" min="1" max="5"
                                       onchange="
                                           // const difficulty_div = document.getElementById('difficulty_div');
                                           // const value = document.getElementById('difficulty').value;
                                           // for (star of value) {
                                           //     let div = document.createElement('span');
                                           //     div.className = 'fa fa-star checked';
                                           //     difficulty_div.appendChild(div);
                                           // }
                                       ">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div id="footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
