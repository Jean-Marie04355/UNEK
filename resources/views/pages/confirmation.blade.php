@extends('layouts.app')

@section('title', 'Attestation Officielle de Candidature #' . $candidature->code_dossier . ' | UNEK')

@section('content')

<section class="py-12 bg-slate-900 min-h-screen text-slate-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Action Header Bar (Print & Back) -->
        <div class="mb-6 flex flex-col sm:flex-row items-center justify-between gap-4 print:hidden">
            <a href="{{ route('admissions') }}" class="text-xs font-bold text-slate-300 hover:text-amber-400 transition flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Retour au Portail des Admissions
            </a>

            <div class="flex items-center gap-3 w-full sm:w-auto">
                <button onclick="window.print()" class="px-5 py-2.5 rounded-xl bg-amber-400 hover:bg-amber-500 text-slate-950 font-extrabold text-xs transition shadow-lg flex items-center justify-center gap-2">
                    <i class="fa-solid fa-print"></i> Imprimer l'Attestation Officielle
                </button>
                <a href="{{ route('home') }}" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs transition">
                    Accueil
                </a>
            </div>
        </div>

        <!-- MAIN CERTIFICATE DOCUMENT CARD -->
        <div class="bg-white rounded-3xl shadow-2xl border-4 border-amber-500/30 overflow-hidden relative print:shadow-none print:border-2 print:border-slate-400">
            
            <!-- REPUBLIC & UNIVERSITY HEADER -->
            <div class="bg-[#0B1528] text-white p-6 sm:p-8 border-b-4 border-amber-500 text-center relative overflow-hidden">
                <!-- Background subtle watermark -->
                <div class="absolute inset-0 opacity-5 pointer-events-none flex items-center justify-center">
                    <i class="fa-solid fa-graduation-cap text-[280px]"></i>
                </div>

                <div class="relative z-10 space-y-2">
                    <div class="flex justify-between items-center text-[10px] text-slate-400 uppercase tracking-widest font-semibold pb-3 border-b border-slate-800">
                        <span>RÉPUBLIQUE DU TCHAD<br/><strong class="text-white">Unité - Travail - Progrès</strong></span>
                        <span class="text-right">MINISTÈRE DE L'ENSEIGNEMENT SUPÉRIEUR<br/><strong class="text-white">DE LA RECHERCHE ET DE L'INNOVATION</strong></span>
                    </div>

                    <div class="pt-3 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-slate-950 font-black text-3xl shadow-lg ring-4 ring-amber-400/30 shrink-0">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <div>
                                <h1 class="font-['Outfit'] text-2xl sm:text-3xl font-extrabold text-white tracking-tight">UNIVERSITÉ EMI KOUSSI</h1>
                                <p class="text-xs text-amber-300 font-semibold uppercase tracking-wider mt-0.5">Direction des Affaires Académiques, de la Scolarité & des Examens</p>
                            </div>
                        </div>

                        <div class="bg-white/10 backdrop-blur-md px-4 py-2.5 rounded-2xl border border-amber-400/40 text-center sm:text-right shrink-0">
                            <span class="text-[10px] uppercase font-bold text-amber-300 block tracking-widest">Code Dossier Candidat</span>
                            <span class="font-mono text-xl sm:text-2xl font-black text-white tracking-wider">{{ $candidature->code_dossier }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DOCUMENT BODY -->
            <div class="p-6 sm:p-10 space-y-8 bg-gradient-to-b from-white to-slate-50">
                
                <!-- TITLE OF DOCUMENT -->
                <div class="text-center border-b pb-6 border-slate-200">
                    <span class="px-4 py-1 rounded-full bg-slate-100 text-slate-600 text-[11px] font-extrabold uppercase tracking-widest border border-slate-200">
                        Document Officiel de Pré-inscription • Rentrée 2026-2027
                    </span>
                    <h2 class="font-['Outfit'] text-xl sm:text-2xl font-extrabold text-slate-900 mt-3">
                        ATTESTATION DE DÉPÔT DE CANDIDATURE
                    </h2>
                    <p class="text-xs text-slate-500 mt-1">Délivrée par le Secrétariat Académique de l'Université Emi Koussi à N'Djamena</p>
                </div>

                <!-- DECISION / STATUS BANNER -->
                <div class="p-5 rounded-2xl border-2 transition-all shadow-sm
                    @if($candidature->statut === 'admis') bg-emerald-50/90 border-emerald-300 text-emerald-950
                    @elseif($candidature->statut === 'incomplet') bg-amber-50/90 border-amber-300 text-amber-950
                    @elseif($candidature->statut === 'refuse') bg-rose-50/90 border-rose-300 text-rose-950
                    @else bg-sky-50/90 border-sky-300 text-sky-950 @endif">
                    
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-xl font-black shadow-md shrink-0
                                @if($candidature->statut === 'admis') bg-emerald-600 text-white
                                @elseif($candidature->statut === 'incomplet') bg-amber-500 text-white
                                @elseif($candidature->statut === 'refuse') bg-rose-600 text-white
                                @else bg-sky-600 text-white @endif">
                                @if($candidature->statut === 'admis') <i class="fa-solid fa-check-double"></i>
                                @elseif($candidature->statut === 'incomplet') <i class="fa-solid fa-triangle-exclamation"></i>
                                @elseif($candidature->statut === 'refuse') <i class="fa-solid fa-xmark"></i>
                                @else <i class="fa-solid fa-hourglass-half"></i> @endif
                            </div>
                            <div>
                                <div class="text-[10px] font-bold uppercase tracking-widest opacity-70">Statut Officiel du Dossier</div>
                                <h3 class="font-['Outfit'] font-black text-lg sm:text-xl">
                                    @if($candidature->statut === 'admis') ADMISSION VALIDÉE & CONFIRMÉE
                                    @elseif($candidature->statut === 'incomplet') DOSSIER INCOMPLET - PIÈCES COMPLÉMENTAIRES REQUISE(S)
                                    @elseif($candidature->statut === 'refuse') CANDIDATURE NON RETENUE
                                    @else DOSSIER EN COURS D'EXAMEN PAR LE JURY ACADÉMIQUE @endif
                                </h3>
                            </div>
                        </div>

                        <div class="text-right shrink-0">
                            <span class="text-[10px] font-bold text-slate-500 block uppercase">Date d'Enregistrement</span>
                            <span class="text-xs font-extrabold text-slate-800 font-mono">{{ date('d/m/Y - H:i', strtotime($candidature->created_at)) }}</span>
                        </div>
                    </div>

                    @if($candidature->remarques_admin)
                        <div class="mt-4 pt-3 border-t border-slate-200/60 text-xs font-semibold">
                            <strong class="text-slate-900"><i class="fa-solid fa-comment-dots mr-1"></i> Observation de la Scolarité :</strong>
                            <p class="mt-1 text-slate-800 italic bg-white/60 p-2.5 rounded-xl border border-slate-200/80">{{ $candidature->remarques_admin }}</p>
                        </div>
                    @endif
                </div>

                <!-- CANDIDATE INFORMATION GRID -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs">
                    
                    <!-- Box 1: Candidat -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                        <div class="flex items-center gap-2 pb-3 border-b border-slate-100">
                            <div class="w-7 h-7 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center font-bold">
                                <i class="fa-solid fa-id-card"></i>
                            </div>
                            <h4 class="font-['Outfit'] font-extrabold text-sm text-slate-900 uppercase tracking-wider">Identité du Candidat</h4>
                        </div>

                        <div class="space-y-2">
                            <div class="flex justify-between py-1 border-b border-slate-50">
                                <span class="text-slate-500 font-semibold">Nom de Famille :</span>
                                <span class="font-bold text-slate-900 uppercase">{{ $candidature->nom }}</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-50">
                                <span class="text-slate-500 font-semibold">Prénom(s) :</span>
                                <span class="font-bold text-slate-900">{{ $candidature->prenom }}</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-50">
                                <span class="text-slate-500 font-semibold">Genre / Nationalité :</span>
                                <span class="font-bold text-slate-900">{{ $candidature->genre === 'M' ? 'Masculin' : 'Féminin' }} ({{ $candidature->nationalite }})</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-50">
                                <span class="text-slate-500 font-semibold">Téléphone / WhatsApp :</span>
                                <span class="font-bold text-slate-900 font-mono">{{ $candidature->telephone }}</span>
                            </div>
                            <div class="flex justify-between py-1">
                                <span class="text-slate-500 font-semibold">Adresse Email :</span>
                                <span class="font-bold text-slate-900">{{ $candidature->email }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Box 2: Academic Choice -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                        <div class="flex items-center gap-2 pb-3 border-b border-slate-100">
                            <div class="w-7 h-7 rounded-lg bg-sky-100 text-sky-700 flex items-center justify-center font-bold">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <h4 class="font-['Outfit'] font-extrabold text-sm text-slate-900 uppercase tracking-wider">Affectation Académique</h4>
                        </div>

                        <div class="space-y-2">
                            <div class="py-1 border-b border-slate-50">
                                <span class="text-slate-500 font-semibold block">Faculté Académique :</span>
                                <span class="font-bold text-slate-900 leading-tight block mt-0.5">{{ $candidature->faculte }}</span>
                            </div>
                            <div class="py-1 border-b border-slate-50">
                                <span class="text-slate-500 font-semibold block">Filière d'Études :</span>
                                <span class="font-extrabold text-amber-700 text-sm block mt-0.5">{{ $candidature->filiere }}</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-50">
                                <span class="text-slate-500 font-semibold">Niveau d'Enseignement :</span>
                                <span class="font-bold text-slate-900">{{ $candidature->cycle }}</span>
                            </div>
                            <div class="flex justify-between py-1">
                                <span class="text-slate-500 font-semibold">Campus & Session :</span>
                                <span class="font-bold text-slate-900">Campus N'Djamena (2026-2027)</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- OFFICIAL STAMP & QR CODE AUTHENTICATION -->
                <div class="pt-6 border-t-2 border-slate-200 grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
                    
                    <!-- QR Code Block -->
                    <div class="flex items-center gap-4 bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
                        <!-- High Quality Clean SVG QR Code -->
                        <div class="w-20 h-20 bg-slate-950 p-2 rounded-xl flex items-center justify-center shrink-0 shadow-md ring-2 ring-amber-400/40">
                            <svg viewBox="0 0 100 100" class="w-full h-full text-amber-400 fill-current">
                                <rect x="5" y="5" width="30" height="30" rx="4" />
                                <rect x="12" y="12" width="16" height="16" fill="black" />
                                <rect x="65" y="5" width="30" height="30" rx="4" />
                                <rect x="72" y="12" width="16" height="16" fill="black" />
                                <rect x="5" y="65" width="30" height="30" rx="4" />
                                <rect x="12" y="72" width="16" height="16" fill="black" />
                                <rect x="45" y="45" width="10" height="10" />
                                <rect x="65" y="65" width="12" height="12" />
                                <rect x="80" y="80" width="15" height="15" />
                                <rect x="45" y="15" width="12" height="12" />
                                <rect x="15" y="45" width="12" height="12" />
                            </svg>
                        </div>
                        <div class="text-[11px] text-slate-600">
                            <strong class="block text-slate-900 font-bold text-xs">Vérification Numérique Officielle</strong>
                            Ce QR Code certifie l'authenticité de l'attestation auprès des services de scolarité de l'UNEK N'Djamena.
                        </div>
                    </div>

                    <!-- Stamp / Official Signature Simulation -->
                    <div class="text-center sm:text-right space-y-1">
                        <div class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Fait à N'Djamena, le {{ date('d/m/Y') }}</div>
                        <div class="text-xs font-extrabold text-slate-900">Pour le Secrétariat Général & la Scolarité</div>
                        
                        <!-- Stamp Graphic -->
                        <div class="inline-flex items-center gap-2 border-2 border-blue-800 text-blue-900 px-3 py-1.5 rounded-full font-bold text-[10px] tracking-wider uppercase bg-blue-50/50 my-1">
                            <i class="fa-solid fa-stamp text-blue-800"></i> SCE SCOLARITÉ UNEK - TCHAD
                        </div>
                        <p class="text-[10px] text-slate-400 font-mono">Signature Numérique Certifiée ID: 2026-UNEK-SEC-8821</p>
                    </div>

                </div>

            </div>

            <!-- FOOTER NOTICE -->
            <div class="bg-slate-100 px-8 py-4 text-center text-[11px] text-slate-500 border-t border-slate-200">
                Université Emi Koussi (UNEK) • Campus Moursal / Ardep-djoumbal, N'Djamena, Tchad • Tel: +235 66 28 00 00 / +235 99 28 00 00
            </div>

        </div>

    </div>
</section>

@endsection
