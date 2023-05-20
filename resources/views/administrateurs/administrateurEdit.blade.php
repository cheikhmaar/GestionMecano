<form id="form_validation" method="POST" action="/administrateurList/{{$_administrateur->id}}">
    @method('PATCH')
    @csrf
    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="status" value="{{$_administrateur->status}}" required>
            <label class="form-label">STATUS</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            <input type="file" class="form-control" name="photo" value="{{$_administrateur->photo}}" required>
            <label class="form-label">photo</label>
        </div>
    </div>
    <!-- Nom -->
    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="nomComplet" value="{{$_administrateur->utilisateur->nomComplet}}">
            <label class="form-label">nom complet</label>
        </div>
    </div>
    <!-- Prenom -->
    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="sexe" value="{{$_administrateur->utilisateur->sexe}}">
            <label class="form-label">sexe</label>
        </div>
    </div>

    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="email" value="{{$_administrateur->utilisateur->email}}">
            <label class="form-label">email</label>
        </div>
    </div>

    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="adresse" value="{{$_administrateur->utilisateur->adresse}}">
            <label class="form-label">adresse</label>
        </div>
    </div>

    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="numeroTelephone" value="{{$_administrateur->utilisateur->numeroTelephone}}">
            <label class="form-label">numero Telephone</label>
        </div>
    </div>





    </div>
    <!-- #End Classes -->


    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
</form>
