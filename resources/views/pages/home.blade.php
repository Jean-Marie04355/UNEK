@extends('layouts.app')

@section('title', 'Université Emi Koussi (UNEK) | Accueil & Admissions 2026-2027')

@section('content')

<!-- 1. GRAND HERO INTERACTIF AVEC RECHERCHE RAPIDE DE FILIÈRES -->
<section class="relative bg-[#0B1528] overflow-hidden min-h-[660px] lg:min-h-[700px] flex items-center" x-data="{
    activeSlide: 0,
    searchQuery: '',
    slides: [
        {
            title: 'L\'Excellence Académique & les Certifications Internationales au Tchad',
            subtitle: 'Université Emi Koussi (UNEK) - Pôle d\'Innovation, d\'Enseignement Supérieur LMD & de Recherche à N\'Djamena.',
            badge: 'Accréditations & Normes LMD',
            bg: 'linear-gradient(to right, rgba(11, 21, 40, 0.90), rgba(11, 21, 40, 0.60)), url(\'{{ asset('images/unek-remise-diplomes.jpg') }}\')',
            cta1: 'Découvrir nos Formations',
            link1: '{{ route('formations') }}',
            cta2: 'S\'inscrire en Ligne',
            link2: '{{ route('admissions') }}'
        },
        {
            title: 'Des Enseignements Pratiques & Une Formation Académique Solide',
            subtitle: 'À l\'UNEK, nos étudiants bénéficient d\'un encadrement de haut niveau préparant aux exigences du secteur public, privé et entrepreneurial.',
            badge: 'Pédagogie Pratique & Immersion',
            bg: 'linear-gradient(to right, rgba(11, 21, 40, 0.90), rgba(11, 21, 40, 0.60)), url(\'{{ asset('images/unek-etudiants-cours.png') }}\')',
            cta1: 'Calculer vos Frais',
            link1: '{{ route('tarifs') }}',
            cta2: 'Déposer ma Candidature',
            link2: '{{ route('admissions') }}'
        }
    ],
    init() {
        setInterval(() => { this.activeSlide = (this.activeSlide + 1) % this.slides.length }, 7000);
    }
}">
    <!-- Slide Backgrounds -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="activeSlide === index"
             x-transition:enter="transition ease-out duration-700 opacity-0 scale-105"
             x-transition:enter-start="opacity-0 scale-105"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-500 opacity-100"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 bg-cover bg-center"
             :style="`background-image: ${slide.bg}`">
        </div>
    </template>

    <!-- Content Overlay -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 z-10 w-full">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-amber-400/20 border border-amber-400/40 text-amber-300 font-bold text-xs uppercase tracking-wider mb-6">
                <i class="fa-solid fa-award"></i>
                <span x-text="slides[activeSlide].badge"></span>
            </span>

            <h1 class="font-['Outfit'] text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                <span x-text="slides[activeSlide].title"></span>
            </h1>

            <p class="text-base sm:text-lg text-slate-300 leading-relaxed mb-8 font-light" x-text="slides[activeSlide].subtitle"></p>

            <!-- MOTEUR DE RECHERCHE RAPIDE DE FILIÈRE DANS LE HERO -->
            <div class="bg-white/10 backdrop-blur-md p-3.5 rounded-2xl border border-white/20 mb-8 max-w-2xl">
                <form action="{{ route('formations') }}" method="GET" class="flex flex-col sm:flex-row gap-2">
                    <div class="relative flex-1">
                        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-amber-400"></i>
                        <input type="text" name="search" placeholder="Rechercher une formation (ex: Droit, Informatique, Marketing...)" class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-950/70 border border-slate-700 text-white placeholder-slate-400 focus:outline-none focus:border-amber-400 text-xs font-medium">
                    </div>
                    <button type="submit" class="px-6 py-3 rounded-xl bg-gradient-to-r from-amber-400 to-amber-600 text-slate-950 font-extrabold text-xs hover:from-amber-300 hover:to-amber-500 shadow-md transition flex items-center justify-center gap-2">
                        <i class="fa-solid fa-search"></i> Trouver ma Filière
                    </button>
                </form>
            </div>

            <div class="flex flex-wrap gap-4 items-center">
                <a :href="slides[activeSlide].link2" class="px-8 py-4 rounded-xl bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 text-slate-950 font-extrabold text-sm sm:text-base hover:from-amber-300 hover:to-amber-500 shadow-xl shadow-amber-500/20 transform hover:-translate-y-1 transition flex items-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span x-text="slides[activeSlide].cta2"></span>
                </a>
                <a :href="slides[activeSlide].link1" class="px-7 py-4 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-sm sm:text-base backdrop-blur-md transition flex items-center gap-2">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span x-text="slides[activeSlide].cta1"></span>
                </a>
            </div>
        </div>
    </div>

    <!-- Slider Navigation Controls -->
    <div class="absolute bottom-8 right-8 z-20 flex items-center gap-3 bg-slate-950/60 backdrop-blur-md p-2 rounded-full border border-slate-700">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index"
                    class="h-3 rounded-full transition-all duration-300"
                    :class="activeSlide === index ? 'w-8 bg-amber-400' : 'w-3 bg-slate-600 hover:bg-slate-400'">
            </button>
        </template>
    </div>
