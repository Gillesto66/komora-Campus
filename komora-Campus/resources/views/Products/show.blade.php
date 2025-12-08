<!DOCTYPE html>
<html class="light" lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $product->title }} - KOMORA Campus</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#135bec",
                        "background-light": "#f6f6f8",
                        "background-dark": "#101622",
                    },
                    fontFamily: { "display": ["Inter", "sans-serif"] },
                    borderRadius: {"DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-[#1D2939] dark:text-gray-200">
<div class="relative flex min-h-screen w-full flex-col">

    <!-- TopNavBar -->
    <header class="sticky top-0 z-10 w-full border-b border-solid border-gray-200/80 dark:border-gray-800/80 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between whitespace-nowrap px-4 py-3 sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 text-[#0d121b] dark:text-white">
                <div class="h-6 w-6 text-primary">
                    <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 42.4379C4 42.4379 14.0962 36.0744 24 41.1692C35.0664 46.8624 44 42.2078 44 42.2078L44 7.01134C44 7.01134 35.068 11.6577 24.0031 5.96913C14.0971 0.876274 4 7.27094 4 7.27094L4 42.4379Z" fill="currentColor"></path>
                    </svg>
                </div>
                <h2 class="text-lg font-bold tracking-[-0.015em]">KOMORA Campus</h2>
            </div>
            <div class="hidden items-center gap-9 md:flex">
                <a class="text-sm font-medium text-gray-700 hover:text-primary dark:text-gray-300 dark:hover:text-primary" href="{{ route('home') }}">Annales</a>
                <a class="text-sm font-medium text-gray-700 hover:text-primary dark:text-gray-300 dark:hover:text-primary" href="#">Packs</a>
                <a class="text-sm font-medium text-gray-700 hover:text-primary dark:text-gray-300 dark:hover:text-primary" href="{{ route('catalogue') }}">Filières</a>
                <a class="text-sm font-medium text-gray-700 hover:text-primary dark:text-gray-300 dark:hover:text-primary" href="#">Contact</a>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('login') }}" class="flex h-10 min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-primary px-4 text-sm font-bold text-white transition-opacity hover:opacity-90">
                    <span class="truncate">Connexion</span>
                </a>
                <button class="flex h-10 w-10 cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-gray-200/60 text-gray-800 transition-colors hover:bg-gray-200 dark:bg-gray-800/60 dark:text-gray-200 dark:hover:bg-gray-800">
                    <span class="material-symbols-outlined text-xl">shopping_cart</span>
                </button>
            </div>
        </div>
    </header>

    <main class="mx-auto w-full max-w-7xl flex-1 px-4 py-8 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-8">

            <!-- Breadcrumbs -->
            <div class="flex flex-wrap items-center gap-2 text-sm font-medium">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-primary dark:text-gray-400 dark:hover:text-primary">Accueil</a>
                <span class="text-gray-500 dark:text-gray-400">/</span>
                <a href="{{ route('catalogue') }}" class="text-gray-500 hover:text-primary dark:text-gray-400 dark:hover:text-primary">
                    {{ $product->matiere?->niveau?->filiere?->name ?? 'Filière' }}
                </a>
                <span class="text-gray-500 dark:text-gray-400">/</span>
                <a href="#" class="text-gray-500 hover:text-primary dark:text-gray-400 dark:hover:text-primary">
                    {{ $product->matiere?->niveau?->name ?? 'Niveau' }}
                </a>
                <span class="text-gray-500 dark:text-gray-400">/</span>
                <span class="text-[#0d121b] dark:text-white">{{ $product->matiere?->name ?? 'Matière' }}</span>
            </div>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-5 lg:gap-12">

                <!-- Left Column: PDF Preview -->
                <div class="lg:col-span-3">
                    <div class="sticky top-28">
                        <div class="relative flex items-center justify-center rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900 overflow-hidden">
                            @if($product->preview_path)
                                <img src="{{ asset('storage/' . $product->preview_path) }}" alt="Aperçu {{ $product->title }}"
                                     class="absolute inset-0 h-full w-full object-cover opacity-10 blur-sm dark:opacity-20">
                            @endif

                            <div class="relative z-10 flex aspect-[4/3] w-full flex-col items-center justify-center p-4">
                                <h3 class="mb-2 text-lg font-bold text-[#0d121b] dark:text-white">Aperçu du PDF</h3>
                                <p class="mb-4 text-sm text-gray-600 dark:text-gray-400">Survolez pour interagir</p>

                                <div class="relative w-full max-w-sm rounded-lg border border-gray-300 bg-white/50 p-6 shadow-lg backdrop-blur-sm dark:border-gray-700 dark:bg-black/20">
                                    <div class="absolute inset-0 flex items-center justify-center bg-black/50 opacity-0 transition-opacity hover:opacity-100 rounded-lg">
                                        <a href="{{ asset('storage/' . $product->file_path) }}" target="_blank"
                                           class="flex shrink-0 items-center justify-center rounded-full bg-primary/80 text-white size-16">
                                            <span class="material-symbols-outlined text-4xl">visibility</span>
                                        </a>
                                    </div>
                                    <p class="text-xs font-bold uppercase text-primary">KOMORA CAMPUS</p>
                                    <h4 class="mt-2 text-base font-bold text-[#0d121b] dark:text-white">{{ $product->title }}</h4>
                                    <p class="mt-2 text-xs leading-relaxed text-gray-600 dark:text-gray-400">
                                        {{ Str::limit($product->description, 150) }}
                                    </p>
                                    <div class="mt-4 h-1 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                                        <div class="h-1 w-1/3 rounded-full bg-primary"></div>
                                    </div>
                                </div>

                                <div class="absolute bottom-4 right-4 flex gap-2">
                                    <button class="flex h-8 w-8 items-center justify-center rounded-full bg-white/80 shadow dark:bg-gray-800/80"><span class="material-symbols-outlined text-lg">chevron_left</span></button>
                                    <button class="flex h-8 w-8 items-center justify-center rounded-full bg-white/80 shadow dark:bg-gray-800/80"><span class="material-symbols-outlined text-lg">chevron_right</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Product Details -->
                <div class="lg:col-span-2">
                    <div class="flex flex-col gap-6">

                        <h1 class="text-4xl font-black leading-tight tracking-[-0.033em] text-[#0d121b] dark:text-white">
                            {{ $product->is_corrected ? 'Annales Corrigées' : 'Sujets d\'examen' }} - {{ $product->title }}
                        </h1>

                        <div class="flex flex-wrap gap-2">
                            <div class="flex h-8 items-center justify-center rounded-full bg-primary/10 px-3 text-primary dark:bg-primary/20 dark:text-blue-300">
                                <p class="text-sm font-medium">Matière: {{ $product->matiere?->name }}</p>
                            </div>
                            <div class="flex h-8 items-center justify-center rounded-full bg-gray-200 px-3 dark:bg-gray-800">
                                <p class="text-sm font-medium text-gray-800 dark:text-gray-300">
                                    Filière: {{ $product->matiere?->niveau?->filiere?->name }} {{ $product->matiere?->niveau?->name }}
                                </p>
                            </div>
                            <div class="flex h-8 items-center justify-center rounded-full bg-gray-200 px-3 dark:bg-gray-800">
                                <p class="text-sm font-medium text-gray-800 dark:text-gray-300">Année: {{ $product->period }}</p>
                            </div>
                        </div>

                        <div class="prose prose-sm max-w-none text-gray-600 dark:text-gray-400">
                            <p>{!! nl2br(e($product->description)) !!}</p>
                        </div>

                        @if($product->period)
                            <div>
                                <h3 class="text-md font-bold text-[#0d121b] dark:text-white">Années incluses :</h3>
                                <div class="mt-3 grid grid-cols-3 gap-2 text-center sm:grid-cols-4">
                                    @foreach(explode('-', $product->period) as $year)
                                        <div class="rounded-md border border-gray-300 bg-white p-2 text-sm font-semibold dark:border-gray-700 dark:bg-gray-800">
                                            {{ trim($year) }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-lg dark:border-gray-800 dark:bg-gray-900">
                            <div class="flex items-baseline justify-between">
                                <span class="text-3xl font-bold text-[#0d121b] dark:text-white">
                                    {{ $product->price_cfa ?? number_format($product->price_euro / 655.957, 2) }}FCFA
                                </span>
                                <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                    <div class="flex items-center gap-1.5">
                                      <span class="material-symbols-outlined text-base">description</span>
                                      <span>{{ $product->pages_count ? $product->pages_count . ' pages' : '—' }}</span>
                                  </div>
                                  <div class="flex items-center gap-1.5">
                                      <span class="material-symbols-outlined text-base">folder</span>
                                      <span>{{ $product->file_size_formatted }}</span>
                                  </div>
                                </div>
                            </div>

                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                                @csrf
                                <button type="submit" class="flex w-full h-12 cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-lg bg-primary text-base font-bold text-white transition-transform hover:scale-[1.02]">
                                    <span class="material-symbols-outlined">shopping_cart</span>
                                    <span>Acheter maintenant</span>
                                </button>
                            </form>

                            <div class="mt-4 flex items-center justify-center gap-2 text-xs text-gray-500 dark:text-gray-400">
                                <span class="material-symbols-outlined text-base">lock</span>
                                <span>Paiement 100% sécurisé</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produits Complémentaires (Related) -->
            @if($related->count() > 0)
                <div class="mt-12 border-t border-gray-200 pt-12 dark:border-gray-800">
                    <h2 class="text-2xl font-bold tracking-tight text-[#0d121b] dark:text-white">Produits Complémentaires</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Optimisez vos révisions avec ces ressources similaires.</p>

                    <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($related as $relatedProduct)
                            <div class="flex flex-col overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition-shadow hover:shadow-lg dark:border-gray-800 dark:bg-gray-900">
                                <div class="h-40 bg-cover bg-center" style="background-image: url('{{ $relatedProduct->preview_path ? asset('storage/' . $relatedProduct->preview_path) : '' }}')"></div>
                                <div class="flex flex-1 flex-col p-4">
                                    <h3 class="font-bold text-[#0d121b] dark:text-white">{{ $relatedProduct->title }}</h3>
                                    <p class="mt-1 flex-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ $relatedProduct->matiere?->name }} • {{ $relatedProduct->period }}
                                    </p>
                                    <div class="mt-4 flex items-center justify-between">
                                        <span class="text-lg font-bold text-primary">
                                            {{ $relatedProduct->price_euro ?? number_format($relatedProduct->price_cfa / 655.957, 2) }}€
                                        </span>
                                        <a href="{{ route('product.show', $relatedProduct) }}"
                                           class="flex h-9 cursor-pointer items-center justify-center overflow-hidden rounded-md bg-primary/20 px-3 text-sm font-bold text-primary transition-colors hover:bg-primary/30 dark:bg-primary/30 dark:text-blue-300 dark:hover:bg-primary/40">
                                            Voir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </main>
</div>
</body>
</html>