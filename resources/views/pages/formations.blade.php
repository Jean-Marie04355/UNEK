@extends('layouts.app')

@section('title', 'Offre Académique & Facultés | Université Emi Koussi (UNEK)')

@section('content')

<!-- Header Banner -->
<section class="bg-[#0B1528] text-white py-16 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="px-3.5 py-1 rounded-full bg-amber-400/20 text-amber-300 font-extrabold text-xs uppercase tracking-widest border border-amber-400/30">
            Facultés & Diplômes Homologués LMD
        </span>
        <h1 class="font-['Outfit'] text-3xl sm:text-5xl font-extrabold text-white mt-4 leading-tight">
            Offre Académique & Fiches des Filières
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-3xl mx-auto mt-3 font-light leading-relaxed">
            L'Université Emi Koussi (UNEK) prépare les étudiants aux exigences du marché du travail à travers ses deux facultés spécialisées combinant théorie, pratique en laboratoire et immersion professionnelle.
        </p>
    </div>
</section>

<!-- PRÉSENTATION DES 2 FACULTÉS OFFICIELLES -->
<section class="py-16 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Faculté 1 -->
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="w-14 h-14 rounded-2xl bg-[#0F172A] text-amber-400 flex items-center justify-center text-2xl font-bold mb-6 shadow-md">
                    <i class="fa-solid fa-scale-balanced"></i>
                </div>
                <span class="text-xs font-bold text-amber-700 uppercase tracking-wider bg-amber-100/80 px-3 py-1 rounded-full border border-amber-200">Faculté 1</span>
                <h2 class="font-['Outfit'] font-extrabold text-2xl text-slate-900 mt-3 mb-3">
                    Faculté des Sciences Humaines, Juridiques et de Gestion
                </h2>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-4">
                    Forme des profils capables d’évoluer dans les domaines du droit, de l’administration, de l’économie, de la gestion, de l’éducation et des sciences sociales.
                </p>
                <p class="text-slate-500 text-xs leading-relaxed border-t border-slate-200 pt-3">
                    <strong class="text-slate-700">Approche pédagogique :</strong> Les enseignements combinent théorie, recherche et approche professionnelle afin de préparer les étudiants aux réalités du secteur public, privé et entrepreneurial.
                </p>
            </div>

            <!-- Faculté 2 -->
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="w-14 h-14 rounded-2xl bg-[#0F172A] text-cyan-400 flex items-center justify-center text-2xl font-bold mb-6 shadow-md">
                    <i class="fa-solid fa-microchip"></i>
                </div>
                <span class="text-xs font-bold text-cyan-700 uppercase tracking-wider bg-cyan-100/80 px-3 py-1 rounded-full border border-cyan-200">Faculté 2</span>
                <h2 class="font-['Outfit'] font-extrabold text-2xl text-slate-900 mt-3 mb-3">
                    Faculté des Sciences et Techniques
                </h2>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-4">
                    Propose des formations orientées vers les sciences appliquées, les technologies, l’ingénierie et les métiers techniques du numérique et de la terre.
                </p>
                <p class="text-slate-500 text-xs leading-relaxed border-t border-slate-200 pt-3">
                    <strong class="text-slate-700">Approche pédagogique :</strong> Elle prépare les étudiants à répondre aux besoins croissants en innovation, infrastructures, numérique, environnement et développement scientifique.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- CATALOGUE INTERACTIF DES FILIÈRES -->
