@props([
    'title' => 'Default Title'
])

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="application/ld+json">
        {
            "@content": "https://schema.org/",
            "@type": "Person",
            "name": "Steve McDougall",
            "url": "https://www.juststeveking.uk/",
            "image": "https://www.juststeveking.uk/images/avatar.webp",
            "sameAs": [
                "https://github.com/JustSteveKing",
                "https://twitter.com/JustSteveKing",
                "https://www.linkedin.com/in/steve-mcdougall/"
            ],
            "jobTitle": "Engineering Manager",
            "worksFor": {
                "@type": "Organization",
                "name": "Car and Classic Limited",
                "url": "https://www.carandclassic.com/",
                "foundingDate": "2005-10-21",
                "sameAs": [
                    "https://www.linkedin.com/company/car-and-classic-limited/"
                ],
                "description": "At Car & Classic, we help individuals and dealers buy and sell classic and specialist vehicles online. We are the largest free-to-list site in the UK as well as being the largest classic/specialist site in Europe."
            }
        }
        </script>
</head>
<body class="antialiased font-sans bg-slate-50 dark:bg-slate-800">

    <x-site-nav />

    <main>
        {{ $slot }}
    </main>

    <x-site-footer />

</body>
</html>
