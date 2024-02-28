@extends('layouts.master')
@section('bodyClass', $page)
@section('title', ucfirst($page)." | Ateneu l'Aliança")
@section('content')
    <section id="{{ $page }}" class="container page">
        <h1 class="title">
            Mecenatge
        </h1>
        <div class="page-text">
            <section class="page-section">
                <h2 class="section-title">                    
                </h2>
                <div class="section-content row">
                    <div class="col-12">                        
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
