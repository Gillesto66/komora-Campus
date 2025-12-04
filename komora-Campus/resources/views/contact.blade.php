<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Page Contacts - KOMORA Campus</title>
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
<body class="font-display bg-background-light dark:bg-background-dark">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#e7ebf3] dark:border-b-background-dark px-10 py-3 bg-background-light dark:bg-background-dark/50 sticky top-0 z-10 backdrop-blur-sm">
<div class="flex items-center gap-4 text-[#0d121b] dark:text-white">
<div class="size-6 text-primary">
<svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path d="M4 42.4379C4 42.4379 14.0962 36.0744 24 41.1692C35.0664 46.8624 44 42.2078 44 42.2078L44 7.01134C44 7.01134 35.068 11.6577 24.0031 5.96913C14.0971 0.876274 4 7.27094 4 7.27094L4 42.4379Z" fill="currentColor"></path>
</svg>
</div>
<h2 class="text-[#0d121b] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">KOMORA Campus</h2>
</div>
<div class="flex flex-1 justify-end gap-8">
<div class="flex items-center gap-9">
<a class="text-[#0d121b] dark:text-gray-300 dark:hover:text-white text-sm font-medium leading-normal" href="#">Annales</a>
<a class="text-[#0d121b] dark:text-gray-300 dark:hover:text-white text-sm font-medium leading-normal" href="#">Sujets</a>
<a class="text-[#0d121b] dark:text-gray-300 dark:hover:text-white text-sm font-medium leading-normal" href="#">Corrigés</a>
<a class="text-[#0d121b] dark:text-gray-300 dark:hover:text-white text-sm font-medium leading-normal" href="#">À propos</a>
<a class="text-primary dark:text-primary text-sm font-bold leading-normal" href="#">Contacts</a>
</div>
<div class="flex gap-2">
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em]">
<span class="truncate">S'inscrire</span>
</button>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-[#e7ebf3] dark:bg-background-dark/80 text-[#0d121b] dark:text-white text-sm font-bold leading-normal tracking-[0.015em]">
<span class="truncate">Se connecter</span>
</button>
</div>
</div>
</header>
<main class="flex-1 px-4 py-12 sm:px-6 lg:px-8">
<div class="max-w-6xl mx-auto">
<div class="flex flex-wrap justify-between gap-4 p-4 text-center md:text-left">
<div class="flex w-full flex-col gap-3">
<h1 class="text-[#0d121b] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em] sm:text-5xl">Une question ? Nous sommes là pour vous aider</h1>
<p class="text-[#4c669a] dark:text-gray-400 text-lg font-normal leading-normal max-w-3xl mx-auto md:mx-0">
                                Remplissez le formulaire ci-dessous ou utilisez nos coordonnées directes. Notre équipe s'engage à vous répondre dans les plus brefs délais.
                            </p>
</div>
</div>
<div class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-16">
<div class="flex flex-col gap-10">
<h2 class="text-[#0d121b] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em]">Nos Coordonnées</h2>
<div class="flex flex-col gap-8">
<div class="flex items-start gap-4">
<div class="flex-shrink-0 bg-primary/10 dark:bg-primary/20 p-3 rounded-lg text-primary">
<span class="material-symbols-outlined">mail</span>
</div>
<div>
<h3 class="text-[#0d121b] dark:text-white text-base font-bold">Email de support</h3>
<p class="text-[#4c669a] dark:text-gray-400 text-sm">Notre équipe est là pour vous aider.</p>
<a class="text-primary text-sm font-medium mt-1 inline-block" href="mailto:support@komora-campus.com">support@komora-campus.com</a>
</div>
</div>
<div class="flex items-start gap-4">
<div class="flex-shrink-0 bg-primary/10 dark:bg-primary/20 p-3 rounded-lg text-primary">
<span class="material-symbols-outlined">call</span>
</div>
<div>
<h3 class="text-[#0d121b] dark:text-white text-base font-bold">Téléphone</h3>
<p class="text-[#4c669a] dark:text-gray-400 text-sm">Lun-Ven de 9h à 18h.</p>
<a class="text-primary text-sm font-medium mt-1 inline-block" href="tel:+33123456789">+33 1 23 45 67 89</a>
</div>
</div>
<div class="flex items-start gap-4">
<div class="flex-shrink-0 bg-primary/10 dark:bg-primary/20 p-3 rounded-lg text-primary">
<span class="material-symbols-outlined">location_on</span>
</div>
<div>
<h3 class="text-[#0d121b] dark:text-white text-base font-bold">Adresse</h3>
<p class="text-[#4c669a] dark:text-gray-400 text-sm">Retrouvez-nous dans nos locaux.</p>
<p class="text-[#0d121b] dark:text-gray-300 text-sm font-medium mt-1">123 Rue de l'Université, 75005 Paris, France</p>
</div>
</div>
</div>
</div>
<div class="flex flex-col gap-6">
<h2 class="text-[#0d121b] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em]">Envoyez-nous un message</h2>
<form action="#" class="space-y-6" method="POST">
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
<label class="flex flex-col flex-1">
<p class="text-[#0d121b] dark:text-white text-base font-medium leading-normal pb-2">Nom complet</p>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d121b] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#cfd7e7] dark:border-gray-700 bg-background-light dark:bg-background-dark focus:border-primary dark:focus:border-primary h-14 placeholder:text-[#4c669a] dark:placeholder-gray-500 p-[15px] text-base font-normal leading-normal" name="name" placeholder="Entrez votre nom complet" required="" type="text" value=""/>
</label>
<label class="flex flex-col flex-1">
<p class="text-[#0d121b] dark:text-white text-base font-medium leading-normal pb-2">Adresse email</p>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d121b] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#cfd7e7] dark:border-gray-700 bg-background-light dark:bg-background-dark focus:border-primary dark:focus:border-primary h-14 placeholder:text-[#4c669a] dark:placeholder-gray-500 p-[15px] text-base font-normal leading-normal" name="email" placeholder="Entrez votre adresse email" required="" type="email" value=""/>
</label>
</div>
<div>
<label class="flex flex-col w-full">
<p class="text-[#0d121b] dark:text-white text-base font-medium leading-normal pb-2">Sujet</p>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#0d121b] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#cfd7e7] dark:border-gray-700 bg-background-light dark:bg-background-dark focus:border-primary dark:focus:border-primary h-14 placeholder:text-[#4c669a] dark:placeholder-gray-500 p-[15px] text-base font-normal leading-normal" name="subject" placeholder="Entrez le sujet de votre message" required="" type="text" value=""/>
</label>
</div>
<div>
<label class="flex flex-col min-w-40 flex-1">
<p class="text-[#0d121b] dark:text-white text-base font-medium leading-normal pb-2">Message</p>
<textarea class="form-textarea flex w-full min-w-0 flex-1 resize-y overflow-hidden rounded-lg text-[#0d121b] dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#cfd7e7] dark:border-gray-700 bg-background-light dark:bg-background-dark focus:border-primary dark:focus:border-primary placeholder:text-[#4c669a] dark:placeholder-gray-500 p-[15px] text-base font-normal leading-normal" name="message" placeholder="Écrivez votre message ici..." required="" rows="5"></textarea>
</label>
</div>
<div class="flex items-center">
<input class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" id="consent" name="consent" required="" type="checkbox"/>
<label class="ml-2 block text-sm text-[#4c669a] dark:text-gray-400" for="consent">J'accepte la politique de confidentialité de KOMORA Campus.</label>
</div>
<div>
<button class="flex w-full min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] hover:bg-opacity-90 transition-colors" type="submit">
<span class="truncate">Envoyer le message</span>
</button>
</div>
</form>
</div>
</div>
</div>
</main>
</div>
</div>
</body></html>