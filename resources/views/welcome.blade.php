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
        {{-- 1. De Header --}}
        @include('partials.header')

        {{-- 2. De Content (Direct in de body, zonder @section) --}}
        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-content">
                        <h1 class="hero-title">Welkom bij De WaalBurger</h1>
                        <p class="hero-subtitle">De lekkerste gourmet burgers van Nijmegen</p>
                        <div class="hero-buttons">
                            <a href="{{ route('menu') }}" class="btn btn-primary">Bekijk Menukaart</a>
                            <a href="{{ route('contact') }}" class="btn btn-secondary">Neem Contact Op</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="container">
                    <h2 class="section-title">Onze Hardlopers</h2>
                    <p class="section-subtitle">Gerechten waar onze klanten voor terugkomen</p>
                    
                    <div class="grid">
                        <div class="card">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?q=80&w=800" alt="De Waal Master">
                            </div>
                            <div class="card-content">
                                <div class="card-header">
                                    <h3 class="card-title">De Waal Master</h3>
                                    <span class="card-price">€ 14,50</span>
                                </div>
                                <p class="card-description">Onze signature burger met 100% lokaal rundvlees, oude kaas en onze geheime Waalsaus.</p>
                                <a href="#" class="btn btn-primary btn-block">Bestellen</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1550547660-d9450f859349?q=80&w=800" alt="Truffel Delight">
                            </div>
                            <div class="card-content">
                                <div class="card-header">
                                    <h3 class="card-title">Truffel Delight</h3>
                                    <span class="card-price">€ 16,00</span>
                                </div>
                                <p class="card-description">Met romige truffelmayonaise, gegrilde paddenstoelen en verse rucola.</p>
                                <a href="#" class="btn btn-primary btn-block">Bestellen</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?q=80&w=800" alt="Spicy River">
                            </div>
                            <div class="card-content">
                                <div class="card-header">
                                    <h3 class="card-title">Spicy River</h3>
                                    <span class="card-price">€ 15,25</span>
                                </div>
                                <p class="card-description">Een pittige ervaring met jalapeños, cheddar en onze huisgemaakte hot-sauce.</p>
                                <a href="#" class="btn btn-primary btn-block">Bestellen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section-dark">
                <div class="container">
                    <div class="about-grid">
                        <div class="about-content">
                            <h2 class="section-title" style="text-align: left;">Ons Verhaal</h2>
                            <p class="text-large mb-4">
                                Sinds 2020 serveren wij de lekkerste gourmet burgers van Nijmegen, direct aan de Waalkade.
                            </p>
                            <p class="mb-4">
                                Wij werken alleen met verse, lokale ingrediënten. Onze burgers worden dagelijks vers gedraaid en onze broodjes worden elke ochtend gebakken door de lokale bakker.
                            </p>
                            <a href="{{ route('contact') }}" class="btn btn-primary">Kom langs</a>
                        </div>
                        <div class="about-image">
                            <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0" alt="Restaurant interieur">
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="container">
                    <h2 class="section-title">Bezoek Ons</h2>
                    <div class="contact-preview-grid">
                        <div class="contact-info-card">
                            <h3>Adres</h3>
                            <p>Waalkade 123<br>Nijmegen</p>
                        </div>
                        <div class="contact-info-card">
                            <h3>Open</h3>
                            <p>Ma-Zo: 12:00 - 22:00</p>
                        </div>
                        <div class="contact-info-card">
                            <h3>Contact</h3>
                            <p>024-1234567<br>info@waalburger.nl</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        {{-- 3. De Footer --}}
        @include('partials.footer')

    </body>
</html>