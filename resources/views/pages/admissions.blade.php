@extends('layouts.app')

@section('title', 'Portail de Candidature & Pré-inscription en Ligne | UNEK N\'Djamena')

@section('content')

<!-- Header Banner -->
<section class="bg-[#0B1528] text-white py-14 border-b border-amber-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="px-3.5 py-1 rounded-full bg-amber-400/20 text-amber-300 font-extrabold text-xs uppercase tracking-widest border border-amber-400/30">
            Admissions Ouvertes 2026-2027
        </span>
        <h1 class="font-['Outfit'] text-3xl sm:text-5xl font-extrabold text-white mt-4">
            Portail de Pré-inscription en Ligne UNEK
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto mt-3 font-light">
            Complétez les 3 étapes de candidature ci-dessous. Un récépissé officiel avec identifiant de dossier unique vous sera délivré instantanément.
        </p>

        <!-- Formulaire de Suivi de Dossier -->
        <div class="mt-8 max-w-xl mx-auto bg-white/10 p-3 rounded-2xl backdrop-blur-md border border-white/20 text-left">
            <span class="text-[11px] font-bold text-amber-300 uppercase tracking-wider block mb-1 text-center sm:text-left">
                🔍 Déjà candidat ? Vérifiez le statut de votre dossier
            </span>
            <form action="{{ route('admissions.suivi') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-2 mt-1">
                <div class="relative w-full flex-1">
                    <i class="fa-solid fa-id-card absolute left-3 top-3 text-slate-400 text-xs"></i>
                    <input type="text" name="code_dossier" placeholder="Entrez votre N° Dossier (ex: 2026-UNEK-4819) ou Email" required class="w-full pl-9 pr-3 py-2 text-xs rounded-xl bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <button type="submit" class="w-full sm:w-auto px-5 py-2 rounded-xl bg-amber-400 hover:bg-amber-500 text-slate-950 font-extrabold text-xs transition shrink-0 flex items-center justify-center gap-1.5 shadow-md">
                    <i class="fa-solid fa-magnifying-glass"></i> Vérifier mon statut
                </button>
            </form>
        </div>

        @if(session('error'))
            <div class="mt-4 max-w-xl mx-auto p-3 rounded-xl bg-rose-500/20 border border-rose-400/40 text-rose-200 text-xs font-semibold">
                <i class="fa-solid fa-circle-exclamation mr-1"></i> {{ session('error') }}
            </div>
        @endif
    </div>
</section>

