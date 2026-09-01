<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Scolarité & Admissions | Université Emi Koussi (UNEK)</title>
    
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
<body class="bg-slate-100 text-slate-800 font-['Plus_Jakarta_Sans'] min-h-screen" x-data="{
    modalOpen: false,
    selectedCandidate: null,
    
    openModal(cand) {
        this.selectedCandidate = cand;
        this.modalOpen = true;
    }
}">

    <!-- ADMIN TOP NAVIGATION -->
    <header class="bg-[#0B1528] text-white sticky top-0 z-30 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <!-- Logo & Title -->
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-lg bg-amber-400 text-slate-950 font-bold flex items-center justify-center text-lg">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <div>
                        <span class="font-['Outfit'] font-extrabold text-lg text-white">UNEK Admin</span>
                        <span class="text-[11px] text-amber-400 block font-semibold">Tableau de Bord Scolarité & Admissions</span>
                    </div>
                </div>

                <!-- Right Quick Links -->
                <div class="flex items-center gap-4 text-xs font-semibold">
                    <a href="{{ route('home') }}" target="_blank" class="hover:text-amber-400 transition flex items-center gap-1.5">
                        <i class="fa-solid fa-globe text-slate-400"></i> Voir le Site
                    </a>
                    <a href="{{ route('admissions') }}" target="_blank" class="px-3 py-1.5 rounded-lg bg-amber-400 hover:bg-amber-500 text-slate-950 font-bold transition flex items-center gap-1.5">
                        <i class="fa-solid fa-plus"></i> Nouvelle Candidature
                    </a>
                </div>

            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Flash Alert Success -->
        @if(session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs font-bold flex items-center justify-between">
                <span class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i> {{ session('success') }}
                </span>
                <button onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-950"><i class="fa-solid fa-xmark"></i></button>
            </div>
        @endif

        <!-- STATS CARDS -->
        <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 mb-8">
            
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                <span class="text-xs text-slate-500 font-bold uppercase tracking-wider block">Total Dossiers</span>
                <span class="font-['Outfit'] font-extrabold text-2xl text-slate-900 mt-1 block">{{ $stats['total'] }}</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-sky-200 bg-sky-50/50 shadow-sm">
                <span class="text-xs text-sky-700 font-bold uppercase tracking-wider block">En Attente</span>
                <span class="font-['Outfit'] font-extrabold text-2xl text-sky-800 mt-1 block">{{ $stats['en_attente'] }}</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-emerald-200 bg-emerald-50/50 shadow-sm">
                <span class="text-xs text-emerald-700 font-bold uppercase tracking-wider block">Admis</span>
                <span class="font-['Outfit'] font-extrabold text-2xl text-emerald-800 mt-1 block">{{ $stats['admis'] }}</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-amber-200 bg-amber-50/50 shadow-sm">
                <span class="text-xs text-amber-700 font-bold uppercase tracking-wider block">Incomplets</span>
                <span class="font-['Outfit'] font-extrabold text-2xl text-amber-800 mt-1 block">{{ $stats['incomplet'] }}</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-rose-200 bg-rose-50/50 shadow-sm">
                <span class="text-xs text-rose-700 font-bold uppercase tracking-wider block">Refusés</span>
                <span class="font-['Outfit'] font-extrabold text-2xl text-rose-800 mt-1 block">{{ $stats['refuse'] }}</span>
            </div>

        </div>

        <!-- FILTERS & SEARCH -->
        <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200 mb-6">
            <form action="{{ route('admin.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4 items-center justify-between text-xs">
                
                <div class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
                    <!-- Search Input -->
                    <div class="relative flex-1 sm:w-64">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-slate-400"></i>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher nom, n° dossier, filière..." class="w-full pl-9 pr-3 py-2 rounded-xl bg-slate-50 border border-slate-300 focus:outline-none focus:border-amber-400">
                    </div>

                    <!-- Faculty Select -->
                    <select name="faculte" onchange="this.form.submit()" class="py-2 px-3 rounded-xl bg-slate-50 border border-slate-300 focus:outline-none focus:border-amber-400">
                        <option value="">Toutes les Facultés</option>
                        <option value="Faculté des Sciences Humaines, Juridiques et de Gestion" {{ request('faculte') == 'Faculté des Sciences Humaines, Juridiques et de Gestion' ? 'selected' : '' }}>Sciences Humaines & Juridiques</option>
                        <option value="Faculté des Sciences et Techniques" {{ request('faculte') == 'Faculté des Sciences et Techniques' ? 'selected' : '' }}>Sciences et Techniques</option>
                    </select>

                    <!-- Status Select -->
                    <select name="statut" onchange="this.form.submit()" class="py-2 px-3 rounded-xl bg-slate-50 border border-slate-300 focus:outline-none focus:border-amber-400 font-semibold">
                        <option value="">Tous les Statuts</option>
                        <option value="en_attente" {{ request('statut') == 'en_attente' ? 'selected' : '' }}>En Attente</option>
                        <option value="admis" {{ request('statut') == 'admis' ? 'selected' : '' }}>Admis</option>
                        <option value="incomplet" {{ request('statut') == 'incomplet' ? 'selected' : '' }}>Incomplet</option>
                        <option value="refuse" {{ request('statut') == 'refuse' ? 'selected' : '' }}>Refusé</option>
                    </select>
                </div>

                <div class="flex items-center gap-2 self-end sm:self-auto">
                    <a href="{{ route('admin.index') }}" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold transition">
                        Réinitialiser
                    </a>
                </div>

            </form>
        </div>

        <!-- CANDIDATES TABLE -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider text-[11px]">
                            <th class="py-3.5 px-4">Code Dossier</th>
                            <th class="py-3.5 px-4">Candidat</th>
                            <th class="py-3.5 px-4">Formation & Faculté</th>
                            <th class="py-3.5 px-4">Date Dépôt</th>
                            <th class="py-3.5 px-4">Statut</th>
                            <th class="py-3.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        @forelse($candidatures as $cand)
                            <tr class="hover:bg-slate-50/80 transition">
                                <!-- Code Dossier -->
                                <td class="py-3.5 px-4">
                                    <a href="{{ route('admissions.confirmation', $cand->code_dossier) }}" target="_blank" class="font-mono font-extrabold text-amber-600 hover:underline">
                                        {{ $cand->code_dossier }}
                                    </a>
                                </td>

                                <!-- Candidat -->
                                <td class="py-3.5 px-4">
                                    <div class="font-bold text-slate-900 text-xs">{{ $cand->nom }} {{ $cand->prenom }}</div>
                                    <div class="text-[11px] text-slate-500 flex items-center gap-2 mt-0.5">
                                        <span><i class="fa-solid fa-phone text-[10px] text-slate-400"></i> {{ $cand->telephone }}</span>
                                        <span>•</span>
                                        <span>{{ $cand->email }}</span>
                                    </div>
                                </td>

                                <!-- Formation -->
                                <td class="py-3.5 px-4">
                                    <div class="font-bold text-slate-800">{{ $cand->filiere }}</div>
                                    <div class="text-[11px] text-slate-400 truncate max-w-xs">{{ $cand->cycle }} — {{ Str::limit($cand->faculte, 35) }}</div>
                                </td>

                                <!-- Date -->
                                <td class="py-3.5 px-4 text-slate-500">
                                    {{ date('d/m/Y', strtotime($cand->created_at)) }}
                                    <span class="text-[10px] text-slate-400 block">{{ date('H:i', strtotime($cand->created_at)) }}</span>
                                </td>

                                <!-- Statut Badge -->
                                <td class="py-3.5 px-4">
                                    <span class="px-2.5 py-1 rounded-full font-bold text-[10px] inline-flex items-center gap-1.5
                                        @if($cand->statut === 'admis') bg-emerald-100 text-emerald-800 border border-emerald-200
                                        @elseif($cand->statut === 'incomplet') bg-amber-100 text-amber-800 border border-amber-200
                                        @elseif($cand->statut === 'refuse') bg-rose-100 text-rose-800 border border-rose-200
                                        @else bg-sky-100 text-sky-800 border border-sky-200 @endif">
                                        @if($cand->statut === 'admis') <i class="fa-solid fa-circle text-[6px]"></i> Admis
                                        @elseif($cand->statut === 'incomplet') <i class="fa-solid fa-triangle-exclamation"></i> Incomplet
                                        @elseif($cand->statut === 'refuse') <i class="fa-solid fa-circle text-[6px]"></i> Refusé
                                        @else <i class="fa-solid fa-clock"></i> En attente @endif
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td class="py-3.5 px-4 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <button @click="openModal({{ json_encode($cand) }})" class="p-2 rounded-lg bg-slate-100 hover:bg-amber-400 hover:text-slate-950 text-slate-700 transition" title="Examiner le dossier">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        
                                        <a href="{{ route('admissions.confirmation', $cand->code_dossier) }}" target="_blank" class="p-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 transition" title="Imprimer fiche candidat">
                                            <i class="fa-solid fa-print"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center text-slate-400 text-xs">
                                    Aucune candidature trouvée.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- MODAL DOSSIER CANDIDAT -->
    <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/70 backdrop-blur-sm">
        <div @click.away="modalOpen = false" class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl text-slate-900 border border-slate-200 relative max-h-[90vh] overflow-y-auto">
            
            <button @click="modalOpen = false" class="absolute top-5 right-5 text-slate-400 hover:text-slate-600 transition">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            <template x-if="selectedCandidate">
                <div>
                    <!-- Header Modal -->
                    <div class="flex items-center gap-3 pb-4 border-b border-slate-100 mb-6">
                        <div class="w-12 h-12 rounded-2xl bg-[#0F172A] text-amber-400 flex items-center justify-center font-bold text-xl">
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                        <div>
                            <span class="font-mono text-xs font-extrabold text-amber-600 block" x-text="selectedCandidate.code_dossier"></span>
                            <h3 class="font-['Outfit'] font-extrabold text-2xl text-slate-900" x-text="selectedCandidate.nom + ' ' + selectedCandidate.prenom"></h3>
                        </div>
                    </div>

                    <!-- Formulaire de Mise à jour du Statut -->
                    <form :action="'/admin/candidature/' + selectedCandidate.id + '/status'" method="POST" class="space-y-5 text-xs">
                        @csrf

                        <div class="grid grid-cols-2 gap-4 bg-slate-50 p-4 rounded-2xl border border-slate-200">
                            <div>
                                <span class="text-slate-400 block font-semibold">Téléphone / WhatsApp :</span>
                                <span class="font-bold text-slate-900" x-text="selectedCandidate.telephone"></span>
                            </div>
                            <div>
                                <span class="text-slate-400 block font-semibold">Adresse Email :</span>
                                <span class="font-bold text-slate-900" x-text="selectedCandidate.email"></span>
                            </div>
                            <div>
                                <span class="text-slate-400 block font-semibold">Faculté :</span>
                                <span class="font-bold text-slate-900" x-text="selectedCandidate.faculte"></span>
                            </div>
                            <div>
                                <span class="text-slate-400 block font-semibold">Filière & Cycle :</span>
                                <span class="font-bold text-amber-600" x-text="selectedCandidate.filiere + ' (' + selectedCandidate.cycle + ')'"></span>
                            </div>
                        </div>

                        <!-- Modification du Statut -->
                        <div>
                            <label class="block font-extrabold text-slate-800 mb-2">Changer le Statut du Dossier :</label>
                            <div class="grid grid-cols-4 gap-2">
                                <label class="p-3 rounded-xl border border-slate-200 flex flex-col items-center gap-1 cursor-pointer hover:border-sky-500 transition">
                                    <input type="radio" name="statut" value="en_attente" :checked="selectedCandidate.statut === 'en_attente'">
                                    <span class="font-bold text-sky-700">En Attente</span>
                                </label>

                                <label class="p-3 rounded-xl border border-slate-200 flex flex-col items-center gap-1 cursor-pointer hover:border-emerald-500 transition">
                                    <input type="radio" name="statut" value="admis" :checked="selectedCandidate.statut === 'admis'">
                                    <span class="font-bold text-emerald-700">Admettre</span>
                                </label>

                                <label class="p-3 rounded-xl border border-slate-200 flex flex-col items-center gap-1 cursor-pointer hover:border-amber-500 transition">
                                    <input type="radio" name="statut" value="incomplet" :checked="selectedCandidate.statut === 'incomplet'">
                                    <span class="font-bold text-amber-700">Incomplet</span>
                                </label>

                                <label class="p-3 rounded-xl border border-slate-200 flex flex-col items-center gap-1 cursor-pointer hover:border-rose-500 transition">
                                    <input type="radio" name="statut" value="refuse" :checked="selectedCandidate.statut === 'refuse'">
                                    <span class="font-bold text-rose-700">Refuser</span>
                                </label>
                            </div>
                        </div>

                        <!-- Remarques de la scolarité -->
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Remarques / Observations de la Scolarité :</label>
                            <textarea name="remarques_admin" rows="3" x-model="selectedCandidate.remarques_admin" placeholder="ex: Relevés vérifiés. Admis avec félicitations du jury." class="w-full p-3 rounded-xl border border-slate-300 focus:outline-none focus:border-amber-400"></textarea>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex justify-between items-center">
                            <a :href="'/admissions/confirmation/' + selectedCandidate.code_dossier" target="_blank" class="text-amber-700 hover:underline font-bold">
                                <i class="fa-solid fa-print mr-1"></i> Voir Fiche Reçu
                            </a>
                            <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#0F172A] hover:bg-slate-800 text-white font-extrabold shadow-md transition">
                                Enregistrer la Décision
                            </button>
                        </div>

                    </form>
                </div>
            </template>

        </div>
    </div>

</body>
</html>
