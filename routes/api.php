<?php

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/stores', function () {
    return response()->json(Store::all(), 200);
});

Route::get('/stores/{id}', function ($id) {
    $store = Store::with('pixels')->where(['id' => $id])->get();
    if ($store->isEmpty()) {
        return response()->json([], 404);
    } else {
        return response()->json($store, 200);
    }
});
