<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpediteurController;
use App\Http\Controllers\DestinataireController;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\PieceJointeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TraitementController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\RoleController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('expediteurs', ExpediteurController::class);
Route::resource('destinataires', DestinataireController::class);
Route::resource('courriers', CourrierController::class);
Route::resource('archives', ArchiveController::class);
Route::resource('pieces_jointes', PieceJointeController::class);
Route::resource('notifications', NotificationController::class);
Route::resource('traitements', TraitementController::class);
Route::resource('affectations', AffectationController::class);
Route::resource('services', ServiceController::class);
Route::resource('utilisateurs', UtilisateurController::class);
Route::resource('roles', RoleController::class);