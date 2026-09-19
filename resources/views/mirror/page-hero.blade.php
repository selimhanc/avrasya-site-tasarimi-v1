<div class="av-page-hero{{ $image ? ' has-image' : '' }}">
    @if($image)<img class="av-page-hero-bg" src="{{ $image }}" alt="">@endif
    <div class="av-shell">
        <nav class="av-crumbs" aria-label="Sayfa yolu">
            <a href="/tr">Ana Sayfa</a><span aria-hidden="true">/</span>
            @if($parent)<a href="{{ $parent[1] }}">{{ $parent[0] }}</a><span aria-hidden="true">/</span>@endif
            <span aria-current="page">{{ $title }}</span>
        </nav>
        <h1>{{ $title }}</h1>
        @if($lead)<p>{{ $lead }}</p>@endif
    </div>
</div>
