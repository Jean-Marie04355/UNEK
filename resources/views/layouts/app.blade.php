<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Université Emi Koussi (UNEK) | N\'Djamena, Tchad - Excellence Académique LMD')</title>
    <meta name="description" content="Université Emi Koussi (UNEK) - Établissement d'Enseignement Supérieur à N'Djamena. Formations certifiées LMD en Sciences & Technologies, Management, Santé Publique et Droit. Inscriptions ouvertes.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons (FontAwesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN Fallback -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen font-['Plus_Jakarta_Sans'] antialiased" x-data="{ mobileMenuOpen: false }">

    <!-- NAVIGATION PRINCIPALE LUMINEUSE & ÉPURÉE -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-sm text-slate-900 transition-all duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo Officiel UNEK -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-xl bg-[#0F172A] flex items-center justify-center shadow-md ring-1 ring-slate-900/10 group-hover:scale-105 transition transform">
                        <i class="fa-solid fa-graduation-cap text-amber-400 text-xl"></i>
                    </div>
                    <div>
                        <div class="font-['Outfit'] font-extrabold text-xl sm:text-2xl tracking-tight text-slate-900 flex items-center gap-1.5 leading-none">
                            UNEK <span class="text-[10px] font-bold px-1.5 py-0.5 rounded bg-amber-500/10 text-amber-700 border border-amber-500/20">LMD</span>
                        </div>
                        <p class="text-[10px] text-slate-500 font-semibold tracking-wider uppercase mt-1">Université Emi Koussi</p>
                    </div>
                </a>

                <!-- Navigation Desktop Épurée -->
                <nav class="hidden lg:flex items-center space-x-1 font-medium text-sm">
                    <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('home') ? 'text-[#0F172A] font-bold bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        Accueil
                    </a>
                    <a href="{{ route('universite') }}" class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('universite') ? 'text-[#0F172A] font-bold bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        L'Université
                    </a>
                    <a href="{{ route('formations') }}" class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('formations') ? 'text-[#0F172A] font-bold bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        Formations
                    </a>
                    <a href="{{ route('admissions') }}" class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('admissions') ? 'text-[#0F172A] font-bold bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        Admissions
                    </a>
                    <a href="{{ route('tarifs') }}" class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('tarifs') ? 'text-[#0F172A] font-bold bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        Tarifs
                    </a>
                    <a href="{{ route('vie-etudiante') }}" class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('vie-etudiante') ? 'text-[#0F172A] font-bold bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        Vie Étudiante
                    </a>
                    <a href="{{ route('actualites') }}" class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('actualites') ? 'text-[#0F172A] font-bold bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        Actualités
                    </a>
                    <a href="{{ route('contact') }}" class="px-3.5 py-2 rounded-lg transition {{ request()->routeIs('contact') ? 'text-[#0F172A] font-bold bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        Contact
                    </a>
                </nav>

                <!-- Action CTA -->
                <div class="hidden sm:flex items-center gap-3">
                    <a href="{{ route('admissions') }}" class="px-5 py-2.5 text-xs font-bold rounded-lg bg-[#0F172A] hover:bg-slate-800 text-white shadow-md shadow-slate-900/10 transition transform hover:-translate-y-0.5 flex items-center gap-2">
                        <i class="fa-solid fa-pen-to-square text-amber-400"></i> S'inscrire en ligne
                    </a>
                </div>

                <!-- Bouton Mobile -->
                <div class="flex lg:hidden items-center gap-2">
                    <a href="{{ route('admissions') }}" class="px-3 py-1.5 text-xs font-bold rounded bg-[#0F172A] text-white">
                        Inscription
                    </a>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 transition">
                        <i class="fa-solid" :class="mobileMenuOpen ? 'fa-xmark text-xl' : 'fa-bars text-xl'"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu Drawer Mobile -->
        <div x-show="mobileMenuOpen" x-collapse x-cloak class="lg:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-6 space-y-1.5 shadow-xl">
            <a href="{{ route('home') }}" class="block px-4 py-2.5 rounded-lg text-slate-700 hover:bg-slate-100 font-medium">Accueil</a>
            <a href="{{ route('universite') }}" class="block px-4 py-2.5 rounded-lg text-slate-700 hover:bg-slate-100 font-medium">L'Université</a>
            <a href="{{ route('formations') }}" class="block px-4 py-2.5 rounded-lg text-slate-700 hover:bg-slate-100 font-medium">Nos Formations</a>
            <a href="{{ route('admissions') }}" class="block px-4 py-2.5 rounded-lg text-slate-700 hover:bg-slate-100 font-medium">Admissions & Inscriptions</a>
            <a href="{{ route('tarifs') }}" class="block px-4 py-2.5 rounded-lg text-slate-700 hover:bg-slate-100 font-medium">Frais & Tarifs</a>
            <a href="{{ route('vie-etudiante') }}" class="block px-4 py-2.5 rounded-lg text-slate-700 hover:bg-slate-100 font-medium">Vie Étudiante</a>
            <a href="{{ route('actualites') }}" class="block px-4 py-2.5 rounded-lg text-slate-700 hover:bg-slate-100 font-medium">Actualités</a>
            <a href="{{ route('contact') }}" class="block px-4 py-2.5 rounded-lg text-slate-700 hover:bg-slate-100 font-medium">Contact</a>
        </div>
    </header>

    <!-- CONTENT BODY -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER INSTITUTIONNEL MODERNE -->
    <footer class="bg-[#0B1528] text-slate-300 pt-16 pb-8 border-t-2 border-amber-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-slate-800">
                
                <!-- Col 1: Université UNEK -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-amber-400 flex items-center justify-center text-slate-950 font-bold text-xl">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <span class="font-['Outfit'] font-extrabold text-2xl text-white">UNEK</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        L'Université Emi Koussi (UNEK) est un établissement d'enseignement supérieur d'excellence à N'Djamena. Diplômes reconnus, corps professoral hautement qualifié et équipements modernes.
                    </p>
                    <div class="flex items-center gap-3 text-slate-400">
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-amber-400 hover:text-slate-950 flex items-center justify-center transition"><i class="fa-brands fa-facebook-f text-xs"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-amber-400 hover:text-slate-950 flex items-center justify-center transition"><i class="fa-brands fa-linkedin-in text-xs"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-amber-400 hover:text-slate-950 flex items-center justify-center transition"><i class="fa-brands fa-whatsapp text-xs"></i></a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-amber-400 hover:text-slate-950 flex items-center justify-center transition"><i class="fa-brands fa-youtube text-xs"></i></a>
                    </div>
                </div>

                <!-- Col 2: Pôles de Formation -->
                <div>
                    <h4 class="font-['Outfit'] text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-amber-400 pl-2">Nos Pôles LMD</h4>
                    <ul class="space-y-2 text-xs text-slate-300">
                        <li><a href="{{ route('formations') }}" class="hover:text-amber-400 transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-amber-400"></i> Sciences Humaines & Juridiques</a></li>
                        <li><a href="{{ route('formations') }}" class="hover:text-amber-400 transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-amber-400"></i> Sciences de Gestion & Économie</a></li>
                        <li><a href="{{ route('formations') }}" class="hover:text-amber-400 transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-amber-400"></i> Sciences et Techniques</a></li>
                        <li><a href="{{ route('formations') }}" class="hover:text-amber-400 transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-amber-400"></i> Ingénierie & Informatique</a></li>
                        <li><a href="{{ route('admissions') }}" class="hover:text-amber-400 transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-amber-400"></i> Masters & Formation Continue</a></li>
                    </ul>
                </div>

                <!-- Col 3: Liens Rapides -->
                <div>
                    <h4 class="font-['Outfit'] text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-amber-400 pl-2">Services Étudiants</h4>
                    <ul class="space-y-2 text-xs text-slate-300">
                        <li><a href="{{ route('admissions') }}" class="hover:text-amber-400 transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-amber-400"></i> Inscription en Ligne</a></li>
                        <li><a href="{{ route('tarifs') }}" class="hover:text-amber-400 transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-amber-400"></i> Barème des Frais</a></li>
                        <li><a href="{{ route('vie-etudiante') }}" class="hover:text-amber-400 transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-amber-400"></i> Vie sur le Campus</a></li>
                        <li><a href="{{ route('actualites') }}" class="hover:text-amber-400 transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-[10px] text-amber-400"></i> Calendrier Académique</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact & Campus -->
                <div>
                    <h4 class="font-['Outfit'] text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-amber-400 pl-2">Campus N'Djamena</h4>
                    <ul class="space-y-3 text-xs text-slate-300">
                        <li class="flex items-start gap-2.5">
                            <i class="fa-solid fa-location-dot text-amber-400 mt-0.5"></i>
                            <span>Moursal / Ardep-djoumbal, N'Djamena, Tchad</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-phone text-amber-400"></i>
                            <span>+235 66 28 00 00 / +235 99 28 00 00</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-regular fa-envelope text-amber-400"></i>
                            <span>contact@unek-tchad.org</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-clock text-amber-400"></i>
                            <span>Lundi - Samedi : 07h30 - 18h00</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Bas de page -->
            <div class="pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-400">
                <p>&copy; 2026 Université Emi Koussi (UNEK). Tous droits réservés.</p>
                <div class="flex items-center gap-6">
                    <span class="text-amber-400 font-medium">Diplômes Homologués LMD - Ministère de l'Enseignement Supérieur du Tchad</span>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

