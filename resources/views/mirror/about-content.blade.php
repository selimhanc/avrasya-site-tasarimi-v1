<main class="about-page flex-1 pb-16 lg:pb-0" id="main-content" data-about-page>
    <style>
        html { scroll-behavior: smooth; }
        .about-page {
            --about-ink: #122a39;
            --about-muted: #62717a;
            --about-primary: var(--color-primary, #024372);
            --about-deep: #102a3b;
            --about-accent: var(--color-accent, #ef950e);
            --about-paper: #ffffff;
            background: var(--about-paper);
        }
        .about-page-shell { padding-top: 0; }
        .about-layout { display: grid; grid-template-columns: minmax(0, 1fr); }
        .about-sidebar { display: none; }
        .about-sections { min-width: 0; overflow: hidden; }
        .about-sections__wrapper { display: flex; align-items: flex-start; }
        .about-section { position: relative; flex: 0 0 100%; width: 100%; min-width: 0; scroll-margin-top: 90px; }

        .about-mobile-nav { position: sticky; top: 64px; scroll-margin-top: 64px; z-index: 30; margin: 0 -1rem; padding: 0 1rem; overflow-x: auto; background: rgba(255,255,255,.94); border-bottom: 1px solid rgba(18,42,57,.1); backdrop-filter: blur(16px); scrollbar-width: none; }
        .about-mobile-nav::-webkit-scrollbar { display: none; }
        .about-mobile-nav__inner { display: flex; width: 100%; min-width: 34rem; }
        .about-nav-link { position: relative; display: flex; align-items: center; gap: .45rem; min-height: 52px; padding: .7rem .9rem; color: #76838a; font-size: .8rem; font-weight: 650; line-height: 1; transition: color .25s ease; }
        .about-nav-link::after { position: absolute; right: .85rem; bottom: -1px; left: .85rem; height: 2px; content: ''; background: var(--about-accent); transform: scaleX(0); transform-origin: left; transition: transform .25s ease; }
        .about-nav-link:hover, .about-nav-link.is-active { color: var(--about-ink); }
        .about-nav-link.is-active::after { transform: scaleX(1); }
        .about-nav-link__number { color: var(--about-accent); font-size: .61rem; font-weight: 750; letter-spacing: .05em; }

        .about-intro { position: relative; display: grid; overflow: hidden; color: var(--about-ink); border: 1px solid #e4ebef; border-radius: 1.5rem; background: #f7fafb; }
        .about-intro::before { position: absolute; top: -12rem; left: -9rem; width: 31rem; height: 31rem; content: ''; border-radius: 50%; background: radial-gradient(circle, rgba(239,149,14,.13), rgba(239,149,14,0) 68%); pointer-events: none; }
        .about-intro__copy { position: relative; z-index: 2; display: flex; flex-direction: column; justify-content: center; align-items: flex-start; padding: clamp(2rem, 5vw, 3.75rem); }
        .about-section__eyebrow { display: inline-flex; align-items: center; gap: .65rem; margin-bottom: 1.1rem; color: #6b808d; font-size: .72rem; font-weight: 600; letter-spacing: .2em; text-transform: uppercase; }
        .about-section__eyebrow::before { width: 6px; height: 6px; content: ''; border-radius: 50%; background: var(--about-accent); box-shadow: 0 0 0 4px rgba(239,149,14,.12); }
        .about-section__title { margin: 0; color: var(--about-primary); font-size: clamp(2.3rem, 4.4vw, 3.6rem); font-weight: 500; line-height: 1; letter-spacing: -.04em; }
        .about-intro .about-section__title { font-size: clamp(2.5rem, 4.8vw, 4rem); }
        .about-intro__statement { display: block; margin-top: .9rem; color: #b78541; font-size: clamp(1.05rem, 2vw, 1.35rem); font-weight: 500; letter-spacing: -.02em; }
        .about-section__lead { max-width: 43rem; margin: 0; color: var(--about-muted); font-size: clamp(1.02rem, 1.4vw, 1.14rem); line-height: 1.7; }
        .about-intro .about-section__lead { max-width: 30rem; margin-top: 1.4rem; color: #4a6272; }
        .about-intro__visual { position: relative; min-height: 310px; overflow: hidden; }
        .about-intro__visual img { width: 100%; height: 100%; object-fit: cover; filter: saturate(.9) contrast(1.02); transition: transform .9s cubic-bezier(.2,.72,.2,1); }
        .about-intro:hover .about-intro__visual img { transform: scale(1.025); }
        .about-intro__visual::after { position: absolute; inset: 0; content: ''; box-shadow: inset 18px 0 32px rgba(16,42,59,.08); }

        .about-manifesto { display: grid; margin: 0; }
        .about-manifesto p { position: relative; margin: 0; padding: 1.4rem 0 1.4rem 1.5rem; color: #3d5263; font-size: 1.05rem; line-height: 1.7; }
        .about-manifesto.about-copy p + p { margin-top: 0; }
        .about-manifesto p::before { position: absolute; top: 1.55rem; bottom: 1.55rem; left: 0; width: 3px; content: ''; border-radius: 3px; background: linear-gradient(var(--about-accent), rgba(239,149,14,.15)); }
        

        .about-video { width: 100%; overflow: hidden; border-radius: 1.25rem; background: var(--about-deep); box-shadow: 0 30px 60px -36px rgba(11,47,74,.55); }
        .about-video--wide { margin: 2.5rem 0 0; aspect-ratio: 16 / 9; }
        .about-video iframe { width: 100%; height: 100%; border: 0; }
        .about-story { display: grid; gap: 1.5rem; align-items: center; padding: clamp(2.2rem, 5vw, 3.75rem) 0 clamp(1.4rem, 3vw, 2.25rem); }
        .about-story__year { color: var(--about-accent); font-size: clamp(4.5rem, 9vw, 7.25rem); font-weight: 500; line-height: .8; letter-spacing: -.06em; }
        .about-story__kicker { display: block; margin-bottom: .6rem; color: #b78541; font-size: .72rem; font-weight: 600; letter-spacing: .18em; text-transform: uppercase; }
        .about-story h3 { margin: 0 0 .8rem; color: var(--about-primary); font-size: clamp(1.8rem, 3.2vw, 2.5rem); font-weight: 500; line-height: 1.05; letter-spacing: -.035em; }
        .about-copy { color: #55646c; font-size: 1rem; line-height: 1.8; }
        .about-copy p { margin: 0; }
        .about-copy p + p { margin-top: .8rem; }

        .about-accordion { margin-top: 0; display: grid; gap: .6rem; }
        .about-accordion details { padding: 0 1.25rem; border: 1px solid #e4ebf0; border-radius: 1rem; background: #fff; transition: border-color .25s ease, background-color .25s ease, box-shadow .25s ease; }
        .about-accordion details:hover { border-color: #c9d6df; }
        .about-accordion details[open] { border-color: transparent; background: #f5f8fa; box-shadow: inset 0 0 0 1px #e4ebf0; }
        .about-accordion summary { display: flex; align-items: center; justify-content: space-between; padding: 1.05rem 0; color: var(--about-primary); font-size: 1.05rem; font-weight: 600; cursor: pointer; list-style: none; }
        .about-accordion summary::-webkit-details-marker { display: none; }
        .about-accordion summary::after { display: grid; place-items: center; width: 1.9rem; height: 1.9rem; content: '+'; border-radius: 50%; background: #fff4e3; color: #d9850a; font-size: 1.25rem; font-weight: 400; line-height: 1; transition: transform .25s ease; }
        .about-accordion details[open] summary::after { transform: rotate(45deg); }
        .about-accordion p { max-width: 43rem; padding: 0 0 1.25rem; color: var(--about-muted); line-height: 1.7; }

        .about-section__heading { display: grid; gap: 1.5rem; align-items: end; margin-bottom: 2.25rem; }
        .about-section__heading .about-section__lead { padding-bottom: .15rem; }
        .about-split { display: grid; gap: clamp(1.5rem, 4vw, 3rem); align-items: stretch; }
        .about-visual { min-height: 330px; overflow: hidden; border-radius: 1.25rem; background: #dfe7e9; }
        .about-visual img { display: block; width: 100%; height: 100%; min-height: 330px; object-fit: cover; filter: saturate(.88); transition: transform .75s cubic-bezier(.2,.72,.2,1); }
        .about-visual:hover img { transform: scale(1.025); }

        .about-values { --spotlight-color: rgba(239,149,14,.13); display: flex; flex-direction: column; justify-content: center; padding: 0; }
        .about-value { --spotlight-x: 50%; --spotlight-y: 50%; position: relative; display: grid; grid-template-columns: 2.5rem minmax(0, 1fr); gap: .8rem; overflow: hidden; padding: 1.5rem .5rem; border-top: 1px solid #e4ebf0; isolation: isolate; }
        .about-value:last-child { border-bottom: 1px solid #e4ebf0; }
        .about-value::before { position: absolute; inset: 0; z-index: -1; content: ''; background: radial-gradient(260px circle at var(--spotlight-x) var(--spotlight-y), var(--spotlight-color), transparent 68%); opacity: 0; transition: opacity .25s ease; }
        .about-value:hover::before { opacity: 1; }
        .about-value__number { padding-top: .3rem; color: #b78541; font-size: .72rem; font-weight: 600; letter-spacing: .08em; }
        .about-value h3 { margin: 0 0 .35rem; color: var(--about-primary); font-size: clamp(1.08rem, 2vw, 1.3rem); font-weight: 600; line-height: 1.2; }
        .about-value p { max-width: 32rem; margin: 0; color: var(--about-muted); font-size: .94rem; line-height: 1.62; }
        .about-split--principles { padding: clamp(1rem, 2vw, 1.5rem); border: 1px solid #e1eaf0; border-radius: 1.5rem; background: #f3f7f9; }
        .about-split--principles .about-visual { background: #dce8ed; }
        .about-split--principles .about-values { --spotlight-color: rgba(2,67,114,.11); }

        @media (max-width: 1023px) {
            .about-page-shell { padding-right: 1rem; padding-bottom: 2rem; padding-left: 1rem; }
            /* Küp geçişinde komşu yüzün kenardan görünmemesi için taşma tam slayt sınırında kesilir. */
            .about-sections { margin: 0; padding: 0; }
            .about-sections.swiper-cube { overflow: hidden; clip-path: inset(0); }
            .about-section { padding-top: 1.25rem; }
            .about-sections__wrapper { align-items: flex-start; }
            .about-section { padding-bottom: 2.75rem; }
            .about-intro { margin: 0; }
            .about-intro__copy { padding-right: 1.5rem; padding-left: 1.5rem; }
            .about-manifesto { margin-top: 2rem; }
            .about-section__heading { padding-top: 2rem; }
            .about-nav-link { flex: 1; justify-content: center; }
        }

        @media (max-width: 520px) {
            .about-mobile-nav__inner { min-width: 28rem; }
            .about-nav-link { padding-right: .55rem; padding-left: .55rem; font-size: .72rem; }
            .about-intro__copy { padding-top: 2.4rem; padding-bottom: 2.4rem; }
            .about-intro__visual { min-height: 250px; }
            .about-story__year { font-size: 5.4rem; }
        }

        @media (min-width: 640px) {
            .about-manifesto { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 0 3rem; }
            .about-story { grid-template-columns: minmax(120px, .3fr) minmax(0, 1fr); }
        }

        @media (min-width: 1024px) {
            .about-page-shell { padding-top: 3.5rem; padding-bottom: 5.5rem; }
            .about-layout { grid-template-columns: 210px minmax(0, 1fr); gap: clamp(2.5rem, 5vw, 5rem); align-items: start; }
            .about-sidebar { display: block; position: sticky; top: 7.5rem; }
            .about-sidebar__label { margin: 0 0 1.15rem; color: #8b969b; font-size: .66rem; font-weight: 700; letter-spacing: .17em; text-transform: uppercase; }
            .about-sidebar nav { display: grid; }
            .about-sidebar .about-nav-link { min-height: 50px; padding: .75rem 0; border-top: 1px solid rgba(18,42,57,.14); }
            .about-sidebar .about-nav-link:last-child { border-bottom: 1px solid rgba(18,42,57,.14); }
            .about-sidebar .about-nav-link::after { top: -1px; right: auto; bottom: auto; left: 0; width: 100%; height: 1px; transform-origin: left; }
            .about-sidebar .about-nav-link.is-active { padding-left: .55rem; }
            .about-mobile-nav { display: none; }
            .about-sections { overflow: visible; }
            .about-sections__wrapper { display: block !important; transform: none !important; }
            .about-section { width: auto !important; padding-bottom: 4.5rem; }
            .about-section:last-child { padding-bottom: 0; }
            .about-section__heading, .about-intro { scroll-margin-top: 7.5rem; }
            .about-section + .about-section { padding-top: 4.5rem; border-top: 1px solid #e4ebf0; }
            .about-intro { grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); min-height: 440px; }
            .about-intro__visual { min-height: 420px; margin: .65rem; border-radius: 1.15rem; }
            .about-manifesto { margin-top: 2.25rem; }
            .about-section__heading { grid-template-columns: minmax(0, .9fr) minmax(20rem, .8fr); gap: 3rem; }
            .about-split { grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); min-height: 400px; }
            .about-split--reverse .about-visual { order: 2; }
            .about-split--reverse .about-values { order: 1; }
            .about-visual, .about-visual img { min-height: 400px; }
            .about-visual img { position: absolute; inset: 0; }
            .about-visual { position: relative; }
        }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            .about-nav-link, .about-nav-link::after, .about-intro__visual img, .about-visual img, .about-value::before { transition: none; }
        }
    </style>

    <div class="about-page-shell max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-10 py-5 lg:py-14">
        <div class="about-mobile-nav" aria-label="Kurumsal bölümler">
            <div class="about-mobile-nav__inner">
                <a class="about-nav-link is-active" href="#hakkimizda" data-about-nav><span class="about-nav-link__number">01</span>Hakkımızda</a>
                <a class="about-nav-link" href="#misyon" data-about-nav><span class="about-nav-link__number">02</span>Misyon</a>
                <a class="about-nav-link" href="#vizyon" data-about-nav><span class="about-nav-link__number">03</span>Vizyon</a>
                <a class="about-nav-link" href="#ilkelerimiz" data-about-nav><span class="about-nav-link__number">04</span>İlkelerimiz</a>
            </div>
        </div>

        <div class="about-layout">
            <aside class="about-sidebar" aria-label="Kurumsal bölümler">
                <p class="about-sidebar__label">Kurumsal</p>
                <nav>
                    <a class="about-nav-link is-active" href="#hakkimizda" data-about-nav><span class="about-nav-link__number">01</span>Hakkımızda</a>
                    <a class="about-nav-link" href="#misyon" data-about-nav><span class="about-nav-link__number">02</span>Misyon</a>
                    <a class="about-nav-link" href="#vizyon" data-about-nav><span class="about-nav-link__number">03</span>Vizyon</a>
                    <a class="about-nav-link" href="#ilkelerimiz" data-about-nav><span class="about-nav-link__number">04</span>İlkelerimiz</a>
                </nav>
            </aside>

            <div class="about-sections swiper" data-about-swiper>
                <div class="about-sections__wrapper swiper-wrapper">
                    <section class="about-section swiper-slide" id="hakkimizda" data-about-section>
                        <div class="about-intro">
                            <div class="about-intro__copy">
                                <span class="about-section__eyebrow">Kurumsal</span>
                                <h1 class="about-section__title">Hakkımızda</h1>
                                <span class="about-intro__statement">İyilik birlikte büyür.</span>
                                <p class="about-section__lead">Avrasya Eğitim Kültür ve Dostluk Derneği, ihtiyacı olan insanlara hiçbir ayrım gözetmeden ulaşan, toplum yararını ve insan onurunu merkeze alan gönüllü bir sosyal hizmet kuruluşudur.</p>
                            </div>
                            <figure class="about-intro__visual"><img src="__MIRROR_ORIGIN__/storage/pages/01M0FSQYWC9FRENA6JHPFRWR52.jpg" alt="Derneğimizin yardım faaliyetleri" loading="eager"></figure>
                        </div>

                        <div class="about-manifesto about-copy">
                            <p>İnsan hayatını ve sağlığını korumak, eğitimde fırsat eşitliğine katkı sunmak ve insanlar arasındaki dostluk duygusunu geliştirmek başlıca çalışma alanlarımızdır.</p>
                            <p>Kar amacı gütmeden çalışır; desteklerimizi karşılıksız ulaştırır ve bütün faaliyetlerimizi gönüllülük anlayışıyla sürdürürüz.</p>
                        </div>

                        <div class="about-video about-video--wide" id="tanitim-videosu"><iframe src="https://www.youtube.com/embed/C7VNT4SPAXY" title="Derneğimiz hakkında" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe></div>

                        <div class="about-story about-story--wide">
                            <span class="about-story__year" aria-hidden="true">25</span>
                            <div><span class="about-story__kicker">Umut olma heyecanı</span><h3>Çeyrek asırdır yoldayız.</h3><div class="about-copy"><p>25 yılda on binlerce insana ulaştık. Gülümseyen yüzler ve dokunduğumuz hayatlar çoğaldı; daha fazla kişiye umut olma heyecanımız hiç değişmedi.</p></div></div>
                        </div>

                        <div class="about-accordion">
                            <details><summary>Su Kuyusu</summary><p>En kurak bölgelerde temiz ve güvenli suya erişim için su kuyuları açıyoruz.</p></details>
                            <details><summary>Kurban</summary><p>Özellikle gıda ve açlık krizi yaşanan bölgelerde ihtiyaç sahiplerine kurban eti ulaştırıyoruz.</p></details>
                        </div>
                    </section>

                    <section class="about-section swiper-slide" id="misyon" data-about-section>
                        <header class="about-section__heading"><div><span class="about-section__eyebrow">Amacımız</span><h2 class="about-section__title">Misyon</h2></div><p class="about-section__lead">Toplumda farkındalık yaratarak ihtiyaç sahiplerine ulaşmak ve geçici yardımların ötesinde sürdürülebilir destek sağlamak.</p></header>
                        <div class="about-split">
                            <figure class="about-visual"><img src="__MIRROR_ORIGIN__/storage/sliders/01M2JFJBMCXQ8JJ56EE1THGF4D.jpg" alt="Eğitim ve insani yardım çalışmalarımız" loading="lazy"></figure>
                            <div class="about-values" aria-label="Misyonumuzun çalışma ilkeleri">
                                <article class="about-value" data-spotlight-card><span class="about-value__number">01</span><div><h3>Toplumsal farkındalık</h3><p>İyiliğin çoğalması için toplumsal duyarlılığı güçlendirmek.</p></div></article>
                                <article class="about-value" data-spotlight-card><span class="about-value__number">02</span><div><h3>İhtiyaç sahiplerine ulaşmak</h3><p>Yardımı, gerçek ihtiyacın bulunduğu yere özenle ulaştırmak.</p></div></article>
                                <article class="about-value" data-spotlight-card><span class="about-value__number">03</span><div><h3>Sürdürülebilir destek</h3><p>Bugünün ihtiyacını karşılarken yarının imkânlarını da büyütmek.</p></div></article>
                            </div>
                        </div>
                    </section>

                    <section class="about-section swiper-slide" id="vizyon" data-about-section>
                        <header class="about-section__heading"><div><span class="about-section__eyebrow">Geleceğe bakışımız</span><h2 class="about-section__title">Vizyon</h2></div><p class="about-section__lead">Uluslararası ölçekte tanınan, güven veren ve her adımında şeffaflığı koruyan örnek bir yardım kuruluşu olmak.</p></header>
                        <div class="about-split about-split--reverse">
                            <figure class="about-visual"><img src="__MIRROR_ORIGIN__/storage/sliders/01M2JGZ3JTFK1KZ5VNGV3880F8.jpg" alt="Kalıcı yardım projelerimizin geleceği" loading="lazy"></figure>
                            <div class="about-values" aria-label="Vizyonumuzun temel değerleri">
                                <article class="about-value" data-spotlight-card><span class="about-value__number">01</span><div><h3>Uluslararası etki</h3><p>Sınırları aşan çalışmalarla kalıcı toplumsal değer üretmek.</p></div></article>
                                <article class="about-value" data-spotlight-card><span class="about-value__number">02</span><div><h3>Güven</h3><p>Bağışçılarımız ve paydaşlarımızla güçlü, tutarlı ilişkiler kurmak.</p></div></article>
                                <article class="about-value" data-spotlight-card><span class="about-value__number">03</span><div><h3>Şeffaflık</h3><p>Tüm süreçleri açık, izlenebilir ve hesap verebilir biçimde yürütmek.</p></div></article>
                            </div>
                        </div>
                    </section>

                    <section class="about-section swiper-slide" id="ilkelerimiz" data-about-section>
                        <header class="about-section__heading"><div><span class="about-section__eyebrow">Çalışma anlayışımız</span><h2 class="about-section__title">İlkelerimiz</h2></div><p class="about-section__lead">İnsanı merkeze alan, gönüllülüğü esas kabul eden ve mümkün olan en geniş toplumsal faydayı gözeten bir anlayışla çalışıyoruz.</p></header>
                        <div class="about-split about-split--principles">
                            <figure class="about-visual"><img src="__MIRROR_ORIGIN__/images/about/ilkelerimiz.jpg" alt="Avrasya gönüllüsünün ihtiyaç sahibi bir aileye gıda yardımı ulaştırması" loading="lazy"></figure>
                            <div class="about-values" aria-label="İlkelerimiz">
                                <article class="about-value" data-spotlight-card><span class="about-value__number">01</span><div><h3>İnsan merkezli yaklaşım</h3><p>İhtiyaç sahibi insanlara hiçbir ayrım gözetmeden ulaşırız.</p></div></article>
                                <article class="about-value" data-spotlight-card><span class="about-value__number">02</span><div><h3>Gönüllülük esası</h3><p>Faaliyetlerimizi gönüllülük temelinde, hiçbir çıkar gözetmeden gerçekleştiririz.</p></div></article>
                                <article class="about-value" data-spotlight-card><span class="about-value__number">03</span><div><h3>Toplum faydası</h3><p>Bir grubun değil, olabildiğince geniş toplum kesimlerinin yararını esas alırız.</p></div></article>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
