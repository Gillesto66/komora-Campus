<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>KOMORA Campus - Annales, Sujets et Corrigés Universitaires</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&amp;display=swap" rel="stylesheet"/>
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
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            font-size: 24px;
        }
    </style>
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-gray-900 dark:text-gray-100">
<div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
<!-- TopNavBar -->
<header class="sticky top-0 z-50 flex items-center justify-center border-b border-gray-200/80 dark:border-gray-700/80 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm">
<nav class="flex w-full max-w-7xl items-center justify-between whitespace-nowrap px-4 sm:px-6 lg:px-8 py-3">
<div class="flex items-center gap-4 text-gray-900 dark:text-white">
<div class="size-6 text-primary">
<svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path d="M4 42.4379C4 42.4379 14.0962 36.0744 24 41.1692C35.0664 46.8624 44 42.2078 44 42.2078L44 7.01134C44 7.01134 35.068 11.6577 24.0031 5.96913C14.0971 0.876274 4 7.27094 4 7.27094L4 42.4379Z" fill="currentColor"></path>
</svg>
</div>
<h2 class="text-lg font-bold tracking-tight">KOMORA Campus</h2>
</div>
<div class="hidden md:flex flex-1 items-center justify-end gap-8">
<div class="flex items-center gap-6">
<a class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors" href="#">Accueil</a>
<a class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors" href="#">Filières</a>
<a class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors" href="#">Packs</a>
<a class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors" href="#">Abonnement</a>
<a class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary transition-colors" href="#">Contact</a>
</div>
<button class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold shadow-sm hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary/50">
<span class="truncate">Connexion / S'inscrire</span>
</button>
</div>
<div class="md:hidden">
<button class="p-2 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-800">
<span class="material-symbols-outlined">menu</span>
</button>
</div>
</nav>
</header>
<main class="flex h-full grow flex-col">
<div class="flex flex-1 justify-center py-5 sm:py-10">
<div class="flex w-full max-w-7xl flex-col gap-10 px-4 sm:px-6 lg:px-8">
<!-- HeroSection -->
<section class="@container">
<div class="flex min-h-[480px] flex-col gap-6 rounded-xl bg-cover bg-center bg-no-repeat @[480px]:gap-8 items-center justify-center p-6 text-center" style="background-image: linear-gradient(to right, #1e3a8a, #3b82f6);">
<div class="flex flex-col gap-3">
<h1 class="text-white text-4xl font-black leading-tight tracking-tighter @[480px]:text-5xl">
                                    Accédez aux meilleures ressources pour réussir vos études.
                                </h1>
<h2 class="text-white/80 text-base font-normal leading-normal @[480px]:text-lg max-w-2xl mx-auto">
                                    Annales, sujets et corrigés pour toutes vos matières universitaires.
                                </h2>
</div>
<label class="flex flex-col min-w-40 h-14 w-full max-w-xl @[480px]:h-16 shadow-lg rounded-xl">
<div class="flex w-full flex-1 items-stretch rounded-xl h-full">
<div class="text-gray-500 flex bg-white dark:bg-gray-800 dark:border-gray-700 items-center justify-center pl-4 rounded-l-xl border-y border-l border-gray-200">
<span class="material-symbols-outlined">search</span>
</div>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary/50 border-y border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700 h-full placeholder:text-gray-400 dark:placeholder:text-gray-500 px-4 text-base font-normal" placeholder="Rechercher une matière, année ou filière" value=""/>
<div class="flex items-center justify-center rounded-r-xl border-y border-r border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700 pr-2">
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-white text-sm font-bold tracking-wide @[480px]:text-base hover:bg-primary/90 transition-colors">
<span class="truncate">Rechercher</span>
</button>
</div>
</div>
</label>
</div>
</section>
<!-- TextGrid (Filières) -->
<section>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
<div class="flex flex-1 gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 p-5 flex-col hover:border-primary/50 dark:hover:border-primary/50 hover:shadow-lg transition-all duration-300">
<div class="text-primary"><span class="material-symbols-outlined !text-3xl">balance</span></div>
<div class="flex flex-col gap-1">
<h2 class="text-lg font-bold">Droit</h2>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Tous les sujets et corrigés</p>
</div>
</div>
<div class="flex flex-1 gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 p-5 flex-col hover:border-primary/50 dark:hover:border-primary/50 hover:shadow-lg transition-all duration-300">
<div class="text-primary"><span class="material-symbols-outlined !text-3xl">work</span></div>
<div class="flex flex-col gap-1">
<h2 class="text-lg font-bold">Gestion</h2>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Annales et études de cas</p>
</div>
</div>
<div class="flex flex-1 gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 p-5 flex-col hover:border-primary/50 dark:hover:border-primary/50 hover:shadow-lg transition-all duration-300">
<div class="text-primary"><span class="material-symbols-outlined !text-3xl">code</span></div>
<div class="flex flex-col gap-1">
<h2 class="text-lg font-bold">Informatique</h2>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Projets et examens</p>
</div>
</div>
</div>
</section>
<!-- FeatureSection (Premium) -->
<section class="flex flex-col gap-10 py-10 @container">
<div class="flex flex-col items-start gap-8">
<div class="flex flex-col gap-4">
<h2 class="text-3xl font-bold tracking-tight @[480px]:text-4xl @[480px]:font-black max-w-2xl">
                                    Passez au niveau supérieur avec l'Abonnement Premium
                                </h2>
