@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <ul>
                        <li><strong>Referencia:</strong> {{ $transaction->reference }}</li>
                        <li><strong>Descripción:</strong> {{ $transaction->description }}</li>
                        <li><strong>Identificador transacción Place to Pay:</strong> {{ $transaction->transactionID }}</li>
                        <li><strong>Identificador sesión Place to Pay:</strong> {{ $transaction->sessionID }}</li>
                        <li><strong>Código seguimiento ACH:</strong> {{ $transaction->trazabilityCode }}</li>
                        <li><strong>Eestado de la transacción: </strong>{{ $transaction->transactionState }}</li>
                        <li><strong>Estado de la operación en PlacetoPay: </strong>{{ $transaction->responseCode }}</li>
                        <li><strong>Motivo de respuesta: </strong>{{ $transaction->responseReasonText }}</li>
                        <li><strong>Creada el dia:</strong> {{ $transaction->created_at->format('c') }}</li>
                        <li><strong>Actualizada el dia:</strong> {{ $transaction->updated_at->format('c') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
