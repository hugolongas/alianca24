@extends('layouts.master')
@section('bodyClass', 'home ateneu')
@section('title', "Ateneu l'Aliança")
@section('content')
    <section id="destacats" class="container">
        <div class="row">            
            </div>
    </section>
    <section id="activitats" class="container">
        <div class="row">
            <div class="activitats-list col-8">
                <h2 class="title">Properes Activitats</h2>
                @foreach ($activitats as $activitat)
                    @component('components/activity-item', ['activitat' => $activitat])
                    @endcomponent
                @endforeach
            </div>
            <div class="activitats-calendar  col-4">
                @component('components/calendar')
                @endcomponent
            </div>
        </div>
        <div class="activitat-explora col-12">
            <a href="{{ route('activitats') }}" class="ali-btn">+ ACTIVITATS</a>
        </div>
        </div>
    </section>
@stop

@section('meta')
    <meta name="robots" content="all">
@stop
