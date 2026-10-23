<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
@foreach ($urls as $url)
    <url>
        <loc>{{ $url }}</loc>
        @foreach (\App\Http\Middleware\SetLocale::SUPPORTED_LOCALES as $locale)
        <xhtml:link rel="alternate" hreflang="{{ $locale }}" href="{{ $url.'?lang='.$locale }}" />
        @endforeach
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ $url.'?lang='.\App\Http\Middleware\SetLocale::DEFAULT_LOCALE }}" />
    </url>
@endforeach
</urlset>
