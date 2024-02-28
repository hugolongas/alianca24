@extends('layouts.master')
@section('bodyClass', $page)
@section('title', ucfirst($page)." | Ateneu l'Aliança")
@section('content')
    <section id="{{$page}}" class="container page">
        <h1 class="title">
        </h1> 
        <div class="page-text">
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
