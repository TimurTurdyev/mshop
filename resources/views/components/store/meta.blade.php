@props([
    'title',
    'description',
    'url',
    'image',
])
<title>{{ $title }}</title>
<meta name="description" content="{{ $description ?? '' }}"/>
<meta property="og:title" content="{{ $title }}"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="{{ $url }}"/>
<meta property="og:image" content="{{ $image }}"/>
<meta property="og:site_name" content="{{ config('app.name', '') }}"/>
