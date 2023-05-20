<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Demande </title>
    <link href="img/logoPsd.png" rel="icon">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel=“stylesheet”>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        body{
            padding: 12%;
            padding-top: 3%;
            padding-bottom: 3%;
        }
        .border{
            border-top-style: solid;
            border-top-color: black;
            border-right-style: solid;
            border-right-color: black;
            border-left-style: solid;
            border-left-color: black;
            border-bottom-style: solid;
            border-bottom-color: black;
            padding: 3px;
        }
        .form-control{
            background: transparent;
            border: 0px;
            border-radius: 0px;
        }
        .header-left{
            float: left;
            margin-right: 30%;
        }
        .header-right{
            margin-left: 70%;

            display: block;
        }
        .header-center{
            margin-left: 25%;

            display: block;
        }
        .header{
            margin-left: 5%;

            display: block;
        }
        .col-sm-5 {
            flex:0 0 auto;
            width: 41.6666666667%;
            height: 20%;
        }


        img{
            width: 15%;
            height: 5%;
            margin-left: 40%;
        }
        .total{
            float: right;
            margin-left: 50%;
        }
        ul{
            display: inline-flex;
            height: 700%;
        }
        li{

        }
        footer{
            margin-left: 70%;
        }
        #modif{
            display: none
        }

    </style>
</head>
<body>
@if (Session::has('status'))
    <div class="alert alert-success">
        {{Session::get('status')}}
    </div>
@endif
@if (count($errors)>0)
    <ul>
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    </ul>
@endif

<div class="border">
    <div class="header">
        <div class="header-left">


        </div>
        <div class="header-right">
            @foreach($usagers as $usager)
                @if($usager->id==$demande->usager_id)
                    </strong> {{$usager->nomComplet}}<br>
                    </strong> {{$usager->email}}<br>
                    </strong> {{$usager->adresse}}<br>
                    </strong> {{$usager->numeroTelephone}}<br>
                @endif
            @endforeach
        </div>
    </div>
    <div class="header-center">

        </strong>Fait à dakar le {{$demande->dateDemande}}</centre><br>
    </div>
    <br>
    <div class="header">
        <strong>Objet:</strong>
        </strong> {{$demande->statusDemande}}<br><br>
    </div><br><br>
    </strong> Chère Client, <br>
    </strong> Votre demande a été <strong>
        {{$demande->statusDemande}}
    </strong>  pour une raison de {{$demande->motif}} <br>
    <footer>
        <strong>

        </strong>
    </footer>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>
</html>

