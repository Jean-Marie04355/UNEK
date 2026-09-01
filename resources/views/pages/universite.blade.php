@extends('layouts.app')

@section('title', 'L\'Université Emi Koussi (UNEK) | Présentation & Vision Institutionnelle')

@section('content')

<!-- Header Banner -->
<section class="bg-[#0B1B3D] text-white py-16 border-b border-amber-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="px-3.5 py-1 rounded-full bg-amber-400/20 text-amber-300 font-extrabold text-xs uppercase tracking-widest border border-amber-400/30">
            Institution d'Enseignement Supérieur de Référence
        </span>
        <h1 class="font-['Outfit'] text-3xl sm:text-5xl font-extrabold text-white mt-4">
            L'Université Emi Koussi (UNEK)
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto mt-3 font-light">
            Découvrez notre histoire, nos valeurs académiques, nos accréditations et nos engagements pour l'excellence et l'employabilité des jeunes au Tchad et en Afrique Centrale.
        </p>
    </div>
</section>

<!-- Section Mot du Président / Recteur -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 relative">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-slate-100">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=800&auto=format&fit=crop" alt="Président UNEK" class="w-full h-auto object-cover">
                </div>
                <div class="absolute -bottom-6 -right-4 bg-[#0B1B3D] border border-amber-400/40 text-white p-5 rounded-2xl shadow-xl hidden sm:block">
                    <p class="font-['Outfit'] font-bold text-base text-amber-400">Dr. HAMID AHMAT</p>
                    <p class="text-xs text-slate-300">Président du Conseil d'Administration</p>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <span class="text-amber-600 font-bold text-xs uppercase tracking-wider bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                    Mot du Président
                </span>
                <h2 class="font-['Outfit'] text-3xl font-extrabold text-slate-900 leading-tight">
                    "Former les leaders, scientifiques et managers innovants de demain."
                </h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Depuis sa création à N'Djamena, l'Université Emi Koussi (UNEK) s'est fixée pour mission fondamentale d'offrir une formation universitaire pragmatique, alignée sur le système LMD (Licence - Master - Doctorat) et en constante adéquation avec les exigences des entreprises.
                </p>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Inspirée des meilleurs standards universitaires internationaux, l'UNEK privilégie la rigueur théorique couplée à la pratique intensive en laboratoires informatiques, ateliers technologiques et terrains de santé publique.
                </p>

                <div class="grid grid-cols-2 gap-4 pt-4 border-t border-slate-200">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-check-double text-amber-500 text-xl"></i>
                        <span class="text-xs font-bold text-slate-800">Conformité LMD Strict</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-graduation-cap text-amber-500 text-xl"></i>
                        <span class="text-xs font-bold text-slate-800">Homologation Officielle</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- BANNIÈRE CÉRÉMONIE DES DIPLÔMÉS UNEK -->
<section class="py-12 bg-slate-100 border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
            <img src="{{ asset('images/unek-remise-diplomes.jpg') }}" alt="Cérémonie Officielle des Diplômés UNEK" class="w-full h-80 sm:h-96 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent p-8 flex flex-col justify-end">
                <span class="text-xs font-bold text-amber-400 uppercase tracking-widest bg-amber-400/20 px-3 py-1 rounded-full border border-amber-400/30 w-fit mb-2">Excellence & Réussite UNEK</span>
                <h3 class="font-['Outfit'] font-extrabold text-2xl sm:text-3xl text-white">Nos Diplômés à la Cérémonie Officielle LMD</h3>
                <p class="text-slate-200 text-xs sm:text-sm mt-1 max-w-2xl font-light">Chaque année, l'Université Emi Koussi célèbre la promotion de ses étudiants diplômés en Licence et Master lors d'une cérémonie solennelle à N'Djamena.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pillars & Campus Infrastructure -->
<section class="py-16 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-amber-400 font-bold text-xs uppercase tracking-widest">Infrastructures & Équipements</span>
            <h2 class="font-['Outfit'] text-3xl font-extrabold text-white mt-2">
                Un Cadre d'Études Moderne à N'Djamena
            </h2>
            <p class="text-slate-400 text-sm mt-3">
                L'UNEK investit en permanence dans des équipements pédagogiques de haut niveau pour assurer un apprentissage de qualité internationale.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-slate-950 p-8 rounded-2xl border border-slate-800 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-network-wired"></i>
                </div>
                <h3 class="font-['Outfit'] text-xl font-bold text-white">Salles Informatiques & Fibre Optique</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Plus de 200 ordinateurs récents connectés à la fibre optique haut débit pour les travaux de programmation, d'administration réseaux et de simulations virtuelles.
                </p>
            </div>

            <div class="bg-slate-950 p-8 rounded-2xl border border-slate-800 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-book-bookmark"></i>
                </div>
                <h3 class="font-['Outfit'] text-xl font-bold text-white">Bibliothèque Physique & Numérique</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Une banque de données académiques avec plus de 10 000 d'ouvrages spécialisés et un accès privilégié aux revues scientifiques internationales.
                </p>
            </div>

            <div class="bg-slate-950 p-8 rounded-2xl border border-slate-800 space-y-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl font-bold">
                    <i class="fa-solid fa-notes-medical"></i>
                </div>
                <h3 class="font-['Outfit'] text-xl font-bold text-white">Laboratoires de Santé Publique</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Plateaux techniques équipés pour l'apprentissage des soins infirmiers, de l'obstétrique et des analyses biologiques élémentaires.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
