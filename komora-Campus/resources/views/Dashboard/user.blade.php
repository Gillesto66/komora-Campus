<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Espace Utilisateur - KOMORA Campus</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
          fontFamily: {
            "display": ["Inter", "sans-serif"]
          },
          borderRadius: {
            "DEFAULT": "0.5rem",
            "lg": "1rem",
            "xl": "1.5rem",
            "full": "9999px"
          },
        },
      },
    }
  </script>
<style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      line-height: 1;
    }
    .material-symbols-outlined.fill {
      font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
  </style>
</head>
<body class="font-display bg-background-light dark:bg-background-dark">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-row">
<!-- SideNavBar -->
<aside class="flex flex-col w-64 bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 p-4 shrink-0">
<div class="flex items-center gap-3 p-2 mb-6">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="KOMORA Campus company logo" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDOrS-7Bj5TCH6I4aycJT3YVJl6eNSdmZXWDrp669qeAI0K7vZF6xVaqpbu11_42UqTO9TpXW_KvwWf4unLk_01KacS7ffRRh_F_BXFEoI72bPF1A_UPm7OAG6q-qQTB-Q1Z05_35xDvbzcJS9lW6R6HKDEtO7WHeOFt8r5v0HMPNnWvMWkq5rNnBSp-B7_01KGe0OOl2OKo6MvfcmmXnDZhIYFYVVVVC6ccDKxdGq0rK6XzX-YInYTj35TXqeuNaZip8N-X53innw");'></div>
<h1 class="text-gray-900 dark:text-white text-base font-bold leading-normal">KOMORA Campus</h1>
</div>
<nav class="flex flex-col gap-2">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 dark:bg-primary/20" href="#">
<span class="material-symbols-outlined fill text-primary dark:text-primary">dashboard</span>
<p class="text-primary dark:text-white text-sm font-semibold leading-normal">Dashboard</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800" href="#">
<span class="material-symbols-outlined text-gray-600 dark:text-gray-400">folder</span>
<p class="text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal">Mes Fichiers</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800" href="#">
<span class="material-symbols-outlined text-gray-600 dark:text-gray-400">credit_card</span>
<p class="text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal">Abonnement</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800" href="#">
<span class="material-symbols-outlined text-gray-600 dark:text-gray-400">settings</span>
<p class="text-gray-800 dark:text-gray-200 text-sm font-medium leading-normal">Paramètres</p>
</a>
<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
  Déconnexion
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</nav>
</aside>
<!-- Main Content -->
<main class="flex-1 bg-background-light dark:bg-background-dark">
<!-- TopNavBar -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 px-10 py-3 sticky top-0 z-10">
<label class="flex flex-col min-w-40 !h-10 max-w-sm">
<div class="flex w-full flex-1 items-stretch rounded-lg h-full">
<div class="text-gray-500 dark:text-gray-400 flex border-none bg-gray-100 dark:bg-gray-800 items-center justify-center pl-4 rounded-l-lg border-r-0">
<span class="material-symbols-outlined">search</span>
</div>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-gray-900 dark:text-white focus:outline-0 focus:ring-0 border-none bg-gray-100 dark:bg-gray-800 focus:border-none h-full placeholder:text-gray-500 dark:placeholder:text-gray-400 pl-2 text-sm font-normal leading-normal" placeholder="Rechercher dans mes fichiers..." value=""/>
</div>
</label>
<div class="flex flex-1 justify-end items-center gap-4">
<button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full size-10 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700">
<span class="material-symbols-outlined">notifications</span>
</button>
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDCp7x0YSqMkFA4_kTiBGKidPOIVfCBkiRk6KueVcHPk3KdGZ89ti1AN_CC1tJrT_uc00365gpbM5_7zERAqxu7WvaFEAUQ2ne706C_1bOA7TPR7vKtU4G2rSLZUqK6YXqcGHMKUVkaGLqI6CPJJGISdleZSX-NlbjK7IKqtSyJYS_jznLfS-0S8CdVLlcJm3Ub1yM1udEorklFwpoz2QXkYWtYq5ywxRCcD8j4Kcs2uZ126rpxGBs1jHYDaZMLgVnTiGd81uezVqo");'></div>
</div>
</header>
<div class="p-10">
<!-- PageHeading -->
<div class="flex flex-wrap justify-between gap-3 mb-8">
<h1 class="text-gray-900 dark:text-white text-3xl font-bold leading-tight tracking-tight min-w-72">Bienvenue, {{ $user->name }}!</h1>
</div>
<!-- Stats -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 shadow-sm">
<p class="text-gray-600 dark:text-gray-400 text-sm font-medium leading-normal">Crédits Restants</p>
<p class="text-gray-900 dark:text-white tracking-tight text-3xl font-bold leading-tight">
    {{ $purchasedProducts->count() }}
</p>
</div>
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 shadow-sm">
<p class="text-gray-600 dark:text-gray-400 text-sm font-medium leading-normal">Abonnement Actuel</p>
<p class="text-gray-900 dark:text-white tracking-tight text-3xl font-bold leading-tight">Premium</p>
</div>
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 shadow-sm">
<p class="text-gray-600 dark:text-gray-400 text-sm font-medium leading-normal">Fichiers Achetés</p>
<p class="text-gray-900 dark:text-white tracking-tight text-3xl font-bold leading-tight">28</p>
</div>
</div>
<!-- SectionHeader -->
<h2 class="text-gray-900 dark:text-white text-xl font-bold leading-tight tracking-tight mb-4">Mes derniers achats</h2>
<!-- Recent Purchases Table -->
<div class="w-full bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<thead class="text-xs text-gray-700 dark:text-gray-300 uppercase bg-gray-50 dark:bg-gray-800">
<tr>
<th class="px-6 py-3 font-semibold" scope="col">Nom du fichier</th>
<th class="px-6 py-3 font-semibold" scope="col">Date d'achat</th>
<th class="px-6 py-3 font-semibold" scope="col">Prix</th>
<th class="px-6 py-3 font-semibold text-right" scope="col">Action</th>
</tr>
</thead>
<tbody>
@forelse($purchasedProducts as $product)
    <tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
        <th class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap" scope="row">
            {{ $product->title }}
        </th>
        <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
            {{ $product->purchase->created_at }}
            <!-- ou si tu veux garder purchased_at : -->
            {{ $product->purchase->created_at }}
        </td>
        <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
            {{ number_format($product->price_cfa) }} FCFA
        </td>
        <td class="px-6 py-4 text-right">
            <a href="{{ route('download.file', $product->id) }}"
               class="flex items-center gap-2 justify-center ml-auto px-4 py-2 text-sm font-semibold text-white bg-primary rounded-lg hover:bg-primary/90 transition">
                <span class="material-symbols-outlined text-base">download</span>
                Télécharger
            </a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
            Vous n'avez pas encore acheté de fichiers.<br>
            <a href="{{ route('products.index') }}" class="text-primary hover:underline font-medium">
                Découvrir le catalogue →
            </a>
        </td>
    </tr>
@endforelse
</tbody>
</table>
</div>
<div class="p-4 border-t border-gray-200 dark:border-gray-800 text-center">
<a class="text-sm font-semibold text-primary dark:text-primary hover:underline" href="#">Voir tout l'historique</a>
</div>
</div>
</div>
</main>
</div>
</div>
</body></html>