<p class="text-base font-normal leading-relaxed text-gray-600 dark:text-gray-400 max-w-3xl">
                                    Obtenez un accès illimité à l'ensemble de notre catalogue et profitez de fonctionnalités exclusives pour booster votre réussite.
                                </p>
</div>
<button class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary text-white text-base font-bold shadow-sm hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary/50">
<span class="truncate">Découvrir l'abonnement</span>
</button>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
<div class="flex flex-1 gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 p-5 flex-col">
<div class="text-primary"><span class="material-symbols-outlined !text-3xl">all_inclusive</span></div>
<div class="flex flex-col gap-1">
<h3 class="text-lg font-bold">Accès Illimité</h3>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Consultez et téléchargez toutes les annales sans aucune limite.</p>
</div>
</div>
<div class="flex flex-1 gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 p-5 flex-col">
<div class="text-primary"><span class="material-symbols-outlined !text-3xl">auto_awesome</span></div>
<div class="flex flex-col gap-1">
<h3 class="text-lg font-bold">Contenu Exclusif</h3>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Accédez à des corrigés détaillés et des fiches de révision uniques.</p>
</div>
</div>
<div class="flex flex-1 gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 p-5 flex-col">
<div class="text-primary"><span class="material-symbols-outlined !text-3xl">download</span></div>
<div class="flex flex-col gap-1">
<h3 class="text-lg font-bold">Téléchargements PDF</h3>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Sauvegardez tous les documents dont vous avez besoin pour réviser hors ligne.</p>
</div>
</div>
</div>
</section>
<!-- SectionHeader + Product Grid (Derniers Ajouts) -->
<section class="flex flex-col gap-6">
<h2 class="text-2xl font-bold tracking-tight">Derniers Ajouts</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
<!-- Product Card 1 -->
<div class="flex flex-col gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 overflow-hidden group">
<img class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Une miniature de document PDF stylisée" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4qyEyWwdZGoonHtEXNGYfk9VZil1_k5TtzpwwMRTTLp6xyEYJJDXB4aqc0wnb_9Tq8zX_iddLMm_d9PQN_TL6oyLbpeshsBJ6GmRKs_BCptXrHWbz23FtUBQ0J9BAbRYP9fQiWuXmORQn3ibhQwJhsKDv9X2JJ_Lnqq-HxAnUy2KAHbMmcOfI1J_iZv8ejO7C9RHYvlM33R64-C-PFHYE3Bfvl9Gi2Xr8HKOWihOxKD_Dsp3993G7AINlN2L2H7F-QmDFj7sASes"/>
<div class="p-4 pt-0 flex flex-col gap-4">
<div class="flex flex-col gap-1">
<h3 class="font-bold text-gray-900 dark:text-white">Droit Constitutionnel</h3>
<p class="text-sm text-gray-500 dark:text-gray-400">Année 2023</p>
</div>
<button class="w-full flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary/10 dark:bg-primary/20 text-primary text-sm font-bold hover:bg-primary/20 dark:hover:bg-primary/30 transition-colors">
<span class="truncate">Voir / Acheter</span>
</button>
</div>
</div>
<!-- Product Card 2 -->
<div class="flex flex-col gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 overflow-hidden group">
<img class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Une miniature de document PDF stylisée" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCcTMdQg3f6KET-pMjNBEzziQYTM51YmOW56byJsipoTUannOdCOuqeRXoi1PMfM1RJ5ewStDiH6GfXGTy6rROX7WA14WSUn736nD4_kQgQX3vCksXYJnSYtabLauAGiWwswtUqF1EdcbwVolH1A8Hr89s-FhRqISTfIH2_LbAXVgTx0Lk5ZA8JXXoUHd9H0psr_7GbsEdfEdNhFqzFbzdz5BNl_PQlpbmw2Qtm381ADSoIR7CBQRW2eMqfvjG3RHGjBw7R6R1CMlQ"/>
<div class="p-4 pt-0 flex flex-col gap-4">
<div class="flex flex-col gap-1">
<h3 class="font-bold text-gray-900 dark:text-white">Marketing Digital</h3>
<p class="text-sm text-gray-500 dark:text-gray-400">Année 2023</p>
</div>
<button class="w-full flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary/10 dark:bg-primary/20 text-primary text-sm font-bold hover:bg-primary/20 dark:hover:bg-primary/30 transition-colors">
<span class="truncate">Voir / Acheter</span>
</button>
</div>
</div>
<!-- Product Card 3 -->
<div class="flex flex-col gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 overflow-hidden group">
<img class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Une miniature de document PDF stylisée" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhcgr31IxK3Q-LOqouCaMej8o7U0DePcN6rkdipopgTGm_Sja75LitFdP-4OCCQ4x1buUV3iOng-hAZOGvhrmkiolXLRtk5tLCqfW-jzDmEHP-Cw9uoRbzhHWikvIzvhqMeEJJ4TGGH_2XjKdcIT_ilNidqcQAdTp_XAOtYHuUkJCXuFUSQTtKm7JhoMQdmKqYAGvwjh37RfchAFNW8-nqSiCIrM7qgMFGWwhBy0HmZ00wzUyjwoC-4BTkd8crCWtc_RGMkpLjFhs"/>
<div class="p-4 pt-0 flex flex-col gap-4">
<div class="flex flex-col gap-1">
<h3 class="font-bold text-gray-900 dark:text-white">Algorithmique Avancée</h3>
<p class="text-sm text-gray-500 dark:text-gray-400">Année 2022</p>
</div>
<button class="w-full flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary/10 dark:bg-primary/20 text-primary text-sm font-bold hover:bg-primary/20 dark:hover:bg-primary/30 transition-colors">
<span class="truncate">Voir / Acheter</span>
</button>
</div>
</div>
<!-- Product Card 4 -->
<div class="flex flex-col gap-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900/50 overflow-hidden group">
<img class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-300" data-alt="Une miniature de document PDF stylisée" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6QCSzIm1_-YaO8-gr_xWyL6GYAm3IPAAaAFU7oDZcNvIw9T9ObClCCk2Er5j9Ri_W9nrjtioIFGHFyam86PlLXrPxzLm9UJ6zgAvinHnxIcU35xnItqJraDuk7Gvqpaywoc_fVcRGmS4thTYxDgsLcDF3T8CWqIYRnwPtwJR8NJ7PS9deyWjc_xXnbMB5T2eJ-9DEh_4AJHUu1GEK2XUewe2Ayu67TpMfNZvvDmVbdt4Viz6P6swyoimlWB6MN6PMGrAGkmiFUsE"/>
<div class="p-4 pt-0 flex flex-col gap-4">
<div class="flex flex-col gap-1">
<h3 class="font-bold text-gray-900 dark:text-white">Gestion de Projet</h3>
<p class="text-sm text-gray-500 dark:text-gray-400">Année 2022</p>
</div>
<button class="w-full flex cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary/10 dark:bg-primary/20 text-primary text-sm font-bold hover:bg-primary/20 dark:hover:bg-primary/30 transition-colors">
<span class="truncate">Voir / Acheter</span>
</button>
</div>
</div>
</div>
</section>
<!-- CTA Section -->
<section class="rounded-xl p-8 sm:p-12 text-center" style="background: #111827;">
<div class="flex flex-col items-center gap-6">
<h2 class="text-3xl font-bold tracking-tight text-white max-w-lg">Prêt à prendre une longueur d'avance dans vos études ?</h2>
<button class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary text-white text-base font-bold shadow-sm hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary/50">
<span class="truncate">Découvrir le catalogue complet</span>
</button>
</div>
</section>
</div>
</div>
</main>
<!-- Footer -->
<footer class="bg-white dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-800">
<div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">
<div class="col-span-2 md:col-span-4 lg:col-span-1">
<div class="flex items-center gap-2 text-gray-900 dark:text-white">
<div class="size-6 text-primary">
<svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path d="M4 42.4379C4 42.4379 14.0962 36.0744 24 41.1692C35.0664 46.8624 44 42.2078 44 42.2078L44 7.01134C44 7.01134 35.068 11.6577 24.0031 5.96913C14.0971 0.876274 4 7.27094 4 7.27094L4 42.4379Z" fill="currentColor"></path>
</svg>
</div>
<span class="text-lg font-bold">KOMORA Campus</span>
</div>
</div>
<div>
<h3 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">Navigation</h3>
<ul class="text-gray-500 dark:text-gray-400 font-medium space-y-3">
<li><a class="hover:underline" href="#">Accueil</a></li>
<li><a class="hover:underline" href="#">Filières</a></li>
<li><a class="hover:underline" href="#">Abonnement</a></li>
</ul>
</div>
<div>
<h3 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">Aide</h3>
<ul class="text-gray-500 dark:text-gray-400 font-medium space-y-3">
<li><a class="hover:underline" href="#">Contactez-nous</a></li>
<li><a class="hover:underline" href="#">FAQ</a></li>
</ul>
</div>
<div>
<h3 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">Légal</h3>
<ul class="text-gray-500 dark:text-gray-400 font-medium space-y-3">
<li><a class="hover:underline" href="#">Mentions Légales</a></li>
<li><a class="hover:underline" href="#">Conditions d'utilisation</a></li>
</ul>
</div>
</div>
<hr class="my-6 border-gray-200 dark:border-gray-700 sm:mx-auto lg:my-8"/>
<div class="sm:flex sm:items-center sm:justify-between">
<span class="text-sm text-gray-500 dark:text-gray-400 sm:text-center">© 2024 <a class="hover:underline" href="#">KOMORA Campus™</a>. Tous droits réservés.
                    </span>
