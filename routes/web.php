<?php
use App\Http\Controllers\CollaboratorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('collaborators', CollaboratorController::class)
    ->middleware(['auth', 'role:gestor_rrhh']);