<!-- MULTI-STEP ADMISSION FORM -->
<section class="py-16 bg-slate-100" x-data="{
    step: 1,
    nextStep() {
        if (this.step < 3) this.step++;
    },
    prevStep() {
        if (this.step > 1) this.step--;
    }
}">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- STEP INDICATOR BAR -->
        <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-200 mb-8">
            <div class="grid grid-cols-3 gap-2 text-center relative">
                
                <!-- Step 1 Indicator -->
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition"
                         :class="step >= 1 ? 'bg-amber-400 text-slate-950 shadow-md' : 'bg-slate-200 text-slate-500'">
                        1
                    </div>
                    <span class="text-[11px] font-bold mt-2" :class="step >= 1 ? 'text-slate-900' : 'text-slate-400'">Identité du Candidat</span>
                </div>

                <!-- Step 2 Indicator -->
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition"
                         :class="step >= 2 ? 'bg-amber-400 text-slate-950 shadow-md' : 'bg-slate-200 text-slate-500'">
                        2
                    </div>
                    <span class="text-[11px] font-bold mt-2" :class="step >= 2 ? 'text-slate-900' : 'text-slate-400'">Choix de la Filière</span>
                </div>

                <!-- Step 3 Indicator -->
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition"
                         :class="step >= 3 ? 'bg-emerald-500 text-white shadow-md' : 'bg-slate-200 text-slate-500'">
                        3
                    </div>
                    <span class="text-[11px] font-bold mt-2" :class="step >= 3 ? 'text-emerald-700' : 'text-slate-400'">Documents & Soumission</span>
                </div>

            </div>
        </div>

        <!-- FORM CONTAINER -->
        <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-xl border border-slate-200">
            
            <form action="{{ route('admissions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- STEP 1: IDENTIFICATION DU CANDIDAT -->
                <div x-show="step === 1" x-transition:enter="transition ease-out duration-300">
                    <div class="flex items-center gap-3 pb-4 border-b border-slate-100 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div>
                            <h3 class="font-['Outfit'] font-bold text-xl text-slate-900">Étape 1 : Identification du Candidat</h3>
                            <p class="text-xs text-slate-500">Renseignez vos coordonnées personnelles exactes</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 text-xs">
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Nom de Famille *</label>
                            <input type="text" name="nom" required placeholder="ex: MAHAMAT" class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none uppercase">
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Prénom(s) *</label>
                            <input type="text" name="prenom" required placeholder="ex: Ali Hassan" class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Genre *</label>
                            <select name="genre" required class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none bg-white">
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Date de Naissance *</label>
                            <input type="date" name="date_naissance" required class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Nationalité *</label>
                            <input type="text" name="nationalite" value="Tchadienne" required class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Téléphone / WhatsApp Scolarité *</label>
                            <input type="tel" name="telephone" required placeholder="+235 66 00 00 00" class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block font-bold text-slate-700 mb-1">Adresse E-mail Officielle *</label>
                            <input type="email" name="email" required placeholder="candidat@gmail.com" class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block font-bold text-slate-700 mb-1">Ville & Quartier de Résidence</label>
                            <input type="text" name="adresse" placeholder="Quartier Moursal, N'Djamena" class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="button" @click="nextStep()" class="px-8 py-3 rounded-xl bg-amber-400 hover:bg-amber-500 text-slate-950 font-extrabold text-xs shadow-md transition flex items-center gap-2">
                            Étape Suivante <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- STEP 2: CHOIX ACADÉMIQUE -->
                <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" style="display: none;">
                    <div class="flex items-center gap-3 pb-4 border-b border-slate-100 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div>
                            <h3 class="font-['Outfit'] font-bold text-xl text-slate-900">Étape 2 : Choix de la Faculté & Filière</h3>
                            <p class="text-xs text-slate-500">Sélectionnez la formation LMD souhaitée pour l'année académique 2026-2027</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 text-xs">
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Cycle d'Études Visé *</label>
                            <select name="cycle" required class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none bg-white">
                                <option value="Licence 1">Licence 1ère Année (L1)</option>
                                <option value="Licence 2">Licence 2ème Année (L2 - Transfert)</option>
                                <option value="Licence 3">Licence 3ème Année (L3)</option>
                                <option value="Master 1">Master 1ère Année (M1)</option>
                                <option value="Master 2">Master 2ème Année (M2)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Faculté Académique *</label>
                            <select name="faculte" required class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none bg-white">
                                <option value="Faculté des Sciences Humaines, Juridiques et de Gestion">Faculté des Sciences Humaines, Juridiques et de Gestion</option>
                                <option value="Faculté des Sciences et Techniques">Faculté des Sciences et Techniques</option>
                            </select>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block font-bold text-slate-700 mb-1">Filière Spécifique *</label>
                            <select name="filiere" required class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none bg-white font-semibold text-slate-800">
                                <!-- Faculté des Sciences Humaines, Juridiques et de Gestion -->
                                <optgroup label="Faculté des Sciences Humaines, Juridiques et de Gestion">
                                    <option value="Droit Privé">Droit Privé</option>
                                    <option value="Droit Public">Droit Public</option>
                                    <option value="Sciences Politiques">Sciences Politiques</option>
                                    <option value="Relations Internationales">Relations Internationales</option>
                                    <option value="Gestion des Entreprises">Gestion des Entreprises</option>
                                    <option value="Comptabilité & Finance">Comptabilité & Finance</option>
                                    <option value="Marketing & Communication">Marketing & Communication</option>
                                    <option value="Ressources Humaines">Ressources Humaines</option>
                                    <option value="Économie & Développement">Économie & Développement</option>
                                    <option value="Administration Publique">Administration Publique</option>
                                    <option value="Sciences de l’Éducation">Sciences de l’Éducation</option>
                                    <option value="Sociologie">Sociologie</option>
                                    <option value="Philosophie">Philosophie</option>
                                    <option value="Lettres & Langues">Lettres & Langues</option>
                                    <option value="Journalisme & Communication">Journalisme & Communication</option>
                                    <option value="Gestion de Projets">Gestion de Projets</option>
                                    <option value="Management">Management</option>
                                    <option value="Propriété Intellectuelle & Industries Créatives">Propriété Intellectuelle & Industries Créatives (Nouveau)</option>
                                </optgroup>

                                <!-- Faculté des Sciences et Techniques -->
                                <optgroup label="Faculté des Sciences et Techniques">
                                    <option value="Informatique">Informatique</option>
                                    <option value="Génie Logiciel">Génie Logiciel</option>
                                    <option value="Réseaux & Télécommunications">Réseaux & Télécommunications</option>
                                    <option value="Mathématiques Appliquées">Mathématiques Appliquées</option>
                                    <option value="Physique">Physique</option>
                                    <option value="Géologie">Géologie</option>
                                    <option value="Géophysique">Géophysique</option>
                                    <option value="Hydrogéologie">Hydrogéologie</option>
                                    <option value="Génie Civil">Génie Civil</option>
                                    <option value="Électronique">Électronique</option>
                                    <option value="Maintenance Industrielle">Maintenance Industrielle</option>
                                    <option value="Énergies Renouvelables">Énergies Renouvelables</option>
                                    <option value="Environnement & Développement Durable">Environnement & Développement Durable</option>
                                    <option value="Agronomie">Agronomie</option>
                                    <option value="Statistiques">Statistiques</option>
                                    <option value="Sciences de la Terre">Sciences de la Terre</option>
                                    <option value="Technologies Appliquées">Technologies Appliquées</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between">
                        <button type="button" @click="prevStep()" class="px-6 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold text-xs transition">
                            <i class="fa-solid fa-arrow-left"></i> Précédent
                        </button>
                        <button type="button" @click="nextStep()" class="px-8 py-3 rounded-xl bg-amber-400 hover:bg-amber-500 text-slate-950 font-extrabold text-xs shadow-md transition flex items-center gap-2">
                            Étape Suivante <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- STEP 3: DÉPÔT DES PIÈCES NUMÉRISÉES & VALIDATION -->
                <div x-show="step === 3" x-transition:enter="transition ease-out duration-300" style="display: none;">
                    <div class="flex items-center gap-3 pb-4 border-b border-slate-100 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">
                            <i class="fa-solid fa-upload"></i>
                        </div>
                        <div>
                            <h3 class="font-['Outfit'] font-bold text-xl text-slate-900">Étape 3 : Documents Justificatifs <span class="text-rose-600 font-extrabold text-sm">* (Obligatoires)</span></h3>
                            <p class="text-xs text-slate-500">Téléversez vos 3 pièces obligatoires (PDF ou Image JPG/PNG) pour soumettre votre dossier</p>
                        </div>
                    </div>

                    <!-- Notice Alert -->
                    <div class="mb-6 p-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-900 text-xs font-bold flex items-center gap-2">
                        <i class="fa-solid fa-triangle-exclamation text-amber-600 text-base"></i>
                        <span>Attention : Les 3 pièces justificatives ci-dessous sont <strong>strictement obligatoires (*)</strong> pour pouvoir soumettre votre candidature.</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 text-xs">
                        
                        <!-- File 1: Bac -->
                        <div class="p-4 rounded-2xl border-2 border-dashed border-rose-300 bg-rose-50/30 text-center hover:border-rose-500 transition relative">
                            <span class="absolute top-2 right-2 px-2 py-0.5 rounded bg-rose-600 text-white font-extrabold text-[9px] uppercase">Obligatoire *</span>
                            <i class="fa-solid fa-file-pdf text-3xl text-rose-500 mb-2 mt-2"></i>
                            <h4 class="font-bold text-slate-800">Attestation du Baccalauréat *</h4>
                            <p class="text-[11px] text-slate-400 mt-1">Scan du diplôme ou relevé de notes</p>
                            <input type="file" name="bac_file" required accept=".pdf,.jpg,.jpeg,.png" class="mt-3 text-xs w-full font-bold text-slate-700">
                        </div>

                        <!-- File 2: CNI -->
                        <div class="p-4 rounded-2xl border-2 border-dashed border-amber-300 bg-amber-50/30 text-center hover:border-amber-500 transition relative">
                            <span class="absolute top-2 right-2 px-2 py-0.5 rounded bg-rose-600 text-white font-extrabold text-[9px] uppercase">Obligatoire *</span>
                            <i class="fa-solid fa-address-card text-3xl text-amber-500 mb-2 mt-2"></i>
                            <h4 class="font-bold text-slate-800">CNI ou Passeport *</h4>
                            <p class="text-[11px] text-slate-400 mt-1">Copie lisible du document</p>
                            <input type="file" name="cni_file" required accept=".pdf,.jpg,.jpeg,.png" class="mt-3 text-xs w-full font-bold text-slate-700">
                        </div>

                        <!-- File 3: Photo -->
                        <div class="p-4 rounded-2xl border-2 border-dashed border-emerald-300 bg-emerald-50/30 text-center hover:border-emerald-500 transition relative">
                            <span class="absolute top-2 right-2 px-2 py-0.5 rounded bg-rose-600 text-white font-extrabold text-[9px] uppercase">Obligatoire *</span>
                            <i class="fa-solid fa-image text-3xl text-emerald-500 mb-2 mt-2"></i>
                            <h4 class="font-bold text-slate-800">Photo d'Identité Récente *</h4>
                            <p class="text-[11px] text-slate-400 mt-1">Format passeport fond clair</p>
                            <input type="file" name="photo_file" required accept=".jpg,.jpeg,.png" class="mt-3 text-xs w-full font-bold text-slate-700">
                        </div>

                    </div>

                    <div class="mt-8 flex justify-between">
                        <button type="button" @click="prevStep()" class="px-6 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold text-xs transition">
                            <i class="fa-solid fa-arrow-left"></i> Précédent
                        </button>
                        <button type="submit" class="px-8 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs shadow-lg transition flex items-center gap-2">
                            <i class="fa-solid fa-paper-plane"></i> Valider et Envoyer ma Candidature
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>
</section>

@endsection
