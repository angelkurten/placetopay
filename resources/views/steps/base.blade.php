@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <ol>
                            @foreach($wizard->all() as $key => $_step)
                                <li>
                                    @if($step->index == $_step->index)
                                        <h4><strong>{{ $_step::$label }}</strong></h4>
                                    @elseif($step->index > $_step->index)
                                        <a href="{{ route('pay_create', [$_step::$slug]) }}">{{ $_step::$label }}</a>
                                    @else
                                        {{ $_step::$label }}
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                        <form action="{{ route('pay_store', [$step::$slug]) }}" method="POST">
                            {{ csrf_field() }}

                            @include($step::$view, compact('step', 'errors'))

                            @if ($wizard->hasPrev())
                                <a href="{{ route('pay_create', ['step' => $wizard->prevSlug()]) }}">Back</a>
                            @else
                                <a href="#">Back</a>
                            @endif

                            <span>Step {{ $step->number }}/{{ $wizard->limit() }}</span>

                            @if ($wizard->hasNext())
                                <button type="submit">Next</button>
                            @else
                                <button type="submit">Done</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection