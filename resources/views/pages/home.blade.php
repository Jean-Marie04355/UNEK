@extends('layouts.app')

@section('title', 'Université Emi Koussi (UNEK) | Accueil & Admissions 2026-2027')

@section('content')

<!-- 1. GRAND SLIDER HERO -->
<section class="relative bg-[#0B1528] overflow-hidden min-h-[580px] lg:min-h-[640px] flex items-center" x-data="{
    activeSlide: 0,
    slides: [
        {
            title: 'L\'Excellence Académique & les Certifications Internationales au Tchad',
            subtitle: 'Université Emi Koussi (UNEK) - Pôle d\'Innovation, d\'Enseignement Supérieur LMD & de Recherche à N\'Djamena.',
            badge: 'Accréditations & Normes LMD',
            bg: 'linear-gradient(to right, rgba(11, 21, 40, 0.88), rgba(11, 21, 40, 0.55)), url(\'{{ asset('images/unek-remise-diplomes.jpg') }}\')',
            cta1: 'Découvrir nos Formations',
            link1: '{{ route('formations') }}',
            cta2: 'S\'inscrire en Ligne',
            link2: '{{ route('admissions') }}'
        },
        {
            title: 'Des Enseignements Pratiques & Une Formation Académique Solide',
            subtitle: 'À l\'UNEK, nos étudiants bénéficient d\'un encadrement de haut niveau préparant aux exigences du secteur public, privé et entrepreneurial.',
            badge: 'Pédagogie Pratique & Immersion',
            bg: 'linear-gradient(to right, rgba(11, 21, 40, 0.88), rgba(11, 21, 40, 0.55)), url(\'{{ asset('images/unek-etudiants-cours.png') }}\')',
            cta1: 'Calculer vos Frais',
            link1: '{{ route('tarifs') }}',
            cta2: 'Déposer ma Candidature',
            link2: '{{ route('admissions') }}'
        },
        {
            title: 'Laboratoires High-Tech, Salles Multimédia & Équipements Spécialisés',
            subtitle: 'Un cadre d\'études ultra-moderne conçu pour la pratique intensive, le codage, les sciences et les technologies.',
            badge: 'Infrastructure LMD de Pointe',
            bg: 'linear-gradient(to right, rgba(11, 21, 40, 0.88), rgba(11, 21, 40, 0.55)), url(\'https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=1600&auto=format&fit=crop\')',
            cta1: 'Découvrir le Campus',
            link1: '{{ route('vie-etudiante') }}',
            cta2: 'Postuler Maintenant',
            link2: '{{ route('admissions') }}'
        }
    ],
    init() {
        setInterval(() => { this.activeSlide = (this.activeSlide + 1) % this.slides.length }, 6000);
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

    <!-- Content overlay -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 z-10 w-full">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-400/20 border border-amber-400/40 text-amber-300 font-bold text-xs uppercase tracking-wider mb-6 animate-pulse-glow">
                <i class="fa-solid fa-award"></i>
                <span x-text="slides[activeSlide].badge"></span>
            </span>

            <h1 class="font-['Outfit'] text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                <span x-text="slides[activeSlide].title"></span>
            </h1>

            <p class="text-base sm:text-lg text-slate-300 leading-relaxed mb-8 font-light" x-text="slides[activeSlide].subtitle"></p>

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

<!-- 2. BANNIÈRE FLOTTANTE CHIFFRES CLÉS -->
<section class="relative z-30 -mt-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 bg-white border border-slate-200/80 rounded-2xl p-6 shadow-xl shadow-slate-900/5">
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 text-center">
            <div class="font-['Outfit'] font-extrabold text-3xl sm:text-4xl text-amber-600 mb-1">15+</div>
            <div class="text-[11px] sm:text-xs text-slate-600 font-semibold uppercase tracking-wider">Filières LMD Homologuées</div>
        </div>
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 text-center">
            <div class="font-['Outfit'] font-extrabold text-3xl sm:text-4xl text-emerald-600 mb-1">94%</div>
            <div class="text-[11px] sm:text-xs text-slate-600 font-semibold uppercase tracking-wider">Taux d'Insertion Pro</div>
        </div>
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 text-center">
            <div class="font-['Outfit'] font-extrabold text-3xl sm:text-4xl text-sky-600 mb-1">5000+</div>
            <div class="text-[11px] sm:text-xs text-slate-600 font-semibold uppercase tracking-wider">Étudiants & Alumnis</div>
        </div>
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 text-center">
            <div class="font-['Outfit'] font-extrabold text-3xl sm:text-4xl text-indigo-600 mb-1">25+</div>
            <div class="text-[11px] sm:text-xs text-slate-600 font-semibold uppercase tracking-wider">Partenaires Internationaux</div>
        </div>
    </div>
</section>

<!-- 3. ACCROCHE INSTITUTIONNELLE & VALEURS -->
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

<!-- 4. CATALOGUE DES PÔLES DE FORMATIONS -->
<section class="py-20 bg-[#0B1528] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="text-amber-400 font-bold text-xs uppercase tracking-widest">Offre Académique UNEK</span>
                <h2 class="font-['Outfit'] text-3xl sm:text-4xl font-extrabold text-white mt-2">
                    Catalogue des Pôles de Formation (Licence & Master)
                </h2>
            </div>
            <a href="{{ route('formations') }}" class="mt-4 md:mt-0 text-amber-400 font-bold text-sm hover:underline flex items-center gap-2">
                Voir toutes les filières en détail <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Pôle 1: Sciences & Technologies -->
            <div class="bg-slate-900/90 rounded-2xl border border-slate-800 p-6 flex flex-col justify-between hover:border-cyan-500/50 transition">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-300 font-semibold text-xs border border-cyan-500/20">Pôle Tech</span>
                        <i class="fa-solid fa-microchip text-2xl text-cyan-400"></i>
                    </div>
                    <h3 class="font-['Outfit'] font-bold text-2xl text-white mb-3">Sciences & Technologies</h3>
                    <p class="text-slate-400 text-xs sm:text-sm mb-6 leading-relaxed">
                        Formations de pointe aux métiers du numérique, du génie logiciel, des télécoms et de la cybersécurité.
                    </p>
                    <ul class="space-y-2.5 text-xs text-slate-300 mb-6">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Génie Logiciel & Dev Web/Mobile</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Réseaux, Télécommunications & Cloud</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-cyan-400"></i> Sécurité Informatique & Cybersécurité</li>
                    </ul>
                </div>
                <div>
                    <a href="{{ route('formations') }}#sciences" class="block w-full text-center py-2.5 rounded-xl bg-cyan-500/15 text-cyan-300 hover:bg-cyan-500 hover:text-slate-950 font-bold text-xs transition">
                        Consulter les Fiches Filières
                    </a>
                </div>
            </div>

            <!-- Pôle 2: Management & Sciences de Gestion -->
            <div class="bg-slate-900/90 rounded-2xl border border-slate-800 p-6 flex flex-col justify-between hover:border-amber-500/50 transition">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-300 font-semibold text-xs border border-amber-500/20">Pôle Management</span>
                        <i class="fa-solid fa-chart-line text-2xl text-amber-400"></i>
                    </div>
                    <h3 class="font-['Outfit'] font-bold text-2xl text-white mb-3">Management & Gestion</h3>
                    <p class="text-slate-400 text-xs sm:text-sm mb-6 leading-relaxed">
                        Préparation des futurs cadres dirigeants en comptabilité, marketing digital, ressources humaines et logistique.
                    </p>
                    <ul class="space-y-2.5 text-xs text-slate-300 mb-6">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-amber-400"></i> Comptabilité - Contrôle - Audit (CCA)</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-amber-400"></i> Marketing & Communication Digitale</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-amber-400"></i> Transport, Logistique & Supply Chain</li>
                    </ul>
                </div>
                <div>
                    <a href="{{ route('formations') }}#management" class="block w-full text-center py-2.5 rounded-xl bg-amber-500/15 text-amber-300 hover:bg-amber-500 hover:text-slate-950 font-bold text-xs transition">
                        Consulter les Fiches Filières
                    </a>
                </div>
            </div>

            <!-- Pôle 3: Santé Publique & Droit -->
            <div class="bg-slate-900/90 rounded-2xl border border-slate-800 p-6 flex flex-col justify-between hover:border-emerald-500/50 transition">
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-300 font-semibold text-xs border border-emerald-500/20">Pôle Santé & Droit</span>
                        <i class="fa-solid fa-user-nurse text-2xl text-emerald-400"></i>
                    </div>
                    <h3 class="font-['Outfit'] font-bold text-2xl text-white mb-3">Santé & Droit</h3>
                    <p class="text-slate-400 text-xs sm:text-sm mb-6 leading-relaxed">
                        Filières spécialisées répondant aux enjeux sanitaires et juridiques contemporains du Tchad et de la région.
                    </p>
                    <ul class="space-y-2.5 text-xs text-slate-300 mb-6">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-400"></i> Santé Publique & Épidémiologie</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-400"></i> Sciences Infirmières & Obstétricales</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-400"></i> Droit des Affaires & Fiscalité</li>
                    </ul>
                </div>
                <div>
                    <a href="{{ route('formations') }}#sante" class="block w-full text-center py-2.5 rounded-xl bg-emerald-500/15 text-emerald-300 hover:bg-emerald-500 hover:text-slate-950 font-bold text-xs transition">
                        Consulter les Fiches Filières
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- 5. TUNNEL D'ADMISSION RAPIDE -->
<section class="py-20 bg-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-[#0B1528] rounded-3xl p-8 sm:p-12 text-white shadow-xl border border-slate-800">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                
                <div>
                    <span class="px-3.5 py-1 rounded-full bg-amber-400/20 text-amber-300 border border-amber-400/30 font-bold text-xs uppercase tracking-wider">
                        Admission en Ligne Simplifiée
                    </span>
                    <h2 class="font-['Outfit'] text-3xl sm:text-4xl font-extrabold text-white mt-4 leading-tight">
                        Postulez à l'UNEK en 4 Étapes Rapides
                    </h2>
                    <p class="text-slate-300 text-sm mt-3 leading-relaxed">
                        Le portail d'inscription en ligne vous permet de déposer votre dossier numérisé à tout moment et d'obtenir un accusé de réception immédiat avec numéro de dossier.
                    </p>

                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-400 text-slate-950 font-bold flex items-center justify-center shrink-0">1</div>
                            <div>
                                <h4 class="font-bold text-xs text-white">Identification</h4>
                                <p class="text-[11px] text-slate-400">Coordonnées candidat</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-400 text-slate-950 font-bold flex items-center justify-center shrink-0">2</div>
                            <div>
                                <h4 class="font-bold text-xs text-white">Choix de la Filière</h4>
                                <p class="text-[11px] text-slate-400">Licence ou Master</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-400 text-slate-950 font-bold flex items-center justify-center shrink-0">3</div>
                            <div>
                                <h4 class="font-bold text-xs text-white">Dépôt des Pièces</h4>
                                <p class="text-[11px] text-slate-400">Bac, Relevés, CNI, Photo</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-400 text-slate-950 font-bold flex items-center justify-center shrink-0">4</div>
                            <div>
                                <h4 class="font-bold text-xs text-white">Accusé Réception</h4>
                                <p class="text-[11px] text-slate-400">Numéro n° UNEK-2026</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('admissions') }}" class="px-8 py-3.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-slate-950 font-extrabold text-sm shadow-lg transition flex items-center gap-2">
                            <i class="fa-solid fa-file-signature"></i> Commencer ma Pré-inscription
                        </a>
                        <a href="{{ route('tarifs') }}" class="px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-sm border border-white/20 transition">
                            Consulter les Tarifs
                        </a>
                    </div>
                </div>

                <!-- Simulation Visual Card -->
                <div class="bg-slate-900/90 p-6 sm:p-8 rounded-2xl border border-slate-800 shadow-lg">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-800 mb-6">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-shield-halved text-amber-400 text-xl"></i>
                            <span class="font-['Outfit'] font-bold text-base text-white">Pièces Numériques Requises</span>
                        </div>
                        <span class="text-[11px] text-amber-400 font-semibold px-2 py-0.5 rounded bg-amber-400/10">Format PDF / JPG</span>
                    </div>

                    <ul class="space-y-4 text-xs">
                        <li class="p-3 rounded-lg bg-white/5 border border-white/10 flex items-center justify-between">
                            <span class="text-slate-200"><i class="fa-solid fa-file-pdf text-rose-400 mr-2"></i> Attestation de Réussite au Baccalauréat</span>
                            <i class="fa-solid fa-circle-check text-emerald-400 text-base"></i>
                        </li>
                        <li class="p-3 rounded-lg bg-white/5 border border-white/10 flex items-center justify-between">
                            <span class="text-slate-200"><i class="fa-solid fa-file-lines text-sky-400 mr-2"></i> Relevés de Notes des Dernières Années</span>
                            <i class="fa-solid fa-circle-check text-emerald-400 text-base"></i>
                        </li>
                        <li class="p-3 rounded-lg bg-white/5 border border-white/10 flex items-center justify-between">
                            <span class="text-slate-200"><i class="fa-solid fa-address-card text-amber-400 mr-2"></i> Copie de la Carte d'Identité ou Passeport</span>
                            <i class="fa-solid fa-circle-check text-emerald-400 text-base"></i>
                        </li>
                        <li class="p-3 rounded-lg bg-white/5 border border-white/10 flex items-center justify-between">
                            <span class="text-slate-200"><i class="fa-solid fa-image text-emerald-400 mr-2"></i> 2 Photos d'Identité Récents</span>
                            <i class="fa-solid fa-circle-check text-emerald-400 text-base"></i>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- 6. VIE ÉTUDIANTE & CAMPUS -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-widest bg-amber-50 px-3.5 py-1.5 rounded-full border border-amber-200">
                Vie Épanouie & Communauté
            </span>
            <h2 class="font-['Outfit'] text-3xl sm:text-4xl font-extrabold text-slate-900 mt-4">
                La Vie Étudiante au Cœur du Campus UNEK
            </h2>
            <p class="text-slate-600 text-sm sm:text-base mt-3">
                Au-delà des cours académiques, l'UNEK offre un environnement dynamique porté par le Bureau Des Étudiants (BDE), des clubs scientifiques, des tournois sportifs et des conférences.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Item 1 -->
            <div class="rounded-2xl overflow-hidden shadow-md group relative">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop" alt="Club de Codage UNEK" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent p-6 flex flex-col justify-end">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider">Tech Club & Hackathons</span>
                    <h3 class="font-['Outfit'] font-bold text-lg text-white mt-1">Clubs de Développement & IA</h3>
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

        <div class="text-center mt-10">
            <a href="{{ route('vie-etudiante') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold transition">
                Explorer la Galerie Multimédia <i class="fa-solid fa-photo-film text-amber-400"></i>
            </a>
        </div>

    </div>
