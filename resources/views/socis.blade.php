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

        <div id="soci-info" class="container">
            <h2 class="title">Tria el pla</h2>
            <div class="soci-module-container">
                <div class="soci-module">
                    <h6 class="price">GRATIS</h6>
                    <p class="type">Infantil</p>

                    <div class="soci-module-info">
                        <ul>
                            <li>0-13 anys</li>
                            <li> Soci sense quota</li>
                            <li>Gaudeix dels avantatges</li>
                        </ul>
                    </div>
                    <div class="align-center">
                        <a href="{{ route('socis.inscripcio') }}" class="ali-btn">FER-ME SOCI INFANTIL</a>
                    </div>
                </div>
                <div class="soci-module">
                    <h6 class="price">60€</h6>
                    <p class="type">Adult</p>

                    <div class="soci-module-info">
                        <ul>
                            <li>14-69 anys</li>
                            <li>Tots els drets de soci</li>
                            <li>Gaudeix dels avantatges</li>
                        </ul>
                    </div>
                    <div class="align-center">
                        <a href="{{ route('socis.inscripcio') }}" class="ali-btn">FER-ME SOCI ADULT</a>
                    </div>
                </div>
                <div class="soci-module">
                    <h6 class="price">GRATIS</h6>
                    <p class="type">Senior</p>

                    <div class="soci-module-info">
                        <ul>
                            <li>+70 anys</li>
                            <li>Soci sense quota</li>
                            <li>Gaudeix dels avantatges</li>
                        </ul>
                    </div>
                    <div class="align-center">
                        <a href="{{ route('socis.inscripcio') }}" class="ali-btn">FER-ME SOCI SENIOR</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')

@stop
@push('scripts')
@endpush
@section('meta')
    <meta name="robots" content="all">
@stop
