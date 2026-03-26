<?php
use App\Http\Controllers\CollaboratorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractExtensionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth','role:gestor_rrhh'])->group(function () {

    Route::resource('collaborators', CollaboratorController::class);
    Route::resource('contracts', ContractController::class);
    Route::post('/contracts/{id}/extensions', [ContractExtensionController::class, 'store']);
    Route::patch('/contracts/{id}/terminate', [ContractController::class, 'terminate']);
}); 

