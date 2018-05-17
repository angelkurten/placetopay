<div class="row">
    <h4 class="info-text">Tipo de cuenta</h4>
    <div class="col-sm-10 col-sm-offset-1">
        <div class="form-group">
            <select id="bankInterface" name="bankInterface" class="form-control validate {{ $errors->has('bankInterface') ? 'error' : '' }}" required>
                <option value="0" {{ old('bankInterface') == '0' ? 'selected' : '' }}>Persona Narual</option>
                <option value="1" {{ old('bankInterface') == '1' ? 'selected' : '' }}>Persona Juridica(Empresas)</option>
            </select>
        </div>
    </div>
</div>
<br />
<div class="row">
    <h4 class="info-text">Selecciona un banco</h4>
    <div class="col-sm-10 col-sm-offset-1">
        <div class="form-group">

            <select id="bankCode" name="bankCode" class="form-control validate {{ $errors->has('bankCode') ? 'error' : '' }}" required>
                @forelse($banks as $bank)
                    <option value="{{ $bank->bankCode != 0 ? $bank->bankCode : '' }}" {{ old('bankCode') == $bank->bankCode ? 'selected' : '' }}>{{ $bank->bankName }}</option>
                @empty
                @endforelse
            </select>
        </div>
    </div>
</div>