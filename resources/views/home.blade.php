@extends('layouts.master')
@section('bodyClass', 'home ateneu')
@section('title', "Ateneu l'Aliança")
@section('content')
    <section id="destacats" class="container">
        <div class="row">
            @foreach ($covers as $cover)
                @component('components/cover-item', ['cover' => $cover])
                @endcomponent
            @endforeach
        </div>
    </section>
    <section id="activitats" class="container">
        <div class="row">
            <div class="activitats-list col col-sm-12 col-md-8">
                <h2 class="title">Properes Activitats</h2>
                @foreach ($activities as $activity)
                    @component('components/activity-item', ['activity' => $activity])
                    @endcomponent
                @endforeach
            </div>
            <div class="activitats-calendar col hidden-sm col-md-4">
                @component('components/calendar')
                @endcomponent
            </div>

            <div class="activitat-explora col-sm-12">
                <a href="{{ route('activities') }}" class="ali-btn">+ ACTIVITATS</a>
            </div>
        </div>
    </section>
    <section id="socis" class="container">
        @component('components/socis-options', ['parners' => $parners])
        @endcomponent
    </section>
@stop

@section('meta')
    <meta name="robots" content="all">
@stop
