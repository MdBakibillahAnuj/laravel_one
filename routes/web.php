<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudCrontroller;


Route::get('/', [CrudCrontroller::class, 'showData']);
Route::get('/add-data', [CrudCrontroller::class, 'addData']);
Route::post('/store-data', [CrudCrontroller::class, 'storeData']);
Route::get('/edit-data/{id}', [CrudCrontroller::class, 'editData']);
Route::get('/delete-data/{id}', [CrudCrontroller::class, 'deleteData']);
