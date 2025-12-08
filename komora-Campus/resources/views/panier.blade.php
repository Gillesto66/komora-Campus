<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Panier - KOMORA Campus</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.kkiapay.me/k.js"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0A4D68",
                        "background-light": "#F8F9FA",
                        "background-dark": "#101622",
                        "primary-accent": "#B2D8E4",
                        "text-light": "#495057",
                        "text-dark": "#E9ECEF",
                        "border-light": "#E9ECEF",
                        "border-dark": "#2d3748"
                    },
                    fontFamily: { "display": ["Inter", "sans-serif"] }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark min-h-screen">
<div class="relative flex min-h-screen flex-col">
    <!-- Header identique à ta vue -->
    <header class="w-full bg-background-light dark:bg-background-dark/80 backdrop-blur-sm sticky top-0 z-10 border-b">
        <!-- ... ton header identique ... -->
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="size-6 text-primary">
                    <svg fill="currentColor" viewBox="0 0 48 48"><path d="M4 42.4379C4 42.4379 14.0962 36.0744 24 41.1692C35.0664 46.8624 44 42.2078 44 42.2078L44 7.01134C44 7.01134 35.068 11.6577 24.0031 5.96913C14.0971 0.876274 4 7.27094 4 7.27094L4 42.4379Z"></path></svg>
                </div>
                <h2 class="text-xl font-bold">KOMORA Campus</h2>
            </div>
            <a href="{{ route('catalogue') }}" class="text-sm font-medium hover:text-primary">Continuer mes achats</a>
        </div>
    </header>

    <main class="flex-1 max-w-7xl mx-auto px-6 py-12 w-full">
        <h1 class="text-4xl font-black mb-8">Panier d'achat</h1>

        @if(empty($cart))
            <div class="text-center py-20 bg-white dark:bg-background-dark/60 rounded-xl border">
                <span class="material-symbols-outlined text-6xl text-primary-accent">shopping_cart</span>
                <h3 class="mt-4 text-xl font-semibold">Votre panier est vide</h3>
                <a href="{{ route('catalogue') }}" class="mt-6 inline-flex items-center gap-2 px-6 h-11 bg-primary text-white rounded-lg font-bold">
                    Continuer mes achats
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Liste des produits -->
                <div class="lg:col-span-2 space-y-4">
                    @foreach($cart as $id => $item)
                        <div class="bg-white dark:bg-background-dark/60 rounded-xl border p-6 flex items-center gap-6">
                            <div class="size-16 rounded-lg bg-cover bg-center flex-shrink-0" style="background-image: url('{{ $item['preview'] ?? 'https://via.placeholder.com/64' }}')"></div>
                            <div class="flex-1">
                                <h4 class="font-semibold">{{ $item['title'] }}</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Quantité: {{ $item['quantity'] }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-lg">{{ number_format($item['price'] * $item['quantity'], 2) }}€</p>
                            </div>
                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="ml>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <!-- Résumé + Paiement Kkiapay -->
                <div class="lg:sticky top-28">
                    <div class="bg-white dark:bg-background-dark/60 rounded-xl border p-6 space-y-6">
                        <h2 class="text-xl font-bold">Résumé</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between"><span>Sous-total</span><span>{{ number_format($total, 2) }}€</span></div>
                            <div class="border-t pt-3">
                                <div class="flex justify-between text-lg font-bold">
                                    <span>Total</span>
                                    <span>{{ number_format($total, 2) }}€</span>
                                </div>
                            </div>
                        </div>

                        <!-- Ajout dans le résumé, avant le bouton payer -->
                        <div class="space-y-4 border-t pt-6 mt-6">
                            <h3 class="text-lg font-bold">Vos informations</h3>
                            <form id="customer-form" class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Nom complet</label>
                                    <input type="text" name="name" required
                                        value="{{ old('name', session('customer_name')) }}"
                                        class="w-full px-4 h-11 rounded-lg border bg-white dark:bg-background-dark/40 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                        placeholder="Jean Dupont">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Email (pour recevoir les fichiers)</label>
                                    <input type="email" name="email" required
                                        value="{{ old('email', session('customer_email')) }}"
                                        class="w-full px-4 h-11 rounded-lg border bg-white dark:bg-background-dark/40 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                        placeholder="jean@example.com">
                                </div>
                            </form>
                        </div>

                        <!-- Bouton mis à jour avec sauvegarde des infos -->
                        <button
                            onclick="saveCustomerAndPay()"
                            class="w-full h-14 bg-primary text-white font-bold rounded-lg hover:bg-primary/90 transition shadow-lg flex items-center justify-center gap-3 text-lg">
                            <span class="material-symbols-outlined">payment</span>
                            Payer avec Kkiapay
                        </button>



                        <!-- Bouton Kkiapay -->
                        <button
                            onclick="openKkiapayWidget({
                                amount: {{ $total }},
                                key: '{{ $kkiapayPublicKey }}',
                                sandbox: {{ $kkiapaySandbox ? 'true' : 'false' }},
                                callback: '{{ route('kkiapay.callback') }}',
                                data: 'komora-campus-order-{{ Str::random(8) }}',
                                theme: '#0A4D68'
                            })"
                            class="w-full h-14 bg-primary text-white font-bold rounded-lg hover:bg-primary/90 transition shadow-lg flex items-center justify-center gap-3 text-lg">
                            <span class="material-symbols-outlined">payment</span>
                            Payer avec Kkiapay
                        </button>

                        <p class="text-center text-xs text-gray-500">Paiement 100% sécurisé</p>
                    </div>
                </div>
            </div>
        @endif
    </main>
</div>

<script>
    function openKkiapayWidget(options) {
        Kkiapay.open({
            ...options,
            onSuccess: (data) => {
                window.location.href = options.callback + '?transaction_id=' + data.transaction_id + '&status=SUCCESS';
            },
            onClose: () => console.log('Widget fermé'));
        });
    }
</script>
<script>
    function saveCustomerAndPay() {
        const form = document.getElementById('customer-form');
        const formData = new FormData(form);

        // Sauvegarde en session via une route temporaire
        fetch('{{ route('cart.save-customer') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(() => {
            // Puis on lance le paiement
            openKkiapayWidget({
                amount: {{ $total }},
                key: '{{ $kkiapayPublicKey }}',
                sandbox: {{ $kkiapaySandbox ? 'true' : 'false' }},
                callback: '{{ route('kkiapay.callback') }}',
                data: 'komora-campus-order-{{ Str::random(8) }}',
                theme: '#0A4D68'
            });
        });
    }
</script>
</body>
</html>