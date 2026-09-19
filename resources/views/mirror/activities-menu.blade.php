<div class="av-activities-nav" x-data="{ expanded: false }"
     @mouseenter="expanded = true" @mouseleave="if (!$el.contains(document.activeElement)) expanded = false"
     @focusout="if (!$el.contains($event.relatedTarget)) expanded = false"
     @keydown.escape.stop.prevent="expanded = false; $refs.activitiesToggle.focus()"
     @click.outside="expanded = false">
    <a class="av-activities-link" href="/tr/faaliyetlerimiz">Faaliyetlerimiz</a>
    <button class="av-activities-toggle" type="button" x-ref="activitiesToggle" @click="expanded = !expanded"
            :aria-expanded="expanded.toString()" aria-expanded="false" aria-controls="av-activities-panel" aria-label="Faaliyetlerimiz menüsünü aç veya kapat">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" :class="expanded && 'is-open'" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
    </button>
    <div id="av-activities-panel" class="av-mega-position" x-show="expanded" x-cloak x-transition.opacity.duration.180ms>
        <div class="av-mega-panel">
            <div class="av-mega-grid">
                @foreach(\App\Support\Activities::all() as $group)
                    <div class="av-mega-group">
                        <a class="av-mega-category" href="/tr/{{ $group['slug'] }}">
                            <span class="av-mega-icon"><img src="/images/icons/{{ $group['icon'] }}.png" alt="" width="44" height="44" loading="lazy" decoding="async"></span>
                            <span class="av-mega-title">{{ $group['title'] }}<span class="av-mega-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7M8 7h9v9"/></svg></span></span>
                        </a>
                        <ul>
                            @foreach($group['links'] as [$label, $destination])
                                <li><a href="{{ \App\Support\Activities::href($destination) }}">{{ $label }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
            <a href="/tr/faaliyetlerimiz" class="av-mega-all">Tüm faaliyetler <span aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span></a>
        </div>
    </div>
</div>
<style>
.av-activities-nav{display:flex;align-items:center;height:100%;position:static;color:#4b5563}.av-activities-link{font-size:14px;font-weight:500;display:flex;align-items:center;height:100%;padding:0 3px 0 16px}.av-activities-toggle{height:36px;width:25px;margin-right:10px;display:grid;place-items:center;border:0;background:transparent;cursor:pointer;color:inherit}.av-activities-toggle svg{width:14px;height:14px;transition:transform .2s}.av-activities-toggle .is-open{transform:rotate(180deg)}.av-activities-nav:hover{color:var(--color-primary,#024372)}
.av-mega-position{position:absolute;top:100%;left:50%;transform:translateX(-50%);width:min(900px,calc(100vw - 48px));z-index:60}
.av-mega-panel{position:relative;background:#fff;border:1px solid #e6ecf0;border-top-color:#eef2f5;border-radius:0 0 22px 22px;box-shadow:0 28px 60px -18px #0b2f4a38,0 8px 18px -10px #0b2f4a1a;padding:12px 12px 50px;color:#15384e;max-height:calc(100dvh - 140px);overflow:auto;overscroll-behavior:contain}
.av-mega-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:4px}
.av-mega-group{min-width:0;padding:16px 16px 17px;border-radius:16px;--tint:#eef5ff;--ink:#2f66d0;transition:background-color .25s}
.av-mega-group:nth-child(2){--tint:#fbf3e7;--ink:#a9691c}
.av-mega-group:nth-child(3){--tint:#fff6dc;--ink:#a87708}
.av-mega-group:nth-child(4){--tint:#ffeef1;--ink:#d22f55}
.av-mega-group:nth-child(5){--tint:#f4f0fa;--ink:#6a4aa5}
.av-mega-group:nth-child(6){--tint:#e9f6ff;--ink:#1580c4}
.av-mega-group:nth-child(7){--tint:#eaf4ff;--ink:#2473d6}
.av-mega-group:nth-child(8){--tint:#fff4e3;--ink:#c2740c}
.av-mega-group:hover,.av-mega-group:focus-within{background:var(--tint)}
.av-mega-category{display:block}
.av-mega-icon{position:relative;display:block;width:44px;height:44px;margin-bottom:11px;transition:transform .35s cubic-bezier(.3,1.4,.5,1)}
.av-mega-icon:after{content:"";position:absolute;left:7px;right:7px;bottom:-5px;height:8px;border-radius:50%;background:radial-gradient(closest-side,#0e2f4633,transparent);transition:transform .35s,opacity .35s}
.av-mega-icon img{position:relative;z-index:1;display:block;width:44px;height:44px;object-fit:contain}
.av-mega-title{display:flex;align-items:center;gap:6px;font-size:15.5px;font-weight:600;letter-spacing:-.015em;line-height:1.2;transition:color .2s}
.av-mega-arrow{display:inline-grid;color:var(--ink);opacity:0;transform:translate(-4px,4px);transition:transform .25s,opacity .25s}
.av-mega-arrow svg{width:13px;height:13px}
.av-mega-group:hover .av-mega-icon,.av-mega-category:focus-visible .av-mega-icon{transform:translateY(-3px) scale(1.07)}
.av-mega-group:hover .av-mega-icon:after{transform:scale(.8);opacity:.65}
.av-mega-category:hover .av-mega-title{color:var(--ink)}
.av-mega-category:hover .av-mega-arrow,.av-mega-category:focus-visible .av-mega-arrow{opacity:1;transform:none}
.av-mega-group ul{list-style:none;padding:9px 0 0;margin:0}
.av-mega-group li+li{margin-top:1px}
.av-mega-group li a{position:relative;display:inline-block;padding:3.5px 0;font-size:13px;line-height:1.35;color:#5d7281;transition:color .2s,padding-left .2s}
.av-mega-group li a:before{content:"";position:absolute;left:0;top:50%;width:6px;height:1.5px;border-radius:2px;background:var(--ink);opacity:0;transform:scaleX(0);transform-origin:left;transition:transform .2s,opacity .2s}
.av-mega-group li a:hover,.av-mega-group li a:focus-visible{color:var(--ink);padding-left:11px}
.av-mega-group li a:hover:before,.av-mega-group li a:focus-visible:before{opacity:1;transform:none}
.av-mega-all{position:absolute;right:22px;bottom:14px;display:inline-flex;align-items:center;gap:8px;padding:7px 8px 7px 15px;border-radius:999px;background:#f2f6f9;color:#1d4560;font-size:12.5px;font-weight:600;line-height:1;transition:background-color .2s,color .2s}
.av-mega-all>span{display:grid;place-items:center;width:22px;height:22px;border-radius:50%;background:#fff;color:#c98a2b;box-shadow:0 1px 3px #0b2f4a1f;transition:transform .25s}
.av-mega-all>span svg{width:12px;height:12px}
.av-mega-all:hover{background:var(--color-primary,#024372);color:#fff}.av-mega-all:hover>span{transform:translateX(2px)}
.av-activities-nav a:focus-visible,.av-activities-nav button:focus-visible{outline:2px solid #c2a06b;outline-offset:4px;border-radius:6px}
@media(max-width:1023px){.av-mega-position{display:none!important}}
@media(prefers-reduced-motion:reduce){.av-activities-nav *{transition:none!important}}
</style>
