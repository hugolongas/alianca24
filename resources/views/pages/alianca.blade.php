@extends('layouts.master')
@section('bodyClass', $page)
@section('title', ucfirst($page)." | Ateneu l'Aliança")
@section('content')
    <section id="{{ $page }}" class="container page">
        <h1 class="title">
            Aliança
        </h1>
        <div class="page-text">
            <section class="page-section">
                <h2 class="section-title">
                    l'Entitat
                </h2>
                <div class="section-content row">
                    <div class="col-12 col-lg-6">
                        <p>
                            <strong>L’Ateneu l’Aliança</strong> és un espai social únic al Vallés Oriental. Situat a Lliçà
                            d’Amunt, al bell
                            mig de la Vall del Tenes, està obert a totes les persones que en vulguin gaudir de la cultura,
                            ja sigui com a usuaris, o prenent-ne part des de dins com a socis.
                        </p>
                        <p>
                            <strong>L’Aliança</strong> va ser fundada al 1925, i quasi cent anys després, continua sent el
                            centre neuràlgic de la
                            cultura a Lliçà d’Amunt. Amb una superfície de més de 3.000 m2, que inclou sala de teatre
                            polivalent
                            totalment equipada, zona esportiva i bar-restaurant, és un equipament cultural de primer ordre i
                            de
                            titularitat privada (propietat de l’entitat) i ofereix tots els seus espais tan a socis com a no
                            socis, a entitats i administracions, sempre en benefici de la comunitat.
                        </p>
                        <p>
                            <strong>L’Aliança</strong> és una entitat no confessional, catalanista i sense adscripció a cap
                            ideologia política.
                            És una entitat que té per finalitats la promoció d’activitats culturals, físico-esportives i
                            socials
                            a Lliçà d’Amunt, amb l’objectiu de transformar la societat, donant valor al temps lliure i
                            creant
                            oportunitats per treballar la cohesió social al municipi on està arrelada.
                        </p>
                    </div>
                    <div class="col-12 col-lg-6">
                        <p>
                            <strong>L’Aliança</strong> es nodreix de totes aquelles persones que hi interactuen. Els socis i
                            les sòcies exerceixen el seu poder de presa de decisions a l’Assemblea General. Aquest és
                            l’òrgan de representació màxima. L’assemblea es reuneix un cop a l’any de manera ordinària
                            (normalment a finals de maig) i de forma extraordinària convocada per la junta o per un grup de
                            socis.
                        </p>
                        <p>
                            <strong>L’Aliança</strong> compta amb grups autònoms de socis i sòcies i altres voluntaris no
                            afiliats que desenvolupen activitats concretes, organitzats en comissions o grups de treball
                            (Juguesca, Comissió de Concerts, Biergarten, Espectacles infantils, Mercat de la Puça…) i
                            seccions (Tennis Taula, Coral l’Aliança, Ateneu Gastronòmic).
                        </p>
                        <p>
                            <strong>L’Aliança</strong> forma part de la <a href="http://www.ateneus.cat/" target="_blank">
                                d’Ateneus de Catalunya.</a>
                        </p>
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
