<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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

        // Analytics: Répartition par nationalité & Filières
        $nationaliteStats = Candidature::selectRaw('nationalite, count(*) as count')
            ->groupBy('nationalite')
            ->pluck('count', 'nationalite')
            ->toArray();

        $filiereStats = Candidature::selectRaw('filiere, count(*) as count')
            ->groupBy('filiere')
            ->orderBy('count', 'desc')
            ->take(6)
            ->pluck('count', 'filiere')
            ->toArray();

        return view('admin.index', compact('candidatures', 'stats', 'nationaliteStats', 'filiereStats'));
    }

    /**
     * Exporte la liste officielle des candidats au format CSV/Excel.
     */
    public function exportCsv()
    {
        $candidatures = Candidature::orderBy('created_at', 'desc')->get();
        $filename = "Liste_Candidats_UNEK_2026_" . date('Y-m-d') . ".csv";

        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Code Dossier', 'Nom', 'Prenom', 'Genre', 'Nationalite', 'Telephone', 'Email', 'Faculte', 'Filiere', 'Cycle', 'Statut', 'Date Inscription'];

        $callback = function() use ($candidatures, $columns) {
            $file = fopen('php://output', 'w');
            // Support UTF-8 Excel BOM
            fputs($file, "\xEF\xBB\xBF");
            fputcsv($file, $columns, ';');

            foreach ($candidatures as $cand) {
                fputcsv($file, [
                    $cand->code_dossier,
                    $cand->nom,
                    $cand->prenom,
                    $cand->genre,
                    $cand->nationalite,
                    $cand->telephone,
                    $cand->email,
                    $cand->faculte,
                    $cand->filiere,
                    $cand->cycle,
                    strtoupper($cand->statut),
                    $cand->created_at->format('d/m/Y H:i'),
                ], ';');
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    /**
     * Génère le Procès-Verbal (PV) officiel de Délibération du Jury.
     */
    public function pvDeliberation(Request $request)
    {
        $faculte = $request->get('faculte', 'Toutes les Facultés');
        $query = Candidature::where('statut', 'admis');

        if ($request->filled('faculte')) {
            $query->where('faculte', $request->faculte);
        }

        $admisList = $query->orderBy('faculte')->orderBy('filiere')->orderBy('nom')->get();

        return view('admin.pv-deliberation', compact('admisList', 'faculte'));
    }

    /**
     * Met à jour le statut et les remarques d'une candidature.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|in:en_attente,admis,incomplet,refuse',
            'remarques_admin' => 'nullable|string',
            'bac_status' => 'nullable|string',
            'cni_status' => 'nullable|string',
            'photo_status' => 'nullable|string',
            'filiere_proposee' => 'nullable|string',
        ]);

        $candidature = Candidature::findOrFail($id);
        $candidature->update([
            'statut' => $request->statut,
            'remarques_admin' => $request->remarques_admin,
            'bac_status' => $request->get('bac_status', 'conforme'),
            'cni_status' => $request->get('cni_status', 'conforme'),
            'photo_status' => $request->get('photo_status', 'conforme'),
            'filiere_proposee' => $request->get('filiere_proposee'),
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Statut de la candidature mis à jour avec succès.',
                'candidature' => $candidature
            ]);
        }

        return redirect()->back()->with('success', 'Décision du dossier ' . $candidature->code_dossier . ' enregistrée avec succès.');
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
