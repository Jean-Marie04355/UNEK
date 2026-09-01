@extends('layouts.app')

@section('title', 'Vie Étudiante & Campus | UNEK N\'Djamena')

@section('content')

<!-- Header Banner -->
<section class="bg-[#0B1B3D] text-white py-14 border-b border-amber-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="px-3.5 py-1 rounded-full bg-amber-400/20 text-amber-300 font-extrabold text-xs uppercase tracking-widest border border-amber-400/30">
            Épanouissement & Communauté
        </span>
        <h1 class="font-['Outfit'] text-3xl sm:text-5xl font-extrabold text-white mt-4">
            Vie Étudiante & Galerie du Campus UNEK
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto mt-3 font-light">
            Découvrez la dynamique sportive, culturelle et scientifique animée par le Bureau Des Étudiants (BDE) de l'Université Emi Koussi.
        </p>
    </div>
</section>

<!-- BDE & CLUBS SECTION -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="p-8 rounded-2xl bg-slate-50 border border-slate-200 hover:shadow-xl transition">
                <div class="w-12 h-12 rounded-xl bg-amber-400 text-slate-950 flex items-center justify-center text-xl font-bold mb-4">
                    <i class="fa-solid fa-users"></i>
                </div>
                <h3 class="font-['Outfit'] text-xl font-bold text-slate-900 mb-2">Bureau Des Étudiants (BDE)</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Organe représentatif qui anime l'intégration des nouveaux bacheliers, organise le grand Gala annuel et coordonne les partenariats étudiants.
                </p>
            </div>

            <div class="p-8 rounded-2xl bg-slate-50 border border-slate-200 hover:shadow-xl transition">
                <div class="w-12 h-12 rounded-xl bg-cyan-400 text-slate-950 flex items-center justify-center text-xl font-bold mb-4">
                    <i class="fa-solid fa-code"></i>
                </div>
                <h3 class="font-['Outfit'] text-xl font-bold text-slate-900 mb-2">Club de Codage & IA UNEK</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Sessions hebdomadaires de hackathons, programmation algorithmique, ateliers DevOps et création d'applications à impact pour le Tchad.
                </p>
            </div>

            <div class="p-8 rounded-2xl bg-slate-50 border border-slate-200 hover:shadow-xl transition">
                <div class="w-12 h-12 rounded-xl bg-emerald-400 text-slate-950 flex items-center justify-center text-xl font-bold mb-4">
                    <i class="fa-solid fa-trophy"></i>
                </div>
                <h3 class="font-['Outfit'] text-xl font-bold text-slate-900 mb-2">Clubs Sportifs & Culturels</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Équipes universitaires de Football, Basketball, Volleyball ainsi que la troupe théâtrale et de débats d'éloquence de l'UNEK.
                </p>
            </div>
        </div>

        <!-- GALERIE MULTIMÉDIA DU CAMPUS DE N'DJAMENA -->
        <div class="mb-8 text-center">
            <span class="text-amber-600 font-extrabold text-xs uppercase tracking-widest bg-amber-50 px-3 py-1 rounded-full border border-amber-200">
                Immersez-vous dans notre campus
            </span>
            <h2 class="font-['Outfit'] text-3xl font-extrabold text-slate-900 mt-3">
                Galerie Photos & Vidéos du Campus N'Djamena
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="rounded-2xl overflow-hidden shadow-lg group relative">
                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-slate-950/60 p-4 flex items-end">
                    <span class="text-white text-xs font-bold">Laboratoire Informatique High-Tech</span>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden shadow-lg group relative">
                <img src="https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=800&auto=format&fit=crop" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-slate-950/60 p-4 flex items-end">
                    <span class="text-white text-xs font-bold">Campus Principal de Moursal</span>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden shadow-lg group relative">
                <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=800&auto=format&fit=crop" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-slate-950/60 p-4 flex items-end">
                    <span class="text-white text-xs font-bold">Amphithéâtre de Conférences</span>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden shadow-lg group relative">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-slate-950/60 p-4 flex items-end">
                    <span class="text-white text-xs font-bold">Séance de Travaux Pratiques de Codage</span>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden shadow-lg group relative">
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=800&auto=format&fit=crop" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-slate-950/60 p-4 flex items-end">
                    <span class="text-white text-xs font-bold">Colloque Scientifique International</span>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden shadow-lg group relative">
                <img src="{{ asset('images/unek-remise-diplomes.jpg') }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-slate-950/60 p-4 flex items-end">
                    <span class="text-white text-xs font-bold">Cérémonie Officielle de Remise des Diplômes LMD - UNEK</span>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
