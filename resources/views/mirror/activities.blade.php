@php
    $activities = [
        ['Eğitim', 'egitim', 'donation-categories/01M2PBJXYPT80BB8010Y22R4RN.jpg', 'Hayallere açılan bir kapı.', 'M3 4c4-1 7 0 9 2 2-2 5-3 9-2v15c-4-1-7 0-9 2-2-2-5-3-9-2Z M12 6v15'],
        ['Kurban', 'kurban', 'pages/01M2JGWEWFT50Q35KEZFJRJB0V.jpg', 'Paylaştıkça çoğalan bereket.', 'M5 9C0 8 2 2 6 4l2 3h8l2-3c4-2 6 4 1 5 M6 9l1 9 5 3 5-3 1-9 M9 12h.01 M15 12h.01 M10 17h4'],
        ['Ramazan-ı Şerif', 'ramazan-i-serif', 'pages/01M2JGX528Y7PPH49ZKM0CXTPJ.jpg', 'Aynı iyilikte buluşan sofralar.', 'M20 14a8 8 0 0 1-10-10 9 9 0 1 0 10 10Z M18 2v6 M15 5h6'],
        ['Sadaka', 'sadaka', 'donation-categories/01M2PBYCHX73WA211A568W5XH0.JPG', 'Küçük bir adım, büyük bir iyilik.', 'M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8Z'],
        ['Kalıcı Eserler', 'kalici-eserler', 'pages/01M2JGXMQ0G1TFBDWJYPRDPJHF.jpg', 'Bugünden yarına kalan izler.', 'M3 21h18 M5 21V9l7-6 7 6v12 M9 21v-6h6v6 M9 10h6 M12 3V1'],
        ['Su Kuyusu', 'su-kuyusu', 'pages/01M2JGY4JH8NRR8PEFY2J4C2P3.jpg', 'Her damlada yeniden hayat.', 'M12 3S5 11 5 15a7 7 0 0 0 14 0c0-4-7-12-7-12Z M9 16a3 3 0 0 0 3 3'],
        ['Kışlık İhtiyaçlar', 'kislik-ihtiyaclar', 'pages/01M2JGVQ80PZWZZSBJ8B78ZWZ1.jpg', 'Soğuk günlere sıcak bir dokunuş.', 'M12 2v20 M3.3 7l17.4 10 M3.3 17 20.7 7 M9 4l3 3 3-3 M9 20l3-3 3 3 M3 10l4-1-1-4 M18 19l-1-4 4-1'],
        ['Diğer Faaliyetler', 'diger-faaliyetler', 'donation-categories/01M2PBC7ZJ5ESTWEHH573Y2TSQ.jpg', 'İyiliğin daha nice yolu var.', 'M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18 M7 12h.01 M12 12h.01 M17 12h.01'],
    ];
@endphp
<main class="activities-page">
    <div class="activities-shell">
        <div class="activities-intro">
            <p class="activities-eyebrow"><span aria-hidden="true"></span> FAALİYETLERİMİZ</p>
            <h1>İyiliğin her hâlinde,<br><span>hayatın içindeyiz.</span></h1>
            <p>Eğitimden temiz suya, bir sofradan bir çocuğun yarınına. <br>Birlikte dokunduğumuz her hayat, daha güzel bir dünya.</p>
            <div class="activities-divider" aria-hidden="true"><span></span><i></i><span></span></div>
        </div>
        <nav class="activities-grid" aria-label="Faaliyet alanlarımız">
            @foreach($activities as [$title, $slug, $image, $description, $icon])
                <a href="/tr/{{ $slug }}" class="activity-tile" aria-label="{{ $title }} faaliyetlerini keşfet">
                    <img class="activity-photo" src="/storage/{{ $image }}" alt="" width="600" height="600" loading="{{ $loop->index < 4 ? 'eager' : 'lazy' }}">
                    <span class="activity-shade" aria-hidden="true"></span>
                    <span class="activity-glow" aria-hidden="true"></span>
                    <span class="activity-topline"><span class="activity-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="{{ $icon }}"/></svg></span><span class="activity-number" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }} / 08</span></span>
                    <span class="activity-caption"><span class="activity-text"><h2>{{ $title }}</h2><span class="activity-description">{{ $description }}</span></span><span class="activity-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 19 19 5M5 5h14v14"/></svg></span></span>
                </a>
            @endforeach
        </nav>
        <p class="activities-signoff"><span aria-hidden="true">✦</span> Farklı yollar. Aynı amaç. <strong>İyilik.</strong></p>
    </div>
