<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
Route::get('user/list/', function (Request $request) {
    $combustibles = User::all();
    return json_encode($combustibles);
});

Route::get('user/toma', function () {
    $request = Request::create('http://127.0.0.1:8000/admin/combustibles', 'GET');
    $response = app()->handle($request);
    $data = json_decode($response->getContent());
    dd($response);
    return $data;
});
