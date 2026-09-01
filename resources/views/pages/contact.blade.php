@extends('layouts.app')

@section('title', 'Contact & Localisation | Université Emi Koussi (UNEK)')

@section('content')

<!-- Header Banner -->
<section class="bg-[#0B1B3D] text-white py-14 border-b border-amber-500/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="px-3.5 py-1 rounded-full bg-amber-400/20 text-amber-300 font-extrabold text-xs uppercase tracking-widest border border-amber-400/30">
            Assistance & Renseignements
        </span>
        <h1 class="font-['Outfit'] text-3xl sm:text-5xl font-extrabold text-white mt-4">
            Contact & Campus de N'Djamena
        </h1>
        <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto mt-3 font-light">
            Nos équipes d'orientation et de la scolarité sont à votre écoute par téléphone, WhatsApp, email ou directement sur le campus.
        </p>
    </div>
</section>

<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Contact Cards (5 Cols) -->
            <div class="lg:col-span-5 space-y-6">
                
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-md flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-400 text-slate-950 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h3 class="font-['Outfit'] font-bold text-base text-slate-900">Adresse du Campus</h3>
                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                            Quartier Moursal / Ardep-djoumbal, N'Djamena, République du Tchad
                        </p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-md flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-400 text-slate-950 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div>
                        <h3 class="font-['Outfit'] font-bold text-base text-slate-900">Hotline WhatsApp Scolarité</h3>
                        <p class="text-xs text-slate-600 mt-1">
                            +235 66 28 00 00 / +235 99 28 00 00
                        </p>
                        <a href="https://wa.me/23566280000" target="_blank" class="inline-block mt-2 text-xs font-bold text-emerald-600 hover:underline">
                            Démarrer une discussion WhatsApp <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-md flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-sky-400 text-slate-950 flex items-center justify-center text-xl shrink-0">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div>
                        <h3 class="font-['Outfit'] font-bold text-base text-slate-900">E-mail Officiel</h3>
                        <p class="text-xs text-slate-600 mt-1">
                            contact@unek-tchad.org / scolarite@unek-tchad.org
                        </p>
                    </div>
                </div>

                <div class="bg-[#0B1B3D] text-white p-6 rounded-2xl border border-amber-400/30">
                    <h4 class="font-['Outfit'] font-bold text-sm text-amber-400 mb-2">Horaires d'Ouverture du Secrétariat</h4>
                    <p class="text-xs text-slate-300">Du Lundi au Samedi : 07h30 - 18h00 non-stop</p>
                </div>

            </div>

            <!-- Interactive Form (7 Cols) -->
            <div class="lg:col-span-7 bg-white p-8 rounded-3xl border border-slate-200 shadow-xl">
                <h3 class="font-['Outfit'] font-extrabold text-2xl text-slate-900 mb-2">Envoyez-nous un message</h3>
                <p class="text-xs text-slate-500 mb-6">Un conseiller d'orientation vous répondra sous 24h ouvrées.</p>

                <form @submit.prevent="alert('Message envoyé avec succès au secrétariat de l\'UNEK !')" class="space-y-4 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Nom & Prénom *</label>
                            <input type="text" required placeholder="Votre nom complet" class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Téléphone / WhatsApp *</label>
                            <input type="tel" required placeholder="+235 -- -- -- --" class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Adresse E-mail *</label>
                        <input type="email" required placeholder="votreemail@domaine.com" class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none">
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Sujet de votre demande</label>
                        <select class="w-full p-3 rounded-xl border border-slate-300 bg-white font-semibold text-slate-700 focus:border-amber-400 focus:outline-none">
                            <option>Renseignements sur une filière LMD</option>
                            <option>Assistance Inscription en ligne</option>
                            <option>Modalités de paiement de la scolarité</option>
                            <option>Demande de transfert d'université</option>
                            <option>Autre question</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 mb-1">Votre Message *</label>
                        <textarea rows="4" required placeholder="Posez votre question ici..." class="w-full p-3 rounded-xl border border-slate-300 focus:border-amber-400 focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-amber-400 to-amber-600 text-slate-950 font-extrabold text-xs shadow-lg hover:from-amber-300 hover:to-amber-500 transition">
                        <i class="fa-solid fa-paper-plane mr-1.5"></i> Envoyer le Message
                    </button>
                </form>
            </div>

        </div>

    </div>
</section>

@endsection
