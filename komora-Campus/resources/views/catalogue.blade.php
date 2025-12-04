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
<aside class="flex flex-col w-full lg:w-1/4 lg:max-w-xs shrink-0 gap-6">
<div class="flex flex-col gap-4">
<h3 class="text-xl font-bold text-[#0d121b] dark:text-white">Affiner votre recherche</h3>
<div class="flex flex-col gap-3">
<details class="flex flex-col rounded-lg border border-[#cfd7e7] dark:border-slate-700 bg-white dark:bg-background-dark px-[15px] py-[7px] group">
<summary class="flex cursor-pointer items-center justify-between gap-6 py-2 list-none">
<p class="text-[#0d121b] dark:text-white text-sm font-medium leading-normal">Filière</p>
<span class="material-symbols-outlined text-[#0d121b] dark:text-white group-open:rotate-180 transition-transform">expand_more</span>
</summary>
<div class="pb-2">
<label class="flex gap-x-3 py-2 flex-row"><input class="h-5 w-5 rounded border-[#cfd7e7] dark:border-slate-600 border-2 bg-transparent text-primary checked:bg-primary checked:border-primary focus:ring-0 focus:ring-offset-0 focus:border-[#cfd7e7] dark:focus:border-slate-500" type="checkbox"/><p class="text-[#0d121b] dark:text-slate-300 text-base font-normal leading-normal">Droit</p></label>
<label class="flex gap-x-3 py-2 flex-row"><input class="h-5 w-5 rounded border-[#cfd7e7] dark:border-slate-600 border-2 bg-transparent text-primary checked:bg-primary checked:border-primary focus:ring-0 focus:ring-offset-0 focus:border-[#cfd7e7] dark:focus:border-slate-500" type="checkbox"/><p class="text-[#0d121b] dark:text-slate-300 text-base font-normal leading-normal">Économie &amp; Gestion</p></label>
<label class="flex gap-x-3 py-2 flex-row"><input class="h-5 w-5 rounded border-[#cfd7e7] dark:border-slate-600 border-2 bg-transparent text-primary checked:bg-primary checked:border-primary focus:ring-0 focus:ring-offset-0 focus:border-[#cfd7e7] dark:focus:border-slate-500" type="checkbox"/><p class="text-[#0d121b] dark:text-slate-300 text-base font-normal leading-normal">Sciences Politiques</p></label>
</div>
</details>
<details class="flex flex-col rounded-lg border border-[#cfd7e7] dark:border-slate-700 bg-white dark:bg-background-dark px-[15px] py-[7px] group" open="">
<summary class="flex cursor-pointer items-center justify-between gap-6 py-2 list-none">
<p class="text-[#0d121b] dark:text-white text-sm font-medium leading-normal">Niveau d'étude</p>
<span class="material-symbols-outlined text-[#0d121b] dark:text-white group-open:rotate-180 transition-transform">expand_more</span>
</summary>
<div class="pb-2">
<label class="flex gap-x-3 py-2 flex-row"><input class="h-5 w-5 rounded border-[#cfd7e7] dark:border-slate-600 border-2 bg-transparent text-primary checked:bg-primary checked:border-primary focus:ring-0 focus:ring-offset-0 focus:border-[#cfd7e7] dark:focus:border-slate-500" type="checkbox"/><p class="text-[#0d121b] dark:text-slate-300 text-base font-normal leading-normal">L1</p></label>
<label class="flex gap-x-3 py-2 flex-row"><input checked="" class="h-5 w-5 rounded border-[#cfd7e7] dark:border-slate-600 border-2 bg-transparent text-primary checked:bg-primary checked:border-primary focus:ring-0 focus:ring-offset-0 focus:border-[#cfd7e7] dark:focus:border-slate-500" type="checkbox"/><p class="text-[#0d121b] dark:text-slate-300 text-base font-normal leading-normal">L2</p></label>
<label class="flex gap-x-3 py-2 flex-row"><input class="h-5 w-5 rounded border-[#cfd7e7] dark:border-slate-600 border-2 bg-transparent text-primary checked:bg-primary checked:border-primary focus:ring-0 focus:ring-offset-0 focus:border-[#cfd7e7] dark:focus:border-slate-500" type="checkbox"/><p class="text-[#0d121b] dark:text-slate-300 text-base font-normal leading-normal">L3</p></label>
<label class="flex gap-x-3 py-2 flex-row"><input class="h-5 w-5 rounded border-[#cfd7e7] dark:border-slate-600 border-2 bg-transparent text-primary checked:bg-primary checked:border-primary focus:ring-0 focus:ring-offset-0 focus:border-[#cfd7e7] dark:focus:border-slate-500" type="checkbox"/><p class="text-[#0d121b] dark:text-slate-300 text-base font-normal leading-normal">M1</p></label>
<label class="flex gap-x-3 py-2 flex-row"><input class="h-5 w-5 rounded border-[#cfd7e7] dark:border-slate-600 border-2 bg-transparent text-primary checked:bg-primary checked:border-primary focus:ring-0 focus:ring-offset-0 focus:border-[#cfd7e7] dark:focus:border-slate-500" type="checkbox"/><p class="text-[#0d121b] dark:text-slate-300 text-base font-normal leading-normal">M2</p></label>
</div>
</details>
<details class="flex flex-col rounded-lg border border-[#cfd7e7] dark:border-slate-700 bg-white dark:bg-background-dark px-[15px] py-[7px] group">
<summary class="flex cursor-pointer items-center justify-between gap-6 py-2 list-none">
<p class="text-[#0d121b] dark:text-white text-sm font-medium leading-normal">Semestre</p>
<span class="material-symbols-outlined text-[#0d121b] dark:text-white group-open:rotate-180 transition-transform">expand_more</span>
</summary>
<div class="pb-2"><p class="text-slate-400 text-sm">Contenu du filtre...</p></div>
</details>
<details class="flex flex-col rounded-lg border border-[#cfd7e7] dark:border-slate-700 bg-white dark:bg-background-dark px-[15px] py-[7px] group">
<summary class="flex cursor-pointer items-center justify-between gap-6 py-2 list-none">
<p class="text-[#0d121b] dark:text-white text-sm font-medium leading-normal">Matière</p>
<span class="material-symbols-outlined text-[#0d121b] dark:text-white group-open:rotate-180 transition-transform">expand_more</span>
</summary>
<div class="pb-2"><p class="text-slate-400 text-sm">Contenu du filtre...</p></div>
</details>
<details class="flex flex-col rounded-lg border border-[#cfd7e7] dark:border-slate-700 bg-white dark:bg-background-dark px-[15px] py-[7px] group">
<summary class="flex cursor-pointer items-center justify-between gap-6 py-2 list-none">
<p class="text-[#0d121b] dark:text-white text-sm font-medium leading-normal">Année universitaire</p>
<span class="material-symbols-outlined text-[#0d121b] dark:text-white group-open:rotate-180 transition-transform">expand_more</span>
</summary>
<div class="pb-2"><p class="text-slate-400 text-sm">Contenu du filtre...</p></div>
</details>
</div>
</div>
<div class="flex flex-col gap-2">
<button class="flex w-full items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold">Appliquer les filtres</button>
<button class="flex w-full items-center justify-center rounded-lg h-10 px-4 bg-transparent text-primary text-sm font-medium hover:bg-primary/10">Réinitialiser</button>
</div>
</aside>
<!-- Right Side: Content -->
<div class="flex flex-col flex-1 gap-6">
<div class="flex flex-wrap gap-2">
<a class="text-[#4c669a] dark:text-slate-400 text-base font-medium leading-normal" href="#">Accueil</a>
<span class="text-[#4c669a] dark:text-slate-400 text-base font-medium leading-normal">/</span>
<span class="text-[#0d121b] dark:text-white text-base font-medium leading-normal">Catalogue</span>
</div>
<div class="flex flex-wrap justify-between gap-4">
<div class="flex min-w-72 flex-col gap-2">
<p class="text-[#0d121b] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Catalogue des Annales</p>
<p class="text-[#4c669a] dark:text-slate-400 text-base font-normal leading-normal">72 résultats trouvés</p>
</div>
</div>
<!-- Product Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">
<!-- Product Card 1 -->
<div class="flex flex-col bg-white dark:bg-background-dark/50 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-800 hover:shadow-lg dark:hover:border-primary/50 transition-all duration-300">
<div class="w-full h-40 bg-cover bg-center" data-alt="Miniature of a constitutional law document" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDfG30fRlblhrjFew3p4TxbilgNW60J-rRf5xhAr61JIGc0efuZhuKy-9J4UT2_YTDCI0bDzGH-762JLHCbQ7oCRiu7yBjorg5UAueEPBvEKtP8rkmAwG9HU0eW89VvJ-mcBMwjlmt_CrfFXuzrk16uFZZt6Ng3V3kLRJVB14thZSDhoUCIggb6eWMN6dny0TnjUCpi-bwJ7OlKEru0HQ_6-04CQvN_ipfXtFgTF2ToCwalJpwI3zUPcmh2kilpy8Faw9aaqWn94z4')"></div>
<div class="p-5 flex flex-col flex-1">
<h4 class="text-lg font-bold text-[#0d121b] dark:text-white">Annales de Droit Constitutionnel</h4>
<div class="flex items-center gap-2 mt-2 mb-4">
<span class="text-xs font-semibold text-primary bg-primary/20 dark:text-blue-300 dark:bg-blue-900/50 py-1 px-2.5 rounded-full">Licence 1</span>
<span class="text-xs font-semibold text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 py-1 px-2.5 rounded-full">2023</span>
</div>
<div class="mt-auto">
<button class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold hover:bg-primary/90">Voir / Acheter - 4.99€</button>
</div>
</div>
</div>
<!-- Product Card 2 -->
<div class="flex flex-col bg-white dark:bg-background-dark/50 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-800 hover:shadow-lg dark:hover:border-primary/50 transition-all duration-300">
<div class="w-full h-40 bg-cover bg-center" data-alt="Miniature of a microeconomics document" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD7DMkV8s0RDvgBrD-bJ_8A-eJdOU8H3eU1sTRMKNBgzqXPcOBopGwjKqHUXVDy9ftXbsIQroVgGYPww4QvPQMfzUBemzkhzlYF4voAtlw6Vk2cNrfWb7gMPbpoTbT-jn4fVwdyMjyaDezRnS9vycnE41A1IBLWkmW6Q89lHDy-sOyoMC3S8HdErpgYPPvor6UTYINQ_rqZOaP3hLt_sqUeSDQkgGB9WrTFZ42zc0exyDALxqCAD8GMHQ5Q8ZxtDEC6_KQNYek49G0')"></div>
<div class="p-5 flex flex-col flex-1">
<h4 class="text-lg font-bold text-[#0d121b] dark:text-white">Corrigés de Microéconomie</h4>
<div class="flex items-center gap-2 mt-2 mb-4">
<span class="text-xs font-semibold text-primary bg-primary/20 dark:text-blue-300 dark:bg-blue-900/50 py-1 px-2.5 rounded-full">Licence 2</span>
<span class="text-xs font-semibold text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 py-1 px-2.5 rounded-full">2022</span>
</div>
<div class="mt-auto">
<button class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold hover:bg-primary/90">Voir / Acheter - 5.99€</button>
</div>
</div>
</div>
<!-- Product Card 3 -->
<div class="flex flex-col bg-white dark:bg-background-dark/50 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-800 hover:shadow-lg dark:hover:border-primary/50 transition-all duration-300">
<div class="w-full h-40 bg-cover bg-center" data-alt="Miniature of an international relations document" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA2tYXXlNyH2kYkPbACY9ZFlrIWfn6u8jp97fIxR43ifehKgdEikXN-7WBuxaAMKfmQO_cAL-RUlwMpWLK8bk4zx4IGtBSMqjvxVpdyZ0088TVFaSSM6SuHluN5C6asnVYiZeAx2ukbgRFnAGqhD7Xj1LstBXT3bPWS5Vwmf7aO11qZMkCKFY4XYVJzhfquhPMD_JjekLXkYmCTEwEDbtJ8xs4vmm5LtQgkdSfoyyyfTP-cgq7kf--263jmNu_ZU1M3clYn9CS8w44')"></div>
<div class="p-5 flex flex-col flex-1">
<h4 class="text-lg font-bold text-[#0d121b] dark:text-white">Sujets de Relations Internationales</h4>
<div class="flex items-center gap-2 mt-2 mb-4">
<span class="text-xs font-semibold text-primary bg-primary/20 dark:text-blue-300 dark:bg-blue-900/50 py-1 px-2.5 rounded-full">Licence 1</span>
<span class="text-xs font-semibold text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 py-1 px-2.5 rounded-full">2023</span>
</div>
<div class="mt-auto">
<button class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold hover:bg-primary/90">Voir / Acheter - 4.99€</button>
</div>
</div>
</div>
<!-- Product Card 4 -->
<div class="flex flex-col bg-white dark:bg-background-dark/50 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-800 hover:shadow-lg dark:hover:border-primary/50 transition-all duration-300">
<div class="w-full h-40 bg-cover bg-center" data-alt="Miniature of a public finance document" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuABxotWQjEMiWizSlhdisysGnEtq47mSdCUNSe3aDCYqMEIy-CUpfw0SPfJTfpCgtPUgi62IZR71PMpBJJUaK8KSY1JgaLFW8PK98nlxO-V_v_RSF0PbY99MnX15BYXKoooqsukbYKYmRSGvygGTPGXqvuhqIavGDC1h1W8fatIKihbTMuaDVIZF3eAc9MdqJPlDUNKcc0wgnIpoLZMLHWX_tGNWcNzdJTVGSIGcT_ynmpzQ8xc7dZdGT2xuUdmcAWR5YyW7fvIYbM')"></div>
<div class="p-5 flex flex-col flex-1">
<h4 class="text-lg font-bold text-[#0d121b] dark:text-white">Annales de Finances Publiques</h4>
<div class="flex items-center gap-2 mt-2 mb-4">
<span class="text-xs font-semibold text-primary bg-primary/20 dark:text-blue-300 dark:bg-blue-900/50 py-1 px-2.5 rounded-full">Licence 3</span>
<span class="text-xs font-semibold text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 py-1 px-2.5 rounded-full">2021</span>
</div>
<div class="mt-auto">
<button class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold hover:bg-primary/90">Voir / Acheter - 6.49€</button>
</div>
</div>
</div>
<!-- Product Card 5 -->
<div class="flex flex-col bg-white dark:bg-background-dark/50 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-800 hover:shadow-lg dark:hover:border-primary/50 transition-all duration-300">
<div class="w-full h-40 bg-cover bg-center" data-alt="Miniature of a marketing document" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDNLbK7ulc16N6BoCr8RFYDAJZKbeu9tcpGWlgTZFW9wziU2-05GZ2uCxQJa1XlglPHEOXdwZwLLti1T8n54QZdqjwO_CtiYFaZUzYWz7Ok4I8FEUXkZ58c2437tw__9x6RJIAEF8WgaiUoVpm9Jkj3fesUhwBk0OdROSmAAOBuACCQU0kbaHIVJCzqL51Ylym-HTYTpreSACQD5VlbZJYF3E_hVIWxJTEM2YZ2t4-zGpLZ6eM69npR2SbyudlLmWFNvo80cgU8kUg')"></div>
<div class="p-5 flex flex-col flex-1">
<h4 class="text-lg font-bold text-[#0d121b] dark:text-white">Études de cas Marketing</h4>
<div class="flex items-center gap-2 mt-2 mb-4">
<span class="text-xs font-semibold text-primary bg-primary/20 dark:text-blue-300 dark:bg-blue-900/50 py-1 px-2.5 rounded-full">Master 1</span>
<span class="text-xs font-semibold text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 py-1 px-2.5 rounded-full">2023</span>
</div>
<div class="mt-auto">
<button class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold hover:bg-primary/90">Voir / Acheter - 7.99€</button>
</div>
</div>
</div>
<!-- Product Card 6 -->
<div class="flex flex-col bg-white dark:bg-background-dark/50 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-800 hover:shadow-lg dark:hover:border-primary/50 transition-all duration-300">
<div class="w-full h-40 bg-cover bg-center" data-alt="Miniature of a criminal law document" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB6Gy-dEGJIG1zIXj255yXZe9Qa68SAznTlv4tkysmm5xtJV8-2McLOWf8b-phBF0XzUC0Wfihnx6Ydaw5apCsDAuzeFsWAatiQl28EIrnMdC6XZWNoNajCz7hD3IdnuRrXIyi-SZCmsVPKSFavNhX7bh9bmfKRlTjaQCDyApD2JoA8ki4URFWRX58hWtJc__wvZeFjtdxe3bWe70CtAXbMjIwXJYNAL1KHXPw-H907EpjmP98cfFwz2KvgZiMG1KkZjOLyB7jDjmk')"></div>
<div class="p-5 flex flex-col flex-1">
<h4 class="text-lg font-bold text-[#0d121b] dark:text-white">Corrigés de Droit Pénal</h4>
<div class="flex items-center gap-2 mt-2 mb-4">
<span class="text-xs font-semibold text-primary bg-primary/20 dark:text-blue-300 dark:bg-blue-900/50 py-1 px-2.5 rounded-full">Licence 2</span>
<span class="text-xs font-semibold text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 py-1 px-2.5 rounded-full">2022</span>
</div>
<div class="mt-auto">
<button class="w-full flex items-center justify-center rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold hover:bg-primary/90">Voir / Acheter - 5.99€</button>
</div>
</div>
</div>
</div>
<!-- Pagination -->
<div class="flex items-center justify-center pt-8">
<nav class="flex items-center gap-2">
<button class="inline-flex items-center justify-center size-10 rounded-lg text-[#4c669a] dark:text-slate-400 hover:bg-primary/10 dark:hover:bg-primary/20" disabled=""><span class="material-symbols-outlined">chevron_left</span></button>
<button class="inline-flex items-center justify-center size-10 rounded-lg text-white bg-primary font-bold">1</button>
<button class="inline-flex items-center justify-center size-10 rounded-lg text-[#0d121b] dark:text-white hover:bg-primary/10 dark:hover:bg-primary/20 font-medium">2</button>
<button class="inline-flex items-center justify-center size-10 rounded-lg text-[#0d121b] dark:text-white hover:bg-primary/10 dark:hover:bg-primary/20 font-medium">3</button>
<span class="text-[#4c669a] dark:text-slate-400">...</span>
<button class="inline-flex items-center justify-center size-10 rounded-lg text-[#0d121b] dark:text-white hover:bg-primary/10 dark:hover:bg-primary/20 font-medium">8</button>
<button class="inline-flex items-center justify-center size-10 rounded-lg text-[#0d121b] dark:text-white hover:bg-primary/10 dark:hover:bg-primary/20"><span class="material-symbols-outlined">chevron_right</span></button>
</nav>
</div>
</div>
</div>
</main>
</div>
</body></html>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const filiereDetails = document.querySelector('details[summary p="Filière"]');
    const niveauDetails = document.querySelector('details[summary p="Niveau d\'étude"]');
    const matiereDetails = document.querySelector('details[summary p="Matière"]');
    const semestreDetails = document.querySelector('details[summary p="Semestre"]');
    const applyBtn = document.querySelector('button[text="Appliquer les filtres"]');
    const resetBtn = document.querySelector('button[text="Réinitialiser"]');
    const productGrid = document.querySelector('.grid-cols-1');
    const pagination = document.querySelector('.flex[pt-8]');

    // Chargement initial des produits
    fetchProducts();

    // Dynamisme: Sélection filière -> load niveaux
    filiereDetails.addEventListener('change', (e) => {
        if (e.target.type === 'checkbox') {
            const filiereId = e.target.value;
            if (e.target.checked) {
                fetch(`/api/niveaux/${filiereId}`)
                    .then(res => res.json())
                    .then(niveaux => {
                        niveauDetails.querySelector('.pb-2').innerHTML = niveaux.map(n => `
                            <label class="flex gap-x-3 py-2">
                                <input type="checkbox" value="${n.id}" class="h-5 w-5 rounded ...">
                                <p>${n.name}</p>
                            </label>
                        `).join('');
                    });
            }
        }
    });

    // Sélection niveau -> load matières
    niveauDetails.addEventListener('change', (e) => {
        if (e.target.type === 'checkbox') {
            const niveauId = e.target.value;
            if (e.target.checked) {
                fetch(`/api/matieres/${niveauId}`)
                    .then(res => res.json())
                    .then(matieres => {
                        matiereDetails.querySelector('.pb-2').innerHTML = matieres.map(m => `
                            <label class="flex gap-x-3 py-2">
                                <input type="checkbox" value="${m.id}" class="h-5 w-5 rounded ...">
                                <p>${m.name}</p>
                            </label>
                        `).join('');
                    });
            }
        }
    });

    // Semestres statiques (pair/impair)
    semestreDetails.querySelector('.pb-2').innerHTML = `
        <label class="flex gap-x-3 py-2"><input type="checkbox" value="pair" class="..."><p>Pair</p></label>
        <label class="flex gap-x-3 py-2"><input type="checkbox" value="impair" class="..."><p>Impair</p></label>
    `;

    // Appliquer filtres
    applyBtn.addEventListener('click', () => {
        const params = new URLSearchParams();
        // Récup filière/niveau/matiere/semestre checked (un seul par catégorie pour "pas les deux", mais cumulatifs)
        const filiereChecked = filiereDetails.querySelector('input:checked')?.value;
        const niveauChecked = niveauDetails.querySelector('input:checked')?.value;
        const matiereChecked = matiereDetails.querySelector('input:checked')?.value;
        const semestreChecked = semestreDetails.querySelector('input:checked')?.value;

        if (filiereChecked) params.append('filiere_id', filiereChecked);
        if (niveauChecked) params.append('niveau_id', niveauChecked);
        if (matiereChecked) params.append('matiere_id', matiereChecked);
        if (semestreChecked) params.append('semester', semestreChecked);

        fetchProducts(`?${params.toString()}`);
    });

    // Reset
    resetBtn.addEventListener('click', () => {
        document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
        [niveauDetails, matiereDetails].forEach(d => d.querySelector('.pb-2').innerHTML = '<p class="text-slate-400 text-sm">Sélectionnez en amont...</p>');
        fetchProducts();
    });

    // Fonction fetch produits + update UI avec transition
    function fetchProducts(query = '') {
        fetch(`/api/products/filter${query}`)
            .then(res => res.json())
            .then(data => {
                productGrid.style.opacity = 0; // Fade out
                setTimeout(() => {
                    productGrid.innerHTML = data.products.map(p => `
                        <div class="flex flex-col bg-white ...">
                            <div class="w-full h-40 bg-cover ..." style="background-image: url('${p.preview_url}')"></div>
                            <div class="p-5 ...">
                                <h4 class="text-lg font-bold ...">${p.title}</h4>
                                <div class="flex ...">
                                    <span ...>${p.niveau}</span>
                                    <span ...>${p.period}</span>
                                </div>
                                <button ...>Voir / Acheter - ${p.price}</button>
                            </div>
                        </div>
                    `).join('');
                    pagination.innerHTML = data.pagination;
                    productGrid.style.opacity = 1; // Fade in
                }, 300);
            });
    }
});
</script>