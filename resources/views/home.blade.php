@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <th class="text-center">ID</th>
                            <th class="text-center">Referencia</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Respuesta</th>
                            <th class="text-center">Detalle</th>
                            </thead>
                            <tbody>
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->reference }}</td>
                                    <td>{{ $transaction->transactionState }}</td>
                                    <td>{{ $transaction->responseReasonText }}</td>
                                    <td><a class="btn btn-info" href="{{ route('transaction_show', $transaction->reference) }}"><i class="fas fa-eye"></i></a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center"><strong>No has realizado ninguna transacción!</strong></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
