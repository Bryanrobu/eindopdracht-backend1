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
            <h2 class="section-title">Neem Contact Op</h2>
            <p class="section-subtitle">Vragen of opmerkingen? Laat het ons weten!</p>

            <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); align-items: start;">
                
                <div class="card">
                    <div class="card-content" style="padding: 2rem;">
                        <h3 class="card-title mb-4">Onze Gegevens</h3>
                        <p class="mb-4"><strong>Adres:</strong><br>Waalkade 123, Nijmegen</p>
                        <p class="mb-4"><strong>Telefoon:</strong><br>024 - 123 45 67</p>
                        <p><strong>Email:</strong><br>info@dewaalburger.nl</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content" style="padding: 2rem;">
                        @if(session('success'))
                            <div style="background: #27ae60; color: white; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Naam</label>
                                <input type="text" name="name" required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 0.5rem;">
                            </div>

                            <div class="mb-4">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">E-mail</label>
                                <input type="email" name="email" required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 0.5rem;">
                            </div>

                            <div class="mb-4">
                                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem;">Bericht</label>
                                <textarea name="message" rows="5" required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 0.5rem; resize: vertical;"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Verstuur Bericht</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

    @include('partials.footer')

</body>

</html>