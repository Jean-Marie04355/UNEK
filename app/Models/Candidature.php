<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_dossier',
        'nom',
        'prenom',
        'genre',
        'date_naissance',
        'nationalite',
        'telephone',
        'email',
        'adresse',
        'cycle',
        'faculte',
        'filiere',
        'filiere_proposee',
        'statut',
        'bac_path',
        'cni_path',
        'photo_path',
        'bac_status',
        'cni_status',
        'photo_status',
        'remarques_admin',
    ];

    /**
     * Génère un code de dossier unique sous le format 2026-UNEK-XXXX
     */
    public static function generateCodeDossier(): string
    {
        do {
            $number = rand(1000, 9999);
            $code = '2026-UNEK-' . $number;
        } while (self::where('code_dossier', $code)->exists());

        return $code;
    }
}
