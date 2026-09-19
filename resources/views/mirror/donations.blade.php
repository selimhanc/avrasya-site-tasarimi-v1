@php
    $groups = [
        'tumu' => ['Tümü', 'M3 3h7v7H3z M14 3h7v7h-7z M3 14h7v7H3z M14 14h7v7h-7z'],
        'kurban' => ['Kurban', 'M5 9C0 8 2 2 6 4l2 3h8l2-3c4-2 6 4 1 5 M6 9l1 9 5 3 5-3 1-9 M9 12h.01 M15 12h.01 M10 17h4'],
        'su' => ['Su Kuyusu', 'M12 3S5 11 5 15a7 7 0 0 0 14 0c0-4-7-12-7-12Z M9 16a3 3 0 0 0 3 3'],
        'egitim' => ['Eğitim', 'M3 4c4-1 7 0 9 2 2-2 5-3 9-2v15c-4-1-7 0-9 2-2-2-5-3-9-2Z M12 6v15'],
        'gida' => ['Gıda & İftar', 'M4 11h16a8 8 0 0 1-16 0Z M7 21h10 M8 3v4 M12 2v5 M16 3v4'],
        'dayanisma' => ['Sosyal Yardım', 'M3 10l9-7 9 7 M5 9v12h14V9 M9 21v-7h6v7'],
        'saglik' => ['Sağlık', 'M9 3h6v6h6v6h-6v6H9v-6H3V9h6Z'],
        'genel' => ['Zekât & Sadaka', 'M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8Z'],
    ];
@endphp
<main class="donations-page" id="donations">
    <div class="donations-shell">
        <div class="donations-intro">
            <div><p class="donations-eyebrow">BİRLİKTE İYİLİĞE</p><h1>Bir bağış. <span>Binlerce güzel ihtimal.</span></h1></div>
            <div class="donations-intro-copy"><p>İyiliğin ulaşacağı yeri siz seçin.<br>Bir sofraya bereket, bir çocuğa umut,<br>bir hayata dokunan destek olun.</p><a href="#donation-grid">Bağışları keşfet <span aria-hidden="true">↘</span></a></div>
        </div>
        <nav class="donation-categories" aria-label="Bağış kategorileri">
            @foreach($groups as $key => [$label, $icon])
                <button type="button" data-category="{{ $key }}" aria-pressed="{{ $key === 'tumu' ? 'true' : 'false' }}" aria-controls="donation-grid">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="{{ $icon }}"/></svg><span>{{ $label }}</span>
                </button>
            @endforeach
        </nav>
        <div class="donation-grid" id="donation-grid">
            @foreach($cards as $card)
                <article class="donation-card" data-group="{{ $card['group'] }}">
                    <a class="donation-visual" href="{{ $card['path'] }}" aria-label="{{ $card['title'] }} — Detay gör">
                        @if($card['image'])
                            <img src="{{ $card['image'] }}" alt="{{ $card['title'] }}" loading="{{ $loop->index < 3 ? 'eager' : 'lazy' }}" width="640" height="440">
                        @else
                            <div class="donation-placeholder"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width=".7" aria-hidden="true"><path d="{{ $groups[$card['group']][1] }}"/></svg><span>İyilik birlikte büyür.</span></div>
                        @endif
                        <span class="donation-overlay"><span>Detay gör <span aria-hidden="true">↗</span></span></span>
                        <span class="donation-tag">{{ $groups[$card['group']][0] }}</span>
                    </a>
                    <div class="donation-card-body">
                        <h3>{{ $card['title'] }}</h3>
                        <p class="donation-description">{{ $card['description'] }}</p>
                        @if($card['custom'])
                            <form action="{{ $card['donatePath'] }}" method="get" class="donation-action">
                                <div class="donation-amount">
                                    <input id="amount-{{ $card['slug'] }}" aria-label="{{ $card['title'] }} için bağış tutarı" name="amount" type="number" inputmode="decimal" min="1" max="9999999" step="0.01" placeholder="Tutar giriniz" required>
                                    <span aria-hidden="true">₺</span>
                                </div>
                                <button class="donation-cta" type="submit"><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8Z"/></svg>Bağış yap</span><span class="donation-cta-arrow" aria-hidden="true">↗</span></button>
                            </form>
                        @else
                            <div class="donation-action">
                                <a class="donation-cta" href="{{ $card['donatePath'] }}"><span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8Z"/></svg>Bağış yap</span><span class="donation-cta-arrow" aria-hidden="true">↗</span></a>
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
        <p class="donations-endnote">Küçük ya da büyük, her iyilik bir hayata dokunur.</p>
    </div>
