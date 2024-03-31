<div id="soci-info" class="container">
    <h2 class="title">Tria el pla</h2>
    <div class="soci-module-container">
        @foreach ($parners as $parner)
            <div class="soci-module">
                <h6 class="price">{{$parner->price}}</h6>
                <p class="type">{{$parner->price}}</p>

                <div class="soci-module-info">
                    {!!$parner->info!!}
                </div>
                <div class="align-center">
                    <a href="{{ route('partners.registration') }}" class="ali-btn">FER-ME SOCI</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
