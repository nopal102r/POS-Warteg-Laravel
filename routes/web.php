<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MinumanController;
use App\Http\Controllers\MakananController;

Route::Resource(name: 'makanan', controller: MakananController::class);
Route::apiResource(name:'makanan', controller: MakananController::class);

Route::Resource(name: 'minuman', controller: MinumanController::class);
Route::apiResource(name:'minuman', controller: MinumanController::class);

Route::Resource(name: 'pelanggan', controller: PelangganController::class);
Route::apiResource(name:'pelanggan', controller: PelangganController::class);

Route::Resource(name: 'pesan', controller: PesanController::class);
Route::apiResource(name:'pesan', controller: PesanController::class);


Route::get('/',[HomeController::class,'index']);
