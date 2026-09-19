<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Avrasya ile eğitim, sağlık, insani yardım ve kalıcı eser çalışmalarına destek olun.">
    <meta name="theme-color" content="#0a3b60">

    <title>Avrasya — İyiliği birlikte büyütelim</title>

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="bg-[#062b46] text-white">
        <div class="mx-auto flex min-h-9 max-w-7xl items-center justify-between px-5 text-xs sm:px-8">
            <div class="flex items-center gap-5 text-white/75">
                <a class="transition hover:text-white" href="tel:+902126657523">+90 212 665 7523</a>
                <a class="hidden transition hover:text-white sm:inline" href="mailto:info@avrasya.org">info@avrasya.org</a>
            </div>
            <span class="font-semibold tracking-wide text-[#ffc36e]">25 yıldır iyiliğin izinde</span>
        </div>
    </div>

    <header class="sticky top-0 z-50 border-b border-black/5 bg-white/95 backdrop-blur" x-data="mobileNavigation">
        <div class="mx-auto flex h-[76px] max-w-7xl items-center justify-between px-5 sm:px-8 lg:h-[88px]">
            <a href="{{ route('home') }}" aria-label="Avrasya ana sayfa">
                <img class="h-10 w-auto lg:h-12" src="{{ asset('images/avrasya-logo.png') }}" alt="Avrasya">
            </a>

            <nav class="hidden items-center gap-7 text-sm font-semibold text-slate-700 lg:flex" aria-label="Ana menü">
                <a class="transition hover:text-[#0a3b60]" href="#hakkimizda">Hakkımızda</a>
                <a class="transition hover:text-[#0a3b60]" href="#faaliyetler">Faaliyetlerimiz</a>
                <a class="transition hover:text-[#0a3b60]" href="#bagislar">Bağış</a>
                <a class="transition hover:text-[#0a3b60]" href="#haberler">Keşfet</a>
                <a class="transition hover:text-[#0a3b60]" href="#iletisim">İletişim</a>
            </nav>

            <div class="flex items-center gap-2">
                <a class="btn-primary hidden sm:inline-flex" href="#bagislar">
                    Bağış Yap
                    <span aria-hidden="true">↗</span>
                </a>
                <button
                    class="grid h-11 w-11 place-items-center rounded-full border border-black/10 lg:hidden"
                    type="button"
                    @click="open = !open"
                    :aria-expanded="open"
                    aria-label="Menüyü aç"
                >
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <nav
            class="border-t border-black/5 bg-white px-5 py-5 lg:hidden"
            x-show="open"
            x-transition
            x-cloak
            aria-label="Mobil menü"
        >
            <div class="mx-auto grid max-w-7xl gap-1 text-base font-semibold">
                <a class="rounded-xl px-4 py-3 hover:bg-slate-50" @click="open = false" href="#hakkimizda">Hakkımızda</a>
                <a class="rounded-xl px-4 py-3 hover:bg-slate-50" @click="open = false" href="#faaliyetler">Faaliyetlerimiz</a>
                <a class="rounded-xl px-4 py-3 hover:bg-slate-50" @click="open = false" href="#bagislar">Bağış</a>
                <a class="rounded-xl px-4 py-3 hover:bg-slate-50" @click="open = false" href="#haberler">Keşfet</a>
                <a class="rounded-xl px-4 py-3 hover:bg-slate-50" @click="open = false" href="#iletisim">İletişim</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="relative overflow-hidden bg-[#f7f5ef]" id="hakkimizda">
            <div class="hero-grid absolute inset-0"></div>
            <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-5 py-14 sm:px-8 lg:grid-cols-[1.02fr_0.98fr] lg:py-24">
                <div x-data="heroWords">
                    <span class="section-kicker">Avrasya Yardımlaşma Derneği</span>
                    <h1 class="display-heading mt-7 max-w-3xl text-[3.15rem] text-[#17211c] sm:text-6xl lg:text-[5.4rem]">
                        İyilik bir
                        <span class="word-window">
                            <template x-for="(word, index) in words" :key="word">
                                <span
                                    x-show="current === index"
                                    x-transition:enter="word-enter"
                                    x-transition:enter-start="word-enter-start"
                                    x-transition:enter-end="word-enter-end"
                                    x-transition:leave="word-leave"
                                    x-transition:leave-start="word-leave-start"
                                    x-transition:leave-end="word-leave-end"
                                    x-text="word"
                                ></span>
                            </template>
                        </span>
                        bırakır.
                    </h1>
                    <p class="mt-7 max-w-xl text-base leading-8 text-slate-600 sm:text-lg">
                        Çeyrek asırdır yurt içinde ve dünyanın farklı bölgelerinde eğitim, sağlık ve insani yardım çalışmalarını güvenle sürdürüyoruz.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a class="btn-secondary" href="#faaliyetler">Çalışmalarımızı keşfet <span aria-hidden="true">↓</span></a>
                        <a class="btn-quiet" href="#bagislar">Bağış seçenekleri</a>
                    </div>
                    <div class="mt-10 flex items-center gap-4 text-sm text-slate-600">
                        <div class="flex -space-x-3" aria-hidden="true">
                            <span class="grid h-10 w-10 place-items-center rounded-full border-2 border-[#f7f5ef] bg-[#0a3b60] font-bold text-white">A</span>
                            <span class="grid h-10 w-10 place-items-center rounded-full border-2 border-[#f7f5ef] bg-[#ed9c31] font-bold text-[#062b46]">V</span>
                            <span class="grid h-10 w-10 place-items-center rounded-full border-2 border-[#f7f5ef] bg-[#d9e6ee] font-bold text-[#0a3b60]">+</span>
                        </div>
                        <p><strong class="text-[#17211c]">10.000+</strong> bağışçının güveniyle</p>
                    </div>
                </div>

                <div class="relative mx-auto w-full max-w-[34rem] lg:mr-0">
                    <div class="absolute -left-7 -top-7 h-28 w-28 rounded-full bg-[#ed9c31]/20 blur-2xl"></div>
                    <div class="overflow-hidden rounded-[2rem] bg-[#0a3b60] p-3 shadow-[0_2rem_5rem_rgba(6,43,70,0.2)] sm:p-4">
                        <div class="relative overflow-hidden rounded-[1.45rem]">
                            <img class="h-[29rem] w-full object-cover sm:h-[35rem]" src="{{ asset('images/activities/sunnet.jpg') }}" alt="Sağlık faaliyetinden bir çocuk" fetchpriority="high">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#062b46]/90 via-[#062b46]/5 to-transparent"></div>
                            <div class="absolute inset-x-0 bottom-0 p-6 text-white sm:p-8">
                                <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-semibold backdrop-blur">Sağlık</span>
                                <h2 class="mt-4 max-w-md text-2xl font-semibold tracking-tight sm:text-3xl">Binlerce çocuğa güvenli sağlık desteği</h2>
                                <a class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-[#ffc36e]" href="#faaliyetler">Faaliyeti incele <span aria-hidden="true">→</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-6 -left-5 hidden rounded-2xl border border-black/5 bg-white p-4 shadow-xl sm:block">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400">Bu yıl</p>
                        <p class="mt-1 text-xl font-bold text-[#0a3b60]">50.000+ hayat</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="border-y border-black/5 bg-white">
            <div class="mx-auto grid max-w-7xl grid-cols-2 px-5 sm:px-8 lg:grid-cols-4">
                @foreach ([['10.000+', 'Bağışçı'], ['150+', 'Proje'], ['5.000+', 'Gönüllü'], ['50.000+', 'Faydalanan']] as [$number, $label])
                    <div class="border-black/5 px-2 py-8 text-center even:border-l lg:border-l lg:py-11 lg:first:border-l-0">
                        <div class="metric-number text-3xl font-bold text-[#0a3b60] sm:text-4xl">{{ $number }}</div>
                        <div class="mt-2 text-sm font-medium text-slate-500">{{ $label }}</div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="bg-white py-20 lg:py-28" id="bagislar">
            <div class="mx-auto max-w-7xl px-5 sm:px-8">
                <div class="flex flex-col justify-between gap-6 sm:flex-row sm:items-end">
                    <div>
                        <span class="section-kicker">Bağış alanları</span>
                        <h2 class="display-heading mt-5 max-w-2xl text-4xl sm:text-5xl">Desteğiniz doğru yere ulaşsın.</h2>
                    </div>
                    <p class="max-w-md leading-7 text-slate-600">Size yakın gelen alanı seçin; küçük ya da büyük her katkı sürdürülebilir bir iyiliğin parçası olsun.</p>
                </div>

                <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($donationCategories as $index => $category)
                        <article class="nuda-spotlight-card min-h-64" data-spotlight-card style="--spotlight-rgb: {{ $index % 2 === 0 ? '237 156 49' : '10 59 96' }}">
                            <div class="nuda-spotlight-card__inner flex h-full flex-col p-6">
                                <div class="grid h-12 w-12 place-items-center rounded-full bg-[#f7f5ef] text-lg font-bold text-[#0a3b60]" aria-hidden="true">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                                <h3 class="mt-8 text-xl font-semibold tracking-tight">{{ $category['name'] }}</h3>
                                <p class="mt-3 leading-7 text-slate-600">{{ $category['description'] }}</p>
                                <a class="mt-auto inline-flex items-center gap-2 pt-8 text-sm font-bold text-[#0a3b60]" href="#hizli-bagis">Destek ol <span aria-hidden="true">→</span></a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-10 grid overflow-hidden rounded-[1.75rem] bg-[#0a3b60] text-white lg:grid-cols-[1fr_0.86fr]" id="hizli-bagis">
                    <div class="p-7 sm:p-10 lg:p-12">
                        <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#ffc36e]">Hızlı bağış</span>
                        <h3 class="mt-4 text-3xl font-semibold tracking-tight sm:text-4xl">Birkaç adımda iyiliğe katılın.</h3>
                        <p class="mt-4 max-w-xl leading-7 text-white/70">Bu ekran yerel arayüz geliştirmesi içindir; ödeme bağlantısı daha sonra güvenli ödeme altyapısına bağlanacaktır.</p>
                    </div>
                    <form class="bg-[#f7f5ef] p-7 text-[#17211c] sm:p-10" x-data="donationPicker" @submit.prevent="add">
                        <label class="text-sm font-bold" for="category">Bağış alanı</label>
                        <select class="mt-2 w-full rounded-xl border border-black/10 bg-white px-4 py-3 outline-none focus:border-[#0a3b60] focus:ring-2 focus:ring-[#0a3b60]/10" id="category" x-model="category">
                            @foreach ($donationCategories as $category)
                                <option>{{ $category['name'] }}</option>
                            @endforeach
                            <option>Genel Bağış</option>
                        </select>
                        <fieldset class="mt-5">
                            <legend class="text-sm font-bold">Tutar</legend>
                            <div class="mt-2 grid grid-cols-3 gap-2">
                                @foreach ([250, 500, 1000] as $amount)
                                    <button class="rounded-xl border px-3 py-3 text-sm font-bold transition" type="button" @click="chooseAmount({{ $amount }})" :class="amount === {{ $amount }} && !customAmount ? 'border-[#0a3b60] bg-[#0a3b60] text-white' : 'border-black/10 bg-white hover:border-[#0a3b60]'">{{ number_format($amount, 0, ',', '.') }} ₺</button>
                                @endforeach
                            </div>
                        </fieldset>
                        <label class="mt-4 block text-sm font-bold" for="custom-amount">Diğer tutar</label>
                        <div class="relative mt-2">
                            <input class="w-full rounded-xl border border-black/10 bg-white px-4 py-3 pr-11 outline-none focus:border-[#0a3b60] focus:ring-2 focus:ring-[#0a3b60]/10" id="custom-amount" type="number" min="1" inputmode="numeric" placeholder="Tutar girin" x-model="customAmount" @focus="chooseCustom">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 font-bold text-slate-400">₺</span>
                        </div>
                        <button class="btn-primary mt-5 w-full" type="submit" :disabled="!selectedAmount">
                            <span x-show="!added">Bağış sepetine ekle</span>
                            <span x-show="added" x-cloak>Sepete eklendi ✓</span>
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <section class="overflow-hidden bg-[#f7f5ef] py-20 lg:py-28" id="faaliyetler">
            <div class="mx-auto max-w-7xl px-5 sm:px-8">
                <div class="grid gap-12 lg:grid-cols-[0.72fr_1.28fr] lg:items-center">
                    <div class="min-w-0">
                        <span class="section-kicker">Sahadan</span>
                        <h2 class="display-heading mt-5 text-4xl sm:text-5xl">İyiliğin izini birlikte takip edin.</h2>
                        <p class="mt-6 leading-8 text-slate-600">Öne çıkan faaliyetleri kaydırın. Cube geçişi yalnızca bu vitrinde kullanılarak hareketli ama sakin bir deneyim sağlandı.</p>
                        <div class="mt-8 flex items-center gap-3" data-slider-shell>
                            <button class="grid h-12 w-12 place-items-center rounded-full border border-black/10 bg-white transition hover:border-[#0a3b60]" type="button" data-slider-prev aria-label="Önceki faaliyet">←</button>
                            <button class="grid h-12 w-12 place-items-center rounded-full bg-[#0a3b60] text-white transition hover:bg-[#062b46]" type="button" data-slider-next aria-label="Sonraki faaliyet">→</button>
                        </div>
                    </div>

                    <div class="min-w-0" data-slider-shell>
                        <div class="swiper activity-swiper" data-activity-slider>
                            <div class="swiper-wrapper">
                                @foreach ($activities as $activity)
                                    <div class="swiper-slide">
                                        <article class="nuda-spotlight-card" data-spotlight-card style="--spotlight-rgb: 237 156 49">
                                            <div class="nuda-spotlight-card__inner">
                                                <div class="relative overflow-hidden">
                                                    <img class="activity-image" src="{{ asset($activity['image']) }}" alt="{{ $activity['title'] }}" loading="lazy">
                                                    <div class="activity-image-shade"></div>
                                                </div>
                                                <div class="p-6 sm:p-8">
                                                    <span class="text-xs font-bold uppercase tracking-[0.16em] text-[#ffc36e]">{{ $activity['category'] }}</span>
                                                    <h3 class="mt-3 text-2xl font-semibold tracking-tight sm:text-3xl">{{ $activity['title'] }}</h3>
                                                    <p class="mt-3 max-w-xl leading-7 text-white/70">{{ $activity['summary'] }}</p>
                                                    <a class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-white" href="#bagislar">Detaylı bilgi <span aria-hidden="true">↗</span></a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-7 flex justify-center" data-slider-pagination></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white py-20 lg:py-28" id="haberler">
            <div class="mx-auto max-w-7xl px-5 sm:px-8">
                <div class="flex flex-col justify-between gap-6 sm:flex-row sm:items-end">
                    <div>
                        <span class="section-kicker">Haberler ve duyurular</span>
                        <h2 class="display-heading mt-5 text-4xl sm:text-5xl">Güncel gelişmeler</h2>
                    </div>
                    <a class="btn-quiet" href="#haberler">Tüm haberler</a>
                </div>
                <div class="mt-12 grid gap-8 lg:grid-cols-3">
                    @foreach ($news as $item)
                        <article class="news-card group py-6">
                            <div class="flex items-center justify-between text-xs font-bold uppercase tracking-[0.14em] text-slate-400">
                                <span>{{ $item['type'] }}</span>
                                <time>{{ $item['date'] }}</time>
                            </div>
                            <h3 class="mt-8 text-2xl font-semibold tracking-tight text-[#17211c]">{{ $item['title'] }}</h3>
                            <p class="mt-4 leading-7 text-slate-600">{{ $item['summary'] }}</p>
                            <a class="mt-8 flex items-center justify-between text-sm font-bold text-[#0a3b60]" href="#haberler">
                                Haberi oku
                                <span class="news-arrow text-xl" aria-hidden="true">↗</span>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="mx-5 mb-20 overflow-hidden rounded-[2rem] bg-[#ed9c31] sm:mx-8 lg:mx-auto lg:max-w-7xl" id="iletisim">
            <div class="grid items-center gap-8 px-6 py-12 sm:px-10 lg:grid-cols-[1fr_0.8fr] lg:px-14 lg:py-16">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#062b46]/65">Birlikte daha güçlüyüz</span>
                    <h2 class="display-heading mt-4 max-w-2xl text-4xl text-[#062b46] sm:text-5xl">Her destek bir hayata dokunur.</h2>
                </div>
                <div class="flex flex-wrap gap-3 lg:justify-end">
                    <a class="btn-secondary" href="#bagislar">Bağış Yap</a>
                    <a class="btn-quiet border-[#062b46]/25 text-[#062b46]" href="mailto:info@avrasya.org">Gönüllü Ol</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-[#062b46] text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 py-14 sm:px-8 lg:grid-cols-[1.25fr_0.75fr_0.75fr]">
            <div>
                <img class="h-11 w-auto brightness-0 invert" src="{{ asset('images/avrasya-logo.png') }}" alt="Avrasya">
                <p class="mt-5 max-w-sm leading-7 text-white/60">Toplumsal dayanışmayı büyütmek ve ihtiyaç sahiplerine sürdürülebilir destek ulaştırmak için çalışıyoruz.</p>
            </div>
            <div>
                <h2 class="text-sm font-bold uppercase tracking-[0.16em] text-[#ffc36e]">Hızlı bağlantılar</h2>
                <nav class="mt-5 grid gap-3 text-sm text-white/70" aria-label="Alt menü">
                    <a class="hover:text-white" href="#hakkimizda">Hakkımızda</a>
                    <a class="hover:text-white" href="#faaliyetler">Faaliyetlerimiz</a>
                    <a class="hover:text-white" href="#bagislar">Bağış kategorileri</a>
                    <a class="hover:text-white" href="#haberler">Haberler</a>
                </nav>
            </div>
            <div>
                <h2 class="text-sm font-bold uppercase tracking-[0.16em] text-[#ffc36e]">İletişim</h2>
                <address class="mt-5 not-italic text-sm leading-7 text-white/70">
                    Gökalp Mah. 58. Bulvar Cad.<br>
                    Zeytinburnu / İstanbul<br>
                    <a class="hover:text-white" href="tel:+902126657523">+90 212 665 7523</a><br>
                    <a class="hover:text-white" href="mailto:info@avrasya.org">info@avrasya.org</a>
                </address>
            </div>
        </div>
        <div class="border-t border-white/10">
            <div class="mx-auto flex max-w-7xl flex-col gap-3 px-5 py-5 text-xs text-white/45 sm:flex-row sm:items-center sm:justify-between sm:px-8">
                <p>© {{ date('Y') }} Avrasya. Tüm hakları saklıdır.</p>
                <p>Yerel arayüz geliştirme sürümü</p>
            </div>
        </div>
    </footer>
</body>
</html>