</main>
<style>
.activities-page{--activity-ink:var(--color-primary,#024372);--activity-gold:#d6a45d;position:relative;isolation:isolate;background:#f9fbfc;color:var(--activity-ink);padding:36px 0 42px;overflow:hidden}
.activities-page:before{content:"";position:absolute;z-index:-1;inset:0;pointer-events:none;background:radial-gradient(ellipse at 50% 0%,#c8dfed55,transparent 48%),linear-gradient(#02437204 1px,transparent 1px),linear-gradient(90deg,#02437204 1px,transparent 1px);background-size:auto,64px 64px,64px 64px;mask-image:linear-gradient(#000,transparent 90%)}
.activities-shell{max-width:1280px;margin:auto;padding:0 40px}.activities-intro{text-align:center;max-width:690px;margin:0 auto 25px}.activities-eyebrow{display:flex;align-items:center;justify-content:center;gap:9px;font-size:10px;letter-spacing:.23em;font-weight:600;color:#748690;margin-bottom:12px}.activities-eyebrow>span{width:6px;height:6px;border-radius:50%;background:var(--activity-gold);box-shadow:0 0 0 4px #d6a45d14}.activities-intro h1{font-size:clamp(32px,3.5vw,46px);font-weight:500;line-height:1.07;letter-spacing:-.04em;margin:0 0 13px}.activities-intro h1>span{color:#b78541}.activities-intro>p:last-of-type{font-size:14px;line-height:1.5;color:#73818a;margin:0}.activities-divider{display:flex;align-items:center;justify-content:center;gap:9px;margin-top:21px}.activities-divider span{width:65px;height:1px;background:linear-gradient(90deg,transparent,#ccd9e0)}.activities-divider span:last-child{transform:rotate(180deg)}.activities-divider i{width:5px;height:5px;background:var(--activity-gold);transform:rotate(45deg)}
.activities-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:19px}.activity-tile{position:relative;aspect-ratio:1;min-width:0;display:flex;flex-direction:column;justify-content:space-between;isolation:isolate;overflow:hidden;border-radius:16px;background:#123c55;color:#fff;box-shadow:0 4px 18px #143b5109;transition:transform .35s,box-shadow .35s}.activity-photo,.activity-shade,.activity-glow{position:absolute;inset:0;width:100%;height:100%;pointer-events:none}.activity-photo{object-fit:cover;z-index:-3;transition:transform .65s,filter .65s;filter:saturate(.8)}.activity-shade{z-index:-2;background:linear-gradient(180deg,#06263c45 0%,#06263c00 35%,#05233780 62%,#031d31f5 100%)}.activity-glow{z-index:-1;opacity:0;background:radial-gradient(250px circle at var(--glow-x,50%) var(--glow-y,20%),#e8c68638,transparent 75%);box-shadow:inset 0 0 0 1px #e4c99a80;border-radius:inherit;transition:opacity .35s}.activity-topline{display:flex;justify-content:space-between;align-items:center;padding:17px}.activity-icon{display:grid;place-items:center;width:38px;height:38px;border:1px solid #ffffff45;border-radius:11px;background:#ffffff12;backdrop-filter:blur(10px);color:#fff3db}.activity-icon svg{width:21px;height:21px}.activity-number{font-size:10px;letter-spacing:.13em;color:#ffffffe0;text-shadow:0 1px 8px #0008}.activity-caption{display:flex;align-items:flex-end;justify-content:space-between;gap:8px;padding:20px}.activity-text{min-width:0}.activity-caption h2{font-size:23px;line-height:1.1;font-weight:500;letter-spacing:-.025em;margin:0 0 7px;color:#fff}.activity-description{display:block;font-size:12px;line-height:1.4;color:#d1dce2}.activity-arrow{display:grid;place-items:center;width:32px;height:32px;border:1px solid #ffffff40;border-radius:50%;flex-shrink:0;background:#ffffff08;transition:background .3s,color .3s,transform .3s}.activity-arrow svg{width:14px;height:14px}.activity-tile:hover,.activity-tile:focus-visible{transform:translateY(-4px);box-shadow:0 16px 30px #123c5525}.activity-tile:hover .activity-photo,.activity-tile:focus-visible .activity-photo{transform:scale(1.055);filter:saturate(1)}.activity-tile:hover .activity-glow,.activity-tile:focus-visible .activity-glow{opacity:1}.activity-tile:hover .activity-arrow,.activity-tile:focus-visible .activity-arrow{background:#ecd1a4;border-color:#ecd1a4;color:#15364c;transform:rotate(45deg)}.activity-tile:focus-visible{outline:3px solid #c89b59;outline-offset:4px}.activities-signoff{display:flex;justify-content:center;align-items:center;gap:7px;margin:27px 0 0;font-size:12px;color:#87949c}.activities-signoff>span{color:#c59b61;margin-right:4px}.activities-signoff strong{font-weight:500;color:var(--activity-ink)}
@media(max-width:1050px){.activity-caption{padding:15px}.activity-caption h2{font-size:20px}.activity-topline{padding:13px}.activity-description{font-size:11px}.activity-arrow{width:27px;height:27px}}
@media(max-width:800px){.activities-shell{padding:0 22px}.activities-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}.activity-caption h2{font-size:25px}.activity-caption{padding:20px}.activity-description{font-size:13px}}
@media(max-width:500px){.activities-page{padding:25px 0 86px}.activities-shell{padding:0 14px}.activities-intro{margin-bottom:20px}.activities-intro h1{font-size:34px}.activities-intro>p:last-of-type{font-size:12px;max-width:310px;margin:auto}.activities-intro>p:last-of-type br{display:none}.activities-eyebrow{font-size:9px;margin-bottom:10px}.activities-divider{margin-top:17px}.activities-grid{gap:12px}.activity-tile{border-radius:12px}.activity-topline{padding:10px}.activity-icon{width:29px;height:29px;border-radius:8px}.activity-icon svg{width:17px;height:17px}.activity-number{font-size:8px}.activity-caption{padding:12px;gap:4px}.activity-caption h2{font-size:18px;margin-bottom:5px}.activity-description{font-size:10px;line-height:1.35}.activity-arrow{width:23px;height:23px}.activity-arrow svg{width:11px;height:11px}.activities-signoff{font-size:10px;gap:4px;margin-top:22px}}
@media(prefers-reduced-motion:reduce){.activities-page *{transition:none!important}.activity-tile:hover,.activity-tile:focus-visible,.activity-tile:hover .activity-photo,.activity-tile:focus-visible .activity-photo{transform:none}}
</style>
<script>
(() => {
    if (!matchMedia('(hover: hover) and (prefers-reduced-motion: no-preference)').matches) return;
    document.querySelectorAll('.activity-tile').forEach(card => {
        card.addEventListener('pointermove', event => {
            const rect = card.getBoundingClientRect();
            card.style.setProperty('--glow-x', `${event.clientX - rect.left}px`);
            card.style.setProperty('--glow-y', `${event.clientY - rect.top}px`);
        });
    });
})();
</script>
