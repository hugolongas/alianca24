@extends('layouts.master')
@section('bodyClass', 'activitat')
@section('title', "Ateneu l'Aliança | " . $activity->title)
@section('meta')
    <meta property="og:url" content="{{ $activity->slug() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $activity->title }}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($activity->summary), 20) }}" />
    <meta property="og:image"
        content="{{ asset('storage/') . '/' . $activity->attachments->where('mediadefinition.type', 'activity')->first()->url }}" />
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('content')
    <article id="activity" class="activitat container">
        <h1 class="title">{{ $activity->title }}</h1>
        <div class="row">
            <div class="col-12 col-md-8 section activitat-contingut">
                <div class="row">
                    <div class="col-8 activitat-img">
                        <img src="{{ asset('storage/') . '/' . $activity->attachments->where('mediadefinition.type', 'activity')->first()->url }}"
                            class="img-fluid img-responsive">
                    </div>
                    <div class="col-3 activitat-info">
                        <div class="activitat-info-section activitat-preu">
                            <p class="info-title">PREUS</p>
                            {{ $activity->price }}
                        </div>
                        <div class="activitat-info-section activitat-preu">
                            <p class="info-title">HORARI</p>
                            <p class="info-text">Data: <span
                                    class="info-value">{{ date('d/m/Y', strtotime($activity->date)) }}</span></p>
                            <p class="info-text">Hora: <span class="info-value">{{ $activity->time }}</span></p>
                        </div>
                        @if ($activity->buy_url != '')
                            <div class="activitat-info-section activitat-comprar">
                                <p>Compra les entrades desde el seguent enllaç</p>
                                <a class="ali-btn" href="{{ $activity->buy_url }}">ComprarEntrada</a>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                {!! $activity->description !!}
                            </div>
                        </div>
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
