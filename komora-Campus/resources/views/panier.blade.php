<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Panier d'Achat - KOMORA Campus</title>
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
                        "primary": "#0A4D68",
                        "background-light": "#F8F9FA",
                        "background-dark": "#101622",
                        "primary-accent": "#B2D8E4",
                        "text-light": "#495057",
                        "text-dark": "#E9ECEF",
                        "border-light": "#E9ECEF",
                        "border-dark": "#2d3748"
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
        }
    </style>
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark">
<div class="relative flex min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<header class="w-full bg-background-light dark:bg-background-dark/80 backdrop-blur-sm sticky top-0 z-10">
<div class="max-w-7xl mx-auto">
<div class="flex items-center justify-between whitespace-nowrap border-b border-solid border-border-light dark:border-border-dark px-6 py-4">
<div class="flex items-center gap-4 text-primary">
<div class="size-6 text-primary">
<svg fill="currentColor" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path d="M4 42.4379C4 42.4379 14.0962 36.0744 24 41.1692C35.0664 46.8624 44 42.2078 44 42.2078L44 7.01134C44 7.01134 35.068 11.6577 24.0031 5.96913C14.0971 0.876274 4 7.27094 4 7.27094L4 42.4379Z"></path>
</svg>
</div>
<h2 class="text-xl font-bold tracking-tight">KOMORA Campus</h2>
</div>
<nav class="hidden md:flex items-center gap-8 text-sm font-medium text-text-light dark:text-text-dark">
<a class="hover:text-primary transition-colors" href="#">Accueil</a>
<a class="hover:text-primary transition-colors" href="#">Annales</a>
<a class="hover:text-primary transition-colors" href="#">Sujets</a>
<a class="hover:text-primary transition-colors" href="#">Corrigés</a>
<a class="hover:text-primary transition-colors" href="#">Contact</a>
</nav>
<div class="flex items-center gap-3">
<button class="hidden md:flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold tracking-wide hover:bg-primary/90 transition-colors">
<span>Se connecter</span>
</button>
<button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-gray-200/50 dark:bg-white/10 text-text-light dark:text-text-dark gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5 hover:bg-gray-200 dark:hover:bg-white/20 transition-colors relative">
<span class="material-symbols-outlined text-xl">shopping_cart</span>
<span class="absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-primary text-white text-xs font-bold">2</span>
</button>
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Avatar de l'utilisateur" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDQYGihzB-MT6LZo4FjgeYKb5IcaNfEXR1I5gjEFwvK6XuFuwCRdSGDc7aBD3YUv9crJBogERDx0UyeHx0t_F1HamY-vscDgIxvf5D2iN4XiEOKqjBzLLT6malfoFB1meVyc3kuSpLWJ1jd-PyyCXXTW5lVTKjPNj_ixlTk1PlIsR_tMFWaT1nFZ_-rbd2CLSyQWY2EaqPbQBu9CdnexbyLC0EZl1FnYelcJjaOJWNbT4T_TjsPnh-kZyfV6wmlPU4MJMiuHovzRS8");'></div>
</div>
</div>
</div>
</header>
<main class="flex-1 w-full max-w-7xl mx-auto px-6 py-12">
<div class="flex flex-col gap-8">
<div class="flex flex-wrap gap-2 text-sm">
<a class="text-text-light dark:text-text-dark/80 hover:text-primary dark:hover:text-primary-accent" href="#">Accueil</a>
<span class="text-text-light/50 dark:text-text-dark/50">/</span>
<a class="text-text-light dark:text-text-dark/80 hover:text-primary dark:hover:text-primary-accent" href="#">Annales</a>
<span class="text-text-light/50 dark:text-text-dark/50">/</span>
<span class="font-semibold text-text-light dark:text-text-dark">Panier</span>
</div>
<div class="flex flex-wrap justify-between items-baseline gap-4">
<h1 class="text-text-light dark:text-white text-4xl font-black tracking-tighter">Panier d'achat</h1>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-8 items-start">
<div class="col-span-1 lg:col-span-2 flex flex-col gap-4">
<div class="bg-white dark:bg-background-dark/60 rounded-xl shadow-sm border border-border-light dark:border-border-dark p-6">
<div class="flex items-center gap-6 py-4 border-b border-border-light dark:border-border-dark">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg size-16" data-alt="Couverture des annales de Mathématiques L1" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAfK6DmPnPNZbMFgy6558MtrtAIXSsCuLjmJMMUPxychnZiuo_hsq5tMq3Fv_-VyWN8U5mSf0hBFffSd5bCe1iHp2IhknciIXC5fop3yVm9UpXkXsu_qLtIXS0Iw_cU2DQQCtS3V_o8_NxJ8HzUZ048D-eOtYyeyu2MDZ4dZxNioz-bmRq6wNBx4_9E9Kls2OPN8Hglzt9CYN_VNbUpMx9LameoWhYr1XGRo5hyTAEjvewI5M4ppZYFpD7ip3ajA_CW68YDEaEvPy0");'></div>
<div class="flex-1 flex flex-col justify-center">
<p class="text-text-light dark:text-white text-base font-semibold leading-normal">Annales de Mathématiques L1 - 2023</p>
<p class="text-text-light/80 dark:text-text-dark/80 text-sm font-normal leading-normal">Sujets et corrigés complets</p>
</div>
<p class="font-semibold text-base text-text-light dark:text-white shrink-0">19,99€</p>
<button class="text-text-light/70 dark:text-text-dark/70 hover:text-red-500 dark:hover:text-red-500 transition-colors">
<span class="material-symbols-outlined">delete</span>
</button>
</div>
<div class="flex items-center gap-6 py-4">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg size-16" data-alt="Couverture du pack complet de Physique L2" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB4Tqx1fB5ekgu_L5akDsJIg2uT60-Cu2gtGzKmhZLtTUAdd5_07WmIKsHMbPsVsw9Vk9eFL_UXxg5JkDODmctJRckk8EQDnIcGAu_8aHtpRojmubtfK01xPrnO2U1LgB7f0FKowiXRczB3VOZKgDsGbnrDlxUU4dVSziz7jeR88dm9l-Fzt975-GwW6V-dGkdJx_HHMqAiz4I4svJ8nCRuGZ6MeC2r2hmMX5E9R7I2fSszaZXFPGI8yMX-m-XPtsaEgtw2o07zmo8");'></div>
<div class="flex-1 flex flex-col justify-center">
<p class="text-text-light dark:text-white text-base font-semibold leading-normal">Pack Complet de Physique L2</p>
<p class="text-text-light/80 dark:text-text-dark/80 text-sm font-normal leading-normal">Inclus: Mécanique, Optique, Électromagnétisme</p>
</div>
<p class="font-semibold text-base text-text-light dark:text-white shrink-0">49,99€</p>
<button class="text-text-light/70 dark:text-text-dark/70 hover:text-red-500 dark:hover:text-red-500 transition-colors">
<span class="material-symbols-outlined">delete</span>
</button>
</div>
</div>
</div>
<div class="col-span-1 lg:sticky top-28">
<div class="bg-white dark:bg-background-dark/60 rounded-xl shadow-sm border border-border-light dark:border-border-dark p-6 flex flex-col gap-6">
<h2 class="text-xl font-bold text-text-light dark:text-white">Résumé de la commande</h2>
<div class="flex flex-col gap-3 text-sm">
<div class="flex justify-between items-center text-text-light dark:text-text-dark">
<span>Sous-total</span>
<span>69,98€</span>
</div>
<div class="flex justify-between items-center text-text-light dark:text-text-dark">
<span>Réductions</span>
<span>-0,00€</span>
</div>
<div class="w-full border-t border-dashed border-border-light dark:border-border-dark my-2"></div>
<div class="flex justify-between items-center text-lg font-bold text-text-light dark:text-white">
<span>Total</span>
<span>69,98€</span>
</div>
</div>
<div class="flex flex-col gap-2">
<label class="text-sm font-medium text-text-light dark:text-text-dark" for="promo-code">Code promotionnel</label>
<div class="flex gap-2">
<input class="w-full rounded-lg border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark focus:ring-2 focus:ring-primary-accent dark:focus:ring-primary-accent/50 focus:border-primary-accent dark:focus:border-primary-accent/50 text-sm" id="promo-code" placeholder="Entrez votre code" type="text"/>
<button class="flex-shrink-0 px-4 py-2 rounded-lg bg-gray-200 dark:bg-white/10 text-text-light dark:text-text-dark text-sm font-bold hover:bg-gray-300 dark:hover:bg-white/20 transition-colors">Appliquer</button>
</div>
</div>
<button class="w-full flex items-center justify-center gap-2 rounded-lg h-12 px-6 bg-primary text-white text-base font-bold tracking-wide hover:bg-primary/90 transition-colors shadow-lg shadow-primary/20">
<span>Procéder au paiement</span>
<span class="material-symbols-outlined">arrow_forward</span>
</button>
<div class="flex flex-col items-center justify-center gap-2 text-center text-xs text-text-light/70 dark:text-text-dark/70 pt-2">
<div class="flex items-center gap-1">
<span class="material-symbols-outlined text-base">lock</span>
<span>Paiements sécurisés</span>
</div>
<div class="flex items-center gap-2">
<img class="h-4" data-alt="Visa logo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC-AGmqISpSf-CJAFLvCIukqcW7OfZQYMM4WXbiUczgfAmu1t2zSwKaCYIHGe3oUCS5qt05CkNt_mV4Bgf53wRA0Mc4v7AScj1bxM1vDP0eoMVTzd4GGRFX-3JfYdLP3-5-ceDEFNiFGqmu7Jbz-oogOWdUesaWoGgJFH8Sc87exqMfE7U5GxQpaJU-281-PGltNCUX79O8mUbZp9YN8aoxmoMq9jPXb7BWViDSs1Z__-cxeY-ECgAhKgUQhVESMsf7GXlXey1Moqw"/>
<img class="h-4" data-alt="Mastercard logo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgn0HN_ci6miePveyn7IE0tYralgodr9JFJJWrjhap06Y47SHEEHwoVNYnVqQqxMk4oGKtNJSazblN5dwM0Bs2UGrG7a7JaxILtnx1tcVQqmvIfTI1V1d6Np1AKMUzC83-qE436LMkBSgP6xYmvhk0EUydl_yIHJmkhE3fOqVFFCKSBvdSKoCGZWUH4CQKtjy5eMux4IQXD8ncnL9-UQNK8u5MPPbqrDwlstrTkMzeCATcysffw46VR0wG663cgSwqt7AxYm0bTrQ"/>
<img class="h-4" data-alt="American Express logo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3a1WsJXVfwz6mBlF-WyAb_H70FnkkzZjDrli0AODtX17lqmegAeOEv-1DzL0eAba1aIgaHNgbBarK97NKkR-aJ1jMNXWdIKzKUUEybnI31kaWik-OlQrymb89KjvazMMiP70F9QtyogulaAlHsptcG6wqWptg1gAD088m29jjKPdyS2YhyuDUj7eiBAvV6HcGLbiWZu1CKli0FzAB6gOU59MWLxYqW0mKUS81A2L8nvsLc-9wflRpEkypMXEWxFbAXcYDG6S4wKE"/>
</div>
</div>
</div>
</div>
</div>
<!-- Empty State Example (commented out or to be used conditionally)
                <div class="text-center py-20 bg-white dark:bg-background-dark/60 rounded-xl shadow-sm border border-border-light dark:border-border-dark">
                    <span class="material-symbols-outlined text-6xl text-primary-accent">shopping_cart</span>
                    <h3 class="mt-4 text-xl font-semibold text-text-light dark:text-white">Votre panier est vide</h3>
                    <p class="mt-2 text-sm text-text-light/80 dark:text-text-dark/80">Parcourez nos annales pour commencer vos révisions.</p>
                    <button class="mt-6 flex items-center justify-center gap-2 mx-auto rounded-lg h-11 px-6 bg-primary text-white text-base font-bold tracking-wide hover:bg-primary/90 transition-colors">
                        <span>Continuer mes achats</span>
                    </button>
                </div>
                -->
</div>
</main>
</div>
</body></html>