<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PV Officiel de Délibération | Université Emi Koussi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; padding: 0 !important; }
            .page-break { page-break-after: always; }
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-900 font-['Plus_Jakarta_Sans'] p-4 sm:p-8">

    <!-- FLOATING ACTION BAR FOR ADMIN -->
    <div class="max-w-4xl mx-auto mb-6 flex items-center justify-between no-print bg-[#0B1528] text-white p-4 rounded-2xl shadow-xl">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-amber-300 font-bold text-xs transition">
                <i class="fa-solid fa-arrow-left mr-1"></i> Retour Dashboard
            </a>
            <span class="text-xs font-semibold">Procès-Verbal Officiel des Admis 2026-2027</span>
        </div>
        <button onclick="window.print()" class="px-5 py-2 rounded-xl bg-amber-400 hover:bg-amber-500 text-slate-950 font-extrabold text-xs shadow-md transition flex items-center gap-2">
            <i class="fa-solid fa-print"></i> Imprimer le PV Officiel
        </button>
    </div>

    <!-- PV DOCUMENT SHEET -->
    <div class="max-w-4xl mx-auto bg-white p-8 sm:p-12 rounded-3xl shadow-2xl border border-slate-200 relative text-xs">
        
        <!-- OFFICIAL REPUBLIC & MINISTRY HEADER -->
        <div class="border-b-2 border-slate-900 pb-6 mb-8">
            <div class="flex justify-between items-start text-center">
                
                <!-- Left: Republic -->
                <div class="w-1/3 text-left">
                    <p class="font-extrabold text-[11px] uppercase tracking-wider text-slate-900">RÉPUBLIQUE DU TCHAD</p>
                    <p class="text-[9px] font-semibold text-slate-500 italic">Unité — Travail — Progrès</p>
                    <div class="w-12 h-0.5 bg-amber-500 my-1"></div>
                    <p class="text-[9px] font-bold text-slate-700 uppercase">MINISTÈRE DE L'ENSEIGNEMENT SUPÉRIEUR, DE LA RECHERCHE ET DE L'INNOVATION</p>
                </div>

                <!-- Center: Seal Emblem -->
                <div class="w-1/3 flex flex-col items-center">
                    <div class="w-14 h-14 rounded-2xl bg-[#0B1528] text-amber-400 font-black flex items-center justify-center text-2xl shadow-md mb-1">
                        <i class="fa-solid fa-university"></i>
                    </div>
                    <p class="font-['Outfit'] font-black text-sm text-slate-900 uppercase">UNIVERSITÉ EMI KOUSSI</p>
                    <p class="text-[9px] font-bold text-amber-700">NDJAMENA — TCHAD</p>
                </div>

                <!-- Right: PV Ref -->
                <div class="w-1/3 text-right font-mono text-[10px]">
                    <p class="font-extrabold text-slate-900">PV N°: 2026/UNEK/PV-ADM/001</p>
                    <p class="text-slate-500">Date: {{ date('d/m/Y') }}</p>
                    <p class="text-slate-500">Session: 2026-2027</p>
                </div>

            </div>

            <!-- TITLE BANNER -->
            <div class="mt-8 text-center bg-slate-900 text-white py-3.5 px-6 rounded-2xl shadow-sm">
                <h1 class="font-['Outfit'] font-extrabold text-lg uppercase tracking-wider text-amber-300">PROCÈS-VERBAL DE DÉLIBÉRATION DU JURY D'ADMISSION</h1>
                <p class="text-[11px] text-slate-300 font-medium mt-0.5">Année Académique 2026-2027 — {{ $faculte }}</p>
            </div>
        </div>

        <!-- PV INTRO TEXT -->
        <div class="space-y-2 mb-6 text-slate-700 leading-relaxed text-[11px]">
            <p>
                Le Jury d'Admission de l'<strong>Université Emi Koussi (UNEK)</strong> de N'Djamena, réuni en séance solennelle conformément à la réglementation académique LMD en vigueur, après examen minutieux des relevés de notes, des attestation du Baccalauréat et de la conformité des pièces de candidature, délibère et proclame l'admission définitive des candidats ci-après désignés :
            </p>
        </div>

        <!-- TABLE OF ADMITTED CANDIDATES -->
        <div class="mb-8 overflow-hidden rounded-2xl border border-slate-300">
            <table class="w-full text-left border-collapse text-[11px]">
                <thead>
                    <tr class="bg-slate-900 text-white font-bold uppercase text-[10px]">
                        <th class="py-3 px-3">N°</th>
                        <th class="py-3 px-3">Code Dossier</th>
                        <th class="py-3 px-3">Nom & Prénom</th>
                        <th class="py-3 px-3">Genre</th>
                        <th class="py-3 px-3">Nationalité</th>
                        <th class="py-3 px-3">Faculté & Filière d'Admission</th>
                        <th class="py-3 px-3 text-right">Décision</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($admisList as $index => $cand)
                        <tr class="hover:bg-slate-50">
                            <td class="py-2.5 px-3 font-bold text-slate-500">{{ $index + 1 }}</td>
                            <td class="py-2.5 px-3 font-mono font-extrabold text-amber-700">{{ $cand->code_dossier }}</td>
                            <td class="py-2.5 px-3 font-extrabold text-slate-900 uppercase">{{ $cand->nom }} {{ $cand->prenom }}</td>
                            <td class="py-2.5 px-3 font-bold text-slate-700">{{ $cand->genre }}</td>
                            <td class="py-2.5 px-3 text-slate-700">{{ $cand->nationalite }}</td>
                            <td class="py-2.5 px-3">
                                <span class="font-bold text-slate-900">{{ $cand->filiere }}</span>
                                <span class="block text-[9px] text-slate-500">{{ $cand->faculte }} ({{ $cand->cycle }})</span>
                            </td>
                            <td class="py-2.5 px-3 text-right">
                                <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 font-extrabold text-[10px] border border-emerald-300">
                                    ADMIS
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400 font-medium">
                                Aucun candidat admis enregistré pour le moment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- SUMMARY STATS -->
        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 mb-10 flex justify-between items-center text-xs font-bold text-slate-800">
            <span>Total des Candidats Admis proclamés : <strong class="text-amber-700 font-black text-sm">{{ $admisList->count() }} Étudiants</strong></span>
            <span>Pourcentage de validation : <strong class="text-emerald-700 font-black">100% Vérifié</strong></span>
        </div>

        <!-- SIGNATURES BLOCK -->
        <div class="grid grid-cols-3 gap-6 pt-6 border-t border-slate-200 text-center text-[10px]">
            
            <div>
                <p class="font-bold text-slate-500 uppercase">Le Chef de Scolarité</p>
                <div class="h-20 flex items-center justify-center italic text-slate-400">
                    (Signature & Sceau)
                </div>
                <p class="font-extrabold text-slate-900">Dr. MBODOU Mahamat</p>
            </div>

            <div>
                <p class="font-bold text-slate-500 uppercase">Le Président du Jury</p>
                <div class="h-20 flex items-center justify-center">
                    <div class="w-16 h-16 rounded-full border-2 border-dashed border-amber-500/40 text-amber-600 flex items-center justify-center font-bold text-[8px] uppercase">
                        Sceau Jury UNEK
                    </div>
                </div>
                <p class="font-extrabold text-slate-900">Prof. DJIMBANGAR N.</p>
            </div>

            <div>
                <p class="font-bold text-slate-500 uppercase">Le Vice-Recteur de l'UNEK</p>
                <div class="h-20 flex items-center justify-center italic text-slate-400">
                    (Signature & Cachet)
                </div>
                <p class="font-extrabold text-slate-900">Dr. ABDERAHMANE K.</p>
            </div>

        </div>

    </div>

</body>
</html>
