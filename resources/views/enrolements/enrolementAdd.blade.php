<form  method="POST" action="{{ route('enrolementStore') }}">
@csrf
<!-- Nom -->
    <div>
        <div class="form-line">
            <input type="text" class="form-control" name="registeCommerce" required>
            <label class="form-label">registeCommerce</label>
        </div>
    </div>
    <!-- Prenom -->
    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="ninea" required>
            <label class="form-label">ninea</label>
        </div>
    </div>

    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="cni" required>
            <label class="form-label">cni</label>
        </div>
    </div>

    <!-- Classes -->
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="password_2">Professionnel Vehicule</label>
        </div>
        <div class="col-lg-5 col-md-8 col-sm-8 col-xs-8">
            <select name="professionnel_vehicule_id" class="form-control show-tick">
                <option value="0">-- Professionnel Vehicule --</option>
                @foreach($professionnelVehicules as $professionnelVehicule)
                    {{--                        @foreach($classe as $une_classe)--}}
                    {{--                    @if($eleve->classe->id != $classe->id)--}}
                    <option value="{{ $professionnelVehicule->id }}">
                        {{ $professionnelVehicule->matricule }}
                    </option>
                    {{--                    @endif--}}
                    {{--                        @endforeach--}}
                @endforeach
            </select>
        </div>
    </div>
    <!-- #End Classes -->


    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
</form>
