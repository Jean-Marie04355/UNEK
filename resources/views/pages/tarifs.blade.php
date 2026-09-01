@extends('layouts.app')

@section('title', 'Frais de Scolarité & Simulateur Tarifaire | UNEK')

@section('content')

<!-- Header Banner -->
<section class="bg-[#0B1B3D] text-white py-14 border-b border-amber-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="px-3.5 py-1 rounded-full bg-amber-400/20 text-amber-300 font-extrabold text-xs uppercase tracking-widest border border-amber-400/30">
            Transparence & Facilités de Paiement
        </span>
        <h1 class="font-['Outfit'] text-3xl sm:text-5xl font-extrabold text-white mt-4">
            Simulateur & Grille Tarifaire Officielle UNEK
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto mt-3 font-light">
            Consultez le détail des frais d'inscription et de scolarité par filière. Des modalités de règlement échelonnées en 3 tranches sont proposées à tous les étudiants.
        </p>
    </div>
</section>

<!-- SIMULATEUR DYNAMIQUE DE FRAIS -->
<section class="py-16 bg-slate-50" x-data="{
    cycle: 'L1',
    pole: 'tech',
    
    getTarifs() {
        if (this.pole === 'tech') {
            if (this.cycle === 'L1' || this.cycle === 'L2') return { inscription: 50000, scolarite: 450000, t1: 200000, t2: 150000, t3: 100000 };
            if (this.cycle === 'L3') return { inscription: 50000, scolarite: 500000, t1: 220000, t2: 180000, t3: 100000 };
            return { inscription: 75000, scolarite: 750000, t1: 350000, t2: 250000, t3: 150000 }; // Master
        }
        if (this.pole === 'management') {
            if (this.cycle === 'L1' || this.cycle === 'L2') return { inscription: 45000, scolarite: 400000, t1: 180000, t2: 140000, t3: 80000 };
            if (this.cycle === 'L3') return { inscription: 45000, scolarite: 450000, t1: 200000, t2: 150000, t3: 100000 };
            return { inscription: 70000, scolarite: 650000, t1: 300000, t2: 200000, t3: 150000 }; // Master
        }
        if (this.pole === 'sante') {
            if (this.cycle === 'L1' || this.cycle === 'L2') return { inscription: 55000, scolarite: 520000, t1: 240000, t2: 180000, t3: 100000 };
            if (this.cycle === 'L3') return { inscription: 55000, scolarite: 580000, t1: 260000, t2: 200000, t3: 120000 };
            return { inscription: 80000, scolarite: 850000, t1: 400000, t2: 300000, t3: 150000 }; // Master
        }
        return { inscription: 50000, scolarite: 450000, t1: 200000, t2: 150000, t3: 100000 };
    }
}">
    
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl p-8 shadow-xl border border-slate-200">
            <div class="text-center max-w-xl mx-auto mb-10">
                <h2 class="font-['Outfit'] text-2xl sm:text-3xl font-extrabold text-slate-900">
                    Simulateur Interactif de Scolarité
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-2">
                    Sélectionnez le cycle d'études et le pôle académique pour calculer l'échéancier des paiements.
                </p>
            </div>

            <!-- Controls -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div>
                    <label class="block font-bold text-xs uppercase tracking-wider text-slate-700 mb-2">1. Choisissez le Pôle Académique</label>
                    <div class="grid grid-cols-3 gap-2 text-xs font-bold">
                        <button @click="pole = 'tech'" class="p-3 rounded-xl border transition text-center" :class="pole === 'tech' ? 'bg-cyan-950 text-cyan-300 border-cyan-400 shadow-md' : 'bg-slate-50 border-slate-200 text-slate-700'">
                            <i class="fa-solid fa-microchip block text-lg mb-1 text-cyan-400"></i> Sciences & Tech
                        </button>
                        <button @click="pole = 'management'" class="p-3 rounded-xl border transition text-center" :class="pole === 'management' ? 'bg-amber-950 text-amber-300 border-amber-400 shadow-md' : 'bg-slate-50 border-slate-200 text-slate-700'">
                            <i class="fa-solid fa-chart-line block text-lg mb-1 text-amber-400"></i> Management
                        </button>
                        <button @click="pole = 'sante'" class="p-3 rounded-xl border transition text-center" :class="pole === 'sante' ? 'bg-emerald-950 text-emerald-300 border-emerald-400 shadow-md' : 'bg-slate-50 border-slate-200 text-slate-700'">
                            <i class="fa-solid fa-user-nurse block text-lg mb-1 text-emerald-400"></i> Santé & Droit
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-xs uppercase tracking-wider text-slate-700 mb-2">2. Choisissez le Niveau d'Études</label>
                    <select x-model="cycle" class="w-full p-3 rounded-xl border border-slate-300 bg-white font-bold text-xs text-slate-800 focus:border-amber-400 focus:outline-none">
                        <option value="L1">Licence 1ère Année (L1)</option>
                        <option value="L2">Licence 2ème Année (L2)</option>
                        <option value="L3">Licence 3ème Année (L3 - Mémoire inclus)</option>
                        <option value="M1">Master 1ère Année (M1)</option>
                        <option value="M2">Master 2ème Année (M2 - Soutenance)</option>
                    </select>
                </div>
            </div>

            <!-- Calculated Results Card -->
            <div class="bg-[#0B1B3D] text-white p-6 sm:p-8 rounded-2xl border-2 border-amber-400 shadow-2xl">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-slate-800 mb-6 gap-4">
                    <div>
                        <span class="text-xs text-amber-400 font-bold uppercase tracking-wider">Récapitulatif Annuel</span>
                        <h3 class="font-['Outfit'] font-extrabold text-2xl text-white mt-0.5">
                            Frais Totaux : <span class="text-amber-400" x-text="(getTarifs().inscription + getTarifs().scolarite).toLocaleString('fr-FR') + ' FCFA'"></span>
                        </h3>
                    </div>
                    <a href="{{ route('admissions') }}" class="px-6 py-3 rounded-xl bg-amber-400 hover:bg-amber-500 text-slate-950 font-extrabold text-xs transition text-center shadow-lg">
                        M'inscrire avec ce tarif
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 text-xs">
                    <!-- Inscription -->
                    <div class="bg-white/5 p-4 rounded-xl border border-white/10">
                        <span class="text-slate-400 block mb-1">Droit d'Inscription</span>
                        <span class="font-['Outfit'] font-extrabold text-lg text-white" x-text="getTarifs().inscription.toLocaleString('fr-FR') + ' FCFA'"></span>
                        <span class="block text-[10px] text-amber-400 mt-1">À l'admission</span>
                    </div>

                    <!-- Tranche 1 -->
                    <div class="bg-white/5 p-4 rounded-xl border border-white/10">
                        <span class="text-slate-400 block mb-1">1ère Tranche (Rentrée)</span>
                        <span class="font-['Outfit'] font-extrabold text-lg text-emerald-400" x-text="getTarifs().t1.toLocaleString('fr-FR') + ' FCFA'"></span>
                        <span class="block text-[10px] text-slate-400 mt-1">Échéance : 15 Octobre</span>
                    </div>

                    <!-- Tranche 2 -->
                    <div class="bg-white/5 p-4 rounded-xl border border-white/10">
                        <span class="text-slate-400 block mb-1">2ème Tranche</span>
                        <span class="font-['Outfit'] font-extrabold text-lg text-sky-400" x-text="getTarifs().t2.toLocaleString('fr-FR') + ' FCFA'"></span>
                        <span class="block text-[10px] text-slate-400 mt-1">Échéance : 15 Janvier</span>
                    </div>

                    <!-- Tranche 3 -->
                    <div class="bg-white/5 p-4 rounded-xl border border-white/10">
                        <span class="text-slate-400 block mb-1">3ème Tranche</span>
                        <span class="font-['Outfit'] font-extrabold text-lg text-amber-400" x-text="getTarifs().t3.toLocaleString('fr-FR') + ' FCFA'"></span>
                        <span class="block text-[10px] text-slate-400 mt-1">Échéance : 15 Avril</span>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                <button onclick="window.print()" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-slate-900 text-white font-bold text-xs hover:bg-slate-800 transition">
                    <i class="fa-solid fa-download text-amber-400"></i> Télécharger la Grille Tarifaire Officielle PDF
                </button>
            </div>

        </div>

    </div>
</section>

@endsection