</section>

<!-- 2. BANNIÈRE CHIFFRES CLÉS ET COMPTEUR D'IMPACT (RUBRIQUE 6) -->
<section class="relative z-30 -mt-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 bg-white border border-slate-200/80 rounded-3xl p-6 shadow-xl shadow-slate-900/5">
        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 text-center hover:border-amber-400/40 transition">
            <div class="font-['Outfit'] font-black text-3xl sm:text-4xl text-amber-600 mb-1">15 000+</div>
            <div class="text-[11px] sm:text-xs text-slate-700 font-extrabold uppercase tracking-wider">Diplômés Formés au Tchad</div>
        </div>
        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 text-center hover:border-emerald-400/40 transition">
            <div class="font-['Outfit'] font-black text-3xl sm:text-4xl text-emerald-600 mb-1">35</div>
            <div class="text-[11px] sm:text-xs text-slate-700 font-extrabold uppercase tracking-wider">Filières LMD Homologuées</div>
        </div>
        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 text-center hover:border-sky-400/40 transition">
            <div class="font-['Outfit'] font-black text-3xl sm:text-4xl text-sky-600 mb-1">94%</div>
            <div class="text-[11px] sm:text-xs text-slate-700 font-extrabold uppercase tracking-wider">Taux d'Insertion Pro</div>
        </div>
        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 text-center hover:border-indigo-400/40 transition">
            <div class="font-['Outfit'] font-black text-3xl sm:text-4xl text-indigo-600 mb-1">100%</div>
            <div class="text-[11px] sm:text-xs text-slate-700 font-extrabold uppercase tracking-wider">Diplômes Homologués par l'État</div>
        </div>
    </div>
</section>

