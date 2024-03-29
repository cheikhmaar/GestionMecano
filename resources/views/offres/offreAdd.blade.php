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

        </div>
        <!-- /.content-header -->
    @endsection

    @section('content')
        <!-- Main content -->
            <section class="content">

                <div class="container-fluid">

                    <div class="col-md-10 offset-1">
                        <div>
                            <a href="{{ route('offreList') }}" class="btn btn-primary">Voir liste</a>
                        </div>
                        </br>
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Ajout Offre</h3>

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form method="POST" action="{{ route('offreStore') }}">
                                @csrf
                                <div class="card-body col-md-6 offset-1">
                                    <div class="form-group">
                                        <label for="">Montant</label>
                                        <input type="text" class="form-control" name="montant" required>
                                        @error('montant')
                                        <div class="invalid-feedback">{{ $messages }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">Commentaire</label>
                                        <input type="text" class="form-control" name="commentaire" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">ProfessionnelVehicules</label>
                                        <select name="professionnel_vehicule_id" class="form-control show-tick">
                                            <option value="0">-- Professionnel --</option>
                                            @foreach($professionnelVehicules as $professionnelVehicule)
                                                {{--                        @foreach($classe as $une_classe)--}}
                                                {{--                    @if($eleve->classe->id != $classe->id)--}}
                                                <option value="{{ $professionnelVehicule->id }}">
                                                    {{ $professionnelVehicule->nomComplet }}
                                                </option>
                                                {{--                    @endif--}}
                                                {{--                        @endforeach--}}
                                            @endforeach
                                        </select>
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
