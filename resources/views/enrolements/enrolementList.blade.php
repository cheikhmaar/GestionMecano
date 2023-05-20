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
                            <th>Registe Commerce</th>
                            <th>Ninea</th>
                            <th>Cni</th>
                            <th>Professionnel Vehicule</th>
                            <th style="width: 10%;">Modifier</th>
                            <th style="width: 10%;">Supprimer</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Registe Commerce</th>
                            <th>Ninea</th>
                            <th>Cni</th>
                            <th>Professionnel Vehicule</th>
                            <th style="width: 10%;">Modifier</th>
                            <th style="width: 10%;">Supprimer</th>
                            </th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($enrolements as $enrolement)

                            <tr>
                                <td scope="row"> <a href="{{ route('enrolement.Show', ['id' => $enrolement->id]) }}" >{{ $enrolement->registeCommerce  }}  </a></td>
                                <td scope="row"> <a href="{{ route('enrolement.Show', ['id' => $enrolement->id]) }}" >{{ $enrolement->ninea  }}  </a></td>
                                <td scope="row"> <a href="{{ route('enrolement.Show', ['id' => $enrolement->id]) }}" >{{ $enrolement->cni  }}  </a></td>
                                <td> <a href="{{ route('enrolement.Show', ['id' => $enrolement->id]) }}">
                                    @foreach($professionnelVehicules as $professionnelVehicule)
                                        @if($professionnelVehicule->id==$enrolement->professionnel_vehicule_id)
                                        <img src="/photos/{{ $professionnelVehicule->photo }}" width="50px">{{ $professionnelVehicule->matricule }}</td>
                                        @endif
                                    @endforeach
                                </td> </a>


                                <td align="center"><a href="/enrolementList/{{ $enrolement->id}}/enrolementEdit" class="btn btn-primary" style="width: 100px;" my-3>Update</a></td>
                                <td align="center">
                                    <form action="/enrolementList/{{ $enrolement->id }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Etes vous sure de vouloir supprimer {{$enrolement->registeCommerce}} {{$enrolement->cni}} {{}}  de la liste des usager')">
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
