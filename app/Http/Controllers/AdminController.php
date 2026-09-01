<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Affiche le tableau de bord d'administration des candidatures.
     */
    public function index(Request $request)
    {
        $query = Candidature::query();

        // Filtrage par faculté
        if ($request->filled('faculte')) {
            $query->where('faculte', $request->faculte);
        }

        // Filtrage par statut
        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        // Recherche par mot clé
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('code_dossier', 'like', "%{$search}%")
                  ->orWhere('nom', 'like', "%{$search}%")
                  ->orWhere('prenom', 'like', "%{$search}%")
                  ->orWhere('telephone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('filiere', 'like', "%{$search}%");
            });
        }

        $candidatures = $query->orderBy('created_at', 'desc')->get();

        // Statistiques globales
        $stats = [
            'total' => Candidature::count(),
            'en_attente' => Candidature::where('statut', 'en_attente')->count(),
            'admis' => Candidature::where('statut', 'admis')->count(),
            'incomplet' => Candidature::where('statut', 'incomplet')->count(),
            'refuse' => Candidature::where('statut', 'refuse')->count(),
        ];

        return view('admin.index', compact('candidatures', 'stats'));
    }

    /**
     * Retourne les détails d'une candidature en JSON.
     */
    public function show($id)
    {
        $candidature = Candidature::findOrFail($id);
        return response()->json($candidature);
    }

    /**
     * Met à jour le statut et les remarques d'une candidature.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|in:en_attente,admis,incomplet,refuse',
            'remarques_admin' => 'nullable|string',
        ]);

        $candidature = Candidature::findOrFail($id);
        $candidature->update([
            'statut' => $request->statut,
            'remarques_admin' => $request->remarques_admin,
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Statut de la candidature mis à jour avec succès.',
                'candidature' => $candidature
            ]);
        }

        return redirect()->back()->with('success', 'Statut du dossier ' . $candidature->code_dossier . ' mis à jour.');
    }

    /**
     * Supprime une candidature.
     */
    public function destroy($id)
    {
        $candidature = Candidature::findOrFail($id);
        $code = $candidature->code_dossier;
        $candidature->delete();

        return redirect()->back()->with('success', "Candidature {$code} supprimée.");
    }
}
