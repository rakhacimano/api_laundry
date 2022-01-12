<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Member Routers
Route::post('member', [MemberController::class, 'insert']);
Route::put('member/{id_member}', [MemberController::class, 'update']);
Route::delete('member/{id_member}', [MemberController::class, 'delete']);
Route::get('member', [MemberController::class, 'getAll']);
Route::get('member/{id_member}', [MemberController::class, 'getById']);

// Paket Routers
Route::post('paket', [PaketController::class, 'insert']);
Route::put('paket/{id_paket}', [PaketController::class, 'update']);
Route::delete('paket/{id_paket}', [PaketController::class, 'delete']);
Route::get('paket', [PaketController::class, 'getAll']);
Route::get('paket/{id_paket}', [PaketController::class, 'getById']);

// Outlet Routers
Route::post('outlet', [OutletController::class, 'insert']);
Route::put('outlet/{id_outlet}', [OutletController::class, 'update']);
Route::delete('outlet/{id_outlet}', [OutletController::class, 'delete']);
Route::get('outlet', [OutletController::class, 'getAll']);
Route::get('outlet/{id_outlet}', [OutletController::class, 'getById']);
