@extends('layouts.app')

@section('title', 'Actualités & Agenda Académique | UNEK N\'Djamena')

@section('content')

<!-- Header Banner -->
<section class="bg-[#0B1B3D] text-white py-14 border-b border-amber-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="px-3.5 py-1 rounded-full bg-amber-400/20 text-amber-300 font-extrabold text-xs uppercase tracking-widest border border-amber-400/30">
            Information & Vie du Campus
        </span>
        <h1 class="font-['Outfit'] text-3xl sm:text-5xl font-extrabold text-white mt-4">
            Actualités & Agenda Académique UNEK
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto mt-3 font-light">
            Restez informés des dates clés des rentrées académiques, des journées portes ouvertes, des colloques et des soutenances de mémoire à l'UNEK.
        </p>
    </div>
</section>

<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Main News Feed (2 Cols) -->
            <div class="lg:col-span-2 space-y-6">
                
                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200 shadow-md">
                    <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-800 font-bold text-xs">Communiqué Officiel</span>
                    <h2 class="font-['Outfit'] text-2xl font-bold text-slate-900 mt-3 mb-2">
                        Ouverture de la Campagne d'Admission pour l'Année Académique 2026-2027
                    </h2>
                    <p class="text-xs text-slate-400 mb-4 flex items-center gap-3">
                        <span><i class="fa-regular fa-calendar mr-1"></i> 10 Août 2026</span>
                        <span><i class="fa-regular fa-user mr-1"></i> Secrétariat Général UNEK</span>
                    </p>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-4">
                        La Présidence de l'Université Emi Koussi (UNEK) informe les bacheliers, étudiants et professionnels que les inscriptions et réinscriptions en ligne sont ouvertes. Le dépôt des dossiers s'effectue directement via notre portail web sécurisé.
                    </p>
                    <a href="{{ route('admissions') }}" class="inline-flex items-center gap-1.5 text-xs font-extrabold text-amber-600 hover:text-amber-700">
                        Accéder au Portail de Pré-inscription <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-200 shadow-md">
                    <span class="px-3 py-1 rounded-full bg-cyan-100 text-cyan-800 font-bold text-xs">Pôle Sciences & Tech</span>
                    <h2 class="font-['Outfit'] text-2xl font-bold text-slate-900 mt-3 mb-2">
                        Signature d'une Convention Stratégique avec les Acteurs Télécoms du Tchad
                    </h2>
                    <p class="text-xs text-slate-400 mb-4 flex items-center gap-3">
                        <span><i class="fa-regular fa-calendar mr-1"></i> 02 Août 2026</span>
                        <span><i class="fa-regular fa-user mr-1"></i> Direction des Relations Entreprises</span>
                    </p>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-4">
                        L'UNEK renforce l'employabilité de ses étudiants en Génie Logiciel et Réseaux grâce à un nouveau partenariat garantissant des stages d'immersion pratique de 4 mois pour chaque étudiant en 3ème année de Licence.
                    </p>
                </div>

            </div>

            <!-- Sidebar Agenda (1 Col) -->
            <div class="space-y-6">
                
                <div class="bg-[#0B1B3D] text-white p-6 rounded-2xl border border-amber-400/40 shadow-xl">
                    <h3 class="font-['Outfit'] font-bold text-xl text-amber-400 mb-4 border-b border-slate-800 pb-3 flex items-center gap-2">
                        <i class="fa-solid fa-calendar-days"></i> Agenda Académique
                    </h3>

                    <div class="space-y-4 text-xs">
                        <div class="pb-3 border-b border-slate-800">
                            <span class="text-amber-400 font-extrabold block">28 Septembre 2026</span>
                            <span class="font-bold text-white block">Journée Portes Ouvertes (JPO)</span>
                            <span class="text-slate-400 text-[11px]">Campus Moursal - N'Djamena</span>
                        </div>

                        <div class="pb-3 border-b border-slate-800">
                            <span class="text-amber-400 font-extrabold block">15 Octobre 2026</span>
                            <span class="font-bold text-white block">Rentrée des Licences (L1, L2, L3)</span>
                            <span class="text-slate-400 text-[11px]">Cours du jour et du soir</span>
                        </div>

                        <div>
                            <span class="text-amber-400 font-extrabold block">05 Novembre 2026</span>
                            <span class="font-bold text-white block">Rentrée Officielle des Masters</span>
                            <span class="text-slate-400 text-[11px]">Amphithéâtre Principal</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection
