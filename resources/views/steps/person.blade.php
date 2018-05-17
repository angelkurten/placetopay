<div class="row">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group">
            <label for="documentType">Tipo de documento</label>
            <select class="form-control validate {{ $errors->has("documentType") ? 'error' : '' }}" id="documentType" name="documentType" required>
                <option value="">Selecciona un tipo de documento</option>
                <option value="CC" {{ old("documentType") == "CC" ? 'selected' : '' }}>Cédula de ciudadanía colombiana</option>
                <option value="CE" {{ old("documentType") == "CE" ? 'selected' : '' }}>Cédula de extranjería</option>
                <option value="TI" {{ old("documentType") == "TI" ? 'selected' : '' }}>Tarjeta de identidad</option>
                <option value="PPN" {{ old("documentType") == "PPN" ? 'selected' : '' }}>Pasaporte</option>
                <option value="NIT" {{ old("documentType") == "NIT" ? 'selected' : '' }}>Número de identificación tributaria</option>
                <option value="SSN" {{ old("documentType") == "SSN" ? 'selected' : '' }}>Social Security Number</option>
            </select>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <label for="document">Número de identificación</label>
            <input type="text" class="form-control validate {{ $errors->has("document") ? 'error' : '' }}" id="document" name="document" value="{{ old("document") }}" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group">
            <label for="firstName">Nombres</label>
            <input type="text" class="form-control validate {{ $errors->has("firstName") ? 'error' : '' }}" id="firstName" name="firstName" value="{{ old("firstName") }}"required>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <label for="lastName">Apellidos</label>
            <input type="text" class="form-control validate {{ $errors->has("lastName") ? 'error' : '' }}" id="lastName" name="lastName" value="{{ old("lastName") }}" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group">
            <label for="company">Nombre de la compañía</label>
            <input type="text" class="form-control validate {{ $errors->has("company") ? 'error' : '' }}" id="company" name="company" value="{{ old("company") }}" required maxlength="60">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <label for="emailAddress">Correo electrónico</label>
            <input type="email" class="form-control validate {{ $errors->has("emailAddress") ? 'error' : '' }}" id="emailAddress" name="emailAddress" value="{{ old("emailAddress") }}" required maxlength="80">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group">
            <label for="address">Dirección de residencia</label>
            <input type="text" class="form-control validate {{ $errors->has("address") ? 'error' : '' }}" id="address" name="address" value="{{ old("address") }}" required >
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <label for="country">Código  del país</label>
            <input type="text" class="form-control validate {{ $errors->has("country") ? 'error' : '' }}" id="country" name="country" value="CO" readonly required maxlength="2">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group">
            <label for="province">Provincia/Departamento</label>
            <input type="text" class="form-control validate {{ $errors->has("province") ? 'error' : '' }}" id="province" name="province" value="{{ old("province") }}" required>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <label for="city">Ciudad</label>
            <input type="text" class="form-control validate {{ $errors->has("city") ? 'error' : '' }}" id="city" name="city" value="{{ old("city") }}" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group">
            <label for="phone">Teléfono fijo</label>
            <input type="text" class="form-control validate {{ $errors->has("phone") ? 'error' : '' }}" id="phone" name="phone" value="{{ old("phone") }}" required>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <label for="mobile">Teléfono celular</label>
            <input type="text" class="form-control validate {{ $errors->has("mobile") ? 'error' : '' }}" id="mobile" name="mobile" value="{{ old("mobile") }}" required>
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        Nota: Se utilizaran los mismos datos para el comprador y el pagador
    </div>
</div>