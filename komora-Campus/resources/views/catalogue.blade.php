<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Page Catalogue avec Filtres - KOMORA Campus</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style>
        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 24
        }
    </style>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "primary": "#135bec",
              "background-light": "#f6f6f8",
              "background-dark": "#101622",
            },
            fontFamily: {
              "display": ["Inter", "sans-serif"]
            },
            borderRadius: {"DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
          },
        },
      }
    </script>
</head>
<body class="bg-background-light dark:bg-background-dark font-display">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<header class="sticky top-0 z-50 w-full border-b border-[#e7ebf3] dark:border-background-dark/20 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md">
<div class="flex items-center justify-between whitespace-nowrap px-4 sm:px-6 lg:px-10 py-3 max-w-7xl mx-auto">
<div class="flex items-center gap-8">
<div class="flex items-center gap-3 text-[#0d121b] dark:text-white">
<div class="size-6 text-primary">
<svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path d="M4 42.4379C4 42.4379 14.0962 36.0744 24 41.1692C35.0664 46.8624 44 42.2078 44 42.2078L44 7.01134C44 7.01134 35.068 11.6577 24.0031 5.96913C14.0971 0.876274 4 7.27094 4 7.27094L4 42.4379Z" fill="currentColor"></path>
</svg>
</div>
<h2 class="text-[#0d121b] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">KOMORA Campus</h2>
</div>
<div class="hidden md:flex items-center gap-9">
<a class="text-[#4c669a] dark:text-slate-400 text-sm font-medium leading-normal hover:text-primary dark:hover:text-white" href="#">Accueil</a>
<a class="text-[#0d121b] dark:text-white text-sm font-bold leading-normal" href="#">Catalogue</a>
<a class="text-[#4c669a] dark:text-slate-400 text-sm font-medium leading-normal hover:text-primary dark:hover:text-white" href="#">FAQ</a>
<a href="{{ route('auth') }}"><span class="truncate">Connexion / S'inscrire</span></a>
<a class="text-[#4c669a] dark:text-slate-400 text-sm font-medium leading-normal hover:text-primary dark:hover:text-white" href="#">Contact</a>
</div>
</div>
<div class="flex flex-1 justify-end gap-3 sm:gap-4">
<label class="hidden sm:flex flex-col min-w-40 !h-10 max-w-64">
<div class="flex w-full flex-1 items-stretch rounded-lg h-full">
<div class="text-[#4c669a] dark:text-slate-400 flex border-none bg-[#e7ebf3] dark:bg-background-dark/50 items-center justify-center pl-3 rounded-l-lg border-r-0">
<span class="material-symbols-outlined !text-2xl">search</span>
</div>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-[#0d121b] dark:text-white focus:outline-0 focus:ring-0 border-none bg-[#e7ebf3] dark:bg-background-dark/50 h-full placeholder:text-[#4c669a] dark:placeholder:text-slate-400 px-2 text-base font-normal leading-normal" placeholder="Rechercher..." value=""/>
</div>
</label>
<button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-transparent text-[#0d121b] dark:text-white dark:hover:bg-primary/20 hover:bg-primary/10 gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
<span class="material-symbols-outlined">shopping_cart</span>
</button>
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User profile picture" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDOgsfoXu-JqKn18WN1LKHKKq64w4nwlatbC_Blk5_zTQ1MwmZPY49TLihYJsb4kU1Xd7SjSiDxMJC4IlFuMZ0xNKr9T5njJmG42smTU2du5qJaSE7NL5D3daK5eEh2WIXJhRLN0KGPncaWk88ZoVvBMJ1_EcZAckDt_zlaf2WRduG9y9LnyjyJdCp-rPLdhjJ4u3ijpymW1ToYSzA-y0QRMLrCvPpv0hKyIO0NQygY2ufvkKXragn1-cfqwU8VUCWZOBKjwyFYJCo");'></div>
</div>
</div>
</header>
<main class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-8">
<div class="flex flex-col gap-8 lg:flex-row">
<!-- Left Sidebar: Filters -->
<!-- ================== FILTRES GAUCHE ================== -->
<aside class="flex flex-col w-full lg:w-1/4 lg:max-w-xs shrink-0 gap-6">
    <div class="flex flex-col gap-4">
        <h3 class="text-xl font-bold text-[#0d121b] dark:text-white">Affiner votre recherche</h3>
        
        <!-- FILTRE FILIÈRE -->
        <details class="filter-card">
            <summary>Filière</summary>
            <div class="pb-2">
                @foreach($filieres as $filiere)
                <label class="filter-option">
                    <input type="radio" name="filiere" class="filter-input filiere" value="{{ $filiere->id }}">
                    <p>{{ $filiere->name }}</p>
                </label>
                @endforeach
            </div>
        </details>

        <!-- FILTRE NIVEAU -->
        <details class="filter-card" id="niveau-box">
            <summary>Niveau</summary>
            <div class="pb-2" id="niveau-options">
                <p class="text-slate-400 text-sm">Sélectionnez une filière d’abord</p>
            </div>
        </details>

        <!-- FILTRE MATIÈRE -->
        <details class="filter-card" id="matiere-box">
            <summary>Matière</summary>
            <div class="pb-2" id="matiere-options">
                <p class="text-slate-400 text-sm">Sélectionnez un niveau d’abord</p>
            </div>
        </details>

        <!-- FILTRE SEMESTRE -->
        <details class="filter-card">
            <summary>Semestre</summary>
            <div class="pb-2">
                <label class="filter-option"><input type="radio" name="semestre" class="filter-input" value="pair"> Pair</label>
                <label class="filter-option"><input type="radio" name="semestre" class="filter-input" value="impair"> Impair</label>
            </div>
        </details>
    </div>

    <div class="flex flex-col gap-2">
        <button id="applyFilters" class="btn-primary">Appliquer les filtres</button>
        <button id="resetFilters" class="btn-reset">Réinitialiser</button>
    </div>
</aside>
<!-- Right Side: Content -->

<div class="flex flex-col flex-1 gap-6">

    <!-- Breadcrumb -->
    <div class="flex flex-wrap gap-2">
        <a class="text-[#4c669a] dark:text-slate-400 text-base font-medium leading-normal" href="{{ route('home') }}">Accueil</a>
        <span class="text-[#4c669a] dark:text-slate-400 text-base font-medium leading-normal">/</span>
        <span class="text-[#0d121b] dark:text-white text-base font-medium leading-normal">Catalogue</span>
    </div>

    <!-- Title + Count -->
    <div class="flex flex-wrap justify-between gap-4">
        <div class="flex min-w-72 flex-col gap-2">
            <p class="text-[#0d121b] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Catalogue des Annales</p>
            <p class="text-[#4c669a] dark:text-slate-400 text-base font-normal leading-normal">
                {{ $searchCount }} résultats trouvés
            </p>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">

        @forelse($products as $product)
        <div class="flex flex-col bg-white dark:bg-background-dark/50 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-800 hover:shadow-lg dark:hover:border-primary/50 transition-all duration-300">

            <div class="w-full h-40 bg-cover bg-center"
                style="background-image: url('{{ $product->image_url }}')"></div>

            <div class="p-5 flex flex-col flex-1">
                <h4 class="text-lg font-bold text-[#0d121b] dark:text-white">{{ $product->title }}</h4>

                <div class="flex items-center gap-2 mt-2 mb-4">
                    <span class="text-xs font-semibold {{ $product->type === 'semestre' ? 'text-amber-600 bg-amber-100 dark:text-amber-400 dark:bg-amber-900/40' : 'text-primary bg-primary/20' }} py-1 px-2.5 rounded-full">
                        {{ $product->niveau_name }}
                    </span>
                    <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 py-1 px-2.5 rounded-full">
                        {{ $product->period }}
                    </span>
                </div>

                <div class="mt-auto">
                    <a href="{{ route('product.show', $product->id) }}"
                        class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold hover:bg-primary/90">
                        Voir / Acheter - {{ number_format($product->price, 2, ',', '.') }}€
                    </a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-gray-500 col-span-full">Aucun produit trouvé</p>
        @endforelse

    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-center pt-8">
        {{ $products->links() }}
    </div>

</div>

</div>
</main>
</div>
</body>
</html>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const filiereSelect = document.getElementById("filiere");
    const niveauSelect  = document.getElementById("niveau");
    const matiereSelect = document.getElementById("matiere");

    // 🔵 Quand FILIÈRE change → Charger niveaux
    filiereSelect.addEventListener("change", function () {
        let filiereId = this.value;

        niveauSelect.innerHTML = '<option value="">-- Charger... --</option>';
        matiereSelect.innerHTML = '<option value="">-- Sélectionner un niveau d\'abord --</option>';

        if (filiereId === "") return;

        fetch(`/niveaux/${filiereId}`)
            .then(res => res.json())
            .then(data => {
                niveauSelect.innerHTML = '<option value="">-- Sélectionner Niveau --</option>';
                data.forEach(n => {
                    niveauSelect.innerHTML += `<option value="${n.id}">${n.name}</option>`;
                });
            });
    });

    // 🔴 Quand NIVEAU change → Charger matières
    niveauSelect.addEventListener("change", function () {
        let niveauId = this.value;

        matiereSelect.innerHTML = '<option value="">-- Charger... --</option>';

        if (niveauId === "") return;

        fetch(`matieres/${niveauId}`)
            .then(res => res.json())
            .then(data => {
                matiereSelect.innerHTML = '<option value="">-- Sélectionner Matière --</option>';
                data.forEach(m => {
                    matiereSelect.innerHTML += `<option value="${m.id}">${m.name}</option>`;
                });
            });
    });

});
</script>

