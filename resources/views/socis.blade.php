@extends('layouts.master')
@section('bodyClass', 'socis')
@section('title', "Ateneu l'Aliança | Socis")
@section('content')
    <section id="ateneu" class="container page">
        <h1 class="title">
            Fest-te Soci!
        </h1>
        <div class="page-text">
            <div class="section">
                <h2>AVANTATGES</h2>
                <ul>
                    <li>Formaràs part del major moviment cultural de Lliçà d’Amunt.</li>
                    <li>Pots integrar-te a les comissions, grups i a totes les seccions que desitgis (Coral, Tennis taula,
                        Ateneu Gastronòmic, Juguesca, i més…)</li>
                    <li>També pots participar en tallers, activitats i cursos que es fan contínuament (teatre infantil,
                        costura creativa, ikebana, ioga, ball…).</li>
                    <li>A més, si tens alguna idea genial per fer una activitat, no ho dubtis, a l’Aliança tens les portes
                        obertes i, amb la nostra experiència, t’ajudarem perquè sigui un èxit.</li>
                    <li>Pots prendre part amb veu i vot (majors d’edat) a les assemblees i en el funcionament general de
                        l’entitat.</li>
                    <li>Com a soci pots gaudir sempre de preus especials a totes les activitats que es fan.</li>
                    <li>Preus preferents en el lloguer de la sala.</li>
                    <li>Descomptes en les pistes de Pàdel.</li>
                    <li>Preu especial en la inscripció al Club de cultura TR3SC (conveni amb la Federació d’Ateneus de
                        Catalunya)</li>
                    <li>Preu especial en l’abonament de temporada del BCN Clàssics del Palau de la Música Catalana (conveni
                        amb la Federació d’Ateneus de Catalunya)</li>
                </ul>
            </div>
        </div>
        @component('components/socis-options', ['parners' => $parners])
        @endcomponent        
    </section>
@stop

@section('css')

@stop
@push('scripts')
@endpush
@section('meta')
    <meta name="robots" content="all">
@stop
