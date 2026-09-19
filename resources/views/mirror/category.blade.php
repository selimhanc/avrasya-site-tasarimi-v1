@php
    $arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';
    $heart = '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 21s-8.5-5.1-8.5-11.2A4.8 4.8 0 0 1 12 6.9a4.8 4.8 0 0 1 8.5 2.9C20.5 15.9 12 21 12 21Z"/></svg>';
@endphp
<main class="flex-1 pb-16 lg:pb-0 avc-page">
    <div class="av-page-hero has-image avc-hero">
        <img class="av-page-hero-bg" src="/storage/{{ $activity['image'] }}" alt="">
        <div class="av-shell">
            <nav class="av-crumbs" aria-label="Sayfa yolu">
                <a href="/tr">Ana Sayfa</a><span aria-hidden="true">/</span>
                <a href="/tr/faaliyetlerimiz">Faaliyetlerimiz</a><span aria-hidden="true">/</span>
                <span aria-current="page">{{ $activity['title'] }}</span>
            </nav>
            <div class="avc-hero-title">
                <img src="/images/icons/{{ $activity['icon'] }}.png" alt="" width="64" height="64">
                <div>
                    <h1>{{ $activity['title'] }}</h1>
                    <p>{{ $activity['tagline'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="av-shell avc-body">
        @if($prose)
            <div class="avc-prose prose prose-lg max-w-none">{!! $prose !!}</div>
        @endif

        @if($cards)
            <header class="av-section-head">
                <div>
                    <p class="av-eyebrow">{{ $activity['title'] }} bağışları</p>
                    <h2>Bu alanda <em>destek olun.</em></h2>
                </div>
                <a class="av-link-pill" href="/tr/bagis">Tüm bağışlar {!! $arrow !!}</a>
            </header>
            <div class="avh-featured-grid">
                @foreach($cards as $card)
                    <article class="avh-card">
                        <a class="avh-card-visual" href="{{ $card['path'] }}" tabindex="-1" aria-hidden="true">
                            @if($card['image'])<img src="{{ $card['image'] }}" alt="" width="640" height="440" loading="lazy" decoding="async">@endif
                        </a>
                        <div class="avh-card-body">
                            <h3><a href="{{ $card['path'] }}">{{ $card['title'] }}</a></h3>
                            <p>{{ $card['description'] }}</p>
                            <a class="avh-card-cta" href="{{ $card['donatePath'] }}"><span>{!! $heart !!} Bağış yap</span>{!! $arrow !!}</a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif

        @if($pages)
            <div class="avc-pages">
                @foreach($pages as [$label, $href])
                    <a class="av-btn av-btn-navy" href="{{ $href }}">{{ $label }} {!! $arrow !!}</a>
                @endforeach
            </div>
        @endif

        <aside class="avc-others" aria-labelledby="avc-others-title">
            <h2 id="avc-others-title" class="av-eyebrow">Diğer faaliyet alanları</h2>
            <ul>
                @foreach($others as $other)
                    <li><a href="/tr/{{ $other['slug'] }}"><img src="/images/icons/{{ $other['icon'] }}.png" alt="" width="28" height="28" loading="lazy">{{ $other['title'] }}</a></li>
                @endforeach
            </ul>
        </aside>
    </div>
</main>
