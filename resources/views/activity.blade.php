@extends('layouts.master')
@section('bodyClass', 'activitat')
@section('title', "Ateneu l'Aliança | " . $activitat->title)
@section('meta')
    <meta property="og:url" content="{{ $activitat->slug() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $activitat->title }}" />
    <meta property="og:description" content="{{ str_limit(strip_tags($activitat->resume)) }}" />
    <meta property="og:image" content="{{ asset('storage/media') . '/' . $activitat->img_poster }}" />
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('content')
    <article id="activitat" class="activitat container">
        <h1 class="title">{{ $activitat->title }}</h1>
        <div class="row">
            <div class="col-12 col-md-8 section activitat-contingut">
                <div class="row">
                    <div class="col-8 activitat-img">
                        <img src="{{ asset('storage/media') . '/' . $activitat->img_poster }}"
                            class="img-fluid img-responsive">
                    </div>
                    <div class="col-3 activitat-info">
                        <div class="activitat-info-section activitat-preu">
                            <p class="info-title">PREUS</p>
                            {{ $activitat->price }}
                        </div>
                        <div class="activitat-info-section activitat-preu">
                            <p class="info-title">HORARI</p>
                            <p class="info-text">Data: <span
                                    class="info-value">{{ date('d/m/Y', strtotime($activitat->date)) }}</span></p>
                            <p class="info-text">Hora: <span class="info-value">{{ $activitat->time }}</span></p>
                        </div>
                        @if( $activitat->buy_url!="" )
                        <div class="activitat-info-section activitat-comprar">
                            <p>Compra les entrades desde el seguent enllaç</p>
                            <a class="ali-btn" href="{{ $activitat->buy_url }}">ComprarEntrada</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {!! $activitat->description !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                @component('components/calendar')
                @endcomponent
            </div>
        </div>
    </article>
@stop

@section('meta')
    <meta name="robots" content="all">
@stop