<!-- 3. MODULE DE SUIVI DIRECT DE CANDIDATURE SUR L'ACCUEIL (RUBRIQUE 3) -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-amber-500 via-amber-600 to-amber-700 rounded-3xl p-6 sm:p-10 shadow-xl text-slate-950 relative overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                
                <div class="lg:col-span-5">
                    <span class="px-3 py-1 rounded-full bg-slate-950 text-amber-300 font-extrabold text-[11px] uppercase tracking-wider">
                        Espace Candidats 2026
                    </span>
                    <h2 class="font-['Outfit'] font-black text-2xl sm:text-3xl text-slate-950 mt-3 leading-tight">
                        Consulter l'état de mon dossier de candidature
                    </h2>
                    <p class="text-slate-900 text-xs sm:text-sm mt-2 font-medium">
                        Saisissez votre code dossier (ex: <code class="bg-slate-950 text-amber-300 px-2 py-0.5 rounded font-mono">2026-UNEK-1234</code>) ou votre email pour vérifier votre admission en 1 clic.
                    </p>
                </div>

                <div class="lg:col-span-7 bg-white p-4 sm:p-6 rounded-2xl shadow-lg border border-amber-200">
                    <form action="{{ route('admissions.suivi') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                        <div class="relative flex-1">
                            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-slate-400"></i>
                            <input type="text" name="query" required placeholder="N° Dossier 2026-UNEK-XXXX ou Email..." class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-50 border border-slate-300 text-slate-900 focus:outline-none focus:border-amber-500 text-xs font-bold">
                        </div>
                        <button type="submit" class="px-6 py-3 rounded-xl bg-[#0B1528] hover:bg-slate-800 text-white font-extrabold text-xs shadow-md transition flex items-center justify-center gap-2 shrink-0">
                            <i class="fa-solid fa-qrcode text-amber-400"></i> Vérifier mon Statut
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- 4. EXPLORATEUR DES 2 FACULTÉS & 35 FILIÈRES AVEC FILTRES (RUBRIQUE 2) -->
<section class="py-20 bg-[#0B1528] text-white" x-data="{
    activeFac: 'humaines',
    searchFiliere: ''
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-amber-400 font-bold text-xs uppercase tracking-widest bg-amber-400/10 px-3.5 py-1.5 rounded-full border border-amber-400/20">
                Offre Académique Officielle LMD
            </span>
            <h2 class="font-['Outfit'] text-3xl sm:text-4xl font-extrabold text-white mt-3">
                Explorez nos 2 Facultés & 35 Filières d'Avenir
            </h2>
            <p class="text-slate-300 text-sm mt-3 font-light">
                Choisissez la Faculté de votre choix pour découvrir la liste complète des spécialités ouvertes pour la rentrée 2026-2027.
            </p>
        </div>

        <!-- SWITCHER DE FACULTÉS -->
        <div class="flex justify-center gap-4 mb-10">
            <button @click="activeFac = 'humaines'" class="px-6 py-3 rounded-2xl font-extrabold text-xs sm:text-sm transition flex items-center gap-2 shadow-lg" :class="activeFac === 'humaines' ? 'bg-amber-400 text-slate-950 shadow-amber-400/20' : 'bg-slate-900 text-slate-400 border border-slate-800 hover:text-white'">
                <i class="fa-solid fa-scale-balanced"></i> Faculté des Sciences Humaines & Juridiques (18 Filières)
            </button>
            <button @click="activeFac = 'techniques'" class="px-6 py-3 rounded-2xl font-extrabold text-xs sm:text-sm transition flex items-center gap-2 shadow-lg" :class="activeFac === 'techniques' ? 'bg-amber-400 text-slate-950 shadow-amber-400/20' : 'bg-slate-900 text-slate-400 border border-slate-800 hover:text-white'">
                <i class="fa-solid fa-laptop-code"></i> Faculté des Sciences et Techniques (17 Filières)
            </button>
        </div>

        <!-- FACULTÉ 1: SCIENCES HUMAINES & JURIDIQUES -->
        <div x-show="activeFac === 'humaines'" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-amber-400/10 text-amber-400 flex items-center justify-center font-bold text-lg mb-2">
                    <i class="fa-solid fa-scale-balanced"></i>
                </div>
                <h3 class="font-['Outfit'] font-bold text-lg text-white">Droit & Sciences Politiques</h3>
                <ul class="space-y-2 text-xs text-slate-300">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-amber-400"></i> Droit Privé & Droit Public</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-amber-400"></i> Sciences Politiques</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-amber-400"></i> Relations Internationales</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-amber-400"></i> Propriété Intellectuelle</li>
                </ul>
            </div>

            <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-sky-400/10 text-sky-400 flex items-center justify-center font-bold text-lg mb-2">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
                <h3 class="font-['Outfit'] font-bold text-lg text-white">Gestion & Comptabilité</h3>
                <ul class="space-y-2 text-xs text-slate-300">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-sky-400"></i> Gestion des Entreprises</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-sky-400"></i> Comptabilité & Finance</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-sky-400"></i> Marketing & Communication</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-sky-400"></i> Ressources Humaines</li>
                </ul>
            </div>

            <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-400/10 text-emerald-400 flex items-center justify-center font-bold text-lg mb-2">
                    <i class="fa-solid fa-landmark"></i>
                </div>
                <h3 class="font-['Outfit'] font-bold text-lg text-white">Sciences Sociales & Économie</h3>
                <ul class="space-y-2 text-xs text-slate-300">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-400"></i> Économie & Développement</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-400"></i> Administration Publique</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-400"></i> Journalisme & Communication</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-400"></i> Management de Projets</li>
                </ul>
            </div>
        </div>

        <!-- FACULTÉ 2: SCIENCES ET TECHNIQUES -->
        <div x-show="activeFac === 'techniques'" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-cyan-400/10 text-cyan-400 flex items-center justify-center font-bold text-lg mb-2">
                    <i class="fa-solid fa-code"></i>
                </div>
                <h3 class="font-['Outfit'] font-bold text-lg text-white">Informatique & Numérique</h3>
                <ul class="space-y-2 text-xs text-slate-300">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Génie Logiciel & Web</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Réseaux & Télécommunications</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Mathématiques Appliquées</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Maintenance Informatique</li>
                </ul>
            </div>

            <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-amber-400/10 text-amber-400 flex items-center justify-center font-bold text-lg mb-2">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <h3 class="font-['Outfit'] font-bold text-lg text-white">Génie & Énergies</h3>
                <ul class="space-y-2 text-xs text-slate-300">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-amber-400"></i> Génie Civil & BTP</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-amber-400"></i> Électronique Industrielle</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-amber-400"></i> Énergies Renouvelables</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-amber-400"></i> Maintenance Industrielle</li>
                </ul>
            </div>

            <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-400/10 text-emerald-400 flex items-center justify-center font-bold text-lg mb-2">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <h3 class="font-['Outfit'] font-bold text-lg text-white">Environnement & Géosciences</h3>
                <ul class="space-y-2 text-xs text-slate-300">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-400"></i> Géologie & Géophysique</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-400"></i> Hydrogéologie</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-400"></i> Agronomie & Développement Durable</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-400"></i> Environnement</li>
                </ul>
            </div>
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('formations') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-slate-950 font-extrabold text-xs transition shadow-lg">
                <i class="fa-solid fa-list-check"></i> Voir le Catalogue Complet des 35 Filières LMD
            </a>
        </div>

    </div>