</section>

<!-- 7. AGENDA DYNAMIQUE & ACTUALITÉS -->
<section class="py-20 bg-slate-50 text-slate-900 border-t border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="text-amber-700 font-bold text-xs uppercase tracking-widest bg-amber-100/60 px-3 py-1 rounded-full border border-amber-200">Événements & Publications</span>
                <h2 class="font-['Outfit'] text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3">
                    Agenda des Rentrées & Actualités UNEK
                </h2>
            </div>
            <a href="{{ route('actualites') }}" class="mt-4 md:mt-0 text-slate-900 font-bold text-sm hover:text-amber-700 flex items-center gap-2 transition">
                Toutes les actualités <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Article 1 -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center gap-3 text-xs text-amber-700 font-semibold mb-3">
                    <i class="fa-solid fa-calendar-days"></i> 15 Octobre 2026
                    <span class="text-slate-300">•</span>
                    <span class="text-slate-500">Rentrée Académique</span>
                </div>
                <h3 class="font-['Outfit'] font-bold text-xl text-slate-900 mb-3 hover:text-amber-700 transition">
                    Ouverture des Inscriptions pour les Masters et Licences 2026-2027
                </h3>
                <p class="text-slate-600 text-xs leading-relaxed mb-4">
                    Les admissions en ligne sont officiellement ouvertes pour tous les bacheliers et professionnels souhaitant intégrer les pôles Sciences, Management et Santé.
                </p>
                <a href="{{ route('actualites') }}" class="text-slate-900 font-bold text-xs hover:text-amber-700 flex items-center gap-1">
                    Lire la suite <i class="fa-solid fa-angle-right text-[10px]"></i>
                </a>
            </div>

            <!-- Article 2 -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center gap-3 text-xs text-sky-700 font-semibold mb-3">
                    <i class="fa-solid fa-calendar-days"></i> 28 Septembre 2026
                    <span class="text-slate-300">•</span>
                    <span class="text-slate-500">Journée Portes Ouvertes</span>
                </div>
                <h3 class="font-['Outfit'] font-bold text-xl text-slate-900 mb-3 hover:text-sky-700 transition">
                    Grandes Journées Portes Ouvertes au Campus Moursal de N'Djamena
                </h3>
                <p class="text-slate-600 text-xs leading-relaxed mb-4">
                    Venez rencontrer l'équipe pédagogique, visiter nos salles de travaux pratiques informatiques et échanger avec les représentants du BDE.
                </p>
                <a href="{{ route('actualites') }}" class="text-slate-900 font-bold text-xs hover:text-sky-700 flex items-center gap-1">
                    Lire la suite <i class="fa-solid fa-angle-right text-[10px]"></i>
                </a>
            </div>

            <!-- Article 3 -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition">
                <div class="flex items-center gap-3 text-xs text-emerald-700 font-semibold mb-3">
                    <i class="fa-solid fa-calendar-days"></i> 05 Novembre 2026
                    <span class="text-slate-300">•</span>
                    <span class="text-slate-500">Soutenances Master</span>
                </div>
                <h3 class="font-['Outfit'] font-bold text-xl text-slate-900 mb-3 hover:text-emerald-700 transition">
                    Session de Soutenances des Périodes de Stage en Entreprise
                </h3>
                <p class="text-slate-600 text-xs leading-relaxed mb-4">
                    Présentation publique des travaux de fin d'études devant des jurys composés d'universitaires et d'experts du monde des affaires.
                </p>
                <a href="{{ route('actualites') }}" class="text-slate-900 font-bold text-xs hover:text-emerald-700 flex items-center gap-1">
                    Lire la suite <i class="fa-solid fa-angle-right text-[10px]"></i>
                </a>
            </div>
        </div>

    </div>
</section>


@endsection
