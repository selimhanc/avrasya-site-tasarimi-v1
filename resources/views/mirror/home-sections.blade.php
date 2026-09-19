@php
    $months = ['', 'Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki', 'Kas', 'Ara'];
    $arrow = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';
    $heart = '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 21s-8.5-5.1-8.5-11.2A4.8 4.8 0 0 1 12 6.9a4.8 4.8 0 0 1 8.5 2.9C20.5 15.9 12 21 12 21Z"/></svg>';
@endphp

@if($stats)
<section class="avh-stats" aria-label="Rakamlarla Avrasya">
    <div class="av-shell">
        <dl class="avh-stats-grid">
            @foreach($stats as $stat)
                <div class="avh-stat">
                    <dd>{{ rtrim($stat['number'], '+') }}@if(str_ends_with($stat['number'], '+'))<span aria-hidden="true">+</span>@endif</dd>
                    <dt>{{ $stat['label'] }}</dt>
                </div>
            @endforeach
        </dl>
    </div>
</section>
@endif

<section class="avh-section avh-areas" aria-labelledby="avh-areas-title">
    <div class="av-shell">
        <header class="av-section-head">
            <div>
                <p class="av-eyebrow">Faaliyet alanlarımız</p>
                <h2 id="avh-areas-title">İyiliğin ulaştığı <em>sekiz alan.</em></h2>
            </div>
            <a class="av-link-pill" href="/tr/faaliyetlerimiz">Tüm faaliyetler {!! $arrow !!}</a>
        </header>
        <ul class="avh-areas-grid">
            @foreach($activities as $activity)
                <li>
                    <a class="avh-area" href="/tr/{{ $activity['slug'] }}">
                        <span class="avh-area-icon"><img src="/images/icons/{{ $activity['icon'] }}.png" alt="" width="52" height="52" loading="lazy" decoding="async"></span>
                        <span class="avh-area-text">
                            <strong>{{ $activity['title'] }}</strong>
                            <span>{{ $activity['tagline'] }}</span>
                        </span>
                        <span class="avh-area-arrow">{!! $arrow !!}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>

@if($featured)
<section class="avh-section avh-featured" aria-labelledby="avh-featured-title">
    <div class="av-shell">
        <header class="av-section-head">
            <div>
                <p class="av-eyebrow">Öne çıkan bağışlar</p>
                <h2 id="avh-featured-title">Bugün bir hayata <em>dokunun.</em></h2>
            </div>
            <a class="av-link-pill" href="/tr/bagis">Tüm bağışlar {!! $arrow !!}</a>
        </header>
        <div class="avh-featured-grid">
            @foreach($featured as $card)
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
    </div>
</section>
@endif

<section class="avh-section avh-story" aria-labelledby="avh-story-title">
    <div class="av-shell avh-story-grid">
        <figure class="avh-story-visual">
            <img src="/images/about/ilkelerimiz.jpg" alt="Avrasya gönüllüleri sahada" width="900" height="700" loading="lazy" decoding="async">
            <figcaption><strong>25</strong><span>yıldır<br>iyilik yolunda</span></figcaption>
        </figure>
        <div class="avh-story-copy">
            <p class="av-eyebrow">Biz kimiz?</p>
            <h2 id="avh-story-title">Çeyrek asırdır <em>yoldayız.</em></h2>
            <p class="avh-story-lead">Avrasya Eğitim Kültür ve Dostluk Derneği; ihtiyacı olan insanlara hiçbir ayrım gözetmeden ulaşan, toplum yararını ve insan onurunu merkeze alan gönüllü bir sosyal hizmet kuruluşudur.</p>
            <ul class="avh-story-list">
                <li><strong>İnsan merkezli yaklaşım</strong><span>İhtiyaç sahibi insanlara hiçbir ayrım gözetmeden ulaşırız.</span></li>
                <li><strong>Gönüllülük esası</strong><span>Faaliyetlerimizi gönüllülük temelinde gerçekleştiririz.</span></li>
                <li><strong>Şeffaflık ve güven</strong><span>Tüm süreçleri açık, izlenebilir ve hesap verebilir biçimde yürütürüz.</span></li>
            </ul>
            <a class="av-btn av-btn-navy" href="/tr/hakkimizda">Bizi tanıyın {!! $arrow !!}</a>
        </div>
    </div>
</section>

@if($news)
<section class="avh-section avh-news" aria-labelledby="avh-news-title">
    <div class="av-shell">
        <header class="av-section-head">
            <div>
                <p class="av-eyebrow">Haberler ve duyurular</p>
                <h2 id="avh-news-title">Sahadan <em>son gelişmeler.</em></h2>
            </div>
            <a class="av-link-pill" href="/tr/haberler">Tüm haberler {!! $arrow !!}</a>
        </header>
        <div class="avh-news-grid">
            @foreach($news as $item)
                @php($parts = explode('.', $item['date']))
                <a class="avh-news-item" href="{{ $item['href'] }}">
                    @if($item['image'])
                        <img class="avh-news-thumb" src="{{ $item['image'] }}" alt="" loading="lazy" decoding="async">
                    @elseif(count($parts) === 3)
                        <time class="avh-news-date" datetime="{{ $parts[2].'-'.$parts[1].'-'.$parts[0] }}"><strong>{{ $parts[0] }}</strong><span>{{ $months[(int) $parts[1]] ?? '' }} {{ $parts[2] }}</span></time>
                    @endif
                    <span class="avh-news-text">
                        <span class="avh-news-type">{{ $item['type'] }}@if($item['image'] && $item['date']) · {{ $item['date'] }}@endif</span>
                        <strong>{{ $item['title'] }}</strong>
                        <span class="avh-news-excerpt">{{ $item['excerpt'] }}</span>
                    </span>
                    <span class="avh-news-arrow">{!! $arrow !!}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="avh-cta-wrap" aria-labelledby="avh-cta-title">
    <div class="av-shell">
        <div class="avh-cta">
            <img src="/images/activities/kislik.jpg" alt="" loading="lazy" decoding="async">
            <div class="avh-cta-copy">
                <p class="av-eyebrow av-eyebrow-light">Birlikte daha güçlüyüz</p>
                <h2 id="avh-cta-title">Her bağış, bir hayata dokunuyor.</h2>
                <p>Siz de bu güzel harekete katılın; iyiliği birlikte büyütelim.</p>
                <div class="avh-cta-actions">
                    <a class="av-btn av-btn-orange" href="/tr/bagis">{!! $heart !!} Bağış yap</a>
                    <a class="av-btn av-btn-ghost" href="/tr/gonullu">Gönüllü ol {!! $arrow !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>
