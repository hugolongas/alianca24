@php
    \Carbon\Carbon::setlocale(config('app.locale'));
@endphp

<div class="activitat-item">            
    <a href="{{ route('activity', ['slug' => $activity->url]) }}">
        <div class="activitat-poster">
            <img src="{{ asset('storage') . '/' . $activity->attachments->where('mediadefinition.type','list')->first()->url}}"
                class="img-fluid">
        </div>
        <div class="activitat-info">
            <div class="activitat-title">
                {{ $activity->title }}
            </div>
            <div class="activitat-date">                
                <div class="sub-title">{{ucfirst(\Carbon\Carbon::parse($activity->date)->translatedFormat('l j F Y'))}}</div>
                <div class="sub-title">{{ucfirst(\Carbon\Carbon::parse($activity->time)->format('H:i'))}}</div>               
                
            </div>
            <div class="activitat-preu">
                <span class="sub-title">{{$activity->price}}</span>
            </div>
            <div class="activitat-resum">
                {!! $activity->summary !!}
            </div>
            @if($activity->buy_url!='')
            <div class="activitat-buy" >
                <href src='{{$activity->buy_url}}'>Comprar </href>
            </div>
            @endif
        </div>
    </a>
</div>