<section class="py-16 bg-slate-50" x-data="{
    activeTab: 'all',
    searchQuery: '',
    selectedFormation: null,
    modalOpen: false,
    formations: [
        /* FACULTÉ DES SCIENCES HUMAINES, JURIDIQUES ET DE GESTION */
        { id: 'dp', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Droit Privé', cycle: 'Licence & Master', icon: 'fa-gavel', isNew: false, desc: 'Formations axées sur les contrats, le droit des affaires OHADA, le droit des personnes et le contentieux privé.' },
        { id: 'dpub', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Droit Public', cycle: 'Licence & Master', icon: 'fa-landmark', isNew: false, desc: 'Spécialisation en droit administratif, droit constitutionnel, finances publiques et libertés fondamentales.' },
        { id: 'sp', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Sciences Politiques', cycle: 'Licence & Master', icon: 'fa-building-columns', isNew: false, desc: 'Analyse des systèmes politiques, gouvernance publique, politiques publiques et théorie politique.' },
        { id: 'ri', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Relations Internationales', cycle: 'Licence & Master', icon: 'fa-earth-africa', isNew: false, desc: 'Diplomatie, droit international public, géopolitique régionale et gestion des affaires mondiales.' },
        { id: 'ge', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Gestion des Entreprises', cycle: 'Licence & Master', icon: 'fa-chart-pie', isNew: false, desc: 'Pilotage organisationnel, stratégie managériale, entrepreneuriat et développement d\'activités.' },
        { id: 'cf', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Comptabilité & Finance', cycle: 'Licence & Master (SYSCOHADA)', icon: 'fa-calculator', isNew: false, desc: 'Maîtrise de la comptabilité générale et analytique, audit financier, gestion de trésorerie et fiscalité.' },
        { id: 'mc', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Marketing & Communication', cycle: 'Licence & Master', icon: 'fa-bullhorn', isNew: false, desc: 'Stratégie de marque, marketing digital, études de marché, publicité et communication d\'entreprise.' },
        { id: 'rh', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Ressources Humaines', cycle: 'Licence & Master', icon: 'fa-people-roof', isNew: false, desc: 'Administration du personnel, recrutement, gestion de la paie, GPEC et dialogue social.' },
        { id: 'ed', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Économie & Développement', cycle: 'Licence & Master', icon: 'fa-chart-line', isNew: false, desc: 'Économétrie, analyse des politiques économiques, microéconomie et stratégies de développement local.' },
        { id: 'ap', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Administration Publique', cycle: 'Licence & Master', icon: 'fa-briefcase', isNew: false, desc: 'Gestion des collectivités territoriales, marchés publics, fonction publique et management d\'État.' },
        { id: 'se', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Sciences de l’Éducation', cycle: 'Licence & Master', icon: 'fa-graduation-cap', isNew: false, desc: 'Pédagogie, ingénierie de la formation, didactique et technologies de l\'éducation.' },
        { id: 'soc', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Sociologie', cycle: 'Licence & Master', icon: 'fa-users-line', isNew: false, desc: 'Enquêtes sociologiques, analyse des mutations sociales, démographie et sociologie des organisations.' },
        { id: 'phil', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Philosophie', cycle: 'Licence & Master', icon: 'fa-book-open', isNew: false, desc: 'Histoire de la pensée, éthique publique, épistémologie, logique et philosophie politique.' },
        { id: 'll', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Lettres & Langues', cycle: 'Licence & Master', icon: 'fa-book', isNew: false, desc: 'Linguistique appliquée, littératures francophones et africaines, traduction et interprétariat.' },
        { id: 'jc', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Journalisme & Communication', cycle: 'Licence & Master', icon: 'fa-newspaper', isNew: false, desc: 'Techniques de presse écrite, audiovisuelle, médias numériques, éthique et déontologie journalistique.' },
        { id: 'gp', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Gestion de Projets', cycle: 'Licence & Master', icon: 'fa-list-check', isNew: false, desc: 'Conception, planification (PMP/Agile), suivi-évaluation et gestion budgétaire des projets.' },
        { id: 'mgt', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Management', cycle: 'Licence & Master', icon: 'fa-user-tie', isNew: false, desc: 'Leadership, gestion d\'équipe, conduite du changement et gouvernance d\'entreprise.' },
        { id: 'piic', fac: 'shjg', facName: 'Sciences Humaines, Juridiques & Gestion', title: 'Propriété Intellectuelle & Industries Créatives', cycle: 'Nouveau Programme', icon: 'fa-lightbulb', isNew: true, desc: 'Protection des brevets, marques, droits d\'auteur, droit du numérique et économie des médias créatifs.' },

        /* FACULTÉ DES SCIENCES ET TECHNIQUES */
        { id: 'inf', fac: 'st', facName: 'Sciences et Techniques', title: 'Informatique', cycle: 'Licence & Master', icon: 'fa-laptop-code', isNew: false, desc: 'Fondements de la science informatique, algorithmique, structures de données et systèmes d\'exploitation.' },
        { id: 'gl', fac: 'st', facName: 'Sciences et Techniques', title: 'Génie Logiciel', cycle: 'Licence & Master Pro', icon: 'fa-code', isNew: false, desc: 'Architecture logicielle, développement web & mobile, DevOps, méthodes agiles et bases de données.' },
        { id: 'rt', fac: 'st', facName: 'Sciences et Techniques', title: 'Réseaux & Télécommunications', cycle: 'Licence & Master Pro', icon: 'fa-network-wired', isNew: false, desc: 'Administration systèmes Linux/Windows, protocoles TCP/IP, téléphonie IP, réseaux mobiles 4G/5G et Cloud.' },
        { id: 'ma', fac: 'st', facName: 'Sciences et Techniques', title: 'Mathématiques Appliquées', cycle: 'Licence & Master', icon: 'fa-calculator', isNew: false, desc: 'Analyse numérique, recherche opérationnelle, modélisation mathématique et calcul scientifique.' },
        { id: 'phy', fac: 'st', facName: 'Sciences et Techniques', title: 'Physique', cycle: 'Licence & Master', icon: 'fa-atom', isNew: false, desc: 'Physique des matériaux, mécanique, thermodynamique, optique et électronique appliquée.' },
        { id: 'geo', fac: 'st', facName: 'Sciences et Techniques', title: 'Géologie', cycle: 'Licence & Master', icon: 'fa-mountain-sun', isNew: false, desc: 'Cartographie géologique, pétrologie, sédimentologie et exploration des ressources minières.' },
        { id: 'geophy', fac: 'st', facName: 'Sciences et Techniques', title: 'Géophysique', cycle: 'Licence & Master', icon: 'fa-earth-americas', isNew: false, desc: 'Prospection géophysique (sismique, gravimétrie), imagerie du sous-sol et géophysique pétrolière.' },
        { id: 'hydro', fac: 'st', facName: 'Sciences et Techniques', title: 'Hydrogéologie', cycle: 'Licence & Master', icon: 'fa-droplet', isNew: false, desc: 'Gestion des nappe phréatiques, évaluation des ressources en eau, forage et hydraulique villageoise.' },
        { id: 'gc', fac: 'st', facName: 'Sciences et Techniques', title: 'Génie Civil', cycle: 'Licence & Master Pro', icon: 'fa-building', isNew: false, desc: 'Calcul de structures (AutoCAD/RoboT), béton armé, routes et ouvrages d\'art, métré et suivi de chantier.' },
        { id: 'elec', fac: 'st', facName: 'Sciences et Techniques', title: 'Électronique', cycle: 'Licence & Master', icon: 'fa-bolt', isNew: false, desc: 'Systèmes embarqués, microcontrôleurs, électronique de puissance et traitement du signal.' },
        { id: 'mi', fac: 'st', facName: 'Sciences et Techniques', title: 'Maintenance Industrielle', cycle: 'Licence Pro', icon: 'fa-gears', isNew: false, desc: 'GMAO, automatique, électrotechnique, sécurité industrielle et maintenance préventive.' },
        { id: 'er', fac: 'st', facName: 'Sciences et Techniques', title: 'Énergies Renouvelables', cycle: 'Licence & Master Pro', icon: 'fa-solar-panel', isNew: false, desc: 'Ingénierie des systèmes photovoltaïques, éoliens, biomasse et efficacité énergétique des bâtiments.' },
        { id: 'edd', fac: 'st', facName: 'Sciences et Techniques', title: 'Environnement & Développement Durable', cycle: 'Licence & Master', icon: 'fa-leaf', isNew: false, desc: 'Études d\'impact environnemental, gestion des déchets, écologie appliquée et changements climatiques.' },
        { id: 'agro', fac: 'st', facName: 'Sciences et Techniques', title: 'Agronomie', cycle: 'Licence & Master', icon: 'fa-wheat-awn', isNew: false, desc: 'Production végétale et animale, agroalimentaire, sécurité alimentaire et gestion des exploitations.' },
        { id: 'stat', fac: 'st', facName: 'Sciences et Techniques', title: 'Statistiques', cycle: 'Licence & Master', icon: 'fa-chart-column', isNew: false, desc: 'Data science, statistiques décisionnelles, sondages, économétrie et traitement de données (R/Python).' },
        { id: 'sdt', fac: 'st', facName: 'Sciences de la Terre', title: 'Sciences de la Terre', cycle: 'Licence & Master', icon: 'fa-compass-drafting', isNew: false, desc: 'Étude des processus terrestres, géomorphologie, géotechnique et gestion des risques naturels.' },
        { id: 'techapp', fac: 'st', facName: 'Sciences et Techniques', title: 'Technologies Appliquées', cycle: 'Licence Pro', icon: 'fa-screwdriver-wrench', isNew: false, desc: 'Procédés industriels, mesure physique, contrôle qualité et technologies numériques d\'usinage.' }
    ],
    get filteredFormations() {
        return this.formations.filter(f => {
            const matchesTab = this.activeTab === 'all' || f.fac === this.activeTab;
            const matchesSearch = f.title.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                                  f.desc.toLowerCase().includes(this.searchQuery.toLowerCase());
            return matchesTab && matchesSearch;
        });
    }
}">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Search & Filter Controls -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-10">
            <!-- Filter Tabs -->
            <div class="flex flex-wrap gap-2 justify-center sm:justify-start w-full md:w-auto">
                <button @click="activeTab = 'all'" 
                        class="px-4 py-2.5 rounded-xl font-bold text-xs transition border"
                        :class="activeTab === 'all' ? 'bg-[#0F172A] text-white border-slate-900 shadow-md' : 'bg-white text-slate-700 border-slate-200 hover:bg-slate-100'">
                    <i class="fa-solid fa-list-ul mr-1"></i> Toutes les Filières (<span x-text="formations.length"></span>)
                </button>
                <button @click="activeTab = 'shjg'" 
                        class="px-4 py-2.5 rounded-xl font-bold text-xs transition border"
                        :class="activeTab === 'shjg' ? 'bg-amber-600 text-white border-amber-600 shadow-md' : 'bg-white text-slate-700 border-slate-200 hover:bg-slate-100'">
                    <i class="fa-solid fa-scale-balanced mr-1"></i> Sc. Humaines, Juridiques & Gestion
                </button>
                <button @click="activeTab = 'st'" 
                        class="px-4 py-2.5 rounded-xl font-bold text-xs transition border"
                        :class="activeTab === 'st' ? 'bg-cyan-700 text-white border-cyan-700 shadow-md' : 'bg-white text-slate-700 border-slate-200 hover:bg-slate-100'">
                    <i class="fa-solid fa-microchip mr-1"></i> Sciences et Techniques
                </button>
            </div>

            <!-- Search Bar -->
            <div class="relative w-full md:w-72">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-slate-400 text-xs"></i>
                <input type="text" x-model="searchQuery" placeholder="Rechercher une filière..." class="w-full pl-9 pr-4 py-2 rounded-xl bg-white border border-slate-200 text-slate-900 text-xs focus:outline-none focus:border-slate-800 transition">
            </div>
        </div>

        <!-- Formations Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="item in filteredFormations" :key="item.id">
                <div class="bg-white rounded-2xl border border-slate-200 p-6 hover:border-slate-400 hover:shadow-xl transition flex flex-col justify-between group relative">
                    
                    <div>
                        <!-- Header Card -->
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center text-lg font-bold"
                                 :class="item.fac === 'shjg' ? 'bg-amber-500/10 text-amber-700' : 'bg-cyan-500/10 text-cyan-700'">
                                <i class="fa-solid" :class="item.icon"></i>
                            </div>
                            
                            <div class="flex items-center gap-1.5">
                                <template x-if="item.isNew">
                                    <span class="text-[10px] font-extrabold px-2 py-0.5 rounded bg-emerald-500 text-white shadow-sm">NOUVEAU</span>
                                </template>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-700 border border-slate-200" x-text="item.cycle"></span>
                            </div>
                        </div>

                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-1" x-text="item.facName"></span>
                        <h3 class="font-['Outfit'] font-bold text-xl text-slate-900 mb-2 group-hover:text-amber-700 transition" x-text="item.title"></h3>
                        <p class="text-slate-600 text-xs leading-relaxed mb-4 line-clamp-3" x-text="item.desc"></p>
                    </div>

                    <!-- Footer Action -->
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-2">
                        <button @click="selectedFormation = item; modalOpen = true" class="text-xs font-bold text-slate-700 hover:text-slate-900 flex items-center gap-1">
                            <i class="fa-solid fa-eye text-amber-600"></i> Détails
                        </button>
                        <a href="{{ route('admissions') }}" class="px-4 py-2 rounded-lg bg-[#0F172A] hover:bg-slate-800 text-white font-bold text-xs transition">
                            S'inscrire
                        </a>
                    </div>
                </div>
            </template>
        </div>

        <!-- Empty state when search returns zero -->
        <template x-if="filteredFormations.length === 0">
            <div class="text-center py-16 bg-white rounded-2xl border border-slate-200">
                <i class="fa-solid fa-folder-open text-4xl text-slate-300 mb-3 block"></i>
                <h4 class="font-bold text-slate-700 text-base">Aucune filière trouvée</h4>
                <p class="text-xs text-slate-500 mt-1">Essayez un autre mot-clé ou réinitialisez le filtre.</p>
                <button @click="searchQuery = ''; activeTab = 'all'" class="mt-4 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-lg text-xs font-bold transition">
                    Afficher toutes les filières
                </button>
            </div>
        </template>

    </div>

    <!-- MODAL DÉTAILS DE LA FILIÈRE -->
    <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/70 backdrop-blur-sm animate-fade-in">
        <div @click.away="modalOpen = false" class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl relative my-8 text-slate-800 border border-slate-200">
            
            <button @click="modalOpen = false" class="absolute top-5 right-5 text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            <template x-if="selectedFormation">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-2.5 py-0.5 rounded text-[11px] font-bold uppercase bg-slate-100 text-slate-800" x-text="selectedFormation.cycle"></span>
                        <span class="text-xs font-semibold text-slate-500" x-text="selectedFormation.facName"></span>
                    </div>

                    <h2 class="font-['Outfit'] text-2xl sm:text-3xl font-extrabold text-slate-900 mb-3" x-text="selectedFormation.title"></h2>

                    <div class="space-y-4 text-xs sm:text-sm">
                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                            <h4 class="font-bold text-slate-900 text-xs uppercase tracking-wider mb-1 flex items-center gap-2">
                                <i class="fa-solid fa-graduation-cap text-amber-600"></i> Présentation de la Filière
                            </h4>
                            <p class="text-slate-600 leading-relaxed" x-text="selectedFormation.desc"></p>
                        </div>

                        <div class="p-4 rounded-xl bg-amber-50/80 border border-amber-200 text-amber-900">
                            <strong class="block text-xs font-bold mb-1"><i class="fa-solid fa-circle-check text-amber-600 mr-1"></i> Diplôme & Validation :</strong>
                            <span class="text-xs">Cursus conforme aux normes LMD avec validation semestrielle et stage obligatoire en entreprise ou administration.</span>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="mt-8 pt-4 border-t border-slate-100 flex justify-between items-center gap-4">
                        <button @click="modalOpen = false" class="text-xs text-slate-500 font-bold hover:underline">
                            Fermer
                        </button>
                        <a href="{{ route('admissions') }}" class="px-6 py-3 rounded-xl bg-[#0F172A] hover:bg-slate-800 text-white font-bold text-xs transition shadow-md">
                            Déposer ma Candidature
                        </a>
                    </div>
                </div>
            </template>

        </div>
    </div>

</section>

@endsection
