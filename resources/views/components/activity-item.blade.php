@php
    \Carbon\Carbon::setlocale(config('app.locale'));
@endphp

<div class="activitat-item">
    <a href="{{ route('activitat', ['slug' => $activity->url]) }}">
        <div class="activitat-poster">
            
        </div>
        <div class="activitat-info">
            <div class="activitat-title">
                {{ $activity->title }}
            </div>
            <div class="activitat-date">                
                <div class="sub-title">{{ucfirst(\Carbon\Carbon::parse($activity->date)->translatedFormat('l j F Y'))}}</div>
                <div class="sub-title">{{ $activity->time }}</div>               
                
            </div>
            <div class="activitat-preu">
                <span class="sub-title">{{$activity->price}}</span>
            </div>
            <div class="activitat-resum">
                {{ $activity->resume }}
            </div>
        </div>
    </a>
</div>