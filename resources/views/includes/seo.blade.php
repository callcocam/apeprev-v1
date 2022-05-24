@php
$preview = '';
if ($model->description && $model->description->preview) {
    $preview = $model->description->preview;
}
$url = url('/');
if ($model->url) {
    $url = $model->url;
}
@endphp

<meta name="description" content="{{ $preview }}" />
@if ($model->robots)
    <meta name="robots" content="{{ $model->robots }}" />
@endif

<link rel="base" href="{{ $url }}" />
<link rel="canonical" href="{{ $url }}" />
<link rel="alternate" type="application/rss+xml" href="{{ url('/rss.php') }}" />
<link rel="sitemap" type="application/xml" href="{{ url('/sitemap.xml') }}" />

@if ($tenant = $model->tenant)
    @if ($google = $tenant->google)
        <link rel="author" href="https://plus.google.com/{{ $google }}/posts" />
        <link rel="publisher" href="https://plus.google.com/{{ $google }}" />
    @endif
@endif

<meta itemprop="name" content="{{ $model->name }}" />
<meta itemprop="description" content="{{ $preview }}" />
<meta itemprop="image" content="{{ $model->cover_url }}" />
<meta itemprop="url" content="{{ $url }}" />

<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $model->name }}" />
<meta property="og:description" content="{{ $preview }}" />
<meta property="og:image" content="{{ $model->cover_url }}" />
<meta property="og:url" content="{{ $url }}" />
<meta property="og:site_name" content="{{ $model->name }}" />
<meta property="og:locale" content="pt_BR" />
@if ($tenant = $model->tenant)
    @if ($property = $tenant->property)
        <meta property="article:publisher"
            content="https://www.facebook.com/{{ \Arr::get($property, 'username') }}" />
        <meta property="article:author" content="https://www.facebook.com/{{ \Arr::get($property, 'username') }}" />
        <meta property="og:app_id" content="{{ \Arr::get($model, 'app_id') }}" />
    @endif
@endif
<meta property="twitter:card" content="summary_large_image" />

@if ($tenant = $model->tenant)
    @if ($twitter = $tenant->twitter)
        <meta property="twitter:site" content="{{ \Arr::get($twitter, 'username') }}" />
    @endif
@endif
<meta property="twitter:domain" content="{{ $url }}" />
<meta property="twitter:title" content="{{ $model->name }}" />
<meta property="twitter:description" content="{{ $preview }}" />
<meta property="twitter:image" content="{{ $model->cover_url }}" />
<meta property="twitter:url" content="{{ $url }}" />
