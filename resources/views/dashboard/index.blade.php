<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - De WaalBurger</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="admin-body">

    @include('partials.header')

    <main class="admin-main">
        <div class="container py-8">
            
            <div class="admin-card mb-8">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="admin-header">
                    <h1 class="admin-title">Menu Beheer</h1>
                    <a href="{{ route('items.create') }}" class="btn btn-primary btn-large" style="padding: 0.5rem 1rem; font-size: 0.9rem;">
                        + Nieuw Gerecht
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="admin-table" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="text-align: left; border-bottom: 2px solid #eee;">
                                <th style="padding: 1rem;">Naam</th>
                                <th style="padding: 1rem;">Categorie</th>
                                <th style="padding: 1rem;">Prijs</th>
                                <th style="padding: 1rem; text-align: right;">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr style="border-bottom: 1px solid #eee;">
                                    <td style="padding: 1rem;"><strong>{{ $item->name }}</strong></td>
                                    <td style="padding: 1rem; color: #7f8c8d;">{{ $item->category }}</td>
                                    <td style="padding: 1rem; color: #E67E22; font-weight: bold;">€{{ number_format($item->price, 2, ',', '.') }}</td>
                                    <td style="padding: 1rem; text-align: right;">
                                        <a href="{{ route('items.edit', $item->id) }}" style="color: #2C3E50; margin-right: 10px; text-decoration: underline;">Bewerk</a>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Weet je zeker?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" style="color: #e74c3c; background: none; border: none; cursor: pointer; text-decoration: underline;">Verwijder</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" style="padding: 2rem; text-align: center;">Geen gerechten gevonden.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-header">
                    <h1 class="admin-title">Ontvangen Berichten</h1>
                </div>

                <div class="table-responsive">
                    <table class="admin-table" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="text-align: left; border-bottom: 2px solid #eee;">
                                <th style="padding: 1rem;">Datum</th>
                                <th style="padding: 1rem;">Naam</th>
                                <th style="padding: 1rem;">E-mail</th>
                                <th style="padding: 1rem;">Bericht</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $msg)
                                <tr style="border-bottom: 1px solid #eee;">
                                    <td style="padding: 1rem; white-space: nowrap;">{{ $msg->created_at->format('d-m-Y H:i') }}</td>
                                    <td style="padding: 1rem;"><strong>{{ $msg->name }}</strong></td>
                                    <td style="padding: 1rem;"><a href="mailto:{{ $msg->email }}" style="color: #3498db;">{{ $msg->email }}</a></td>
                                    <td style="padding: 1rem; font-style: italic;">"{{ $msg->message }}"</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="padding: 2rem; text-align: center; color: #7f8c8d;">
                                        Nog geen contactberichten ontvangen.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    @include('partials.footer')
</body>
</html>