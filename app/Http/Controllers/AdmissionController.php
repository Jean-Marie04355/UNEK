<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmissionController extends Controller
{
    /**
     * Affiche le formulaire de pré-inscription en ligne.
     */
    public function index()
    {
        return view('pages.admissions');
    }

    /**
     * Traite la soumission d'une nouvelle candidature.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'genre' => 'required|in:M,F',
            'date_naissance' => 'nullable|date',
            'nationalite' => 'required|string|max:255',
            'telephone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'adresse' => 'nullable|string|max:255',
            'cycle' => 'required|string|max:100',
            'faculte' => 'required|string|max:255',
            'filiere' => 'required|string|max:255',
            'bac_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'cni_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'photo_file' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
        ]);

        // Upload des fichiers
        $bacPath = null;
        $cniPath = null;
        $photoPath = null;

        if ($request->hasFile('bac_file')) {
            $bacPath = $request->file('bac_file')->store('candidatures/bac', 'public');
        }
        if ($request->hasFile('cni_file')) {
            $cniPath = $request->file('cni_file')->store('candidatures/cni', 'public');
        }
        if ($request->hasFile('photo_file')) {
            $photoPath = $request->file('photo_file')->store('candidatures/photo', 'public');
        }

        // Génération du code unique
        $codeDossier = Candidature::generateCodeDossier();

        // Enregistrement en BDD
        $candidature = Candidature::create([
            'code_dossier' => $codeDossier,
            'nom' => strtoupper($validated['nom']),
            'prenom' => ucfirst($validated['prenom']),
            'genre' => $validated['genre'],
            'date_naissance' => $validated['date_naissance'] ?? null,
            'nationalite' => $validated['nationalite'],
            'telephone' => $validated['telephone'],
            'email' => strtolower($validated['email']),
            'adresse' => $validated['adresse'] ?? null,
            'cycle' => $validated['cycle'],
            'faculte' => $validated['faculte'],
            'filiere' => $validated['filiere'],
            'statut' => 'en_attente',
            'bac_path' => $bacPath,
            'cni_path' => $cniPath,
            'photo_path' => $photoPath,
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'code_dossier' => $codeDossier,
                'message' => 'Candidature enregistrée avec succès !',
                'redirect_url' => route('admissions.confirmation', $codeDossier)
            ]);
        }

        return redirect()->route('admissions.confirmation', $codeDossier)
                         ->with('success', 'Votre pré-inscription a été enregistrée avec succès.');
    }

    /**
     * Affiche la fiche de confirmation / Lettre d'Admission simulation.
     */
    public function confirmation($code_dossier)
    {
        $candidature = Candidature::where('code_dossier', $code_dossier)->firstOrFail();
        return view('pages.confirmation', compact('candidature'));
    }

    /**
     * Recherche et affiche le statut d'une candidature par son code dossier ou email.
     */
    public function suivi(Request $request)
    {
        $query = trim($request->input('code_dossier'));

        if (!$query) {
            return redirect()->route('admissions')->with('error', 'Veuillez saisir votre numéro de dossier ou adresse email.');
        }

        $candidature = Candidature::where('code_dossier', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->orWhere('telephone', 'like', "%{$query}%")
            ->first();

        if (!$candidature) {
            return redirect()->route('admissions')->with('error', "Aucun dossier trouvé pour \"{$query}\". Vérifiez votre numéro de dossier.");
        }

        return redirect()->route('admissions.confirmation', $candidature->code_dossier);
    }
}
