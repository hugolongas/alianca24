@extends('layouts.master')
@section('bodyClass', 'agenda')
@section('title', "Ateneu l'Aliança | Agenda")
@section('content')
    <section id="agenda" class="container">
        <h1 class="title">Agenda</h1>
        <div class="filter-activitats">
            Filtre:
            <
        </div>
        <div class="row">
            <div class="activitats-list col-12 col-md-8">
                @foreach ($activities as $activity)
                    @component('components/activity-item', ['activity' => $activity])
                    @endcomponent
                @endforeach
            </div>
            <div class="activitats-calendar col-12 col-md-4">
                @component('components/calendar')
                @endcomponent
            </div>
    </section>
@stop


@section('meta')
    <meta name="robots" content="all">
@stop
