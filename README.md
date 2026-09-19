# Avrasya Dernek — Site Tasarımı v1

Avrasya Dernek web sitesi için tasarım katmanı. Yalnızca görsel/arayüz varlıkları içerir; Laravel uygulama koduna yer verilmez.

## İçerik

- `public/css/avrasya.css` — tüm sayfalara eklenen tasarım sistemi (renkler, tipografi, başlık, bülten, alt bilgi, formlar). Derleme gerektirmez.
- `public/images/` — logo, renkli PNG ikonlar (Microsoft Fluent Emoji, MIT) ve faaliyet görselleri
- `resources/views/mirror/` — ana sayfa, faaliyet alanı, kategori, bülten ve sayfa başlığı tasarım şablonları (Blade)
- `resources/css/app.css` — Tailwind tabanlı yeni tasarım sistemi
- `resources/js/` — Alpine, Spotlight ve Swiper çalışmaları
- `tailwind.config.js`, `postcss.config.js`, `vite.config.js` — yapılandırma

## Geliştirme

```bash
npm install
npm run dev   # Tailwind/Vite canlı derleme
npm run build # üretim derlemesi
```

## Tasarım sistemi

- `public/css/avrasya.css`: her istekte tüm sayfalara uygulanan bağımsız tasarım sistemi; `scripts` ve Blade şablonlarından eklenir. Derleme gerektirmez.
- `resources/css/app.css`: yeni tasarım sistemi ve Spotlight Card çalışmaları
- `resources/js/app.js`: Alpine, Spotlight ve Swiper çalışmaları

NudaUI ve Swiper MIT lisanslıdır. Gerekli küçük HTML/CSS/JS parçası proje kaynaklarına alınmıştır.