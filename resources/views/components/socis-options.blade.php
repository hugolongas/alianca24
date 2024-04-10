<div id="soci-info" class="container">
    <h2 class="title">Tria el pla</h2>
    <div class="row soci-module-container">
        @foreach ($parners as $parner)
            <div class="col-sm-12 col-md-4">
                <div class="soci-module">
                    <h6 class="price">{{ $parner->price }}</h6>
                    <p class="type">{{ $parner->name }}</p>

                    <div class="soci-module-info">
                        {!! $parner->info !!}
                    </div>
                    <div class="align-center">
                        <a href="{{ route('parners.registration', ['id' => $parner->id]) }}" class="ali-btn">FER-ME SOCI
                            {{ $parner->name }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
