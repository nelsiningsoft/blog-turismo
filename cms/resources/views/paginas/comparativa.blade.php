@extends('plantilla')

@section('content')

    <div class="content-wrapper" style="min-height: 247px;">

        <!-- Content Header (Page header) -->
        <div class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">

                        <h1 class="m-0 text-dark">Comparativa</h1>

                    </div><!-- /.col -->

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="{{ url("/") }}">Inicio</a></li>

                            <li class="breadcrumb-item active">Comparativa</li>

                        </ol>

                    </div><!-- /.col -->

                </div><!-- /.row -->

            </div><!-- /.container-fluid -->

        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="card card-primary card-outline">

                            <div class="card-header">



                            </div>

                            <div class="card-body">
                            <div class="btn-group">
                                <div class="dropdown p-2">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Dropdown button
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                                <div class="dropdown p-2">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Dropdown button
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                                <div class="dropdown p-2">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Dropdown button
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                                {{-- Título Categoría --}}

                                <div class="input-group mb-3">

                                    <div class="input-group-append input-group-text">
                                        <i class="fas fa-list-ul"></i>
                                    </div>

                                    <select class="form-control"  name="id_cat" required>

                                        <option value="">Elige Categoría</option>

                                        @foreach ($categorias as $key => $value)

                                            <option value="{{$value->id_categoria}}">{{$value->titulo_categoria}}</option>

                                        @endforeach

                                    </select>

                                </div>
                                {{-- Fecha --}}

                                <div class="input-group mb-3">

                                    <div class="input-group-append input-group-text">
                                        <i class="fas fa-list-ul"></i>
                                    </div>

                                    <select class="form-control"  name="id_art" required>

                                        <option value="">Elige Articulo</option>

                                        @foreach ($categorias as $key => $value)

                                            <option value="{{$value->id_categoria}}">{{$value->titulo_categoria}}</option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
