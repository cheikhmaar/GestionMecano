<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>
<body>
@extends('dashboard1')

@section('content')
    <div class="container">
    <div class="card">
        <div class="card-header bg-gradient-success text-white">
            Liste Produit
        </div>
        <div class="card-body">
            <table class="table">
            <tr>
                <th>Zone Medecin</th>
                <td>
            <form action="{{route('medecin.create')}}" method="GET">
                        
             <button class="btn bg-gradient-success" type="submit">Consulter</button>
            </form>
                </td>
            </tr>

            <tr>
                <th>Zone Patient</th>
                <td>
            <form action="" method="post">
                        
             <button class="btn bg-gradient-success" type="submit">Consulter</button>
            </form>
                </td>
            </tr>

            <tr>
                <th>Zone Bloc</th>
                <td>
            <form action="" method="post">
                        
             <button class="btn bg-gradient-success" type="submit">Consulter</button>
            </form>
                </td>
            </tr>

            <tr>
                <th>Zone Chambre</th>
                <td>
            <form action="" method="post">
                        
             <button class="btn bg-gradient-success" type="submit">Consulter</button>
            </form>
                </td>
            </tr>

            <tr>
                <th>Zone Lit</th>
                <td>
            <form action="" method="post">
                        
             <button class="btn bg-gradient-success" type="submit">Consulter</button>
            </form>
                </td>
            </tr>

            <tr>
                <th>Zone Consultation</th>
                <td>
            <form action="" method="post">
                        
             <button class="btn bg-gradient-success" type="submit">Consulter</button>
            </form>
                </td>
            </tr>

            <tr>
                <th>Zone Dossier Medical</th>
                <td>
            <form action="" method="post">
                        
             <button class="btn bg-gradient-success" type="submit">Consulter</button>
            </form>
                </td>
            </tr>

            <tr>
                <th>Zone Ligne Bloc</th>
                <td>
            <form action="" method="post">
                        
             <button class="btn bg-gradient-success" type="submit">Consulter</button>
            </form>
                </td>
            </tr>

            <tr>
                <th>Zone Ligne Medecin Bloc</th>
                <td>
            <form action="" method="post">
                        
             <button class="btn bg-gradient-success" type="submit">Consulter</button>
            </form>
                </td>
            </tr>

            <tr>
                <th>Zone Ligne Dossier</th>
                <td>
            <form action="" method="post">
                        
             <button class="btn bg-gradient-success" type="submit">Consulter</button>
            </form>
                </td>
            </tr>

            <tr>
                <th>Zone Hospitalisation</th>
                <td>
            <form action="" method="post">
                        
             <button class="btn bg-gradient-success" type="submit">Consulter</button>
            </form>
                </td>
            </tr>
            

    
            </table>

        </div>
    </div>
    </div>
    
@endsection

</body>
</html>