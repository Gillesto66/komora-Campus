<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Page Abonnement - KOMORA Campus</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
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
              "display": ["Lexend", "sans-serif"]
            },
            borderRadius: {"DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
          },
        },
      }
    </script>
<style>
      .material-symbols-outlined {
        font-variation-settings:
        'FILL' 1,
        'wght' 400,
        'GRAD' 0,
        'opsz' 20
      }
    </style>
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-[#0d121b] dark:text-gray-200">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col w-full max-w-[960px] flex-1">
<!-- TopNavBar -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-gray-200 dark:border-gray-700 px-10 py-3">
<div class="flex items-center gap-4 text-[#0d121b] dark:text-white">
<div class="size-6 text-primary">
<svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path d="M4 42.4379C4 42.4379 14.0962 36.0744 24 41.1692C35.0664 46.8624 44 42.2078 44 42.2078L44 7.01134C44 7.01134 35.068 11.6577 24.0031 5.96913C14.0971 0.876274 4 7.27094 4 7.27094L4 42.4379Z" fill="currentColor"></path>
</svg>
</div>
<h2 class="text-[#0d121b] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">KOMORA Campus</h2>
</div>
<div class="flex flex-1 justify-end gap-8">
<div class="hidden md:flex items-center gap-9">
<a class="text-[#0d121b] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="#">Accueil</a>
<a class="text-primary dark:text-primary text-sm font-medium leading-normal" href="#">Abonnement</a>
<a class="text-[#0d121b] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="#">Annales</a>
<a class="text-[#0d121b] dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="#">Blog</a>
</div>
<div class="flex gap-2">
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90">
<span class="truncate">S'inscrire</span>
</button>
<button class="hidden sm:flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-gray-200 dark:bg-gray-700 text-[#0d121b] dark:text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-gray-300 dark:hover:bg-gray-600">
<span class="truncate">Se connecter</span>
</button>
</div>
</div>
</header>
<main class="flex flex-col gap-8 md:gap-12 py-10 md:py-16">
<!-- PageHeading -->
<div class="flex flex-wrap justify-between gap-3 p-4 text-center items-center flex-col">
<div class="flex min-w-72 flex-col gap-3">
<p class="text-[#0d121b] dark:text-white text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em]">Choisissez votre plan d'accès illimité</p>
<p class="text-[#4c669a] dark:text-gray-400 text-base md:text-lg font-normal leading-normal max-w-2xl mx-auto">Accédez à des milliers de documents, sujets et corrigés pour réussir vos études.</p>
</div>
</div>
<!-- SegmentedButtons -->
<div class="flex px-4 py-3 justify-center">
<div class="flex h-10 w-full max-w-sm items-center justify-center rounded-lg bg-gray-200 dark:bg-gray-800 p-1">
<label class="flex cursor-pointer h-full grow items-center justify-center overflow-hidden rounded-md px-2 has-[:checked]:bg-white dark:has-[:checked]:bg-gray-700 has-[:checked]:shadow-sm has-[:checked]:text-[#0d121b] dark:has-[:checked]:text-white text-[#4c669a] dark:text-gray-400 text-sm font-medium leading-normal transition-colors duration-200">
<span class="truncate">Mensuel</span>
<input class="invisible w-0" name="plan-toggle" type="radio" value="Mensuel"/>
</label>
<label class="flex cursor-pointer h-full grow items-center justify-center overflow-hidden rounded-md px-2 has-[:checked]:bg-white dark:has-[:checked]:bg-gray-700 has-[:checked]:shadow-sm has-[:checked]:text-[#0d121b] dark:has-[:checked]:text-white text-[#4c669a] dark:text-gray-400 text-sm font-medium leading-normal transition-colors duration-200">
<span class="truncate">Annuel (-20%)</span>
<input checked="" class="invisible w-0" name="plan-toggle" type="radio" value="Annuel (-20%)"/>
</label>
</div>
</div>
<!-- PricingCards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4 py-3">
<div class="flex flex-1 flex-col gap-6 rounded-xl border border-solid border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800/50 p-6 transition-shadow duration-200 hover:shadow-lg">
<div class="flex flex-col gap-2">
<h1 class="text-[#0d121b] dark:text-white text-lg font-bold leading-tight">Mensuel</h1>
<p class="flex items-baseline gap-1 text-[#0d121b] dark:text-white">
<span class="text-4xl font-black leading-tight tracking-[-0.033em]">9,99€</span>
<span class="text-base font-bold leading-tight">/mois</span>
</p>
</div>
<button class="flex w-full min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-gray-200 dark:bg-gray-700 text-[#0d121b] dark:text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-gray-300 dark:hover:bg-gray-600">
<span class="truncate">Choisir ce plan</span>
</button>
<div class="flex flex-col gap-3">
<div class="text-[13px] font-normal leading-normal flex gap-3 items-center text-[#0d121b] dark:text-gray-300">
<span class="material-symbols-outlined text-primary text-xl">check_circle</span> Accès illimité à la bibliothèque
                                    </div>
<div class="text-[13px] font-normal leading-normal flex gap-3 items-center text-[#0d121b] dark:text-gray-300">
<span class="material-symbols-outlined text-primary text-xl">check_circle</span> Téléchargements sécurisés
                                    </div>
<div class="text-[13px] font-normal leading-normal flex gap-3 items-center text-[#0d121b] dark:text-gray-300">
<span class="material-symbols-outlined text-primary text-xl">check_circle</span> Accès aux nouveautés
                                    </div>
</div>
</div>
<div class="relative flex flex-1 flex-col gap-6 rounded-xl border-2 border-solid border-primary bg-white dark:bg-gray-800/50 p-6 shadow-lg">
<div class="absolute -top-3.5 left-1/2 -translate-x-1/2">
<p class="text-white text-xs font-medium leading-normal tracking-[0.015em] rounded-full bg-primary px-3 py-[3px] text-center">Meilleure offre</p>
</div>
<div class="flex flex-col gap-2">
<h1 class="text-[#0d121b] dark:text-white text-lg font-bold leading-tight">Annuel</h1>
<p class="flex items-baseline gap-1 text-[#0d121b] dark:text-white">
<span class="text-4xl font-black leading-tight tracking-[-0.033em]">79,99€</span>
<span class="text-base font-bold leading-tight">/an</span>
</p>
</div>
<button class="flex w-full min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90">
<span class="truncate">Commencer</span>
</button>
<div class="flex flex-col gap-3">
<div class="text-[13px] font-normal leading-normal flex gap-3 items-center text-[#0d121b] dark:text-gray-300">
<span class="material-symbols-outlined text-primary text-xl">check_circle</span> Accès illimité à la bibliothèque
                                    </div>
<div class="text-[13px] font-normal leading-normal flex gap-3 items-center text-[#0d121b] dark:text-gray-300">
<span class="material-symbols-outlined text-primary text-xl">check_circle</span> Téléchargements sécurisés
                                    </div>
<div class="text-[13px] font-normal leading-normal flex gap-3 items-center text-[#0d121b] dark:text-gray-300">
<span class="material-symbols-outlined text-primary text-xl">check_circle</span> Accès aux nouveautés
                                    </div>
<div class="text-[13px] font-normal leading-normal flex gap-3 items-center text-[#0d121b] dark:text-gray-300">
<span class="material-symbols-outlined text-primary text-xl">check_circle</span> Support prioritaire
                                    </div>
<div class="text-[13px] font-normal leading-normal flex gap-3 items-center text-[#0d121b] dark:text-gray-300">
<span class="material-symbols-outlined text-primary text-xl">check_circle</span> Économisez 20% par an
                                    </div>
</div>
</div>
<div class="flex flex-1 flex-col gap-6 rounded-xl border border-solid border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800/50 p-6 transition-shadow duration-200 hover:shadow-lg">
<div class="flex flex-col gap-2">
<h1 class="text-[#0d121b] dark:text-white text-lg font-bold leading-tight">Trimestriel</h1>
<p class="flex items-baseline gap-1 text-[#0d121b] dark:text-white">
<span class="text-4xl font-black leading-tight tracking-[-0.033em]">24,99€</span>
<span class="text-base font-bold leading-tight">/trimestre</span>
</p>
</div>
<button class="flex w-full min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-gray-200 dark:bg-gray-700 text-[#0d121b] dark:text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-gray-300 dark:hover:bg-gray-600">
<span class="truncate">Choisir ce plan</span>
</button>
<div class="flex flex-col gap-3">
<div class="text-[13px] font-normal leading-normal flex gap-3 items-center text-[#0d121b] dark:text-gray-300">
<span class="material-symbols-outlined text-primary text-xl">check_circle</span> Accès illimité à la bibliothèque
                                    </div>
<div class="text-[13px] font-normal leading-normal flex gap-3 items-center text-[#0d121b] dark:text-gray-300">
<span class="material-symbols-outlined text-primary text-xl">check_circle</span> Téléchargements sécurisés
                                    </div>
<div class="text-[13px] font-normal leading-normal flex gap-3 items-center text-[#0d121b] dark:text-gray-300">
<span class="material-symbols-outlined text-primary text-xl">check_circle</span> Accès aux nouveautés
                                    </div>
<div class="text-[13px] font-normal leading-normal flex gap-3 items-center text-[#0d121b] dark:text-gray-300">
<span class="material-symbols-outlined text-primary text-xl">check_circle</span> Support prioritaire
                                    </div>
</div>
</div>
</div>
<!-- FAQ Section -->
<div class="flex flex-col gap-6 px-4 py-8">
<h4 class="text-[#4c669a] dark:text-gray-400 text-sm font-bold leading-normal tracking-[0.015em] px-4 py-2 text-center uppercase">Questions fréquentes</h4>
<div class="max-w-3xl mx-auto w-full flex flex-col gap-3">
<details class="group bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-200 dark:border-gray-700 cursor-pointer">
<summary class="flex items-center justify-between font-semibold text-base text-[#0d121b] dark:text-white">
                                        Comment fonctionne la facturation ?
                                        <span class="material-symbols-outlined transition-transform duration-200 group-open:rotate-180">expand_more</span>
</summary>
<p class="mt-2 text-[#4c669a] dark:text-gray-400 text-sm">
                                        Votre abonnement est renouvelé automatiquement à la fin de chaque période de facturation (mensuelle, trimestrielle ou annuelle). Vous pouvez gérer votre abonnement à tout moment depuis votre espace personnel.
                                    </p>
</details>
<details class="group bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-200 dark:border-gray-700 cursor-pointer">
<summary class="flex items-center justify-between font-semibold text-base text-[#0d121b] dark:text-white">
                                        Puis-je annuler mon abonnement à tout moment ?
                                        <span class="material-symbols-outlined transition-transform duration-200 group-open:rotate-180">expand_more</span>
</summary>
<p class="mt-2 text-[#4c669a] dark:text-gray-400 text-sm">
                                        Oui, vous pouvez annuler votre abonnement à tout moment. Vous conserverez l'accès à tous les documents jusqu'à la fin de votre période de facturation en cours.
                                    </p>
</details>
<details class="group bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-200 dark:border-gray-700 cursor-pointer">
<summary class="flex items-center justify-between font-semibold text-base text-[#0d121b] dark:text-white">
                                        Quels sont les moyens de paiement acceptés ?
                                        <span class="material-symbols-outlined transition-transform duration-200 group-open:rotate-180">expand_more</span>
</summary>
<p class="mt-2 text-[#4c669a] dark:text-gray-400 text-sm">
                                        Nous acceptons les principales cartes de crédit (Visa, MasterCard, American Express) ainsi que les paiements via PayPal pour une transaction sécurisée et simplifiée.
                                    </p>
</details>
</div>
</div>
</main>
</div>
</div>
</div>
</div>
</body></html>