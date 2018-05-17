<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="form-group">
            <label for="description">Nombre</label>
            <input type="text" id="description" name="description" class="form-control validate {{ $errors->has('description') ? 'error' : ''}}"  value="Producto de prueba" readonly required maxlength="255">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-5 col-sm-offset-1">
        <div class="form-group">
            <label for="language">Idioma</label>
            <input type="text" class="form-control validate {{ $errors->has('language') ? 'error' : '' }}" id="language" name="language" value="ES" placeholder="Ej (Español): ES" readonly required maxlength="2">
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group">
            <label for="currency">Moneda</label>
            <input type="text" class="form-control validate {{ $errors->has('currency') ? 'error' : '' }}" id="currency" name="currency" value="COP" placeholder="Ej (Colombia): COP" readonly required maxlength="3">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2 col-sm-offset-1">
        <div class="form-group">
            <label for="devolutionBase">Total</label>
            <input type="number" class="form-control validate {{ $errors->has('devolutionBase') ? 'error' : '' }}" id="devolutionBase" name="devolutionBase" value="10" min="0" readonly required>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="taxAmount">IVA</label>
            <input type="number" class="form-control validate {{ $errors->has('taxAmount') ? 'error' : '' }}" id="taxAmount" name="taxAmount" value="{{ old('taxAmount') ?? 0.16}}"  min="0" step="0.01" readonly required>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="tipAmount">Propina</label>
            <input type="number" class="form-control validate {{ $errors->has('tipAmount') ? 'error' : '' }}" id="tipAmount" name="tipAmount" value="{{ old('tipAmount') ?? 1 }}" min="0" readonly required>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label for="totalAmount">Total</label>
            <input type="number" class="form-control validate {{ $errors->has('totalAmount') ? 'error' : '' }}" id="totalAmount" name="totalAmount" value="12.6" min="0" readonly required>
        </div>
    </div>
</div>