</main>
<style>
.donation-card{display:flex;flex-direction:column}.donation-card-body{flex:1}.donation-visual{flex-shrink:0}#bagis-formu{scroll-margin-top:115px}
.donations-page{--ink:var(--color-primary,#024372);--orange:var(--color-accent,#ef950e);background:#fcfcfa;color:var(--ink);padding:52px 0 64px}.donations-shell{max-width:1280px;margin:auto;padding:0 40px}.donations-intro{display:flex;justify-content:space-between;align-items:flex-end;gap:40px;margin-bottom:42px}.donations-eyebrow{font-size:11px;letter-spacing:.2em;font-weight:600;margin-bottom:15px;color:#7a858c}.donations-intro h1{font-size:clamp(36px,4vw,58px);line-height:1.06;letter-spacing:-.045em;font-weight:500;margin:0}.donations-intro h1 span{color:var(--orange)}.donations-intro-copy{font-size:16px;color:#6b7981;line-height:1.6;padding-right:28px}.donations-intro-copy a{display:flex;justify-content:space-between;align-items:center;color:var(--ink);font-size:14px;font-weight:600;margin-top:18px}.donations-intro-copy a span{font-size:25px}.donation-categories{display:flex;border-top:1px solid #dfe5e8;border-bottom:1px solid #dfe5e8;gap:12px;padding:16px 0;overflow-x:auto;scrollbar-width:thin}.donation-categories button{flex:1;min-width:102px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:9px;min-height:86px;padding:12px 8px;border-radius:12px;color:#647681;background:transparent;transition:background .2s,color .2s;font-size:14px;font-weight:500;white-space:nowrap}.donation-categories svg{width:25px;height:25px}.donation-categories button:hover{background:#edf2f4;color:var(--ink)}.donation-categories button[aria-pressed=true]{background:var(--ink);color:#fff}.donation-results{display:flex;justify-content:space-between;align-items:baseline;padding:30px 0 22px}.donation-results h2{font-size:23px;font-weight:500;letter-spacing:-.025em}.donation-results p{font-size:13px;color:#77838b}.donation-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:34px 26px;scroll-margin-top:115px}.donation-card{min-width:0;background:white;border:1px solid #e8ecec;border-radius:16px;overflow:hidden;transition:box-shadow .25s,transform .25s}.donation-card:hover{box-shadow:0 14px 35px #0243720c;transform:translateY(-3px)}.donation-card[hidden]{display:none}.donation-visual{display:block;position:relative;aspect-ratio:1.58;overflow:hidden;background:#edf1ef}.donation-visual img{width:100%;height:100%;object-fit:cover;transition:transform .5s}.donation-visual:hover img{transform:scale(1.035)}.donation-overlay{position:absolute;inset:0;display:grid;place-items:center;background:#02344c26;opacity:0;transition:opacity .25s;backdrop-filter:blur(1px)}.donation-overlay>span{border:1px solid #ffffffad;border-radius:100px;padding:10px 20px;background:#ffffff18;color:white;font-size:14px;backdrop-filter:blur(8px)}.donation-overlay span span{margin-left:14px}.donation-visual:hover .donation-overlay,.donation-visual:focus-visible .donation-overlay{opacity:1}.donation-tag{position:absolute;bottom:14px;left:16px;border-radius:6px;padding:5px 10px;background:#ffffffed;color:var(--ink);font-size:10px;font-weight:600;letter-spacing:.06em;text-transform:uppercase}.donation-card-body{padding:22px;display:flex;flex-direction:column}.donation-card h3{font-size:22px;line-height:1.2;font-weight:500;letter-spacing:-.025em;min-height:53px;margin-bottom:20px}.donation-action{margin-top:auto}.donation-action label,.donation-price>span{font-size:12px;color:#7a858b;display:block;margin-bottom:8px}.donation-amount{display:flex;align-items:center;border:1px solid #dce3e5;border-radius:8px;height:46px;margin-bottom:13px;background:#fcfcfb}.donation-amount:focus-within{outline:2px solid var(--ink);outline-offset:2px}.donation-amount input{background:transparent;border:0;box-shadow:none!important;outline:none;width:100%;min-width:0;padding:10px 13px;font-size:17px;color:var(--ink)}.donation-amount>span{padding-right:15px;color:#77838b}.donation-cta{height:46px;width:100%;display:flex;justify-content:space-between;align-items:center;padding:0 17px;background:var(--orange);color:#fff;border-radius:8px;font-size:15px;font-weight:600;transition:background .2s,box-shadow .2s}.donation-cta:hover{background:#d98205;box-shadow:0 5px 15px #ef950e25}.donation-cta>span:last-child{font-size:22px;font-weight:400}.donation-price{min-height:82px}.donation-price strong{font-size:23px;font-weight:500;display:block;line-height:1.2}.donation-price small{font-size:17px}.donation-placeholder{height:100%;display:flex;flex-direction:column;gap:12px;align-items:center;justify-content:center;background:linear-gradient(135deg,#e5edef,#f0eee5);color:#537888}.donation-placeholder svg{width:54px;height:54px}.donation-placeholder span{font-size:13px}.donations-endnote{text-align:center;font-size:15px;color:#839098;margin-top:48px}.donations-page :focus-visible{outline:2px solid var(--ink);outline-offset:4px}
@media(min-width:1100px){.donation-card-body{min-height:245px}}
@media(max-width:900px){.donations-shell{padding:0 24px}.donation-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:22px}.donations-intro-copy{padding:0}.donation-categories{gap:5px}.donation-categories button{min-width:98px}}
@media(max-width:600px){.donations-page{padding:30px 0 85px}.donations-shell{padding:0 18px}.donations-intro{display:block;margin-bottom:27px}.donations-intro h1{font-size:39px}.donations-intro-copy{font-size:14px;margin-top:18px}.donations-intro-copy br{display:none}.donations-intro-copy a{display:none}.donation-categories{margin-right:-18px;padding:11px 18px 11px 0}.donation-categories button{min-width:88px;min-height:77px;font-size:12px}.donation-grid{grid-template-columns:1fr;gap:23px}.donation-results{padding:23px 0 17px}.donation-results h2{font-size:21px}.donation-card h3{min-height:0;font-size:24px}.donation-card-body{padding:20px}.donation-visual{aspect-ratio:1.6}.donation-overlay{opacity:1;background:transparent;backdrop-filter:none;place-items:start end;padding:12px}.donation-overlay>span{font-size:11px;padding:5px 10px;background:#123c5073}.donation-price{min-height:75px}}
.donations-page{padding-top:28px}.donations-intro{margin-bottom:25px;align-items:center;gap:24px}.donations-eyebrow{margin-bottom:9px;font-size:10px}.donations-intro h1{font-size:clamp(26px,2.8vw,36px);line-height:1.15;letter-spacing:-.035em}.donations-intro-copy{font-size:13px;line-height:1.45;max-width:280px;padding:0}.donations-intro-copy br{display:none}.donations-intro-copy a{display:none}.donation-grid{grid-template-columns:repeat(4,minmax(0,1fr));gap:24px 18px}.donation-card-body{padding:17px;min-height:245px}.donation-card h3{font-size:20px;min-height:72px;margin-bottom:15px}.donation-price strong{font-size:19px}.donation-cta{padding:0 13px}
@media(max-width:900px){.donation-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.donations-intro-copy{max-width:220px}.donation-card h3{min-height:48px}.donation-card-body{min-height:230px}}
@media(max-width:600px){.donations-page{padding-top:22px}.donations-shell{padding:0 14px}.donations-intro{margin-bottom:20px}.donations-intro h1{font-size:27px;max-width:340px}.donations-intro-copy{display:none}.donations-eyebrow{font-size:9px;margin-bottom:7px}.donation-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:17px 10px}.donation-card{border-radius:11px}.donation-visual{aspect-ratio:1.15}.donation-card-body{padding:12px;min-height:225px}.donation-card h3{font-size:16px;line-height:1.2;min-height:77px;margin-bottom:12px;overflow-wrap:break-word}.donation-tag{font-size:8px;padding:4px 6px;bottom:8px;left:8px;letter-spacing:0}.donation-overlay{padding:7px}.donation-overlay>span{font-size:10px;padding:4px 7px}.donation-overlay span span{margin-left:4px}.donation-action label,.donation-price>span{font-size:10px;margin-bottom:6px}.donation-amount{height:39px;margin-bottom:9px}.donation-amount input{font-size:14px;padding:8px;appearance:textfield}.donation-amount>span{padding-right:8px;font-size:13px}.donation-cta{height:40px;font-size:13px;padding:0 10px}.donation-cta>span:last-child{font-size:19px}.donation-price{min-height:68px}.donation-price strong{font-size:16px}.donation-price small{font-size:13px}.donation-placeholder svg{width:36px;height:36px}.donation-placeholder span{font-size:10px}.donation-categories{margin-right:-14px}.donation-results p{font-size:11px}}
.donation-card-body{min-height:0;padding:15px}.donation-card h3{min-height:0;margin-bottom:12px}.donation-action{padding-top:0}.donation-price{min-height:77px}.donation-amount{margin-bottom:10px}
@media(max-width:600px){.donation-card-body{min-height:0;padding:11px}.donation-card h3{min-height:0;margin-bottom:10px}.donation-price{min-height:66px}.donation-amount{margin-bottom:8px}}
.donation-card{border-color:#e5eaec;box-shadow:0 3px 14px #183e5604}.donation-card-body{padding:16px}.donation-card h3{font-size:19px;font-weight:600;line-height:1.25;margin-bottom:7px}.donation-description{font-size:13px;line-height:1.5;color:#738089;margin:0 0 14px}.donation-amount{height:42px;border:1px solid #e2e7e9;background:#f8fafb;border-radius:9px;margin-bottom:9px}.donation-amount input{font-size:14px;appearance:textfield}.donation-amount input::-webkit-inner-spin-button,.donation-amount input::-webkit-outer-spin-button{-webkit-appearance:none;margin:0}.donation-amount input::placeholder{color:#88949b}.donation-cta{height:44px;background:var(--ink);border:1px solid var(--ink);border-radius:10px;padding:0 8px 0 13px;color:#fff;box-shadow:0 3px 8px #0243720c;transition:background .2s,box-shadow .2s}.donation-cta>span:first-child{display:flex;align-items:center;gap:8px}.donation-cta svg{width:16px;height:16px;color:#edba70;flex-shrink:0}.donation-cta .donation-cta-arrow{display:grid;place-items:center;width:28px;height:28px;border-radius:7px;background:#ffffff12;font-size:19px;transition:background .2s,transform .2s}.donation-cta:hover{background:#10364f;box-shadow:0 5px 13px #02437218}.donation-cta:hover .donation-cta-arrow{background:#ffffff25;transform:translate(1px,-1px)}
@media(max-width:600px){.donation-card-body{padding:11px}.donation-card h3{font-size:15px;margin-bottom:6px}.donation-description{font-size:11px;line-height:1.45;margin-bottom:10px}.donation-amount{height:38px;margin-bottom:7px}.donation-amount input{font-size:12px;padding:7px}.donation-cta{height:40px;padding:0 6px 0 9px;font-size:12px;border-radius:8px}.donation-cta>span:first-child{gap:5px}.donation-cta svg{width:13px;height:13px}.donation-cta .donation-cta-arrow{width:23px;height:25px;font-size:17px}}
.donations-page{padding-top:16px}.donations-intro{margin-bottom:15px}.donations-eyebrow{margin-bottom:5px}.donation-categories{padding-top:8px;padding-bottom:8px;margin-bottom:18px}.donation-categories button{min-height:64px;gap:6px;padding:8px}.donation-categories svg{width:22px;height:22px}
@media(max-width:600px){.donations-page{padding-top:14px}.donations-intro{margin-bottom:12px}.donation-categories{padding-top:6px;padding-bottom:6px;margin-bottom:14px}.donation-categories button{min-height:58px;gap:5px;padding:7px}.donation-categories svg{width:21px;height:21px}}
@media(prefers-reduced-motion:reduce){.donations-page *{transition:none!important;scroll-behavior:auto!important}.donation-card:hover{transform:none}}
</style>
<script>
(() => {
    const root = document.getElementById('donations');
    const buttons = [...root.querySelectorAll('[data-category]')];
    const cards = [...root.querySelectorAll('[data-group]')];
    const filter = (category) => {
        const active = buttons.find(button => button.dataset.category === category) || buttons[0];
        buttons.forEach(button => button.setAttribute('aria-pressed', String(button === active)));
        cards.forEach(card => { card.hidden = active.dataset.category !== 'tumu' && card.dataset.group !== active.dataset.category; });
    };
    buttons.forEach(button => button.addEventListener('click', () => {
        filter(button.dataset.category);
        const url = new URL(location.href);
        if (button.dataset.category === 'tumu') url.searchParams.delete('kategori'); else url.searchParams.set('kategori', button.dataset.category);
        history.replaceState(null, '', url);
    }));
    filter(new URLSearchParams(location.search).get('kategori') || 'tumu');
})();
</script>
