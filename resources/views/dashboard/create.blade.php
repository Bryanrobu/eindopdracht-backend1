<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Gerecht Toevoegen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="admin-body">

    @include('partials.header')

    <main class="admin-main">
        <div class="admin-card">

            <div class="admin-header">
                <h1 class="admin-title">Nieuw Gerecht</h1>
                <a href="{{ route('dashboard') }}" class="text-light">Terug naar overzicht</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('items.store') }}" method="POST">
                @csrf

                <div class="admin-form-group">
                    <label class="admin-label">Naam</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="admin-input" required>
                </div>

                <div class="admin-form-group">
                    <label class="admin-label">Categorie</label>
                    <input type="text" name="category" value="{{ old('category') }}" class="admin-input" required>
                </div>

                <div class="admin-form-group">
                    <label class="admin-label">Omschrijving</label>
                    <textarea name="description" rows="4" class="admin-textarea">{{ old('description') }}</textarea>
                </div>

                <div class="admin-form-group">
                    <label class="admin-label">Prijs (€)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="admin-input"
                        required>
                </div>

                <button type="submit" class="btn-primary btn-block">Gerecht Opslaan</button>
            </form>
        </div>
    </main>
    @include('partials.footer')
</body>

</html>