<?php
use App\Http\Controllers\CollaboratorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/collaborators', [CollaboratorController::class, 'store']);