</section>

<!-- 5. VALEURS INSTITUTIONNELLES -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-widest bg-amber-50 px-3.5 py-1.5 rounded-full border border-amber-200">
                Pourquoi choisir l'Université Emi Koussi ?
            </span>
            <h2 class="font-['Outfit'] text-3xl sm:text-4xl font-extrabold text-slate-900 mt-4 leading-tight">
                Une Formation Conçue pour le Marché du Travail & les Standards Internationaux
            </h2>
            <p class="text-slate-600 text-sm sm:text-base mt-4 font-normal leading-relaxed">
                L'UNEK combine rigueur scientifique, immersion en entreprise, travaux pratiques modernes et accompagnement personnalisé vers l'emploi.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="p-8 rounded-2xl bg-slate-50/70 border border-slate-200/80 hover:border-amber-500/40 hover:shadow-lg transition duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-[#0F172A] text-amber-400 flex items-center justify-center text-xl font-bold mb-6 shadow-md group-hover:scale-110 transition transform">
                    <i class="fa-solid fa-certificate"></i>
                </div>
                <h3 class="font-['Outfit'] font-bold text-xl text-slate-900 mb-3">Système LMD & Certifications</h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                    Un cursus structuré en 6 semestres pour la Licence et 4 semestres pour le Master, permettant la mobilité académique et des diplômes reconnus.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="p-8 rounded-2xl bg-slate-50/70 border border-slate-200/80 hover:border-amber-500/40 hover:shadow-lg transition duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-[#0F172A] text-teal-400 flex items-center justify-center text-xl font-bold mb-6 shadow-md group-hover:scale-110 transition transform">
                    <i class="fa-solid fa-laptop-code"></i>
                </div>
                <h3 class="font-['Outfit'] font-bold text-xl text-slate-900 mb-3">Laboratoires high-tech & Pratique</h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                    Accès permanent aux salles multimédia, laboratoires de simulation informatique, hubs de développement web/mobile et équipements de santé.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="p-8 rounded-2xl bg-slate-50/70 border border-slate-200/80 hover:border-amber-500/40 hover:shadow-lg transition duration-300 group">
                <div class="w-12 h-12 rounded-xl bg-[#0F172A] text-sky-400 flex items-center justify-center text-xl font-bold mb-6 shadow-md group-hover:scale-110 transition transform">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <h3 class="font-['Outfit'] font-bold text-xl text-slate-900 mb-3">Réseau d'Entreprises & Stages</h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                    Partenariats stratégiques garantissant des stages d'immersion obligatoires et un suivi continu pour l'insertion professionnelle de chaque étudiant.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 6. VIE ÉTUDIANTE & PHOTOS RÉELLES DES ÉTUDIANTS UNEK -->
