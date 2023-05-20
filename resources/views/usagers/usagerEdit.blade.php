@extends('layout.appps')

@section('head')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mécano</title>

    <link href="img/logoPsd.png" rel="icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
@endsection

@section('wrap')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Mécano</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Ajout Usager</a></li>
                            {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    @endsection

    @section('content')
        <!-- Main content -->
            <section class="content">

                <div class="container-fluid">

                    <div class="col-md-10 offset-1">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Modifier Usager</h3>

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="/usagerList/{{$usager->id}}">
                                @csrf
                                @method('PATCH')
                                <div class="card-body col-md-6 offset-1">
                                    <div class="form-group">
                                        <label for="">CNI</label>
                                        <input type="text" class="form-control" name="cni" value="{{$usager->cni}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">NomComplet</label>
                                        <input type="text" class="form-control" name="nomComplet" value="{{$usager->nomComplet}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Sexe</label>
                                        <select name="sexe" value="{{$usager->sexe}}" class="form-control show-tick">
                                            <option value="0">-- Veuillez choisir votre Sexe --</option>
                                            <option>Masculin</option>
                                            <option>Féminin</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for=""> Email </label>
                                        <input type="text" class="form-control" name="email" value="{{$usager->email}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for=""> Adresse </label>
                                        <input type="text" class="form-control" name="adresse" value="{{$usager->adresse}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for=""> numéro Téléphone </label>
                                        <input type="text" class="form-control" name="numeroTelephone" value="{{$usager->numeroTelephone}}" required>
                                    </div>

                                    <div class="card-body offset-1">
                                        <button type="submit" class="btn btn-success">Enregistrer</button>
                                    </div>
                                </div>
                                <!-- /.card-body -->


                            </form>
                        </div>

                        <!-- /.card -->


                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            </br>
            </br>

            <!-- /.content -->
    @endsection

    @section('script')
        <!-- jQuery -->
            <script src="../../plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- bs-custom-file-input -->
            <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
            <!-- AdminLTE App -->
            <script src="../../dist/js/adminlte.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../../dist/js/bienvenue.js"></script>
            <!-- Page specific script -->
            <script>
                $(function () {
                    bsCustomFileInput.init();
                });

@endsection
