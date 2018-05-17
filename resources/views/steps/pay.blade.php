<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="form-group">
            <select id="paymentType" name="paymentType" class="form-control validate {{ $errors->has('paymentType') ? 'error' : '' }}" required>
                <option value="">Selecciona una opción</option>
                <option value="0" {{ old('paymentType') == '0' ? 'selected' : '' }}>Tarjeta débito</option>
            </select>
        </div>
    </div>
</div>