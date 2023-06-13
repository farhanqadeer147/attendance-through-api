<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/recordvisit',[VisitController::class,'recordvisit']);
Route::get('/recorddeparture',[VisitController::class,'recordDeparture']);
Route::get('/index',[VisitController::class,'index']);
Route::get('/departure',[VisitController::class,'departure']);

Route::post('/record-visit', function () {
$request = Request::capture(); // Capture the current request
$visitController = new VisitController();
$response = $visitController->recordVisit($request);

return response()->json(['message' => $response]);
});
