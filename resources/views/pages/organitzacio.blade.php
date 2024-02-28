@extends('layouts.master')
@section('bodyClass', $page)
@section('title', ucfirst($page) . " | Ateneu l'Aliança")
@section('content')
    <section id="{{ $page }}" class="container page">
        <h1 class="title">
            Organització
        </h1>
        <div class="page-text">

            <section class="page-section">
                <h2 class="section-title">
                    Junta Directiva
                </h2>
                <div class="section-content row">
                    <div class="col-12">
                        <p>
                            El passat 14 de novembre de 2021, els socis i les sòcies de l’ateneu, reunits en Assemblea
                            Ordinària, van renovar els òrgans de govern de l’entitat, la Junta directiva, que té un mandat
                            de 4 anys.
                        </p>
                        <p>
                            La composició de la Junta és:
                        <ul class="junta">
                            <li>Marc Rovira Estrada, President</li>
                            <li>Joan Cros i Roca, Secretari</li>
                            <li>Sergi Serna Espinar, Tresorer</li>
                            <li>Xavier Longás Morera, Vocal</li>
                            <li>Arnau Cladellas Regales, Vocal</li>
                            <li>Jordi Padró Catalán, Vocal</li>
                        </ul>
                        </p>
                        <p>
                            La Junta es reuneix ordinàriament un cop per setmana. Podeu contactar amb la Junta escrivint un
                            correu electrònic a junta@lalianca.cat, concertant una visita o contactant directament amb
                            qualsevol dels seus membres.
                        </p>
                    </div>
                </div>
            </section>
            <section class="page-section">
                <h2 class="section-title">
                    Treballadors de l’Ateneu
                </h2>
                <div class="section-content row">
                    <div class="col-12">

                        <ul>
                            <li>L’Ateneu té contractades a temps parcial dues persones per a desenvolupar les tasques
                                d’administració i de tècnic de sala. Retribucions pactades i condicions laborals segons
                                conveni.</li>
                            <li>La resta de persones o empreses que ofereixen els seus serveis professionals ho fan com a
                                proveïdors, facturant per les tasques que duen a terme. Aquestes persones estan subjectes
                                als acords comercials signats.</li>
                            <li>Les persones que organitzen activitats a l’ateneu ho fan de manera voluntària, sense rebre
                                cap retribució econòmica. Aquestes persones estan subjectes al conveni de voluntariat.</li>

                        </ul>
                    </div>
                </div>
            </section>
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
