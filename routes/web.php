<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/universite', function () {
    return view('pages.universite');
})->name('universite');

Route::get('/formations', function () {
    return view('pages.formations');
})->name('formations');

// Admissions & Inscriptions en ligne
Route::get('/admissions', [AdmissionController::class, 'index'])->name('admissions');
Route::post('/admissions', [AdmissionController::class, 'store'])->name('admissions.store');
Route::get('/admissions/suivi', [AdmissionController::class, 'suivi'])->name('admissions.suivi');
Route::get('/admissions/confirmation/{code}', [AdmissionController::class, 'confirmation'])->name('admissions.confirmation');

Route::get('/tarifs', function () {
    return view('pages.tarifs');
})->name('tarifs');

Route::get('/vie-etudiante', function () {
    return view('pages.vie-etudiante');
})->name('vie-etudiante');

Route::get('/actualites', function () {
    return view('pages.actualites');
})->name('actualites');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

// Espace Administration Scolarité UNEK
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/export/csv', [AdminController::class, 'exportCsv'])->name('admin.export.csv');
Route::get('/admin/pv-deliberation', [AdminController::class, 'pvDeliberation'])->name('admin.pv');
Route::get('/admin/candidature/{id}', [AdminController::class, 'show'])->name('admin.candidature.show');
Route::post('/admin/candidature/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.candidature.status');
Route::delete('/admin/candidature/{id}', [AdminController::class, 'destroy'])->name('admin.candidature.destroy');
