<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TriviaQuestionController;
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
Route::prefix('trivia_questions')->group(function(){

    Route::get('/',[TriviaQuestionController::class,'index']);

    Route::post('/',[TriviaQuestionController::class, 'store']);
    
    Route::get('/{trivialquestion}',[TriviaQuestionController::class, 'show']);

    Route::put('/{trivialquestion}', [TriviaQuestionController::class, 'update']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
