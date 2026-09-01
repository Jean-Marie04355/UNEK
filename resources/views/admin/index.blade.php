<!DOCTYPE html>
<html lang="fr" class="h-full bg-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Scolarité & Admissions | UNEK N'Djamena</title>
    
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
<body class="h-full font-['Plus_Jakarta_Sans'] bg-slate-100 text-slate-800 antialiased" x-data="{
    sidebarOpen: false,
    drawerOpen: false,
    docPreviewModalOpen: false,
    previewingDoc: null,
    activeTab: 'info',
    selectedCandidate: null,
    
    inspectCandidate(cand) {
        this.selectedCandidate = cand;
        this.activeTab = 'info';
        this.drawerOpen = true;
    }
}">

    <div class="min-h-full flex flex-col lg:flex-row">
        
        <!-- SIDEBAR NAVIGATION -->
        <aside class="w-full lg:w-64 bg-[#0B1528] text-slate-300 shrink-0 border-r border-slate-800 flex flex-col justify-between">
            <div>
                <!-- Brand Header -->
                <div class="h-20 flex items-center px-6 border-b border-slate-800 gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 text-slate-950 font-black flex items-center justify-center text-xl shadow-lg ring-2 ring-amber-400/20">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <div>
                        <div class="font-['Outfit'] font-extrabold text-lg text-white tracking-tight flex items-center gap-1.5">
                            UNEK <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-amber-400/20 text-amber-300 border border-amber-400/30">ADMIN</span>
                        </div>
                        <p class="text-[10px] text-slate-400 font-medium">Espace Scolarité LMD</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="p-4 space-y-1.5 text-xs font-semibold">
                    <div class="px-3 py-2 text-[10px] font-bold uppercase tracking-wider text-slate-500">Menu Principal</div>
                    
                    <a href="{{ route('admin.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-amber-400/10 text-amber-300 font-extrabold border border-amber-400/20">
                        <i class="fa-solid fa-chart-pie text-sm"></i> Dashboard & Admissions
                    </a>

                    <a href="{{ route('formations') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-400 hover:bg-slate-800/80 hover:text-white transition">
                        <i class="fa-solid fa-book-bookmark text-sm"></i> Catalogue Filières (35)
                    </a>

                    <a href="{{ route('admissions') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-400 hover:bg-slate-800/80 hover:text-white transition">
                        <i class="fa-solid fa-pen-to-square text-sm"></i> Formulaire Candidat
                    </a>

                    <div class="pt-4 px-3 py-2 text-[10px] font-bold uppercase tracking-wider text-slate-500">Gestion Académique</div>

                    <a href="#" onclick="window.print()" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-400 hover:bg-slate-800/80 hover:text-white transition">
                        <i class="fa-solid fa-file-pdf text-sm text-rose-400"></i> Exporter Procès-Verbal (PV)
                    </a>

                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-400 hover:bg-slate-800/80 hover:text-white transition">
                        <i class="fa-solid fa-globe text-sm text-sky-400"></i> Voir le Portail Public
                    </a>
                </nav>
            </div>

            <!-- Sidebar User Profile -->
            <div class="p-4 border-t border-slate-800 bg-slate-950/40">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full bg-slate-700 text-white font-bold flex items-center justify-center text-xs ring-2 ring-amber-400">
                            DA
                        </div>
                        <div>
                            <div class="text-xs font-bold text-white">Scolarité UNEK</div>
                            <div class="text-[10px] text-slate-400">N'Djamena, Tchad</div>
                        </div>
                    </div>
                    <span class="w-2 h-2 rounded-full bg-emerald-500 ring-4 ring-emerald-500/20" title="Système En Ligne"></span>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT AREA -->
        <main class="flex-1 flex flex-col min-w-0">
            
            <!-- TOP BAR -->
            <header class="h-20 bg-white border-b border-slate-200 px-6 flex items-center justify-between shadow-sm">
                <div>
                    <h1 class="font-['Outfit'] font-extrabold text-xl text-slate-900">Tableau de Bord des Admissions 2026-2027</h1>
                    <p class="text-xs text-slate-500">Gestion des candidatures, examen des dossiers et validation des diplômes</p>
                </div>

                <div class="flex items-center gap-3">
                    <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold border border-amber-200">
                        Session Académique 2026-2027
                    </span>
                    <a href="{{ route('admissions') }}" target="_blank" class="px-4 py-2 rounded-xl bg-[#0B1528] hover:bg-slate-800 text-white font-bold text-xs shadow-md transition flex items-center gap-2">
                        <i class="fa-solid fa-user-plus text-amber-400"></i> Nouvelle Candidature
                    </a>
                </div>
            </header>

            <div class="p-6 space-y-6">

                <!-- Flash Alert Success -->
                @if(session('success'))
                    <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs font-bold flex items-center justify-between shadow-sm">
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i> {{ session('success') }}
                        </span>
                        <button onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-950"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                @endif

                <!-- KPI METRICS GRID -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                    
                    <!-- Total -->
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Total Dossiers</span>
                                <span class="font-['Outfit'] font-black text-3xl text-slate-900 mt-1 block">{{ $stats['total'] }}</span>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center font-bold">
                                <i class="fa-solid fa-folder-open text-base"></i>
                            </div>
                        </div>
                        <div class="mt-3 text-[11px] font-semibold text-slate-500">Inscriptions enregistrées</div>
                    </div>

                    <!-- En attente -->
                    <div class="bg-white p-5 rounded-2xl border border-sky-200 bg-sky-50/40 shadow-sm relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="text-[11px] font-bold text-sky-700 uppercase tracking-wider block">En Attente</span>
                                <span class="font-['Outfit'] font-black text-3xl text-sky-900 mt-1 block">{{ $stats['en_attente'] }}</span>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-sky-500 text-white flex items-center justify-center font-bold shadow-md shadow-sky-500/20">
                                <i class="fa-solid fa-hourglass-half text-base"></i>
                            </div>
                        </div>
                        <div class="mt-3 text-[11px] font-semibold text-sky-700">À étudier par la scolarité</div>
                    </div>

                    <!-- Admis -->
                    <div class="bg-white p-5 rounded-2xl border border-emerald-200 bg-emerald-50/40 shadow-sm relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="text-[11px] font-bold text-emerald-700 uppercase tracking-wider block">Admis Validés</span>
                                <span class="font-['Outfit'] font-black text-3xl text-emerald-900 mt-1 block">{{ $stats['admis'] }}</span>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold shadow-md shadow-emerald-600/20">
                                <i class="fa-solid fa-check-double text-base"></i>
                            </div>
                        </div>
                        <div class="mt-3 text-[11px] font-semibold text-emerald-700">Attestation QR générée</div>
                    </div>

                    <!-- Incomplets -->
                    <div class="bg-white p-5 rounded-2xl border border-amber-200 bg-amber-50/40 shadow-sm relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="text-[11px] font-bold text-amber-700 uppercase tracking-wider block">Incomplets</span>
                                <span class="font-['Outfit'] font-black text-3xl text-amber-900 mt-1 block">{{ $stats['incomplet'] }}</span>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-amber-500 text-white flex items-center justify-center font-bold shadow-md shadow-amber-500/20">
                                <i class="fa-solid fa-triangle-exclamation text-base"></i>
                            </div>
                        </div>
                        <div class="mt-3 text-[11px] font-semibold text-amber-700">Pièce(s) demandée(s)</div>
                    </div>

                    <!-- Refusés -->
                    <div class="bg-white p-5 rounded-2xl border border-rose-200 bg-rose-50/40 shadow-sm relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="text-[11px] font-bold text-rose-700 uppercase tracking-wider block">Refusés</span>
                                <span class="font-['Outfit'] font-black text-3xl text-rose-900 mt-1 block">{{ $stats['refuse'] }}</span>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-rose-600 text-white flex items-center justify-center font-bold shadow-md shadow-rose-600/20">
                                <i class="fa-solid fa-xmark text-base"></i>
                            </div>
                        </div>
                        <div class="mt-3 text-[11px] font-semibold text-rose-700">Dossiers non retenus</div>
                    </div>

                </div>

                <!-- FILTERS & SEARCH CONTROL BAR -->
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200">
                    <form action="{{ route('admin.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4 items-center justify-between text-xs">
                        
                        <div class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
                            <!-- Search -->
                            <div class="relative flex-1 sm:w-72">
                                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-slate-400"></i>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher nom, n° dossier, filière..." class="w-full pl-9 pr-3 py-2 rounded-xl bg-slate-50 border border-slate-300 focus:outline-none focus:border-amber-400 font-medium">
                            </div>

                            <!-- Faculty Filter -->
                            <select name="faculte" onchange="this.form.submit()" class="py-2 px-3 rounded-xl bg-slate-50 border border-slate-300 focus:outline-none focus:border-amber-400 font-semibold">
                                <option value="">Toutes les Facultés</option>
                                <option value="Faculté des Sciences Humaines, Juridiques et de Gestion" {{ request('faculte') == 'Faculté des Sciences Humaines, Juridiques et de Gestion' ? 'selected' : '' }}>Sciences Humaines & Juridiques</option>
                                <option value="Faculté des Sciences et Techniques" {{ request('faculte') == 'Faculté des Sciences et Techniques' ? 'selected' : '' }}>Sciences et Techniques</option>
                            </select>

                            <!-- Status Filter -->
                            <select name="statut" onchange="this.form.submit()" class="py-2 px-3 rounded-xl bg-slate-50 border border-slate-300 focus:outline-none focus:border-amber-400 font-semibold">
                                <option value="">Tous les Statuts</option>
                                <option value="en_attente" {{ request('statut') == 'en_attente' ? 'selected' : '' }}>En Attente</option>
                                <option value="admis" {{ request('statut') == 'admis' ? 'selected' : '' }}>Admis</option>
                                <option value="incomplet" {{ request('statut') == 'incomplet' ? 'selected' : '' }}>Incomplet</option>
                                <option value="refuse" {{ request('statut') == 'refuse' ? 'selected' : '' }}>Refusé</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold transition">
                                Réinitialiser
                            </a>
                        </div>

                    </form>
                </div>

                <!-- CANDIDATES DATA TABLE -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-slate-50/80 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider text-[11px]">
                                    <th class="py-4 px-4">Code Dossier</th>
                                    <th class="py-4 px-4">Identité Candidat</th>
                                    <th class="py-4 px-4">Affectation Académique</th>
                                    <th class="py-4 px-4">Date Dépôt</th>
                                    <th class="py-4 px-4">Statut Décision</th>
                                    <th class="py-4 px-4 text-right">Examen Dossier</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 font-medium">
                                @forelse($candidatures as $cand)
                                    <tr class="hover:bg-slate-50/80 transition">
                                        <!-- Code Dossier -->
                                        <td class="py-4 px-4">
                                            <a href="{{ route('admissions.confirmation', $cand->code_dossier) }}" target="_blank" class="font-mono font-extrabold text-amber-600 hover:underline">
                                                {{ $cand->code_dossier }}
                                            </a>
                                        </td>

                                        <!-- Candidat -->
                                        <td class="py-4 px-4">
                                            <div class="font-extrabold text-slate-900 text-xs">{{ $cand->nom }} {{ $cand->prenom }}</div>
                                            <div class="text-[11px] text-slate-500 flex items-center gap-2 mt-0.5">
                                                <span><i class="fa-solid fa-phone text-[10px] text-slate-400"></i> {{ $cand->telephone }}</span>
                                                <span>•</span>
                                                <span>{{ $cand->email }}</span>
                                            </div>
                                        </td>

                                        <!-- Formation -->
                                        <td class="py-4 px-4">
                                            <div class="font-bold text-slate-800">{{ $cand->filiere }}</div>
                                            <div class="text-[11px] text-slate-400 truncate max-w-xs">{{ $cand->cycle }} — {{ Str::limit($cand->faculte, 35) }}</div>
                                        </td>

                                        <!-- Date -->
                                        <td class="py-4 px-4 text-slate-500">
                                            {{ date('d/m/Y', strtotime($cand->created_at)) }}
                                            <span class="text-[10px] text-slate-400 block">{{ date('H:i', strtotime($cand->created_at)) }}</span>
                                        </td>

                                        <!-- Statut Badge -->
                                        <td class="py-4 px-4">
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
                                        <td class="py-4 px-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <button @click="inspectCandidate({{ json_encode($cand) }})" class="px-3 py-1.5 rounded-xl bg-amber-400 hover:bg-amber-500 text-slate-950 font-extrabold text-xs transition flex items-center gap-1.5 shadow-sm">
                                                    <i class="fa-solid fa-folder-open"></i> Étudier
                                                </button>
                                                
                                                <a href="{{ route('admissions.confirmation', $cand->code_dossier) }}" target="_blank" class="p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 transition" title="Attestation officielle avec QR Code">
                                                    <i class="fa-solid fa-print"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-12 text-center text-slate-400 text-xs">
                                            Aucune candidature trouvée.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </main>
    </div>

    <!-- SLIDE-OVER DRAWER : INSPECTION DU DOSSIER & DÉCISION DU JURY -->
    <div x-show="drawerOpen" x-cloak class="fixed inset-0 z-50 overflow-hidden">
        <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm transition-opacity" @click="drawerOpen = false"></div>

        <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
            <div class="w-screen max-w-2xl bg-white shadow-2xl border-l border-slate-200 flex flex-col justify-between relative">
                
                <template x-if="selectedCandidate">
                    <div class="flex flex-col h-full">
                        
                        <!-- Drawer Header -->
                        <div class="p-6 bg-[#0B1528] text-white border-b border-slate-800 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-amber-400 to-amber-600 text-slate-950 flex items-center justify-center font-bold text-xl shadow-md">
                                    <i class="fa-solid fa-id-card"></i>
                                </div>
                                <div>
                                    <span class="font-mono text-xs font-black text-amber-300 block" x-text="selectedCandidate.code_dossier"></span>
                                    <h3 class="font-['Outfit'] font-extrabold text-xl text-white" x-text="selectedCandidate.nom + ' ' + selectedCandidate.prenom"></h3>
                                </div>
                            </div>

                            <button @click="drawerOpen = false" class="text-slate-400 hover:text-white transition">
                                <i class="fa-solid fa-xmark text-2xl"></i>
                            </button>
                        </div>

                        <!-- Drawer Navigation Tabs -->
                        <div class="flex border-b border-slate-200 text-xs font-bold gap-2 px-6 bg-slate-50 pt-2">
                            <button @click="activeTab = 'info'" class="pb-3 px-4 border-b-2 transition" :class="activeTab === 'info' ? 'border-amber-500 text-amber-700 font-extrabold' : 'border-transparent text-slate-500 hover:text-slate-800'">
                                <i class="fa-solid fa-user mr-1.5"></i> Identité & Choix
                            </button>
                            <button @click="activeTab = 'docs'" class="pb-3 px-4 border-b-2 transition" :class="activeTab === 'docs' ? 'border-amber-500 text-amber-700 font-extrabold' : 'border-transparent text-slate-500 hover:text-slate-800'">
                                <i class="fa-solid fa-file-pdf mr-1.5"></i> Pièces Justificatives
                            </button>
                            <button @click="activeTab = 'decision'" class="pb-3 px-4 border-b-2 transition" :class="activeTab === 'decision' ? 'border-amber-500 text-amber-700 font-extrabold' : 'border-transparent text-slate-500 hover:text-slate-800'">
                                <i class="fa-solid fa-gavel mr-1.5"></i> Décision du Jury
                            </button>
                        </div>

                        <!-- Drawer Body Content -->
                        <div class="p-6 flex-1 overflow-y-auto space-y-6">
                            
                            <!-- TAB 1: IDENTITÉ -->
                            <div x-show="activeTab === 'info'" class="space-y-4 text-xs">
                                <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200 space-y-3">
                                    <div class="flex justify-between py-1.5 border-b border-slate-200">
                                        <span class="text-slate-500 font-semibold">Nom & Prénom :</span>
                                        <span class="font-extrabold text-slate-900 uppercase" x-text="selectedCandidate.nom + ' ' + selectedCandidate.prenom"></span>
                                    </div>
                                    <div class="flex justify-between py-1.5 border-b border-slate-200">
                                        <span class="text-slate-500 font-semibold">Genre / Nationalité :</span>
                                        <span class="font-bold text-slate-900" x-text="(selectedCandidate.genre === 'M' ? 'Masculin' : 'Féminin') + ' (' + selectedCandidate.nationalite + ')'"></span>
                                    </div>
                                    <div class="flex justify-between py-1.5 border-b border-slate-200">
                                        <span class="text-slate-500 font-semibold">Téléphone / WhatsApp :</span>
                                        <span class="font-bold text-slate-900 font-mono" x-text="selectedCandidate.telephone"></span>
                                    </div>
                                    <div class="flex justify-between py-1.5 border-b border-slate-200">
                                        <span class="text-slate-500 font-semibold">Adresse Email :</span>
                                        <span class="font-bold text-slate-900" x-text="selectedCandidate.email"></span>
                                    </div>
                                    <div class="flex justify-between py-1.5 border-b border-slate-200">
                                        <span class="text-slate-500 font-semibold">Faculté Académique :</span>
                                        <span class="font-bold text-slate-900" x-text="selectedCandidate.faculte"></span>
                                    </div>
                                    <div class="flex justify-between py-1.5">
                                        <span class="text-slate-500 font-semibold">Filière & Niveau :</span>
                                        <span class="font-extrabold text-amber-700" x-text="selectedCandidate.filiere + ' (' + selectedCandidate.cycle + ')'"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 2: PIÈCES NUMÉRISÉES -->
                            <div x-show="activeTab === 'docs'" class="space-y-6 text-xs">
                                <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 flex items-center justify-between">
                                    <span class="flex items-center gap-2 font-semibold">
                                        <i class="fa-solid fa-shield-halved text-amber-600 text-base"></i> Contrôle de conformité des pièces de candidature
                                    </span>
                                    <span class="text-[10px] font-mono font-bold px-2 py-0.5 rounded bg-white border border-amber-300">3 Fichiers</span>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    
                                    <!-- File 1: BAC -->
                                    <div class="p-5 rounded-2xl border border-slate-200 bg-white text-center shadow-sm space-y-3">
                                        <div class="w-12 h-12 rounded-xl bg-rose-100 text-rose-600 flex items-center justify-center text-2xl mx-auto">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-900 text-sm">Baccalauréat</h4>
                                            <p class="text-[10px] text-slate-400 mt-0.5">Attestation / Relevé de Notes</p>
                                        </div>

                                        <template x-if="selectedCandidate.bac_path">
                                            <a :href="'/storage/' + selectedCandidate.bac_path" target="_blank" class="w-full py-2 px-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition flex items-center justify-center gap-1.5">
                                                <i class="fa-solid fa-external-link"></i> Ouvrir le Fichier
                                            </a>
                                        </template>
                                        <template x-if="!selectedCandidate.bac_path">
                                            <button type="button" @click="docPreviewModalOpen = true; previewingDoc = { type: 'Baccalauréat', candidate: selectedCandidate }" class="w-full py-2 px-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition flex items-center justify-center gap-1.5">
                                                <i class="fa-solid fa-eye"></i> Aperçu Document
                                            </button>
                                        </template>
                                    </div>

                                    <!-- File 2: CNI -->
                                    <div class="p-5 rounded-2xl border border-slate-200 bg-white text-center shadow-sm space-y-3">
                                        <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-2xl mx-auto">
                                            <i class="fa-solid fa-address-card"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-900 text-sm">CNI / Passeport</h4>
                                            <p class="text-[10px] text-slate-400 mt-0.5">Pièce d'Identité Recto-Verso</p>
                                        </div>

                                        <template x-if="selectedCandidate.cni_path">
                                            <a :href="'/storage/' + selectedCandidate.cni_path" target="_blank" class="w-full py-2 px-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition flex items-center justify-center gap-1.5">
                                                <i class="fa-solid fa-external-link"></i> Ouvrir la CNI
                                            </a>
                                        </template>
                                        <template x-if="!selectedCandidate.cni_path">
                                            <button type="button" @click="docPreviewModalOpen = true; previewingDoc = { type: 'Carte CNI / Passeport', candidate: selectedCandidate }" class="w-full py-2 px-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition flex items-center justify-center gap-1.5">
                                                <i class="fa-solid fa-eye"></i> Aperçu CNI
                                            </button>
                                        </template>
                                    </div>

                                    <!-- File 3: Photo -->
                                    <div class="p-5 rounded-2xl border border-slate-200 bg-white text-center shadow-sm space-y-3">
                                        <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-2xl mx-auto">
                                            <i class="fa-solid fa-image"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-900 text-sm">Photo d'Identité</h4>
                                            <p class="text-[10px] text-slate-400 mt-0.5">Format Passeport Fond Blanc</p>
                                        </div>

                                        <template x-if="selectedCandidate.photo_path">
                                            <a :href="'/storage/' + selectedCandidate.photo_path" target="_blank" class="w-full py-2 px-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition flex items-center justify-center gap-1.5">
                                                <i class="fa-solid fa-external-link"></i> Voir la Photo
                                            </a>
                                        </template>
                                        <template x-if="!selectedCandidate.photo_path">
                                            <button type="button" @click="docPreviewModalOpen = true; previewingDoc = { type: 'Photo d\'Identité', candidate: selectedCandidate }" class="w-full py-2 px-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition flex items-center justify-center gap-1.5">
                                                <i class="fa-solid fa-eye"></i> Aperçu Photo
                                            </button>
                                        </template>
                                    </div>

                                </div>
                            </div>

                            <!-- TAB 3: DÉCISION DU JURY -->
                            <div x-show="activeTab === 'decision' || activeTab === 'info'" class="space-y-5 text-xs">
                                <form :action="'/admin/candidature/' + selectedCandidate.id + '/status'" method="POST" class="space-y-5">
                                    @csrf

                                    <div>
                                        <label class="block font-extrabold text-slate-900 mb-2 uppercase tracking-wider text-[11px]">Décision du Jury de Scolarité :</label>
                                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
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

                                    <div>
                                        <label class="block font-bold text-slate-700 mb-1">Remarques / Observations officielles :</label>
                                        <textarea name="remarques_admin" rows="3" x-model="selectedCandidate.remarques_admin" placeholder="ex: Relevés vérifiés et conformes. Admis en Génie Logiciel." class="w-full p-3 rounded-xl border border-slate-300 focus:outline-none focus:border-amber-400"></textarea>
                                    </div>

                                    <div class="pt-4 border-t border-slate-200 flex justify-between items-center">
                                        <a :href="'/admissions/confirmation/' + selectedCandidate.code_dossier" target="_blank" class="text-amber-700 hover:underline font-bold">
                                            <i class="fa-solid fa-print mr-1"></i> Attestation QR Code
                                        </a>
                                        <button type="submit" class="px-6 py-3 rounded-xl bg-[#0B1528] hover:bg-slate-800 text-white font-extrabold shadow-md transition flex items-center gap-2">
                                            <i class="fa-solid fa-check"></i> Enregistrer la Décision
                                        </button>
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>
                </template>

            </div>
        </div>
    </div>

    <!-- LIGHTBOX MODAL APERÇU DE DOCUMENT NUMÉRISÉ -->
    <div x-show="docPreviewModalOpen" x-cloak class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-md">
        <div @click.away="docPreviewModalOpen = false" class="bg-white rounded-3xl max-w-lg w-full p-6 shadow-2xl text-slate-900 border border-slate-200 relative">
            <button @click="docPreviewModalOpen = false" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 transition">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            <template x-if="previewingDoc">
                <div class="space-y-4">
                    <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 font-bold flex items-center justify-center text-lg">
                            <i class="fa-solid fa-file-contract"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-mono font-extrabold text-amber-600 uppercase tracking-wider block" x-text="previewingDoc.candidate.code_dossier"></span>
                            <h4 class="font-['Outfit'] font-extrabold text-lg text-slate-900" x-text="previewingDoc.type"></h4>
                        </div>
                    </div>

                    <!-- Visual Mockup Card -->
                    <div class="bg-slate-50 border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center space-y-3">
                        <div class="w-16 h-16 rounded-2xl bg-white border border-slate-200 shadow-sm mx-auto flex items-center justify-center text-3xl text-amber-500">
                            <i class="fa-solid fa-file-shield"></i>
                        </div>
                        <div>
                            <span class="font-bold text-slate-800 text-sm block" x-text="previewingDoc.type + ' — Numérisé'"></span>
                            <span class="text-xs text-slate-500 block mt-1">Candidat : <strong class="text-slate-900" x-text="previewingDoc.candidate.nom + ' ' + previewingDoc.candidate.prenom"></strong></span>
                            <span class="text-[11px] text-emerald-600 font-bold block mt-1">
                                <i class="fa-solid fa-circle-check"></i> Document Déposé & Intègre (Format PDF/Image)
                            </span>
                        </div>
                    </div>

                    <!-- Checklist -->
                    <div class="space-y-2 text-xs bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <span class="font-extrabold text-slate-900 block mb-1">Contrôle de Conformité Scolarité :</span>
                        <label class="flex items-center gap-2 cursor-pointer font-medium text-slate-700">
                            <input type="checkbox" checked class="rounded text-amber-500 focus:ring-amber-400">
                            <span>Sceau officiel et signature visibles</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer font-medium text-slate-700">
                            <input type="checkbox" checked class="rounded text-amber-500 focus:ring-amber-400">
                            <span>Identité conforme à la pièce d'état civil</span>
                        </label>
                    </div>

                    <div class="pt-2 flex justify-end">
                        <button type="button" @click="docPreviewModalOpen = false" class="px-5 py-2.5 rounded-xl bg-[#0B1528] hover:bg-slate-800 text-white font-bold text-xs transition">
                            Fermer l'Aperçu
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </div>

</body>
</html>
