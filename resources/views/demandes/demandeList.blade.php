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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
                    <!-- /.card -->
                    <!--- <div class="offset-10">
                         <a href="#" role="button" class="btn btn-primary">Ajouter un nouveau patient<a>
                     </div>--->
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('demandeAdd')}}" role="button" class="btn btn-primary">Ajouter une nouvelle demande<a>
                        </div>
                        <!-- /.card-header -->


                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Statut</th>
                                    <th>Motif</th>
                                    <th>Description</th>
                                    <th>Date Demande</th>
                                    <th>Service Demandé</th>
                                    <th>Usager</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($demandes as $demande)

                                    <tr>
                                        <td scope="row">
                                            @switch($demande->statusDemande)
                                                @case("En Cours")
                                                En Cours
                                                @break

                                                @case("Validé")
                                                Validé
                                                @break

                                                @case("Refusé")
                                                <span class="custom-badge status-red">Refusé</span>
                                                @break

                                                @default

                                            @endswitch
                                        </div>
                                        <td> {{ $demande->motif }} </td>
                                        <td> {{ $demande->description }} </td>
                                        <td> {{ $demande->dateDemande }} </td>
                                        <td> {{ $demande->service }} </td>
                                        <td>
                                            @foreach($usagers as $usager)
                                                @if($usager->id==$demande->usager_id)
                                                    {{ $usager->nomComplet }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{route('demande.Show',$demande->id)}}">
                                                <i class="nav-icon far fa-eye"></i>
                                            </a>
                                            <a href="/demandeList/{{$demande->id}}/demandeEdit">
                                                <i class="fas fa-edit text-info"></i>
                                            </a>
                                            <form action="/demandeList/{{ $demande->id }}"
                                                  method="POST"
                                                  style="display:inline"
                                                  onsubmit="return confirm('Etes vous sure de vouloir supprimer {{$demande->statusDemande}} {{}}  de la liste des demandes')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn" type="submit"><i class="fas fa-trash text-danger"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>


                    </table>
                </div>
                <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>




    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/bienvenue.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
