<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="admin-body">

    @include('partials.header')

    <main class="admin-main">
        <div class="admin-card">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="admin-header">
                <h1 class="admin-title">Menu Beheer</h1>
                <a href="{{ route('items.create') }}" class="btn-primary-sm">
                    + Nieuw Gerecht
                </a>
            </div>

            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Categorie</th>
                            <th>Prijs</th>
                            <th class="text-right">Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td><strong>{{ $item->name }}</strong></td>
                                <td class="text-light">{{ $item->category }}</td>
                                <td class="text-primary font-bold">€{{ number_format($item->price, 2, ',', '.') }}</td>
                                <td class="table-actions text-right">
                                    <a href="{{ route('items.edit', $item->id) }}" class="action-link action-edit">
                                        Bewerk
                                    </a>

                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Weet je zeker dat je dit gerecht wilt verwijderen?');"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-link action-delete">
                                            Verwijder
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-state">
                                    Er staan nog geen gerechten op het menu.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </main>
    @include('partials.footer')
</body>

</html>