<section class="py-20 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-widest bg-amber-100/60 px-3.5 py-1.5 rounded-full border border-amber-200">
                Vie de Campus & Activités
            </span>
            <h2 class="font-['Outfit'] text-3xl sm:text-4xl font-extrabold text-slate-900 mt-4">
                La Vie Étudiante au Cœur du Campus UNEK
            </h2>
            <p class="text-slate-600 text-sm sm:text-base mt-3">
                Au-delà des cours académiques, l'UNEK offre un environnement dynamique porté par le Bureau Des Étudiants (BDE), des clubs scientifiques et des soutenances officielles.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Item 1 -->
            <div class="rounded-2xl overflow-hidden shadow-md group relative">
                <img src="{{ asset('images/unek-etudiants-cours.png') }}" alt="Étudiants UNEK en salle de cours" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent p-6 flex flex-col justify-end">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider">Cours Pratiques UNEK</span>
                    <h3 class="font-['Outfit'] font-bold text-lg text-white mt-1">Étudiants en Salle de Cours</h3>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="rounded-2xl overflow-hidden shadow-md group relative">
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=800&auto=format&fit=crop" alt="Conférences et soutenance UNEK" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent p-6 flex flex-col justify-end">
                    <span class="text-xs font-bold text-sky-400 uppercase tracking-wider">Conférences & Colloques</span>
                    <h3 class="font-['Outfit'] font-bold text-lg text-white mt-1">Rencontres avec les Experts</h3>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="rounded-2xl overflow-hidden shadow-md group relative">
                <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=800&auto=format&fit=crop" alt="Sports UNEK" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent p-6 flex flex-col justify-end">
                    <span class="text-xs font-bold text-emerald-400 uppercase tracking-wider">Activités Sportives</span>
                    <h3 class="font-['Outfit'] font-bold text-lg text-white mt-1">Tournois Inter-filières</h3>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="rounded-2xl overflow-hidden shadow-md group relative">
                <img src="{{ asset('images/unek-remise-diplomes.jpg') }}" alt="Cérémonie Officielle de Remise des Diplômes UNEK" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent p-6 flex flex-col justify-end">
                    <span class="text-xs font-bold text-rose-400 uppercase tracking-wider">Cérémonie Officielle UNEK</span>
                    <h3 class="font-['Outfit'] font-bold text-lg text-white mt-1">Remise des Diplômes LMD</h3>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
