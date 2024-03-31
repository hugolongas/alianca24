<div class="cover-item col-{{ $cover->cssStyle() }}">
    <a href="{{ $cover->url }}">
        <div class="cover-poster">
            <img src="{{ asset('storage') . '/' . $cover->attachments->where('mediadefinition.type', 'cover')->first()->url }}"
                class="img-fluid">
            <div class="cover-info">
                {{ $cover->title }}
            </div>
        </div>
    </a>
</div>
