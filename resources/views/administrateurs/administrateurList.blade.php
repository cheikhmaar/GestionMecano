<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    MEDECINS
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Status</th>
                            <th>Photo</th>
                            <th>Nom Complet</th>
                            <th>Sexe</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Numéro Téléphone</th>
                            <th style="width: 10%;">Modifier</th>
                            <th style="width: 10%;">Supprimer</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Matricule</th>
                            <th>Status</th>
                            <th>Photo</th>
                            <th>Nom Complet</th>
                            <th>Sexe</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Numéro Téléphone</th>
                            <th style="width: 10%;">Modifier</th>
                            <th style="width: 10%;">Supprimer</th>
                            </th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($administrateurs as $administrateur)

                            <tr>
                                <td scope="row"> <a href="{{ route('administrateur.Show', ['id' => $administrateur->id]) }}" >{{ $administrateur->matricule  }}  </a></td>
                                <td scope="row"> <a href="{{ route('administrateur.Show', ['id' => $administrateur->id]) }}" >{{ $administrateur->status  }}  </a></td>
                                <td scope="row"> <a href="{{ route('administrateur.Show', ['id' => $administrateur->id]) }}" >{{ $administrateur->photo  }}  </a></td>
                                <td> <a href="{{ route('administrateur.Show', ['id' => $administrateur->id]) }}" >{{ $administrateur->utilisateur->nomComplet  }}  </a></td>
                                <td> <a href="{{ route('administrateur.Show', ['id' => $administrateur->id]) }}" >{{$administrateur->utilisateur->sexe  }} </a> </td>
                                <td> <a href="{{ route('administrateur.Show', ['id' => $administrateur->id]) }}" >{{$administrateur->utilisateur->email  }} </a> </td>
                                <td> <a href="{{ route('administrateur.Show', ['id' => $administrateur->id]) }}" >{{ $administrateur->utilisateur->adresse  }} </a> </td>
                                <td> <a href="{{ route('administrateur.Show', ['id' => $administrateur->id]) }}" >{{ $administrateur->utilisateur->numeroTelephone  }} </a> </td>



                                <td align="center"><a href="/administrateurList/{{ $administrateur->id}}/administrateurEdit" class="btn btn-primary" style="width: 100px;" my-3>Update</a></td>
                                <td align="center">
                                    <form action="/administrateurList/{{ $administrateur->id }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Etes vous sure de vouloir supprimer {{$administrateur->matricule}} {{$administrateur->utilisateur->nomComplet}} de la liste des usager')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="width: 100px;"> Delete </button>

                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
