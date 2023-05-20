<form id="form_validation" method="POST" action="{{ route('administrateurStore') }}">
    @csrf

    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="status" required>
            <label class="form-label">STATUS</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            <input type="file" class="form-control" name="photo" required>
            <label class="form-label">photo</label>
        </div>
    </div>
    <!-- Nom -->
    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="nomComplet" required>
            <label class="form-label">nom complet</label>
        </div>
    </div>
    <!-- Prenom -->
    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="sexe" required>
            <label class="form-label">sexe</label>
        </div>
    </div>

    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="email" required>
            <label class="form-label">email</label>
        </div>
    </div>

    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="adresse" required>
            <label class="form-label">adresse</label>
        </div>
    </div>

    <div class="form-group form-float">
        <div class="form-line">
            <input type="text" class="form-control" name="numeroTelephone" required>
            <label class="form-label">numerotelephone</label>
        </div>
    </div>





    </div>
    <!-- #End Classes -->


    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
</form>
