<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'De WaalBurger') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('partials.header')

    <main>
        <section class="section">
            <div class="container">
                <h2 class="section-title">Onze Menukaart</h2>
                <p class="section-subtitle">Bekijk onze heerlijke gerechten en drankjes</p>

                <div class="grid">
                    @foreach($items as $item)
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">{{ $item->name }}</h3>
                                <p class="card-description">{{ $item->description }}</p>
                                <p class="card-price">€{{ number_format($item->price, 2) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')

</body>

</html>