<div class="mt-4 flex space-x-5 sm:mt-0 sm:justify-center">
<a class="text-gray-500 hover:text-gray-900 dark:hover:text-white" href="#">
<svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewbox="0 0 24 24"><path clip-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" fill-rule="evenodd"></path></svg>
</a>
<a class="text-gray-500 hover:text-gray-900 dark:hover:text-white" href="#">
<svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewbox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.71v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path></svg>
</a>
</div>
</div>
</div>
</footer>
</div>
</body></html>
<script>
    const searchInput = document.querySelector('input[placeholder*="Rechercher"]');
    const resultsContainer = document.createElement('div');
    resultsContainer.className = 'absolute top-full left-0 right-0 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg mt-1 shadow-lg max-h-96 overflow-y-auto hidden z-50';

    searchInput.parentElement.style.position = 'relative';
    searchInput.parentElement.appendChild(resultsContainer);

    searchInput.addEventListener('input', async function () {
        const q = this.value.trim();
        if (q.length < 2) {
            resultsContainer.innerHTML = '';
            resultsContainer.classList.add('hidden');
            return;
        }

        const res = await fetch(`/search?q=${encodeURIComponent(q)}`);
        const items = await res.json();

        resultsContainer.innerHTML = items.map(item => `
            <a href="${item.url}" class="block px-4 py-3 hover:bg-primary/10 dark:hover:bg-primary/20 border-b border-gray-100 dark:border-gray-700 last:border-0">
                <div class="font-medium text-gray-900 dark:text-white">${item.title}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">${item.subtitle}</div>
                <div class="text-xs text-primary font-bold mt-1">${item.price} • ${item.corrected}</div>
            </a>
        `).join('');

        resultsContainer.classList.toggle('hidden', items.length === 0);
    });
</script>