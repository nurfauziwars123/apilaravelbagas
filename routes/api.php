<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\BarangModel;
use Illuminate\Support\Facades\Route;

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id_user}', [UserController::class, 'show']);

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/addBarang', [BarangController::class, 'add']);
Route::get('/barang/{id_barang}', [BarangController::class, 'show']);

Route::get('/log', [LogController::class, 'index']);
Route::get('/log/{id_log}', [LogController::class, 'show']);
Route::get('/log2/{id_log}', [LogController::class, 'show2']);

Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/inputTransaksi', [TransaksiController::class, 'input']);
Route::get('/printTransaksi', [TransaksiController::class, 'print_pdf']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
